@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($companies as $company)
            <x-company-view name="{{ $company->name }}" img="{{ $company->logo }}" id="{{ $company->id }}"></x-company-view>
        @endforeach
        <div class="container-fluid">
            <ul class="pagination justify-content-center" id="pagination">
                <li class="page-item {{ $companies->currentPage() == 1 ? 'disabled' : '' }}">
                    <a href="{{ $companies->url($companies->currentPage()-1).'#pagination' }}" class="page-link"><</a>
                </li>
                @for($i = 1; $i <= $companies->lastPage(); $i++)
                    <li class="page-item {{ $companies->currentPage() == $i ? 'active' : '' }}">
                        <a href="{{ $companies->url($i).'#pagination' }}" class="page-link">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $companies->currentPage() == $companies->lastPage() ? 'disabled' : '' }}">
                    <a href="{{ $companies->url($companies->currentPage()+1).'#pagination' }}" class="page-link">></a>
                </li>
            </ul>
        </div>
    </div>
@endsection
