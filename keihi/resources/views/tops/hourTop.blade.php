
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('components.topHeader')
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
