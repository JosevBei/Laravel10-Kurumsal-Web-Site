@extends('front.layouts.master')
@section('title', '401')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">

    <div class="error-container">
        <div class="error-main">
            <div class="container">
                
                <div class="stack text-center" style="--stacks: 3;">
                    <span style="--index: 0;">401</span>
                    <span style="--index: 1;">401</span>
                    <span style="--index: 2;">401</span>
                </div>
                <h5 class="text-center" style="font-weight: 600;">Unauthorized</h5>
                <span class="right">Sorry, you are not authorized to access this page.</span>
            </div>
        </div>
    </div>
@endsection
