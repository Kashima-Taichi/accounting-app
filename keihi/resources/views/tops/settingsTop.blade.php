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
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    その他機能のメニュー
                </div>
                <div class="links">
                    <a href="<?php echo url('accounts/recordaccounts'); ?>" id="link">勘定科目の登録</a>
                    <a href="<?php echo url('accounts/refaccounts'); ?>" id="link">勘定科目の参照</a>
                    <a href="<?php echo url('images/changebackground'); ?>" id="link">背景画像の変更</a>
                    <a href="<?php echo url('/'); ?>" id="link">アプリのトップページへ戻る</a>
                </div>
            </div>
        </div>
    </body>
</html>