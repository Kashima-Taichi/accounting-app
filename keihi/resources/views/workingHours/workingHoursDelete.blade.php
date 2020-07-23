<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '稼働時間明細の削除'])
</head>
<body>
    <h2>計上ID {{ $id }}の稼働時間明細を削除しました</h2>
    <br>
    @include('components.linkToTop')
</body>
</html>
