<?php
/**
 * Subject
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Subject'], function () {
        Route::resource('subjects', 'SubjectsController');
        //For Datatable
        Route::post('subjects/get', 'SubjectsTableController')->name('subjects.get');
    });
    
});