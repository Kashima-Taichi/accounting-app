<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('components.topHeader')
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
