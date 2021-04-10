@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{ $img }}" alt="logo">
        <h1>{{$name}}</h1>
        <span>{{$email}}</span> <br>
        <span>{{$phone}}</span> <br>
        <a href="{{$website}}">Website</a> <br>
        Owned by {{ $owner }}
        <div class="mt-3">
            <a class="btn btn-primary" href="{{ route('company.edit', $id) }}">
                <i class="bi bi-pencil text-white mr-2"></i>
                Edit
            </a>
            <form class="d-inline ml-1" method="POST" action="{{ route('company.destroy', $id) }}">
                @csrf
                @method('DELETE')
                <div class="form-group d-inline-block">
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash text-white mr-2"></i>
                        Delete
                    </button>
                </div>
            </form>
        </div>
        @foreach($employees as $employee)
            <x-employee-view name="{{ $employee->first_name.' '.$employee->last_name }}" id="{{ $employee->id }}"></x-employee-view>
        @endforeach
    </div>
@endsection
