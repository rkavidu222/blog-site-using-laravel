@extends('layouts.frontend')

@section('content')

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Tag: {{$tag->tag}}</h1>
        </div>
    </div>

    <!-- Post Details -->

    <div class="container">
        <div class="row medium-padding120">
            <main class="main">

                <div class="row">
                    <div class="case-item-wrap">

                        @foreach ($tag->post as $post)

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $post->featured }}" alt="our case">
                                    </div>
                                    <a href="{{ route('post.single', ['slug' => $post->slug]) }}">
                                        <h6 class="case-item__title">{{ $post->title }}</h6>
                                    </a>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>

                <!-- End Post Details -->
                <br>
                <br>
                <br>

            </main>
        </div>
    </div>

@endsection
