<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

// Route::group(['middleware' => 'CheckStatus'], function () {
//     Route::get('/signup', function () {
//         return view('signup');
//     })->name('signup');
//     Route::get('/profile', [UserController::class, 'fetchRecentRecord'])->name('profile');
// });

Route::view('/', 'search');
Route::get('/search', [UserController::class, 'SearchProfile'])->name('search');
Route::view('create', 'create_profile');
Route::post('/signup/{id}', [UserController::class, 'update'])->name('signup.post');
Route::post('/draft/{id}', [UserController::class, 'updateDraft'])->name('draft.post');
Route::get('/profile', [UserController::class, 'fetchRecentRecord'])->name('profile');
Route::post('/insert', [UserController::class, 'profile']);
Route::view('/signup', 'signup')->name('signup');
Route::view('signup-email', 'signup-email');
Route::get('signup-email', [UserController::class, 'SignupEmail']);
Route::post('insert-mail', [UserController::class, 'InsertMail'])->name('insert-mail');
Route::get('check', [UserController::class, 'CheckEmail'])->name('check');
Route::get('waiting', [UserController::class, 'VerifyEmail'])->name('waiting');
Route::get('complete', [UserController::class, 'CompleteProfile'])->name('complete');
Route::post('verified/{id}', [UserController::class, 'VerifiedEmail'])->name('verified.id');
Route::get('bio', [UserController::class, 'BioPage'])->name('bio');
Route::get('userbio/{id}', [UserController::class, 'UserBio'])->name('user.post');
Route::get('verfpublic', [UserController::class, 'VerfPublic'])->name('vpublic');
Route::get('public', [UserController::class, 'PublicPage'])->name('public');
Route::get('edit/{id}', [UserController::class, 'EditBio'])->name('edit.bio');
Route::get('editprofile', [UserController::class, 'EditProfile'])->name('eprofile');
Route::post('uptodate/{id}', [UserController::class, 'uptoDate'])->name('uptodate.profile');
Route::get('home', [UserController::class, 'HomeEmail'])->name('home');
Route::get('spirit', [UserController::class, 'Spirit'])->name('spirit');
Route::get('like/{name}', [UserController::class, 'LikedUser'])->name('like.user');

Route::match(['get', 'post'], 'signin', [UserController::class, 'SignIn'])->name('signin');
// Route for save as draft 
Route::post('dinsert-mail/{id}', [UserController::class, 'DInsertMail'])->name('dinsert-mail.id');
Route::get('replace-session', [UserController::class, 'ReplaceSession'])->name('replace');
Route::get('deditprofile/{id}', [UserController::class, 'DEditProfile'])->name('dedit.profile');
Route::post('duptodate/{id}', [UserController::class, 'DuptoDate'])->name('duptodate.profile');



Route::get('logout', function () {

    $sessionsToCheck = ['signin', 'draft', 'edit', 'Email', 'sname', 'name'];
    foreach ($sessionsToCheck as $sessionName) {
        if (session()->has($sessionName)) {
            session()->pull($sessionName);
        }
    }

    return redirect('/');
});
Route::get('/test', [UserController::class, 'test'])->name('test');

Route::post('/sectiontext', [UserController::class, 'SectionText'])->name('sectiontext');
Route::post('/sectionimage', [UserController::class, 'SectionImage'])->name('sectionimage');

Route::get('/section', [UserController::class, 'SectionList'])->name('section');

Route::get('/getdata', [UserController::class, 'question'])->name('get.data');
Route::get('/user-signup', [UserController::class, 'sendWelcomeEmail'])->name('user.signup');
Route::get('/{link}', [UserController::class, 'SearchBio'])->name('user.link');