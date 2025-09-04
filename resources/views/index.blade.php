@extends('layouts.app')
@section('content')
        <x-card-state :empresas="$empresas" />
        <x-success-menssage />
        <x-error-menssage />
        {{-- <x-create-companies /> --}}
        {{-- <x-companies-table :empresas="$empresas" /> --}}
        @livewire('search-companies')
@endsection
