<?php

use App\Http\Controllers\CoursePublicController;
use App\Http\Controllers\PublicServiceController;
use App\Http\Controllers\RecaptchaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/reload-captcha',[RecaptchaController::class, 'reloadCaptcha'])->name('reloadCaptcha');

Route::get('set-language/{locale}', function ($locale) {
    $activeLanguages = \Bittacora\Language\LanguageFacade::getActives();
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');

    if(Session::exists('locale')){
        if($locale != Session::get('locale')){
            Session::put('locale', $locale);
        }
    }else{
        Session::put('locale', $locale);
    }
    return redirect()->route('home.home');
})->name('language');

Route::group(['middleware' => ['web']], function () {
    Route::get('/servicios/{slug}', [PublicServiceController::class, 'main'])->name('services.public');
});

Route::get('/clear-cache', function () {
    if (auth('web')->check()){
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        echo 'Cache cleaned';
    }else{
        abort(404);
    }
});








//cursos
Route::group(['middleware' => ['web']], function () {
    Route::get('/cursos', [CoursePublicController::class, 'main'])->name('courses.public');
    Route::get('/curso/{slug}', [CoursePublicController::class, 'courseDetails'])->name('course.details');
    Route::post('/inscripcion-curso/{id}', [CoursePublicController::class, 'storeInscription'])->name('course-inscription.store');
});






/*Route::get('/test-mail', function (){
    $params = [
        'name' => 'Joaquín prueba',
        'email' => 'joaquin@bittacora.com',
        'phone' => '987654321',
        'message' => 'Esto es una prueba',
    ];
    return new Bittacora\Contact\Mail\ContactMail($params);
});*/

/*Route::get('/link', function () {
    $target = '/var/www/vhosts/escarmena.com/httpdocs/storage/app/public';
    $shortcut = '/var/www/vhosts/escarmena.com/httpdocs/public/storage';
    symlink($target, $shortcut);
	echo($_SERVER['DOCUMENT_ROOT']);
});*/
