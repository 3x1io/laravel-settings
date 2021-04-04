@extends('laravel-settings::layouts.app')

@section('title', trans('laravel-settings::admin.titles.edit'))

@section('content')
    <form action="{{url('settings')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('laravel-settings::generator.form')

        <button class="btn btn-success">{{trans('laravel-settings::admin.index.save')}}</button>
    </form>
@endsection
