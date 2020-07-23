<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('components.topHeader')
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
                <a href="<?php echo url('costlist/calender'); ?>" id="link">月別カレンダー機能の参照</a>
                <a href="<?php echo url('costlist/getperdays'); ?>" id="link">5日ごとの経費計上実績の参照</a>
                <a href="<?php echo url('/'); ?>" id="link">アプリのトップページへ戻る</a>
            </div>
        </div>
    </div>
</body>
</html>
