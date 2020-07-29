<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('components.topHeader')
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                賞与関係のメニュー
            </div>
            <div class="links">
                <a href="<?php echo url('bonus/recbonus'); ?>" id="link">賞与の計上を行う</a>
            </div>
        </div>
    </div>
</body>
</html>
