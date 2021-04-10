@extends('layouts.index')
@section('head')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
@endsection
@section('app')
    <div class="vh-100 d-flex flex-column">
        <div class="p-4">
            <a href="{{ url()->previous() }}" class="nav-link d-inline">
                <i class="bi bi-arrow-left"></i>
                Go back
            </a>
            <a href="{{ route('home') }}" class="nav-link d-inline">
                <i class="bi bi-house"></i>
                Home
            </a>
        </div>

        <div class="flex-grow-1 d-flex justify-content-center align-items-center pb-5">
            <div class="d-flex align-items-center mb-5"
                 style="font-size: 22pt;">
                <div class="d-inline-block pr-4">
                    @yield('code')
                </div>

                <div class="d-inline-block border-left pl-4 text-uppercase">
                    @yield('message')
                </div>
            </div>
        </div>
    </div>

@endsection
