<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '経費明細の削除'])
</head>
<body>
    <h2>{{ $id }}番の経費明細を削除しました</h2>
    <br>
    @include('components.linkToTop')
</body>
</html>
