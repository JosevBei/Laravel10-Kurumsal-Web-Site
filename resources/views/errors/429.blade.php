@extends('front.layouts.master')
@section('title', '429')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">

    <div class="error-container">
        <div class="error-main">
            <div class="container">
                
                <div class="stack text-center" style="--stacks: 3;">
                    <span style="--index: 0;">429</span>
                    <span style="--index: 1;">429</span>
                    <span style="--index: 2;">429</span>
                </div>
                <h5 class="text-center" style="font-weight: 600;">Too Many Requests</h5>
                <span class="right">Sorry, you've exceeded the maximum number of requests. Please try again later.</span>
            </div>
        </div>
    </div>
@endsection
