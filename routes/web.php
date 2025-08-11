<?php

use Illuminate\Support\Facades\Route;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

Route::get('/', function () {
    return view('welcome');
});


Route::get('print-test', function () {
    try {
        // Enter the share name for your USB printer here
        // $connector = null;
        $connector = new WindowsPrintConnector("POS58");
    
        /* Print a "Hello world" receipt" */
        $printer = new Printer($connector);
        $printer -> text("Hello World!\n");
        $printer -> cut();
        
        /* Close printer */
        $printer -> close();
    } catch (Exception $e) {
        echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
    }
})->name('print-test');