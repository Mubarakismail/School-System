<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;


Auth::routes();

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/dashboard', 'HomeController@index')->name('dashbord');

        //==============================dashboard============================
        Route::group(['namespace' => '\App\Http\Controllers\Grades'], function () {
            Route::resource('Grades', 'GradeController');
        });

        //==============================Classrooms============================
        Route::group(['namespace' => '\App\Http\Controllers\Classrooms'], function () {
            Route::resource('classroom', 'ClassroomController');
            Route::post('/delete/all', 'ClassroomController@deleteAll')->name('delete_all');
        });

        //==============================Sections============================
        Route::group(['namespace' => '\App\Http\Controllers\Sections'], function () {
            Route::resource('Sections', 'SectionController');
            Route::get('/classes/{id}', 'SectionController@getClasses');
        });

        //==============================Livewire============================
        Route::view('add_parent', 'livewire.show');

        //==============================Teachers============================
        Route::group(['namespace' => '\App\Http\Controllers\Teachers'], function () {
            Route::resource('Teachers', 'TeacherController');
        });

        //==============================Students============================
        Route::group(['namespace' => '\App\Http\Controllers\Students'], function () {
            Route::resource('Students', 'StudentController');
            Route::get('Get_classrooms/{id}', 'StudentController@Get_classrooms');
            Route::get('Get_Sections/{id}', 'StudentController@Get_Sections');
            Route::resource('Promotion', 'PromotionStudentController');
            Route::resource('Graduated', 'GraduatedStudentController');
            Route::resource('Fees', 'FeeController')->except('show');
            Route::resource('Fees_Invoices', 'FeesInvoiceController');
            Route::resource('ReceiptStudent', 'ReceiptStudentController');
        });
    }
);
