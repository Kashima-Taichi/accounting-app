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
    <p>DOMの検証からコマンドをコピペしてね！</p>
    <br>
    <p>{{ $enterContainer }}</p>
    <br>
    <p>{{ $sqlStatement }}</p>
    <br>
    @include('components.linkToTop')
</body>
</html>