<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('components.topHeader')
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="m-b-md">
            収支管理アプリケーション
        </div>
        <div class="links">
            <a href="<?php echo url('tops/costtop'); ?>" id="link">経費関係のメニューへ</a>
            <a href="<?php echo url('tops/incometop'); ?>" id="link">所得関係のメニューへ</a>
            <a href="<?php echo url('tops/hourtop'); ?>" id="link">稼働時間関係のメニュー</a>
            <a href="<?php echo url('tops/graphtop'); ?>" id="link">グラフ参照関係のメニュー</a>
            <a href="<?php echo url('tops/pltop'); ?>" id="link">PL参照関係のメニュー</a>
            <a href="<?php echo url('tops/specialtop'); ?>" id="link">その他機能へのメニュー</a>
            <a href="<?php echo url('tops/settingstop'); ?>" id="link">設定関係のメニューへ</a>
        </div>
    </div>
</div>
</body>
</html>