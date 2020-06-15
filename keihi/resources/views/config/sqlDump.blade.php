<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <title>DBのダンプ方法</title>
</head>
<body>
    <h2>DBのダンプ方法</h2>
    <br>
    <h4>{{ $sqlStatement }}</h4>
    <br>
    @include('components.linkToTop')
</body>
</html>