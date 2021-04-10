@extends('layouts.app')
@section('content')
    <div class="container col-5">
        <form action="{{ route('employee.store') }}" method="POST" class="border p-4 rounded">
            @csrf
            <h2>Register new employee</h2>
            <div class="form-group mt-3">
                <label for="firstNameInput">First name</label>
                <input type="text" name="firstName" id="firstNameInput" class="form-control" placeholder="Type here">
            </div>
            <div class="form-group mt-3">
                <label for="lastNameInput">Last name</label>
                <input type="text" name="lastName" id="lastNameInput" class="form-control" placeholder="And here">
            </div>
            <div class="form-group">
                <label for="emailInput">Email</label>
                <input type="email" name="email"  id="emailInput" class="form-control" placeholder="e.g. example@domain.com">
            </div>
            <div class="form-group">
                <label for="phoneInput">Phone number</label>
                <input type="tel" name="phone" id="phoneInput" class="form-control" placeholder="+x (xxx) xxx-xx-xx">
            </div>
            <div class="form-group">
                <label for="companySelect">Employer</label>
                <select name="companyId" id="companySelect" class="form-control">
                    <option selected value="0" aria-label="Default select example">Select employing company</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Create">
            @if ($errors->any())
                <div class="alert alert-danger mt-3 mb-0">
                    <ul class="mb-0" style="list-style: none">
                        @foreach ($errors->all() as $error)
                            <li class="">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection
