<?php

use App\Helpers\Strings;

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

Route::get('/about-us' , [ AboutUsController::class , 'index' ]);

// Route::get('/add-todo' , [ TodoController::class , 'add' ]);
// Route::get('/edit-todo' , [ TodoController::class , 'edit' ]);
// Route::get('/delete-todo' , [ TodoController::class , 'delete' ]);
Route::controller(TodoController::class)->group(function(){
    Route::get('/add-todo','add');
    Route::get('/edit-todo','edit');
    Route::get('/delete-todo','delete');
});

Route::controller(TodoBuilderController::class)->group(function(){
    Route::get('/query/add-todo','add');
    Route::get('/query/edit-todo','edit');
    Route::get('/query/delete-todo','delete');
});

Route::get('/helper/hello-world',function(){
    return Strings::myName('Ilham');
});

Route::get('/helper/global',function(){
    return myName('Ilham');
});


Route::get('/validation',[ValidationController::class,'index']);
Route::post('/validation',[ValidationController::class,'submitForm']);


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
Route::get('tes-middleware',function(){
    return 'Hai middleware';
})->middleware(TestingMiddleware::class);


use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
Route::get('set-session',function(){
    $name = request('name');
    $value = request('value');
    Session::put($name,$value);
    session()->put($name,$value);

    return "Session berhasil dibuat";
});
Route::get('get-session',function(){
    $name = request('name');
    
    return session($name);
});

Route::get('set-cache',function(){
    $name = request('name');
    $value = request('value');
    cache()->put($name,$value);

    return "Session berhasil dibuat";
});
Route::get('get-cache',function(){
    $name = request('name');
    
    return cache($name);
});



// Route::get('/halo/{nama}/{alamat}',function($nama,$alamat){
//     return "<h1>Halo {$nama}, alamat saya {$alamat}</h1>";
// });

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\TodoController;
Route::get('/halo/{nama}/{alamat}',[SampleController::class,'halo']);

/**
 * /page/about-us
 * /page/profile
 * /page/home
 */
/**
 * TANPA ROUTING GROUP
//  Route::get('/page/about-us',function(){
//     return '/page/about-us';
// });
// Route::get('/page/profile',function(){
//     return '/page/profile';
// });
// Route::get('/page/home',function(){
//     return '/page/home';
// });
 */
/**
 * DENGAN ROUTING GROUP
 */

Route::prefix('page')->group(function(){
    // isi routing url yang url depannya /page/
    Route::get('/about-us',function(){
        return 'dari prefix /page/about-us';
    });
    Route::get('/profile',function(){
        return 'dari prefix /page/profile';
    });
    Route::get('/home',function(){
        return 'dari prefix /page/home';
    });
});





Route::middleware(['testing'])->group(function(){
    // nanti disini isi routing yang menggunakan middleware testing
    Route::get('test-middleware',function(){
        return 'Hai';
    });
    
    Route::get('test2-middleware',function(){
        return 'Hai2';
    });
});


Route::group([
    'prefix' => 'admin',
    'middleware' => ['testing'],
    // 'controller' => SampleController::class
],function(){
    //routing disini
    // Route::get('','');
});

Route::view('/layout','page.home');


use App\Http\Controllers\SampleController;
use App\Http\Middleware\TestingMiddleware;
Route::get('/lang/{lang}',function($lang){
    App::setLocale($lang);
    // return __('message.welcome');

    return __('welcome');
});

// @lang('')

// {{ __('') }}


Route::get('/hasing',function(){
    $hash1 = Hash::make('123456');
    $chek = Hash::check('123456',$hash1);
    return [
        $hash1,
        $chek
    ];
});


use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\UploadFileController;
Route::get('/encrypt',function(){
    $textAsli = "Selamat Datang";
    $encrypt = encrypt($textAsli); //Crypt::encryptString($textAsli);
    $decrypt = decrypt($encrypt); //Crypt::decryptString($encrypt);

    return [
        'textAsli' => $textAsli,
        'encrypt' => $encrypt,
        'decrypt' => $decrypt
    ];
});


use App\Http\Controllers\ValidationController;
use App\Http\Controllers\TodoBuilderController;
Route::controller(UploadFileController::class)->group(function(){
    Route::get('upload-file','index');
    Route::post('upload-file','store');
});

Route::get('link',function(){
    return app('files')->link(storage_path('app/public'), public_path('storage'));
});


use App\Repositorys\TodoRepository;
Route::get('todo-repo',function(){
    return TodoRepository::allTodo();
});

Route::get('todo-repos/{id}',function(Request $request,TodoRepository $todoRepository,$id){
    return $todoRepository->todos();
});

use App\Services\TodoService;
Route::get('todo-ser',function(){
    return TodoService::allTodo();
});