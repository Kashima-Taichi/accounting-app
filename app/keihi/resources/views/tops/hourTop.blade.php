
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
        <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('/js/common.js') }}"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    時間関係のメニュー
                </div>
                <div class="links">
                    <a href="<?php echo url('workinghours/workinghoursrec'); ?>" id="link">稼働時間を計上する</a>
                    <a href="<?php echo url('workinghours/workinghourslist'); ?>" id="link">稼働時間を参照する</a>
                    <a href="<?php echo url('/'); ?>" id="link">アプリのトップページへ戻る</a>
                </div>
            </div>
        </div>
    </body>
</html>
