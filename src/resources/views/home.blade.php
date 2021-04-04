@extends('laravel-settings::layouts.app')

@section('title', trans('laravel-settings::admin.titles.settings'))

@section('content')
    <form action="{{url('settings/save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {!! setting_show('site.name', trans('laravel-settings::admin.site.name'), 'text') !!}
        {!! setting_show('site.description', trans('laravel-settings::admin.site.description'), 'textarea') !!}
        {!! setting_show('site.keywords', trans('laravel-settings::admin.site.keywords'), 'textarea') !!}
        {!! setting_show('site.author', trans('laravel-settings::admin.site.description'), 'text') !!}
        {!! setting_show('site.logo', trans('laravel-settings::admin.site.logo'), 'image') !!}

        <button class="btn btn-success">{{trans('laravel-settings::admin.index.save')}}</button>
    </form>
@endsection
