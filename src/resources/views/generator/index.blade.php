@extends('laravel-settings::layouts.app')

@section('title', trans('laravel-settings::admin.titles.list'))

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>{{trans('laravel-settings::admin.listing.id')}}</th>
            <th>{{trans('laravel-settings::admin.listing.key')}}</th>
            <th>{{trans('laravel-settings::admin.listing.value')}}</th>
            <th>{{trans('laravel-settings::admin.listing.group')}}</th>
            <th>{{trans('laravel-settings::admin.listing.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @if(sizeof($settings))
            @foreach($settings as $setting)
            <tr>
                <td>{{$setting->id}}</td>
                <td>{{$setting->key}}</td>
                <td>{{$setting->value}}</td>
                <td>{{$setting->group}}</td>
                <td>
                    <a style="display: inline" href="{{url('settings') . '/'.$setting->id . '/edit'}}" class="btn btn-warning">{{trans('laravel-settings::admin.actions.edit')}}</a>
                    <form style="display: inline" action="{{url('settings') . '/'.$setting->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button  type="submit" class="btn btn-danger">{{trans('laravel-settings::admin.actions.delete')}}</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">
                    <h3>{{trans('laravel-settings::admin.listing.no_items')}}</h3>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{ $settings->links() }}
    </div>
@endsection
