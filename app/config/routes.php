<?php

/**
    Index Controller
*/

Route::add('/', 'Index');

Route::add('/lang/(:alpha)', 'Index', 'choseLang', array('GET'));

Route::add('/terms', 'Index', 'terms');

Route::add('/auth/logout', 'Auth', 'logout');

/**
    Admin Controller
*/

/* index */
Route::add('/admin', 'Admin', 'index');

/* users */
Route::add('/admin/user', 'Admin', 'getUsers');
Route::add('/admin/user/add', 'Admin', 'addUser');
Route::add('/admin/user/(:num)/edit', 'Admin', 'editUser');
Route::add('/admin/user/(:num)/ban', 'Admin', 'banUser');
Route::add('/admin/user/(:num)/unban', 'Admin', 'unbanUser');
Route::add('/admin/password/change', 'Admin', 'changePassword');

/* newslettrer */
Route::add('/admin/newsletter/user', 'Admin', 'getNewsletterSubs');
