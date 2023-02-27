<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PdfController;

use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Admin\RecommendationController;
use App\Http\Controllers\Frontend\AuthController as UserAuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\PaymentController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Frontend\StatusPdfController;
use App\Http\Controllers\Frontend\RegistrationController;
use App\Http\Controllers\UpdateProfileController;



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

Route::get('/cicd', function () {
    return "DevOps CI/CD working fine";
});

// Route::get('/pay', [PaymentController::class, 'pay'])->name('pay');
// Route::post('/dopay/online', [PaymentController::class, 'handleonlinepay'])->name('dopay.online');
// Route::post('/dopay/{sid}', [PaymentController::class, 'acceptPayment'])->name('dopay');
Route::post('/dopay', [PaymentController::class, 'acceptPayment'])->name('dopay');
Route::post('/acceptance-survey', [NotificationController::class, 'acceptanceSurvey'])->name('acceptanceSurvey');

Route::get('login', [UserAuthController::class, 'getLogin'])->name('login.get');
Route::post('login', [UserAuthController::class, 'postLogin'])->name('login.post');
//
Route::get('register', [UserAuthController::class, 'getRegister'])->name('register.get');
Route::post('register', [UserAuthController::class, 'postRegister'])->name('register.post');

Route::get('forgot-username', [UserAuthController::class, 'showForgotUsernameForm'])->name('forgot-username');
Route::post('forgot-username', [UserAuthController::class, 'submitForgotUsernameForm'])->name('forgot-username.post');

Route::get('forgot-password', [UserAuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('forgot-password', [UserAuthController::class, 'submitForgotPasswordForm'])->name('forgot-password.post');

Route::get('reset-password/{token}', [UserAuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [UserAuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::group(['middleware' => 'auth:customer'], function () {
    Route::get("/", [HomeController::class, 'home']);
    Route::get('/notification', [NotificationController::class, 'list']);
    Route::get('/onlineRegistration', [NotificationController::class, 'showList']);
    Route::get('/notification/show/{nid}', [NotificationController::class, 'ShowStudentNotification'])->name('studentNotification');
    // Route::get('/notification/{notificationid}', [NotificationController::class, 'ShowStudentNotification'])->name('studentNotification');
    
    Route::get('/candidate/response/{apid}/{cid}/{rsid}', [NotificationController::class, 'candidateResponse']);
    
    // Route::get('/notification/pdfgenerator/{ntid}/{uid}', [StatusPdfController::class, 'index']);
    Route::get('/notification/pdfgenerator/{ntid}/{uid}/{Application_ID}', [StatusPdfController::class, 'index']);
    Route::get('/admin/pdfgenerator/{ntid}/{uid}/{Application_ID}', [PdfController::class, 'index']);
    Route::get('/edit-profile', [UserAuthController::class, 'editProfile'])->name('edit-profile');
    Route::post('/edit-profile', [UserAuthController::class, 'updateProfile'])->name('update-profile');
    Route::get('/change-password', [UserAuthController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [UserAuthController::class, 'submitChangePassword'])->name('change-password.post');
    Route::get('/user-logout', [UserAuthController::class, 'logout'])->name('user.logout');

    Route::get('/book-wildcat-experience', [HomeController::class, 'bookWildcatExperience'])->name('book-wildcat-experience');
    Route::get('/admission-application/{step?}', [HomeController::class, 'admissionApplication'])->name('admission-application');
//     Route::get('/registeration-application/{step?}{id?}', [HomeController::class, 'registerationApplication'])->name('registeration-application');
    Route::get('/application/{application_id}', [HomeController::class, 'appForm'])->name('app-form');
    // Route::get('/view-application', [HomeController::class, 'listViewApplication']);
    Route::get('/view-application/{application_id}', [HomeController::class, 'viewApplication'])->name('view-application');
    Route::get('/supplemental-recommendation', [HomeController::class, 'supplementalRecommendation'])->name('supplemental-recommendation');
    Route::post('/supplemental-recommendation', [HomeController::class, 'submitSupplemental'])->name('supplemental-recommendation-submit');

    //Thank you page
    Route::get('/thank-you', [HomeController::class, 'thankYou'])->name('thank.you')->middleware('prevent-back-history');
});

Route::get('/thankyou', [HomeController::class, 'thankYou2'])->name('thank-you')->middleware('prevent-back-history');
Route::get('/written-recommendation/{id}', [HomeController::class, 'writtenRecommendation'])->name('written-recommendation');
Route::post('/written-recommendation', [HomeController::class, 'submitWritten'])->name('written-recommendation-submit');


//Admin Portal All routes
Route::redirect('/admin', 'admin');
Route::redirect('admin', 'admin/login');
Route::get('/admin/login', [AdminAuthController::class, 'getLogin'])->name('admin.login.get');
Route::post('admin/login', [AdminAuthController::class, 'postLogin'])->name('admin.login.post');
Route::group(['prefix' => 'admin', 'middleware' => 'prevent-back-history'], function () {
    Route::get('profile', [ProfileController::class, 'getProfile'])->name('admin.profile');
    Route::get('/dashboard', [AdminDashboard::class, 'getDashboard'])->name('admin.dashboard');
    Route::resources([
        'users' => UserController::class
    ]);
 

    Route::get('/user/notify/{status}/{uid}',[UserController::class, 'notificationChange']);
    Route::post('perpage',[UserController::class ,'PerPage'])->name('perpage');
    Route::get('/user/registerable/{status}/{uid}',[UserController::class,'registrationChange']);
    Route::get('/user/studentTransfer/{status}/{uid}',[UserController::class,'studentTransfer']);
    Route::get('/dasboard-table/{data}',[ApplicationController::class,'showDashboardValues'])->name('application.showDashboardValues');
    Route::get('/get-Student-Information',[ApplicationController::class,'getStudentInformation']);
    Route::resource('application', ApplicationController::class);
    Route::post('/application/cstatus',[ApplicationController::class, 'statusSubmit'])->name('statusSubmit');
    Route::resource('recommendation', RecommendationController::class);
    Route::resource('promocode', PromocodeController::class);
    Route::post('users-send-email', [ApplicationController::class, 'sendEmail'])->name('send.email');
    Route::post('candidate_status', [ApplicationController::class, 'changestatus'])->name('changestatus');
    Route::resource('cms', CmsController::class)->only([
        'index', 'edit', 'update'
    ]);
});
Route::get('/logout', [AdminAuthController::class, 'signout'])->name('admin.logout');
Route::get('/all-delete', [AdminAuthController::class, 'truncate']);
Route::get('clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return 'Cleared.';
});

if (config('app.artisan') == 1) {
    Route::get('laravel-log', function () {
        return file_get_contents(storage_path('logs/laravel.log'), true);
    });
    Route::get('migrate', function () {
        Artisan::call('migrate');
        return 'Migrate done.';
    });
    Route::get('migrate-fresh-seed', function () {
        Artisan::call('migrate:fresh --seed');
        return 'Migrate fresh and seeder done.';
    });
    Route::get('db-seed', function () {
        Artisan::call('db:seed');
        return 'Seeder done.';
    });
    Route::get('single-seed/{class_name}', function ($class_name) {
        Artisan::call('db:seed --class=' . $class_name);
        return 'seeder done.';
    });
    Route::get('migration-roleback/{file_name}', function ($file_name) {
        Artisan::call('migrate:rollback --path=/database/migrations/' . $file_name);
        return 'roleback done.';
    });
    Route::get('storage-link', function ($file_name) {
        Artisan::call('storage:link');
        return 'storage link generate.';
    });
       
        
}
Route::resource('registration', RegistrationController::class);
Route::get('/registration/householdIndex/{id}', [RegistrationController::class, 'householdIndex'])->name('householdIndex');
Route::post('/registration/householdUpdate/{id}', [RegistrationController::class, 'householdUpdate'])->name('householdUpdate');
Route::get('/registration/healthInfoIndex/{id}', [RegistrationController::class, 'healthInfoIndex'])->name('healthInfoIndex');

Route::post('/registration/healthInfoUpdate/{id}', [RegistrationController::class, 'healthInfoUpdate'])->name('healthInfoUpdate');
Route::post('/registration/healthInfoCreate', [RegistrationController::class, 'healthInfoCreate'])->name('healthInfoCreate');
Route::get('/registeration/emergencyContactIndex/{id}', [RegistrationController::class, 'emergencyContactIndex'])->name('emergencyContactIndex');
Route::post('/registration/emergencyContactUpdate/{id}', [RegistrationController::class, 'emergencyContactUpdate'])->name('emergencyContactUpdate');       
Route::post('/registration/emergencyContactSave', [RegistrationController::class, 'emergencyContactSave'])->name('emergencyContactSave');
Route::get('/registration/accomodations/{id}', [RegistrationController::class, 'accomodationsIndex'])->name('accomodationsIndex');
Route::post('/registration/accomodationsSave', [RegistrationController::class, 'accomodationsSave'])->name('accomodationsSave');
Route::post('/registration/accomodationsUpdate/{id}', [RegistrationController::class, 'accomodationsUpdate'])->name('accomodationsUpdate');
Route::get('/registration/magisProgram/{id}', [RegistrationController::class, 'magisProgramIndex'])->name('magisProgramIndex');    
Route::post('/registration/magisProgram', [RegistrationController::class, 'magisProgramSave'])->name('magisProgramSave');
Route::post('/registration/magisProgram/{id}', [RegistrationController::class, 'magisProgramUpdate'])->name('magisProgramUpdate');
Route::get('/registration/coursePlacementIndex/{id}', [RegistrationController::class, 'coursePlacementIndex'])->name('coursePlacementIndex');                                                           
Route::post('/registration/coursePlacement/{id}', [RegistrationController::class, 'coursePlacementUpdate'])->name('coursePlacementUpdate');
Route::get('/registration/thankYou' , [RegistrationController::class, 'thankYou']);
// Route::put('/updatepassword',[UpdateProfileController::class,'UpdatePassword'])->name('updatepassword');


