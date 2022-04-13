<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Abilities
    Route::apiResource('abilities', 'AbilitiesController', ['only' => ['index']]);

    // Locales
    Route::get('locales/languages', 'LocalesController@languages')->name('locales.languages');
    Route::get('locales/messages', 'LocalesController@messages')->name('locales.messages');

    // Permissions
    Route::resource('permissions', 'PermissionsApiController');

    // Roles
    Route::resource('roles', 'RolesApiController');

    // Users
    Route::resource('users', 'UsersApiController');

    // Client
    Route::resource('clients', 'ClientApiController');

    // Service
    Route::resource('services', 'ServiceApiController');

    // Contact Company
    Route::resource('contact-companies', 'ContactCompanyApiController');

    // Contact Contacts
    Route::resource('contact-contacts', 'ContactContactsApiController');

    // Crm Status
    Route::resource('crm-statuses', 'CrmStatusApiController');

    // Crm Customer
    Route::resource('crm-customers', 'CrmCustomerApiController');

    // Crm Note
    Route::resource('crm-notes', 'CrmNoteApiController');

    // Crm Document
    Route::post('crm-documents/media', 'CrmDocumentApiController@storeMedia')->name('crm-documents.storeMedia');
    Route::resource('crm-documents', 'CrmDocumentApiController');

    // Service Item
    Route::resource('service-items', 'ServiceItemApiController');

    // Client Custom Data
    Route::resource('client-custom-datas', 'ClientCustomDataApiController');

    // Invoice
    Route::resource('invoices', 'InvoiceApiController');

    // Invoice Item
    Route::resource('invoice-items', 'InvoiceItemApiController');
});
