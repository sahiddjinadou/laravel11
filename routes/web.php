<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['un', 'deux', 'trois'];
});

// Route::get('1', function() { return 'Je suis la page 1 !'; });
// Route::get('2', function() { return 'Je suis la page 2 !'; });
// Route::get('3', function() { return 'Je suis la page 3 !'; });

Route::get('{n?}', function($n) {
    return 'Je suis la page ' . $n . ' !';
})->where('n','[1-3]')->name("test");

Route::get("test", function() {
    return ['un', 'deux', 'trois'];
});

Route::get('test2', function () {
    return response('un test', 206)->header('Content-Type', 'text/plain');
});


Route::get('vue1', function() {
    return view('vue');
});



Route::get('article/{n}', function($n) {
    // return view('vue')->with("numero",$n);
    //envoie des donnees à la vue
    return view('article',['numero'=>$n]);
})->where('n','[0-9]+');

Route::get('facture/{n}', function($n) {
    return view('facture',['numero'=>$n]);
})->where('n', '[0-9]+');

Route::get('users/action', function($type) {
    return view('users.action');
})->name('action');

Route::get('users/action/{type}', function() {
    return view('users.action');
})->name('action');

