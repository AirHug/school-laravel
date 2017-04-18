@extends('container.lookUp')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <td>
        标题关键字：<input type="text" name="keywords" value="{{$keyWords}}"/>
    </td>
@endsection

@section('table')
    <thead>
        <tr>
            <th orderfield="id">id</th>
            <th orderfield="title">标题</th>
            <th width="80">查找带回</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($articles as $article)
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>
                <a class="btnSelect" href="javascript:$.bringBack({id:'{{$article->id}}', title:'{{$article->title}}'})" title="查找带回">选择</a>
            </td>
        </tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/look/article"))