@extends('front.layouts.master')
@section('title', '402')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">

    <div class="error-container">
        <div class="error-main">
            <div class="container">
                
                <div class="stack text-center" style="--stacks: 3;">
                    <span style="--index: 0;">402</span>
                    <span style="--index: 1;">402</span>
                    <span style="--index: 2;">402</span>
                </div>
                <h5 class="text-center" style="font-weight: 600;">Payment Required</h5>
                <span class="right">Sorry, payment is required to access this page.</span>
            </div>
        </div>
    </div>
@endsection
