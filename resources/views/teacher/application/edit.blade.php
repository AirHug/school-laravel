@extends('container.form')

@section('type')
    action="{{url("asset")}}" onsubmit="return validateCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>资产名称：</label>
        <input type="text" name="name" class="required" size="30" value="{{$asset->name}}"/>
        <input type="hidden" name="id" size="30" value="{{$asset->id}}"/>
    </p>
    <p>
        <label>资产数量：</label>
        <input type="text" name="count" class="digits required" size="30" value="{{$asset->count}}"/>
    </p>
    <p>
        <label>备注：</label>
        <textarea name="note" cols="30" rows="3">{{$asset->note}}</textarea>
    </p>
@endsection