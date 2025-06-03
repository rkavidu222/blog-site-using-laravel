@extends('layouts.app')

@section('styles')
    <!-- Bootstrap CSS (Summernote depends on Bootstrap 4) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')

@include('admin.includes.errors')

<div class="card mt-3">
    <div class="card-header">
        Edit post: {{ $post->title }}
    </div>
    <div class="card-body">
        <form action="{{ route('post.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
            </div>

            <div class="form-group mb-3">
                <label for="featured">Featured image</label>
                <input type="file" name="featured" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="category">Select a category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if (optional($post->category)->id == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Select Tags</label>
                @php $tagIds = $post->tags->pluck('id')->toArray(); @endphp
                <div class="row">
                    @foreach ($tags as $tag)
                        <div class="col-md-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="tags[]" value="{{ $tag->id }}"
                                    {{ in_array($tag->id, $tagIds) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $tag->tag }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="6">{{ $post->content }}</textarea>
            </div>

            <div class="form-group text-center">
                <button class="btn btn-success" type="submit">Update Post</button>
            </div>

        </form>
    </div>
</div>

@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#content').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
