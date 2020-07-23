<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => 'DBのダンプ方法'])
    @include('components.CallVueJsCDN')
</head>
<body>
    <h2>DBのダンプ方法</h2>
    <br>
    <p>DOMの検証からコマンドをコピペしてね！</p>
    <br>
        <div id="copy-command">
            <div class="enter-container-wrapper">
            {{ Form::button('コンテナ接続のコマンドをコピペする', ['v-on:click' => 'container', 'id' => 'enter-container-button']) }}
            <pre>{{ Form::text(null, $enterContainer, ['id' => 'enter-container-command']) }}</pre>
            </div>
            <br>
            <div class="dump-sql-wrapper">
            {{ Form::button('DBダンプのコマンドをコピペする', ['v-on:click' => 'dump', 'id' => 'dump-sql-button']) }}
            <pre>{{ Form::text(null, $sqlStatement, ['id' => 'dump-sql-command']) }}</pre>
            </div>
        </div>
    <br>
    @include('components.linkToTop')
    <?php /* ViewModelはid設定した要素より後ろで読み込む */ ?>
    <script src="{{ asset('/js/clipBoard.js') }}"></script>
</body>
</html>