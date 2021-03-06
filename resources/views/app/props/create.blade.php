@extends('layouts.panel')

@section('breadcrumbs')
    {{ Breadcrumbs::render('props') }}
@endsection

@section('content')

    <div id="page-wrapper">
        @include('partials.page-header', [
            'title' => trans('props.title'),
            'url' => route('props.index'),
            'options' => [
                [
                    'option' => trans('common.back'),
                    'url' => url()->previous()
                ],
            ]
        ])

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2 class="text-center">@lang('common.creationOf') @lang('props.title')</h2>
                <form action="{{ route('props.store') }}" method="POST">
                    @csrf()

                    <div class="form-group{{ $errors->has('hotel') ? ' has-error' : '' }}">
                        <label for="hotel">@lang('hotels.title'):</label>
                        <select class="form-control selectpicker" title="{{ trans('common.chooseOption') }}" name="hotel" id="hotel" required>
                            @foreach ($hotels as $hotel)
                                <option value="{{ Hashids::encode($hotel->id) }}" {{ $loop->first ? 'selected' : '' }}>{{ $hotel->business_name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('hotel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hotel') }}</strong>
                            </span>
                        @endif
                    </div>

                    @if ($companies->isNotEmpty())
                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company">@lang('companies.company'):</label>
                            <select class="form-control selectpicker" title="{{ trans('common.optional') }}" name="company" id="company">
                                @foreach ($companies as $company)
                                    <option value="{{ Hashids::encode($company->id) }}">{{ $company->business_name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('company'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                            @endif
                        </div>
                    @endif

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">@lang('common.description'):</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ old('description') }}" required maxlength="191" placeholder="{{ trans('common.required') }}">

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price">@lang('common.price'):</label>
                        <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" min="1" required placeholder="{{ trans('common.required') }}">

                        @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                        <label for="quantity">@lang('common.quantity'):</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" value="{{ old('quantity') }}" required min="1" max="9999" step="1" placeholder="{{ trans('common.required') }}">

                        @if ($errors->has('quantity'))
                            <span class="help-block">
                                <strong>{{ $errors->first('quantity') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                        <label for="comments">@lang('common.comments'):</label>
                        <textarea name="comments" id="comments" id="" cols="30" rows="5" class="form-control" maxlength="400">
                            {{ old('comments') }}
                        </textarea>

                        @if ($errors->has('comments'))
                            <span class="help-block">
                                <strong>{{ $errors->first('comments') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">@lang('common.create')</button>
                    <a href="{{ route('props.index') }}" class="btn btn-default">
                        @lang('common.back')
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection