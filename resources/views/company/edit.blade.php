@extends('layouts.app')

@section('content')
    <div class="container col-5">
        <form  enctype="multipart/form-data" action="{{ route('company.update', $id) }}" method="POST" class="border p-4 rounded">
            @csrf
            @method('PUT')
            <h2>Edit company info</h2>
            <div class="form-group mt-3">
                <label for="nameInput">Name</label>
                <input
                    type="text"
                    name="name"
                    id="nameInput"
                    class="form-control"
                    value="{{ $company->name }}">
            </div>
            <div class="form-group">
                <label for="emailInput">Email</label>
                <input
                    type="email"
                    name="email"
                    id="emailInput"
                    class="form-control"
                    value="{{ $company->email }}">
            </div>
            <div class="form-group">
                <label for="phoneInput">Phone number</label>
                <input
                    type="tel"
                    name="phone"
                    id="phoneInput"
                    class="form-control"
                    value="{{ $company->phone }}">
            </div>
            <div class="form-group">
                <label for="websiteInput">Website</label>
                <input
                    type="url"
                    name="website"
                    id="websiteInput"
                    class="form-control"
                    value="{{ $company->website }}">
            </div>
            <div class="form-group">
                <input
                    type="file"
                    name="file"
                    id="fileInput"
                    class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>
@endsection
