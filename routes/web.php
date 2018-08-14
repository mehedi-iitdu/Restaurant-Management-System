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

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Home_Dashboard
Route::get('/', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/listings', 'HomeController@listings')->name('listings');
Route::get('/listings/show/{code}', 'HomeController@showRestaurant')->name('restaurant.show');
Route::post('/listings', 'HomeController@filterListings')->name('listings.filter');

//Listing_Admin
Route::get('/listing/add', 'RestaurantController@showAddListingForm')->name('listing.add');
Route::post('/listing/add', 'RestaurantController@insertRestaurant')->name('listing.add');
Route::get('/my-listings/{status}', 'RestaurantController@index')->name('mylistings');
Route::get('my-listings/edit/{code}', 'RestaurantController@showEditRestaurantForm')->name('restaurant.edit');
Route::post('/listing/update', 'RestaurantController@updateRestaurant')->name('listing.update');

//Photos_Admin
Route::get('/photos', 'PhotoController@index')->name('photos.index');
Route::get('/photos/show/{code}', 'PhotoController@showPhotos')->name('photos.show');
Route::get('/photos/delete/{id}', 'PhotoController@delete')->name('photos.delete');
Route::post('/photos/upload/', 'PhotoController@upload')->name('photos.upload');

//Tables_Admin
Route::get('/tables', 'RestaurantTableController@index')->name('tables.index');
Route::get('tables/show/{code}', 'RestaurantTableController@showTables')->name('tables.show');
Route::get('/tables/add/{code?}', 'RestaurantTableController@showAddTableForm')->name('tables.add');
Route::post('/tables/insert', 'RestaurantTableController@insertRestaurantTable')->name('tables.insert');
Route::post('/tables/add/auto', 'RestaurantTableController@showAddTableAutoForm')->name('tables.add.auto');
Route::post('/tables/add/auto/all', 'RestaurantTableController@insertAutoRestaurantTable')->name('tables.add.all');
Route::post('/tables/capacity', 'RestaurantTableController@getTablesCapacity')->name('tables.capacity');

Route::post('/tables/edit', 'RestaurantTableController@showEditTableForm')->name('tables.edit');
Route::post('/tables/update', 'RestaurantTableController@updateRestaurantTable')->name('tables.update');
Route::post('/tables/delete', 'RestaurantTableController@deleteRestaurantTable')->name('tables.delete');

//Time_Admin
Route::get('/timeConfigs', 'TimeConfigController@index')->name('timeConfig.index');
Route::get('/timeConfigs/show/{code}', 'TimeConfigController@showTimeConfig')->name('timeConfig.show');
Route::get('/timeConfigs/add/{code?}', 'TimeConfigController@showAddTimeConfigForm')->name('timeConfig.add');
Route::post('/timeConfigs/insert', 'TimeConfigController@insertTimeConfig')->name('timeConfig.insert');
Route::post('/timeConfigs/update', 'TimeConfigController@updateTimeConfig')->name('timeConfig.update');

//ReservationRequests_Admin
Route::get('/reservation_requests', 'ReservationRequestController@index')->name('reservation_requests.index');
Route::get('/reservation_requests/show/{code}', 'ReservationRequestController@show')->name('reservation_requests.show');
Route::post('/reservation_requests/accept', 'ReservationRequestController@accept')->name('reservation_requests.accept');
Route::post('/reservation_requests/delete', 'ReservationRequestController@delete')->name('reservation_requests.delete');
Route::post('/reservation_requests/confirm', 'ReservationController@store')->name('reservations.store');

//Holiday_Admin
Route::get('/holidays/show/{code}', 'HolidayController@showHolidays')->name('holidays.show');
Route::post('/holidays/add', 'HolidayController@insertHoliday')->name('holidays.insert');
Route::post('/holidays/update', 'HolidayController@updateHoliday')->name('holidays.update');
Route::post('/holidays/delete', 'HolidayController@deleteHoliday')->name('holidays.delete');

//Food_Menu_Admin
Route::get('/fooditems', 'FoodItemController@index')->name('fooditem.index');
Route::get('/fooditems/show/{code}', 'FoodItemController@showFoodItems')->name('fooditem.show');
Route::get('/fooditems/item/add/{code?}', 'FoodItemController@showAddFoodItemForm')->name('fooditem.add');
Route::post('/fooditems/item/insert', 'FoodItemController@insertFoodItem')->name('fooditem.insert');
Route::post('/fooditems/item/edit', 'FoodItemController@showEditFoodItemForm')->name('fooditem.edit');
Route::post('/fooditems/item/update', 'FoodItemController@updateFoodItem')->name('fooditem.update');
Route::post('/fooditems/item/delete', 'FoodItemController@deleteFoodItem')->name('fooditem.delete');

Route::post('/fooditems/category/add', 'FoodCategoryController@insertCategory')->name('food.category.add');
Route::post('/fooditems/category/eidt', 'FoodCategoryController@updateCategory')->name('food.category.update');
Route::post('/fooditems/category/delete', 'FoodCategoryController@deleteCategory')->name('food.category.delete');

//User_Profile
Route::get('/profile','UserController@index')->name('profile');
Route::post('/profile/update','UserController@updateUser')->name('profile.update');
Route::post('/profile/change_password','UserController@changePassword')->name('profile.changePassword');

//Review
Route::get('/reviews','ReviewController@index')->name('review');
Route::post('/reviews', 'ReviewController@showReview')->name('review.show');
Route::post('/reviews/store', 'ReviewController@store')->name('reviews.store');

//Widget
Route::prefix('widget')->group(function () {
    Route::get('/widget-form', function(){
		return view('widget.widget-form');
	});
	Route::get('/booking', function(){
		return view('widget.booking');
	});
	Route::get('/checkout', function(){
		return view('widget.checkout');
	});
	Route::get('/confirm', function(){
		return view('widget.confirm');
	});
	Route::get('/processing', function(){
		return view('widget.processing');
	});
	Route::get('/allvouchers', function(){
		return view('widget.allvouchers');
	});
	Route::get('/redeem', function(){
		return view('widget.redeem');
	});
	Route::get('/suggestions', function(){
		return view('widget.suggestions');
	});
	Route::get('/voucher-checkout', function(){
		return view('widget.voucher-checkout');
	});

	Route::post('/available-times', 'WidgetController@getAvailableTimes')->name('available-times');
	Route::post('/book-request', 'WidgetController@storeBookRequest')->name('book-request');
	/*Route::post('/maximum-people', 'WidgetController@getMaximumPeopleNumber')->name('maximum-people');*/
});