@extends('front.layouts.master')
@section('title', '404')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">

    <div class="error-container">
        <div class="error-main">
            <div class="container">
                
                <div class="stack text-center" style="--stacks: 3;">
                    <span style="--index: 0;">404</span>
                    <span style="--index: 1;">404</span>
                    <span style="--index: 2;">404</span>
                </div>
                <h5 class="text-center" style="font-weight: 600;">Page Not Found</h5>
                <span class="right">Sorry, the page you are looking for is not here.</span>
            </div>
        </div>
    </div>
@endsection
