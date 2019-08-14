<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Outlets
    Route::apiResource('outlets', 'OutletsApiController');

    // Trainings
    Route::apiResource('trainings', 'TrainingApiController');

    // Trainingmodules
    Route::apiResource('training-modules', 'TrainingModulesApiController');

    // Assetverifications
    Route::apiResource('asset-verifications', 'AssetVerificationApiController');

    // Audits
    Route::apiResource('audits', 'AuditApiController');

    // Fieldopsrequests
    Route::apiResource('field-ops-requests', 'FieldOpsRequestApiController');

    // Callcycles
    Route::apiResource('call-cycles', 'CallCyclesApiController');

    // Whylaggards
    Route::apiResource('why-laggards', 'WhyLaggardApiController');
});
