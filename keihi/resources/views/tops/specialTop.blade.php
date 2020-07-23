<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('components.topHeader')
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                その他機能のメニュー
            </div>
            <div class="links">
                <a href="<?php echo url('costcsv/selectyearmonthcsv'); ?>" id="link">経費のCSVを出力する</a>
                <a href="<?php echo url('plcsv/selectyearmonthcsv'); ?>" id="link">PLのCSVを出力する</a>
                <a href="<?php echo url('costtrash/refconsttrash'); ?>" id="link">経費のゴミ箱</a>
                <a href="<?php echo url('/'); ?>" id="link">アプリのトップページへ戻る</a>
            </div>
        </div>
    </div>
</body>
</html>