@extends('layouts.panel')

@section('content')

    <div id="page-wrapper">
        @include('partials.page-header', [
            'title' => trans('rooms.title'),
            'url' => route('rooms.index'),
            'options' => [
                [
                    'option' => trans('common.new'),
                    'url' => route('rooms.create')
                ],
            ],
            'search' => [
                'action' => route('rooms.search')
            ]
        ])

        <room-list :rooms="{{ $rooms->toJson() }}"></room-list>

        @include('partials.modal-confirm')
    </div>

@endsection