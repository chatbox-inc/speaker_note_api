<?php

use Illuminate\Http\Request;

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

use Chatbox\SpeakerNote\Http\Actions;

Route::group([
    "prefix" => "spnote"
],function(){

    // メッセージング
    Route::get('/message', Actions\Message\MessageAction::class."@handle");

    // ログイン系の処理を行う
    Route::post('/login', Actions\Login\LoginAction::class."@handle");

    // 登壇情報一覧の取得: Max 100 件
    Route::get('/talks', Hoge::class."@handle");
    // 登壇情報の追加
    Route::post('/talk', Hoge::class."@handle");
    // 登壇情報の編集
    Route::patch('/talk/{key}', Hoge::class."@handle");

    // グループの作成
    //Route::post('/', Hoge::class."@handle");

    // イベントの一覧取得
    Route::post('/groups/{group_key}/events', Hoge::class."@handle");
    // イベントの作成
    Route::post('/groups/{group_key}/event', Hoge::class."@handle");
    // イベントの編集
    Route::patch('/groups/{group_key}/event/{event_key}', Hoge::class."@handle");

    Route::post('/login', Hoge::class."@handle");
});


