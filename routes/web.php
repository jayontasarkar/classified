<?php

Route::get('/', 'HomeController@index');

Route::get('/user/area/{area}', 'User\AreaController@store')->name('user.area.store');

// Braintree Token
Route::get('braintree/token', 'BraintreeController@token');

Route::group(['prefix' => '/{area}'], function() {
    /**
     * Categories
     */
    Route::group(['prefix' => '/categories'], function() {
        Route::get('/', 'Category\CategoryController@index')->name('category.index');
        
        Route::group(['prefix' => '/{category}'], function() {
            Route::get('/listings', 'Listing\ListingController@index')->name('listings.index');
        });
    });

    /**
     * Listings
     */
    Route::group(['prefix' => '/listings', 'namespace' => 'Listing'], function() {
        Route::get('/favourites', 'ListingFavouriteController@index')->name('listings.favourites.index');
        Route::post('/{listing}/favourites', 'ListingFavouriteController@store')->name('listings.favourites.store');
        Route::delete('/{listing}/favourites','ListingFavouriteController@destroy')->name('listings.favourites.destroy');

        Route::get('/viewed', 'ListingViewedController@index')->name('listings.viewed.index');
        Route::post('{listing}/contact', 'ListingContactController@store')->name('listings.contact.store');

        /**
         * Published & Unpublished Listings
         */
        Route::get('/unpublished', 'ListingUnPublishedController@index')->name('listings.unpublished.index');
        Route::get('/published', 'ListingPublishedController@index')->name('listings.published.index');

        Route::group(['middleware' => 'auth'], function() {
            /**
             * Listing Payments
             */
            Route::get('/{listing}/payment', 'ListingPaymentController@show')->name('listings.payment.show');
            Route::post('/{listing}/payment', 'ListingPaymentController@store')->name('listings.payment.store');
            Route::patch('/{listing}/payment', 'ListingPaymentController@update')->name('listings.payment.update');
            
            Route::get('/create', 'ListingController@create')->name('listings.create');
            Route::post('/', 'ListingController@store')->name('listings.store');

            Route::get('{listing}/edit', 'ListingController@edit')->name('listings.edit');
            Route::patch('/{listing}', 'ListingController@update')->name('listings.update');
            Route::delete('/{listing}', 'ListingController@destroy')->name('listings.destory');
        });
    });

    Route::get('/{listing}', 'Listing\ListingController@show')->name('listings.show');
});

Auth::routes();
