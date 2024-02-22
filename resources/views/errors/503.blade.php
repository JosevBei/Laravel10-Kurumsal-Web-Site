@extends('front.layouts.master')
@section('title', '503')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">

    <div class="error-container">
        <div class="error-main">
            <div class="container">
                
                <div class="stack text-center" style="--stacks: 3;">
                    <span style="--index: 0;">503</span>
                    <span style="--index: 1;">503</span>
                    <span style="--index: 2;">503</span>
                </div>
                <h5 class="text-center" style="font-weight: 600;">Service Unavailable</h5>
                <span class="right">Sorry, the service is temporarily unavailable. Please try again later.</span>
            </div>
        </div>
    </div>
@endsection
