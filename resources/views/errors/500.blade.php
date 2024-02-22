@extends('front.layouts.master')
@section('title', '500')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">

    <div class="error-container">
        <div class="error-main">
            <div class="container">
                
                <div class="stack text-center" style="--stacks: 3;">
                    <span style="--index: 0;">500</span>
                    <span style="--index: 1;">500</span>
                    <span style="--index: 2;">500</span>
                </div>
                <h5 class="text-center" style="font-weight: 600;">Internal Server Error</h5>
                <span class="right">Sorry, something went wrong on our end. We're working to fix it.</span>
            </div>
        </div>
    </div>
@endsection
