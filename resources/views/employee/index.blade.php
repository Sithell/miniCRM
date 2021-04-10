@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($employees as $employee)
            <x-employee-view name="{{ $employee->first_name.' '.$employee->last_name }}" id="{{ $employee->id }}"></x-employee-view>
        @endforeach
        <div class="container-fluid">
            <ul class="pagination justify-content-center" id="pagination">
                <li class="page-item {{ $employees->currentPage() == 1 ? 'disabled' : '' }}">
                    <a href="{{ $employees->url($employees->currentPage()-1).'#pagination' }}" class="page-link"><</a>
                </li>
                @for($i = 1; $i <= $employees->lastPage(); $i++)
                    <li class="page-item {{ $employees->currentPage() == $i ? 'active' : '' }}">
                        <a href="{{ $employees->url($i).'#pagination' }}" class="page-link">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $employees->currentPage() == $employees->lastPage() ? 'disabled' : '' }}">
                    <a href="{{ $employees->url($employees->currentPage()+1).'#pagination' }}" class="page-link">></a>
                </li>
            </ul>
        </div>
    </div>
@endsection
