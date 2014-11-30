@extends('core::layouts.master')

@section('content-header')
    <h1>
        {{ trans('page::pages.title.pages') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('page::pages.title.pages') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p>{{ trans('dashboard::dashboard.welcome-message') }}</p>
        </div>
    </div>
@stop
