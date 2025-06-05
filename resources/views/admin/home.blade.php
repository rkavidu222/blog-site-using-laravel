@extends('layouts.app')

@section('styles')
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        .dashboard-row {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .dashboard-panel {
            flex: 1 1 22%; /* 4 panels per row */
            border: 1px solid #ced4da;
            border-radius: 8px;
            background-color: #f8f9fa;
            box-shadow: 0 1px 4px rgba(0,0,0,0.05);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            cursor: default;
            display: flex;
            flex-direction: column;
        }

        .dashboard-panel:hover {
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            transform: translateY(-4px);
        }

        .dashboard-panel .panel-heading {
            padding: 12px 0;
            font-weight: 600;
            font-size: 1.1rem;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            color: #495057;
            background-color: #e9ecef;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        /* Color variations for each panel */
        .dashboard-panel.posted .panel-heading {
            background-color: #d9edf7;
            border-color: #d9edf7;
            color: #0d6efd;
        }

        .dashboard-panel.trashed .panel-heading {
            background-color: #f2dede;
            border-color: #f2dede;
            color: #dc3545;
        }

        .dashboard-panel.users .panel-heading {
            background-color: #dff0d8;
            border-color: #dff0d8;
            color: #198754;
        }

        .dashboard-panel.categories .panel-heading {
            background-color: #d1ecf1;
            border-color: #d1ecf1;
            color: #0dcaf0;
        }

        .dashboard-panel .panel-body {
            padding: 2rem 1rem;
            text-align: center;
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dashboard-panel .panel-body h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #212529;
            margin: 0;
        }

        /* Responsive for smaller screens */
        @media (max-width: 767px) {
            .dashboard-panel {
                flex: 1 1 100%;
            }
        }
    </style>
@endsection

@section('content')

    <div class="dashboard-row">

        <div class="dashboard-panel posted">
            <div class="panel-heading">
                <i class="fa-solid fa-file-circle-check"></i> POSTED
            </div>
            <div class="panel-body">
                <h1>{{$post_count}}</h1>
            </div>
        </div>

        <div class="dashboard-panel trashed">
            <div class="panel-heading">
                <i class="fa-solid fa-trash-can"></i> TRASHED POSTS
            </div>
            <div class="panel-body">
                <h1>{{$trash_count}}</h1>
            </div>
        </div>

        <div class="dashboard-panel users">
            <div class="panel-heading">
                <i class="fa-solid fa-users"></i> USERS
            </div>
            <div class="panel-body">
                <h1>{{$user_count}}</h1>
            </div>
        </div>

        <div class="dashboard-panel categories">
            <div class="panel-heading">
                <i class="fa-solid fa-tags"></i> CATEGORIES
            </div>
            <div class="panel-body">
                <h1>{{$category_count}}</h1>
            </div>
        </div>

    </div>

@endsection
