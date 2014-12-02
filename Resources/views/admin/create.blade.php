@extends('core::layouts.master')

@section('content-header')
    <h1>
        {{ trans('page::pages.title.create page') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ URL::route('dashboard.category.index') }}">{{ trans('page::pages.title.pages') }}</a></li>
        <li class="active">{{ trans('page::pages.title.create page') }}</li>
    </ol>
@stop

@section('styles')
    <script src="{{ Module::asset('core:js/vendor/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
@stop

@section('content')
    {!! Form::open(['route' => ['dashboard.category.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('core::partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    <?php foreach(LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                    <?php $i++; ?>
                    <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                        @include('page::admin.partials.create-fields', ['lang' => $locale])
                    </div>
                    <?php endforeach; ?>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('dashboard.category.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>

    {!! Form::close() !!}
@stop
@section('scripts')
    <script type="text/javascript">
        $(function() {
            CKEDITOR.replaceAll(function( textarea, config ) {
                config.language = '<?php echo App::getLocale() ?>';
            } );
        });
    </script>
@stop
