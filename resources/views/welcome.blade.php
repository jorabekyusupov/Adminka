<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@foreach($languages as $language)
<a href="{{route(Route::currentRouteName(), $language->code )}}">{{$language->name}}</a>
@endforeach

<br>

<h1>{{showPhrase('home', 'Company')}}</h1>
<a href="/about">about</a>
<a href="/about/contact">about123</a>
{{--<a href="{{ route('bla') }}"></a>--}}
</body>
</html>
