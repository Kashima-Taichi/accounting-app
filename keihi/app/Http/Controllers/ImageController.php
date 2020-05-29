<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\Requests\ImageRequest;
use Log;
use File;

class ImageController extends Controller
{
    // 背景画像の登録処理
    public function changeBackgroundImage (Request $request) {
        File::delete('public/style/img/background.jpg');
        $request->image->storeAs('public', 'background.jpg');
        return view('images/changeBackground', ['msg' => '背景画像の変更に成功しました']);
    }
}
