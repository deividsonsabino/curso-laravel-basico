@extends('site.templates.template1')

@section('title')
    Home
@endsection

@section('content')
    <h1 class="title-pg">HomePage do Site</h1>

    @include('site.includes.sidebar')

    @push('scripts')
        
    @endpush

@endsection

