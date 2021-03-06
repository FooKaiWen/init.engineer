<?php

use App\Http\Controllers\Api\Frontend\Social\CardsController;

/**
 * All route names are prefixed with 'api.frontend'.
 */
Route::group([
    'prefix' => 'frontend',
    'as' => 'frontend.',
    'namespace' => 'Frontend',
], function () {
    /**
     * All route names are prefixed with 'api.frontend.social'.
     */
    Route::group([
        'prefix' => 'social',
        'as' => 'social.',
        'namespace' => 'Social',
    ], function () {
        /**
         * All route names are prefixed with 'api.frontend.social.cards'.
         */
        Route::group([
            'prefix' => 'cards',
            'as' => 'cards.',
            'namespace' => 'Cards',
        ], function () {
            // Cards CRUD
            Route::get('/', [CardsController::class, 'index'])->name('index');
            Route::group(['middleware' => 'auth:api'], function () {
                Route::get('/dashboard', [CardsController::class, 'dashboard'])->name('dashboard');
                Route::post('/publish', [CardsController::class, 'store'])->name('store');
            });

            // Specific Card
            Route::group(['prefix' => '/{id}'], function () {
                Route::get('/show', [CardsController::class, 'show'])->name('show');
                Route::get('/links', [CardsController::class, 'links'])->name('links');
                Route::get('/comments', [CardsController::class, 'comments'])->name('comments');
            });
        });
    });
});
