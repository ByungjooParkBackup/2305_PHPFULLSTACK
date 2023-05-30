<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// ----------------
// 라우트 정의
// ----------------
// 문자열 리턴
Route::get('/hi', function() {
    return '안녕하세요.';
});

// 뷰 리턴(뷰 파일이 없으면 에러발생, 디버그모드 설정이 false면 500에러, true면 에러의 상세정보 출력)
Route::get('/myview', function() {
    return view('myview');
});


// ----------------
// HTTP 메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의 된것이 실행
// ----------------
Route::get('/home', function() {
    return view('home');
});

// GET 요청에 대한 처리
Route::get('/method', function() {
    return 'GET Method!!';
});

// post 요청에 대한 처리
Route::post('/method', function() {
    return 'POST Method!!';
});

// PUT 요청에 대한 처리
Route::put('/method', function() {
    return 'PUT Method!!';
});

// DELETE 요청에 대한 처리
Route::delete('/method', function () {
    return 'DELETE Method!!';
});

// 모든 요청에 대한 처리
Route::any('/method', function() {
    return 'ANY Method!!';
});

// 특정 메소드 요청에 대한 처리
Route::match(['get','post'], '/method', function() {
    return 'MATCH Method!!';
});


// ----------------
// 라우트에서 파라미터 제어
// ----------------
// 쿼리 스트링으로 파라미터 획득
Route::get('/query', function(Request $request) {
    return $request->id.", ".$request->name;
});

// URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}', function($id) {
    return 'segment ID : '.$id;
});

// URL 세그먼트로 지정 파라미터 획득 : 기본값 설정
Route::get('/segment2/{id?}', function($id = 'base') {
    return 'segment2 ID : '.$id;
}); 
// Request로도 세그먼트 파라미터를 획득 가능
// 세그먼트 파라미터가 없어도 404에러 발생 안함
//Route::get('/segment2/{id?}', function(Request $request) {
//    return 'segment2 ID : '.$request->id;
//});


// ----------------
// 라우트의 이름 지정
// ----------------
Route::get('/names/home', function(){
    return view('nameshome');
});

Route::get('/names', function() {
    return 'names.index !!!';
})->name('names.index');


// -------------
// 라우트 매칭 실패시 대체 라우트 정의
// 가장 마지막에 정의 : 보통 에러 처리를 마지막에 정의
// -------------
Route::fallback(function() {
    return '잘못된 경로로 접속하셨습니다.';
});


// -------------
// 라우트의 그룹 및 공통경로설정
// -------------
Route::prefix('users')->group(function() {
    Route::get('/login', function() {
        return 'Login!!';
    })->name('users.login');
    Route::get('/logout', function() {
        return 'Logout!!';
    })->name('users.logout');
    Route::get('/registration', function() {
        return 'Registration!!';
    })->name('users.registration');
});



// -------------
// 서명 라우터
// -------------
use Illuminate\Support\Facades\URL;
Route::get('/makesign', function() {
    // 일반 URL 링크 생성하기
    $baseUrl = route('sign');

    // 서명된 URL 링크 생성하기
    //$signUrl = URL::signedRoute('invitations', ['invitation' => 5816, 'group' => 678]);
    $signUrl = URL::signedRoute('sign');

    // 유효기간이 있는 서명된 URL 링크 생성하기
    $limitSignUrl = URL::temporarySignedRoute('sign', now()->addSecond(10));

    return $baseUrl."<br><br>".$signUrl ."<br><br>".$limitSignUrl;
});

//Route::get('/invitations/{invitation}/{group}', function() {
Route::get('/sign', function() {
    return "Sign!!";
})->name('sign')->middleware('signed');


// ---------------
// 컨트롤러
// ---------------
// 커멘드로 컨트롤러 생성 : php artisan make:controller TestController
use App\Http\Controllers\TestController;
Route::get('/test', [TestController::class, 'index'])->name('tests.index');


// 커멘드로 컨트롤러 생성 : php artisan make:controller TasksController --resource
use App\Http\Controllers\TasksController;
Route::resource('/tasks', TasksController::class);
//GET|HEAD        tasks .................... tasks.index › TasksController@index  
//POST            tasks .................... tasks.store › TasksController@store  
//GET|HEAD        tasks/create ............. tasks.create › TasksController@create  
//GET|HEAD        tasks/{task} ............. tasks.show › TasksController@show  
//PUT|PATCH       tasks/{task} ............. tasks.update › TasksController@update  
//DELETE          tasks/{task} ............. tasks.destroy › TasksController@destroy  
//GET|HEAD        tasks/{task}/edit ........ tasks.edit › TasksController@edit

// ------------
// 블레이드 템플릿
// ------------
use App\Http\Controllers\BladeController;
Route::get('/blade', [BladeController::class, 'index'])->name('blade.index');


use App\Http\Controllers\BoardController;
Route::resource('/board', BoardController::class);