<?php

use Illuminate\Http\Request;
use \Barryvdh\Cors\HandleCors;
use Chatbox\SpeakerNote\Http\Actions;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    "prefix" => "spnote",
    "middleware" => [
        "bindings",
        HandleCors::class
    ]
],function(){

    // メッセージング
    Route::get('/message', Actions\Message\MessageAction::class."@handle");

    // ログイン系の処理を行う
    Route::post('/login', Actions\Login\LoginAction::class."@handle");

    // ログイン系の処理を行う
    Route::get('/profile', Actions\Profile\GetAction::class."@handle");

    // 登壇情報一覧の取得: Max 100 件
    Route::get('/talks', Actions\Talk\GetListAction::class."@handle");
    Route::get('/talk/{talk_code}', Actions\Talk\GetAction::class."@handle");
    // 登壇情報の追加
    Route::put('/talk/event/{event_id}', Actions\Talk\PutAction::class."@handle");
    // 登壇情報の編
    Route::patch('/talk/{talk_code}', Hoge::class."@handle");

    // グループの作成
    //Route::post('/', Hoge::class."@handle");

    // グループ情報の取得
    Route::get('/team/{series_id}', Actions\Team\GetAction::class."@handle");

    // イベント情報の取得
    Route::get('/event/{event_id}', Actions\Event\GetAction::class."@handle");
});



