@extends('container.lookUp')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <td>
        资产关键字：<input type="text" name="keywords" value="{{$keyWords}}"/>
    </td>
@endsection

@section('table')
    <thead>
    <tr>
        <th>id</th>
        <th>资产名|可用量</th>
        <th width="80">查找带回</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($assets as $asset)
        <tr>
            <td>{{$asset->id}}</td>
            <td>{{$asset->name}}|{{$asset->count-(int)$asset->getAvailableCount()[0]->count}}</td>
            <td>
                <a class="btnSelect" href="javascript:$.bringBack({id:'{{$asset->id}}', name:'{{$asset->name}}|{{$asset->count-(int)$asset->getAvailableCount()[0]->count}}'})" title="查找带回">选择</a>
            </td>
        </tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/look/asset"))