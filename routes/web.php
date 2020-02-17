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

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/home', function () {
//     return view('welcome');
// });
Auth::routes();

/* View Routes */
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/contacts', 'ContactController@index')->name('contacts');
Route::get('/singlemail', 'SingleMailController@index')->name('singlemail');
// Route::get('/singlemail', function () {
//     return view('single_mail')->with([
//             "base_page" => "mail",
//             "page" => "single mail",
//             "page_title" => "Compose Single Mail",
//     ]);
// })->name('singlemail');
// Route::get('/bulkmail', 'ContactController@index')->name('bulkmail');
Route::get('/bulkmail', function () {
    return view('bulk_mail')->with([
            "base_page" => "mail",
            "page" => "bulk mail",
            "page_title" => "Compose Bulk Mails",
    ]);
})->name('bulkmail');
// Route::get('/inbox', 'DashboardController@index')->name('inbox');
// Route::get('/outbox', 'ContactController@index')->name('outbox');
// Route::get('/draft', 'DashboardController@index')->name('draft');
// Route::get('/groups', 'ContactController@index')->name('groups');
// Route::get('/template', 'DashboardController@index')->name('template');
// Route::get('/pendingmails', 'ContactController@index')->name('pemdingmail');
// Route::get('/failedmails', 'DashboardController@index')->name('failedmails');


Route::get('/inbox', function () {
    return view('inbox')->with([
            "page" => "inbox",
            "page_title" => "Inbox",
    ]);
})->name('inbox');

Route::get('/outbox', function () {
    return view('outbox')->with([
            "page" => "outbox",
            "page_title" => "Outbox",
    ]);
})->name('outbox');

Route::get('/draft', function () {
    return view('draft')->with([
            "page" => "draft",
            "page_title" => "Draft",
    ]);
})->name('draft');

Route::get('/groups', function () {
    return view('groups')->with([
            "page" => "groups",
            "page_title" => "My Groups",
    ]);
})->name('groups');

Route::get('/group/{group_name}', function ($group_name) {
    return view('view_group')->with([
            "page" => "groups",
            "page_title" => $group_name,
    ]);
})->name('viewGroup.group_name');


Route::get('/templates', function () {
    return view('templates')->with([
            "page" => "templates",
            "page_title" => "My Templates",
    ]);
})->name('templates');

Route::get('/pendingmails', function () {
    return view('pending_mails')->with([
            "page" => "pending mails",
            "page_title" => "Pending Mails",
    ]);
})->name('pendingmails');

Route::get('/failedmails', function () {
    return view('failed_mails')->with([
            "page" => "failed mails",
            "page_title" => "Failed Mails",
    ]);
})->name('failedmails');

Route::get('/myprofile', function () {
    return view('my_profile')->with([
            "page" => "dashboard",
            "page_title" => "My Profile",
    ]);
})->name('myProfile');
/*END View Routes */

Route::post('/addContact','ContactController@addContact')->name('addContact');
Route::post('/editContact','ContactController@editContact')->name('editContact');
Route::post('/deleteContact','ContactController@deleteContact')->name('deleteContact');
Route::post('/importContacts','ContactController@importContacts')->name('importContacts');
Route::get('/exportContacts','ContactController@exportContacts')->name('exportContacts');


Route::get('google', function () {
    return view('googleAuth');
});
    
Route::get('/auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('/auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/auth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('/auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');