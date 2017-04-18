<html>
<head>
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>

@foreach($articles as $article)
    {{$article->title}}
@endforeach

{!! $articles->render() !!}
</body>
</html>

