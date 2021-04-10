@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <div class="mt-3">
                            <h2>Companies</h2>
                            <a href="/company/create">Create new company</a>
                            <br>
                            <a href="/company">View all companies</a>
                            <br>
                            <a href="/my-companies">View my companies</a>
                        </div>
                        <div class="mt-3">
                            <h2>Employees</h2>
                            <a href="/employee/create">Register new employee</a>
                            <br>
                            <a href="/employee">View all employees</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
