@extends('layouts.app')

@section('content')

    <div class="container col-5">
        <form enctype="multipart/form-data" action="{{ route('company.store') }}" method="POST" class="border p-4 rounded">
            @csrf
            <h2>Create new company</h2>
            <div class="form-group mt-3">
                <label for="nameInput">Name</label>
                <input type="text" name="name" id="nameInput" class="form-control">
            </div>
            <div class="form-group">
                <label for="emailInput">Email</label>
                <input type="email" name="email"  id="emailInput" class="form-control">
            </div>
            <div class="form-group">
                <label for="phoneInput">Phone number</label>
                <input type="tel" name="phone" id="phoneInput" class="form-control">
            </div>
            <div class="form-group">
                <label for="websiteInput">Website</label>
                <input type="url" name="website" id="websiteInput" class="form-control">
            </div>
            <div class="form-group">
                <label for="fileInput">Logo image</label>
                <input type="file" name="file" id="fileInput" class="form-control-file">
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
