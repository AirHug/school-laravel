@extends('container.form')

@section('type')
    action="{{url("application")}}" onsubmit="return validateCallback(this, dialogAjaxDone);"
@endsection

@section('body')
    <p>
        <label>申报类型：</label>
        <select name="type" class="combox required">
            <option value="租用">租用</option>
            <option value="维修">维修</option>
            <option value="采购">采购</option>
        </select>
    </p>
    <div>
        <table class="list nowrap itemDetail" addButton="新建1条资产项目" width="100%">
            <thead>
            <tr>
                <th type="lookup" name="asset.look.name[#index#]" lookupGroup="asset.look" lookupUrl="{{url("look/asset")}}" lookupPk="id" suggestUrl="" suggestFields="id,name" size="12">
                    部门名称
                </th>
                <th type="text" name="asset.count[#index#]" defaultVal="1" size="12" fieldClass="digits required">
                    数量
                </th>
                <th type="del" width="60">操作</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>

        {{--<table class="list nowrap itemDetail" addButton="新建1条资产项目" width="100%">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th type="lookup" name="asset.org.orgName[#index#]" lookupGroup="asset.org" lookupUrl="{{url("look/asset")}}" lookupPk="id" size="12" fieldClass="required">--}}
        {{--资产名称--}}
        {{--</th>--}}
        {{--<th type="lookup" name="items.org.orgName[#index#]" lookupGroup="items.org" lookupUrl="demo/database/dwzOrgLookup.html" lookupPk="orgNum" suggestUrl="demo/database/db_lookupSuggest.html" suggestFields="orgNum,orgName" size="12">部门名称</th>--}}
        {{--<th type="text" name="asset.count[#index#]" defaultVal="1" size="12" fieldClass="digits required">--}}
        {{--数量--}}
        {{--</th>--}}
        {{--<th type="del" width="60">--}}
        {{--操作--}}
        {{--</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody></tbody>--}}
        {{--</table>--}}
    </div>
@endsection