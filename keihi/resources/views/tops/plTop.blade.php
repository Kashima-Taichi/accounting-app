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
            <a href="<?php echo url('outputpl/selectyearmonthpl'); ?>" id="link">個人PLを参照する</a>
            <a href="<?php echo url('outputpl/selectyearmonthpls'); ?>" id="link">個人PL(複数月分)を参照する</a>
            <a href="<?php echo url('outputpl/selectyearmonthquarterpl'); ?>" id="link">個人PL(四半期分)を参照する</a>
            <a href="<?php echo url('/'); ?>" id="link">アプリのトップページへ戻る</a>
            </div>
        </div>
    </div>
</body>
</html>