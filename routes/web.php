<?php
Route::get('/painel/produtos/testes', 'Painel\ProdutoController@testes');
Route::resource('/painel/produtos', 'Painel\ProdutoController');

Route::group(['namespace' => 'Site'], function () {
    Route::get('/categoria/{id}', 'SiteController@categoria');
    Route::get('/categoria2/{id?}', 'SiteController@categoriaOp');

    Route::get('/', 'SiteController@index');
    Route::get('/contato', 'SiteController@contato');
});