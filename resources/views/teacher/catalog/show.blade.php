@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>栏目关键字：</label>
            <input type="text" name="keywords" value="{{$keyWords}}"/>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/catalog/add")}}" target="dialog" rel="advertisementAdd" width="500"
           height="450"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/catalog/edit")}}?id={id}" target="dialog" rel="advertisementEdit" width="500"
           height="450"><span>修改</span></a></li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/catalog/delete")}}?id={id}" target="ajaxTodo"
           title="确定要删除吗?"><span>删除</span></a>
    </li>
    <li><a class="icon" href=""><span>Excel导出</span></a></li>
@endsection

@section('table')
    <thead>
    <tr>
        <th>
            id
        </th>
        <th>
            栏目名
        </th>
        <th>
            摘要
        </th>
        <th>
            是否显示
        </th>
        <th>
            文章
        </th>
        <th>
            超链接
        </th>
        <th>
            栏目图片
        </th>
        <th>
            创建时间
        </th>
        <th>
            修改时间
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($catalogs as $catalog)
        <tr target="id" rel="{{$catalog->id}}">
            <td>{{$catalog->id}}</td>
            <td>{{$catalog->name}}</td>
            <td>{{$catalog->abstract}}</td>
            <td>{{$catalog->isShow==true?"显示":"不显示"}}</td>
            <td>{{$catalog->article_id>0?$catalog->article->title:"无"}}</td>
            <td>{{$catalog->url!=""?$catalog->url:"无"}}</td>
            <td>
                @if(strlen($catalog->image)>0)
                    <img src="{{asset("/files/catalog")}}/{{$catalog->image}}" alt="{{$catalog->name}}" height="21">
                @endif
            </td>
            <td>{{$catalog->created_at}}</td>
            <td>{{$catalog->updated_at}}</td>
        <tr>
        @foreach($catalog->subCatalog as $subCatalog)
            <tr target="id" rel="{{$subCatalog->id}}">
                <td>┗{{$subCatalog->id}}</td>
                <td>{{$subCatalog->name}}</td>
                <td>{{$subCatalog->abstract}}</td>
                <td>{{$subCatalog->isShow==true?"显示":"不显示"}}</td>
                <td>{{$subCatalog->article_id>0?$subCatalog->article->title:"无"}}</td>
                <td>{{$subCatalog->url!=""?$subCatalog->url:"无"}}</td>
                <td>
                    @if(strlen($subCatalog->image)>0)
                        <img src="{{asset("/files/catalog")}}/{{$subCatalog->image}}" alt="{{$subCatalog->name}}"
                             height="21">
                    @endif
                </td>
                <td>{{$subCatalog->created_at}}</td>
                <td>{{$subCatalog->updated_at}}</td>
            <tr>
        @endforeach
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/catalog/view"))