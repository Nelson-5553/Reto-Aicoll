@extends('layouts.app')
@section('content')
        <x-card-state :empresas="$empresas" />
        <x-success-menssage />
        <x-error-menssage />
        @livewire('search-companies')
@endsection
