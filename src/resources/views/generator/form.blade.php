<div class="form-group">
    <label for="key">{{trans('laravel-settings::admin.listing.key')}}</label>
    <input value="@if(isset($setting)) {{$setting->key}} @endif" class="form-control" type="text" name="key" id="key" placeholder="{{trans('laravel-settings::admin.listing.key')}}" required>
</div>
<div class="form-group">
    <label for="value">{{trans('laravel-settings::admin.listing.value')}}</label>
    <textarea class="form-control" name="value" id="value" placeholder="{{trans('laravel-settings::admin.listing.value')}}" required>@if(isset($setting)) {{$setting->value}} @endif</textarea>
</div>
<div class="form-group">
    <label for="group">{{trans('laravel-settings::admin.listing.group')}}</label>
    <input value="@if(isset($setting)) {{$setting->group}} @endif" class="form-control" type="text" name="group" id="group" placeholder="{{trans('laravel-settings::admin.listing.group')}}" required>
</div>
