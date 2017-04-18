@extends('container.empty')

@section('body')
    <table class="list" width="98%">
        <thead>
        <tr>
            <th>资产</th>
            <th>可用数量</th>
            <th>申请数量</th>
        </tr>
        </thead>
        <tbody>
        @foreach($application->Details as $detail)
            <tr>
                <td>{{$detail->Asset->name}}</td>
                <td>{{$detail->Asset->count-(int)$detail->Asset->getAvailableCount()[0]->count}}</td>
                <td>{{$detail->count}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection