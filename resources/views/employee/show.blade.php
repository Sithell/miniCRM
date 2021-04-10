@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{$firstName.' '.$lastName}}</h1>
        <span>{{$email}}</span> <br>
        <span>{{$phone}}</span> <br>
        Employed by
        <a href="{{ route('company.show', $companyId) }}">{{ $companyName }}</a>
        <div class="mt-3">
            <a class="btn btn-primary" href="{{ route('employee.edit', $id) }}">
                <i class="bi bi-pencil text-white mr-2"></i>
                Edit
            </a>
            <form class="d-inline ml-1" method="POST" action="{{ route('employee.destroy', $id) }}">
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
    </div>
@endsection
