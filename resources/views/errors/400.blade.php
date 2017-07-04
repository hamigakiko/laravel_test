<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
</head>
<body>

<h1>{{ $exception->getStatusCode() }} {{ $exception->getMessage() }}</h1>

<div class="links">
    <a href="{{ action('HomeController@index')}}">HOMEへ</a>
</div>

</body>
</html>
