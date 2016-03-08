<?php

/*
Pour voir les paramètres possibles (ex : /acme/(:1num)),
consulter la méthode replaceRegex() de la classe Router.
*/

/**
    Index Controller
*/
Route::add('/', 'Index');
Route::add('/lang/(:alpha)', 'Index', 'choseLang', array('GET'));

/**
    API Controller
*/
Route::add('/api/test', 'Api', 'test', array('GET', 'POST', 'PUT'));
Route::add('/api/test/(:num)', 'Api', 'test2', array('GET', 'POST', 'PUT'));
