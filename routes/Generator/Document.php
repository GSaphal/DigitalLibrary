<?php
/**
 * Documents
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Documents'], function () {
        Route::resource('documents', 'DocumentsController');
        //For Datatable
        Route::post('documents/get', 'DocumentsTableController')->name('documents.get');
    });
    
});