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
                <a href="<?php echo url('accounts/recordaccounts'); ?>" id="link">勘定科目の登録</a>
                <a href="<?php echo url('accounts/refaccounts'); ?>" id="link">勘定科目の参照</a>
                <a href="<?php echo url('dump'); ?>" id="link">データベースのダンプ方法を調べる</a>
                <a href="<?php echo url('/'); ?>" id="link">アプリのトップページへ戻る</a>
            </div>
        </div>
    </div>
</body>
</html>