<?php

use API\Platform\Models\Table;
use API\Platform\Services\ORMService;
use Illuminate\Support\Facades\Route;

# @todo middleware check dev to expose

Route::get('schema', '\Agontuk\Schema\Controllers\SchemaController@index');
Route::post('schema', '\Agontuk\Schema\Controllers\SchemaController@generateMigration');

$ormService = new ORMService();

$tables = Table::all();
foreach ($tables as $table) {
    $modelName = $ormService->tableToClass($table, $table->name);

    Route::get('api/' . $table->name, '\App\Http\Controllers\API\\' . $modelName . 'APIController@index');
    Route::post('api/' . $table->name, '\App\Http\Controllers\API\\'. $modelName . 'APIController@store');
    Route::get('api/' . $table->name . '/{id}', '\App\Http\Controllers\API\\' . $modelName . 'APIController@show');
    Route::put('api/' . $table->name . '/{id}', '\App\Http\Controllers\API\\' . $modelName . 'APIController@update');
    Route::delete('api/' . $table->name . '/{id}', '\App\Http\Controllers\API\\' . $modelName . 'APIController@destroy');
}
