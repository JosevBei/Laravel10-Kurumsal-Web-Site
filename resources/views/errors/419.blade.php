@extends('front.layouts.master')
@section('title', '419')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">

    <div class="error-container">
        <div class="error-main">
            <div class="container">
                
                <div class="stack text-center" style="--stacks: 3;">
                    <span style="--index: 0;">419</span>
                    <span style="--index: 1;">419</span>
                    <span style="--index: 2;">419</span>
                </div>
                <h5 class="text-center" style="font-weight: 600;">Page Expired</h5>
                <span class="right">Sorry, your session has expired. Please refresh and try again.</span>
            </div>
        </div>
    </div>
@endsection
