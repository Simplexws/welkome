@extends('layouts.panel')

@section('breadcrumbs')
    {{ Breadcrumbs::render('props') }}
@endsection

@section('content')

    <div id="page-wrapper">
        <prop-transactions :hotels="{{ $hotels->toJson() }}" :companies="{{ $companies->toJson() }}"></prop-transactions>
    </div>

@endsection