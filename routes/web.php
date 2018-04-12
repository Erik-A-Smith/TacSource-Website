<?php

// Authentication: login
Route::get('/login', 'Auth\LoginController@show')->name("login");
Route::post('/login', 'Auth\LoginController@authenticate')->name("authenticate");

// Authentication: Register
Route::get('/register', 'Auth\RegisterController@show')->name("register");
Route::post('/register', 'Auth\RegisterController@authenticate')->name("authenticate");

// Authentication: Logout
Route::get('/logout', 'Auth\LoginController@logout')->name("logout");

// Event
Route::middleware(['auth'])->get('/event', 'Event\EventController@index')->name("eventList");
Route::middleware(['auth'])->get('/event/create', 'Event\EventController@create')->name("eventCreate");
Route::middleware(['auth'])->post('/event/create', 'Event\EventController@store')->name("eventStore");
Route::middleware(['auth'])->post('/event/{event}/delete', 'Event\EventController@destroy')->name("eventDelete");
Route::middleware(['auth'])->get('/event/{event}', 'Event\EventController@show')->name("eventShow");
Route::middleware(['auth'])->get('/event/{event}/edit', 'Event\EventController@edit')->name("eventEdit");
Route::middleware(['auth'])->post('/event/{event}/edit', 'Event\EventController@update')->name("eventUpdate");
Route::middleware(['auth'])->post('/event/{event}/attendance/attend', 'Event\EventController@attend')->name("eventAttent");
Route::middleware(['auth'])->post('/event/{event}/attendance/unattend', 'Event\EventController@unattend')->name("eventUnattent");
Route::middleware(['auth'])->post('/event/{event}/addPlayer', 'Event\EventController@addPlayer')->name("eventAddPlayer");
Route::middleware(['auth'])->post('/event/attendance/{attendance}/validate', 'Event\EventController@validateAttendance')->name("eventAttendanceValidate");
Route::middleware(['auth'])->post('/event/attendance/{attendance}/invalidate', 'Event\EventController@invalidateAttendance')->name("eventAttendanceInvalidate");
Route::middleware(['auth'])->get('/event/{event}/downloadMod', 'Event\EventController@downloadMod')->name("eventDownloadMod");
Route::middleware(['auth'])->post('/event/attendance/{attendance}/changeRole', 'Event\EventController@changeRole')->name("eventChangeRole");
Route::middleware(['auth'])->post('/event/{event}/validate', 'Event\EventController@validateEvent')->name("eventValidate");
Route::middleware(['auth'])->post('/event/{event}/invalidate', 'Event\EventController@invalidateEvent')->name("eventInvalidate");

// User
Route::get('/user', 'User\UserController@index')->name("userList");
Route::get('/user/{user}', 'User\UserController@show')->name("userShow");
Route::middleware(['auth'])->get('/user/{user}/edit', 'User\UserController@edit')->name("userEdit");
Route::middleware(['auth'])->post('/user/{user}/edit', 'User\UserController@update')->name("userUpdate");
Route::middleware(['auth'])->get('/user/{user}/admin', 'User\UserController@admin')->name("userAdmin");
Route::middleware(['auth'])->post('/user/{user}/admin', 'User\UserController@adminSave')->name("userAdminSave");
Route::middleware(['auth'])->post('/user/{user}/resetToken', 'User\UserController@resetTokenRequest')->name("userResetTokenRequest");
Route::get('/user/reset/{resetToken}', 'User\UserController@resetToken')->name("userResetToken");
Route::post('/user/reset', 'User\UserController@resetTokenAction')->name("userResetTokenAction");

// Admin
Route::middleware(['auth'])->get('/admin', 'Admin\AdminController@index')->name("adminIndex");
Route::middleware(['auth'])->get('/admin/rank', 'Rank\RankController@index')->name("rankIndex");
Route::middleware(['auth'])->post('/admin/rank/update', 'Rank\RankController@update')->name("rankUpdate");
Route::middleware(['auth'])->get('/admin/eventType', 'EventType\EventTypeController@index')->name("eventTypeIndex");
Route::middleware(['auth'])->post('/admin/eventType/update', 'EventType\EventTypeController@update')->name("eventTypeUpdate");
Route::middleware(['auth'])->get('/admin/role', 'Role\RoleController@index')->name("roleIndex");
Route::middleware(['auth'])->post('/admin/role/update', 'Role\RoleController@update')->name("roleUpdate");
Route::middleware(['auth'])->get('/admin/promotion', 'Admin\AdminController@promotion')->name("promotionList");

// Index
Route::get('/', 'Index\IndexController@index')->name("home");

// Secret
Route::get('/secret', 'Secret\SecretController@index')->name("secret");
Route::post('/secret', 'Secret\SecretController@generate')->name("secret");
// Route::get('/secret/show', 'Index\SecretController@show')->name("secret");
