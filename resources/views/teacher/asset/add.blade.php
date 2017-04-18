@extends('container.form')

@section('type')
    action="{{url("asset")}}" onsubmit="return validateCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>资产名称：</label>
        <input type="text" name="name" class="required" size="30" value=""/>
        <input type="hidden" name="id" size="30" value="-1"/>
    </p>
    <p>
        <label>资产数量：</label>
        <input type="text" name="count" class="digits required" size="30" value=""/>
    </p>
    <p>
        <label>备注：</label>
        <textarea name="note" cols="30" rows="3"></textarea>
    </p>
@endsection