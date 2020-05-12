<?php
/**
 * Semester
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Semester'], function () {
        Route::resource('semesters', 'SemestersController');
        //For Datatable
        Route::post('semesters/get', 'SemestersTableController')->name('semesters.get');
    });
    
});