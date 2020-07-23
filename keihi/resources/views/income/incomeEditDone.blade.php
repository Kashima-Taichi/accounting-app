<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '所得の修正完了ページ'])
    <link rel="stylesheet" href="{{ asset('/style/incomeRecord.css') }}">
</head>
<body>
    <h2>所得の修正が完了しました！</h2>
    <p>所得の参照ページに行って確認してみましょう！</p>
    @include('components.linkToTop')
</body>
</html>