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
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    経費関係のメニュー
                </div>
                <div class="links">
                    <a href="<?php echo url('costrec/costrec'); ?>" id="link">経費の計上を行う</a>
                    <a href="<?php echo url('costlist/selectyearmonthcostlist'); ?>" id="link">経費明細を参照する</a>
                    <a href="<?php echo url('costaccountcontent/selectyearmonthcostaccount'); ?>" id="link">科目別に経費計上実績を参照する</a>
                    <a href="<?php echo url('costlist/toptencosts'); ?>" id="link">計上金額のトップ10位を見る</a>
                    <a href="<?php echo url('/'); ?>" id="link">アプリのトップページへ戻る</a>
                </div>
            </div>
        </div>
    </body>
</html>
