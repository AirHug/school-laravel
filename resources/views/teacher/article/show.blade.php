@extends('container.list')

@section('hiddenSearch')
    <input type="hidden" name="keywords" value="{{$keyWords}}"/>
@endsection

@section('search')
    <tr>
        <td>
            <label>标题关键字：</label>
            <input type="text" name="keywords" value="{{$keyWords}}"/>
        </td>
    </tr>
@endsection

@section('buttons')
    <li><a class="add" href="{{url("/article/add")}}" target="dialog" rel="advertisementAdd" width="1200"
           height="800"><span>添加</span></a></li>
    <li><a class="edit" href="{{url("/article/edit")}}?id={id}" target="dialog" rel="advertisementEdit" width="1200"
           height="800"><span>修改</span></a>
    </li>
    <li class="line">line</li>
    <li><a class="delete" href="{{url("/article/delete")}}?id={id}" target="ajaxTodo"
           title="确定要删除吗?"><span>删除</span></a>
    </li>
    <li><a class="icon" href=""><span>Excel导出</span></a></li>
@endsection

@section('table')
    <thead>
    <tr>
        <th>
            标题
        </th>
        <th>
            所属栏目
        </th>
        <th>
            文档图片
        </th>
        <th>
            关键词
        </th>
        <th>
            推荐
        </th>
        <th>
            置顶
        </th>
        <th>
            特殊
        </th>
        <th>
            创建者
        </th>
        <th>
            编辑者
        </th>
        <th>
            审核状态
        </th>
        <th>
            审核人
        </th>
        <th>
            发布时间
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($articles as $article)
        <tr target="id" rel="{{$article->id}}">
            <td>{{$article->title}}</td>
            <td>{{$article->Catalog==null?"独立文档":$article->Catalog->name}}</td>
            <td>
                @if(strlen($article->image)>0)
                    <img src="{{asset("/files/article")}}/{{$article->image}}" alt="{{$article->title}}" height="21">
                @endif
            </td>
            <td>{{$article->keyword}}</td>
            <td>{{$article->isCommand?"✓":""}}</td>
            <td>{{$article->isTop?"✓":""}}</td>
            <td>{{$article->isSpecial?"✓":""}}</td>
            <td>{{$article->author}}</td>
            <td>{{$article->editor}}</td>
            <td>
                @if($article->isPass)
                    ✓
                @else
                    <a class="btnSelect" href="{{url("article/pass")}}?id={{$article->id}}" target="ajaxTodo"
                       title="审核发布这篇文章？"></a>
                @endif
            </td>
            <td>{{$article->checker}}</td>
            <td>{{$article->publish_at}}</td>
        <tr>
    @endforeach
    </tbody>
@endsection

@section('numPerPage',$numPerPage)
@section('totalCount',$totalCount)
@section('currentPage',$currentPage)
@section('link',url("/article/view"))