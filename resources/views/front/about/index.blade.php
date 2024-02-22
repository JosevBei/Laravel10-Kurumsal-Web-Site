@extends('front.layouts.master')

@section('title', 'Hakkımızda')

@section('content')
    <div class="mycontainer">
        <h1 class="section-title">Hakkımızda</h1>

        <div class="">
            @foreach ($about as $aboutContent)
                <div class="about-item">
                    <img src="{{ asset('uploads/abouts/' . $aboutContent->image) }}" alt="{{ $aboutContent->name }}"
                        class="about-image">
                    <div class="about-text">
                        <h2 class="about-title">{{$aboutContent->name}}</h2>
                        <p class="about-description">{{$aboutContent->content}} </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .mycontainer {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .section-title {
            text-align: center;
            font-size: 2em;
            color: #333;
            margin-bottom: 30px;
        }

        .about-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .about-item {
            flex-basis: calc(50% - 20px);
            margin: 10px;
            text-align: center;
            background-color: #c21010;
            color: #fff;
            border-radius: 8px;
            padding: 15px;
            transition: transform 0.3s ease-in-out;
        }

        .about-image {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .about-text {
            color: #fff;
        }

        .about-title {
            font-size: 1.5em;
            color: #fff;
        }

        .about-description {
            color: #fff;
        }
    </style>
@endsection
