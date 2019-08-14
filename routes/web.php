<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::post('roles/parse-csv-import', 'RolesController@parseCsvImport')->name('roles.parseCsvImport');
    Route::post('roles/process-csv-import', 'RolesController@processCsvImport')->name('roles.processCsvImport');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Auditlogs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Outlets
    Route::delete('outlets/destroy', 'OutletsController@massDestroy')->name('outlets.massDestroy');
    Route::post('outlets/parse-csv-import', 'OutletsController@parseCsvImport')->name('outlets.parseCsvImport');
    Route::post('outlets/process-csv-import', 'OutletsController@processCsvImport')->name('outlets.processCsvImport');
    Route::resource('outlets', 'OutletsController');

    // Trainings
    Route::delete('trainings/destroy', 'TrainingController@massDestroy')->name('trainings.massDestroy');
    Route::post('trainings/parse-csv-import', 'TrainingController@parseCsvImport')->name('trainings.parseCsvImport');
    Route::post('trainings/process-csv-import', 'TrainingController@processCsvImport')->name('trainings.processCsvImport');
    Route::resource('trainings', 'TrainingController');

    // Trainingmodules
    Route::delete('training-modules/destroy', 'TrainingModulesController@massDestroy')->name('training-modules.massDestroy');
    Route::post('training-modules/parse-csv-import', 'TrainingModulesController@parseCsvImport')->name('training-modules.parseCsvImport');
    Route::post('training-modules/process-csv-import', 'TrainingModulesController@processCsvImport')->name('training-modules.processCsvImport');
    Route::resource('training-modules', 'TrainingModulesController');

    // Assetverifications
    Route::delete('asset-verifications/destroy', 'AssetVerificationController@massDestroy')->name('asset-verifications.massDestroy');
    Route::post('asset-verifications/parse-csv-import', 'AssetVerificationController@parseCsvImport')->name('asset-verifications.parseCsvImport');
    Route::post('asset-verifications/process-csv-import', 'AssetVerificationController@processCsvImport')->name('asset-verifications.processCsvImport');
    Route::resource('asset-verifications', 'AssetVerificationController');

    // Audits
    Route::delete('audits/destroy', 'AuditController@massDestroy')->name('audits.massDestroy');
    Route::post('audits/parse-csv-import', 'AuditController@parseCsvImport')->name('audits.parseCsvImport');
    Route::post('audits/process-csv-import', 'AuditController@processCsvImport')->name('audits.processCsvImport');
    Route::resource('audits', 'AuditController');

    // Fieldopsrequests
    Route::delete('field-ops-requests/destroy', 'FieldOpsRequestController@massDestroy')->name('field-ops-requests.massDestroy');
    Route::post('field-ops-requests/parse-csv-import', 'FieldOpsRequestController@parseCsvImport')->name('field-ops-requests.parseCsvImport');
    Route::post('field-ops-requests/process-csv-import', 'FieldOpsRequestController@processCsvImport')->name('field-ops-requests.processCsvImport');
    Route::resource('field-ops-requests', 'FieldOpsRequestController');

    // Callcycles
    Route::delete('call-cycles/destroy', 'CallCyclesController@massDestroy')->name('call-cycles.massDestroy');
    Route::post('call-cycles/parse-csv-import', 'CallCyclesController@parseCsvImport')->name('call-cycles.parseCsvImport');
    Route::post('call-cycles/process-csv-import', 'CallCyclesController@processCsvImport')->name('call-cycles.processCsvImport');
    Route::resource('call-cycles', 'CallCyclesController');

    // Whylaggards
    Route::delete('why-laggards/destroy', 'WhyLaggardController@massDestroy')->name('why-laggards.massDestroy');
    Route::resource('why-laggards', 'WhyLaggardController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
