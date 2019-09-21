<?php

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

use App\Imports\ClienteImport;


Route::get('/', function () {
    $import = new ClienteImport;
    try{
        
        \Excel::import($import, public_path('CLIENTES.xlsx'));
        
        //dd('Row count: ' . $import->getRowCount()); 
    }catch(\Maatwebsite\Excel\Validators\ValidationException $e){
        $failures = $e->failures();
     
        foreach ($failures as $failure) {
            $failure->row(); // row that went wrong
            $failure->attribute(); // either heading key (if using heading row concern) or column index
            $failure->errors(); // Actual error messages from Laravel validator
            $failure->values(); // The values of the row that has failed.
        }
        
        dd($import->errors());
    }
    //dd($failures);
    //dd($import->errors());
    $clientes = \App\Cliente::all();
    return view('welcome', compact('clientes'));
});
