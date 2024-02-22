@extends('front.layouts.master')
@section('title', '403')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">

    <div class="error-container">
        <div class="error-main">
            <div class="container">
                
                <div class="stack text-center" style="--stacks: 3;">
                    <span style="--index: 0;">403</span>
                    <span style="--index: 1;">403</span>
                    <span style="--index: 2;">403</span>
                </div>
                <h5 class="text-center" style="font-weight: 600;">Forbidden</h5>
                <span class="right">Sorry, you don't have permission to access this page.</span>
            </div>
        </div>
    </div>
@endsection
