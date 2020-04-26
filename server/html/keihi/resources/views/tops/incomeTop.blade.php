<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>経費管理アプリ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/style/top.css') }}">
        <!-- js -->
        <script src="{{ asset('/js/common.js') }}"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    所得関係のメニュー
                </div>
                <div class="links">
                    <a href="<?php echo url('income/recordincome'); ?>" id="link">所得を計上する</a>
                    <a href="<?php echo url('income/incomereference'); ?>" id="link">所得の計上額を参照する</a>
                    <a href="<?php echo url('/'); ?>" id="link">アプリのトップページへ戻る</a>
                </div>
            </div>
        </div>
    </body>
</html>
