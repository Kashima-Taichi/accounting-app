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
                    グラフ参照関係のメニュー
                </div>
                <div class="links">
                    <a href="<?php echo url('costgraph/selectyearmonthpiechart'); ?>" id="link">経費計上円グラフの出力</a>
                    <a href="<?php echo url('costgraph/selectyearmonthlinegraphpastcosts'); ?>" id="link">60日以上の経費計上実績を参照する</a>
                    <a href="<?php echo url('costgraph/selectyearmonthlinegraphcostamount'); ?>" id="link">日別の経費計上合計額の推移を参照する</a>
                    <a href="<?php echo url('costgraph/selectyearmonthlinegraphdailycost'); ?>" id="link">経費計上日別推移折れ線グラフの参照(単月)</a>
                    <a href="<?php echo url('costgraph/selectyearmonthlinegraphdailycosts'); ?>" id="link">経費計上日別推移折れ線グラフの参照(複数月)</a>
                    <a href="<?php echo url('costgraph/selectyearmonthlinegraphmonthaccount'); ?>" id="link">科目別推移折れ線グラフの参照</a>
                    <a href="<?php echo url('incomegraph'); ?>" id="link">手取り計上推移折れ線グラフの参照</a>
                    <a href="<?php echo url('hoursgraph'); ?>" id="link">稼働時間推移折れ線グラフの参照</a>
                    <a href="<?php echo url('/'); ?>" id="link">アプリのトップページへ戻る</a>
                </div>
            </div>
        </div>
    </body>
</html>
