<?php



Route::get('/', 'HomesController@index')->name('home');

Route::get('product', 'ProductsController@product');

/*----------------------------------------------------------------------------*/
/* Group Admin không cần đăng nhập vẫn vô được
/*----------------------------------------------------------------------------*/
Route::group(array('prefix' => '/admin', 'namespace' => 'Admin'), function () {
 
	/*------------------------------------------------------------------------*/
	/* User
	/*------------------------------------------------------------------------*/
	Route::get('login', array('as' => 'admin.login', 'uses' => 'AuthController@getLogin'));
	Route::post('login', array('as' => 'admin.login', 'uses' => 'AuthController@postLogin'));
	Route::post('logout', array('as' => 'admin.logout', 'uses' => 'AuthController@postLogout'));
	Route::post('check-login', 'AuthController@checkLogin')->name('check-login');
	Route::get('register', array('as' => 'admin.register', 'uses' => 'AuthController@getRegister'));
	Route::post('check-register', 'AuthController@checkRegister')->name('check-register');
	Route::get('logout', 'AuthController@logout');
	/*------------------------------------------------------------------------*/
	/* Product
	/*------------------------------------------------------------------------*/
	Route::get('product', 'ProductsController@productShow');
	Route::get('product/create', 'ProductsController@create');
	Route::get('product/edit/{id}', 'ProductsController@edit');
	Route::post('product/store', 'ProductsController@store');
	Route::post('product/update/{id}', 'ProductsController@update');
	Route::post('product/destroy', 'ProductsController@destroy');
	/*------------------------------------------------------------------------*/
	/* Bill
	/*------------------------------------------------------------------------*/
	Route::get('bill', 'BillsController@billShow');
	/*------------------------------------------------------------------------*/
	/* Supplier
	/*------------------------------------------------------------------------*/
	Route::get('supplier', 'SupplierController@index');
	Route::get('supplier/create', 'SupplierController@create');
	Route::post('supplier/store', 'SupplierController@store');
	Route::get('supplier/edit/{id}', 'SupplierController@edit');
	Route::post('supplier/update/{id}', 'SupplierController@update');
	Route::post('supplier/destroy', 'SupplierController@destroy');
	/*----------------------------------------------------------------------------*/
	//Image
	/*----------------------------------------------------------------------------*/
	Route::get('img/banner', 'ImagesController@index')->name('banner');
	Route::get('img/banner/create', 'ImagesController@create')->name('create');
	Route::post('img/banner/store', 'ImagesController@store')->name('store');
	//Route::get('img/slide', 'HomesController@slide')->name('slide');
	/*----------------------------------------------------------------------------*/
	//Slider
	/*----------------------------------------------------------------------------*/
	Route::get('slider', 'SlideController@sliderShow')->name('slider');
	Route::get('slider/create', 'SlideController@create');
	Route::get('slider/edit/{id}', 'SlideController@edit');
	Route::post('slider/update/{id}', 'SlideController@update');
});

/*----------------------------------------------------------------------------*/
/* Group Admin bắt buộc đăng nhập
/* 'middleware' => ['admin.auth'] cái này là mảng có thể bỏ nhiều middleware
/*----------------------------------------------------------------------------*/
Route::group(['prefix' => '/admin','namespace' => 'Admin', 'middleware' => ['admin.auth']], function () {
	Route::get('/', 'HomesController@index');
    Route::get('home', 'HomesController@index');
    
});


Route::get('list-product.html', 'ProductsController@listView')->name('list-product');

Route::get('product-details/{id}', 'ProductsController@productDetail')->name('product-details');
Route::get('cart.html', 'CartsController@cart')->name('cart');
Route::get('grid-product.html', 'ProductsController@gridView')->name('grid-product');
Route::get('contact-us.html', 'ContactsController@contact')->name('grid-product');
Route::get('three-col.html', 'ProductsController@threeColumn')->name('three-col');
Route::get('four-col.html', 'ProductsController@fourColumn')->name('four-col');
Route::post('product/reviews', 'ProductsController@reviews')->name('reviews');
Route::get('insert', 'AdminCategoryController@insert')->name('insert');
Route::get('insertproduct', 'AdminCategoryController@insertProduct')->name('insertProduct');
/*----------------------------------------------------------------------------*/
//Cart
/*----------------------------------------------------------------------------*/
Route::post('add-cart', 'CartsController@addCart')->name('add-cart');
Route::post('add-cart-ajax', 'CartsController@addCartAjax')->name('add-cart-ajax');
Route::get('cart-show', 'CartsController@showCart')->name('cart-show');
Route::get('delete-all', 'CartsController@deleteAll')->name('delete-all');
Route::get('remove-cart/{rowId}', 'CartsController@removeCart')->name('remove-cart');
Route::get('checkout', 'CartsController@checkout')->name('checkout');
Route::post('cart-update', 'CartsController@cartUpdate')->name('cart-update');
Route::get('success-post/{id}', 'CartsController@successPost')->name('successPost');
Route::get('success-get/{id}', 'CartsController@successGet')->name('successGet');
Route::get('get-cart-info', 'CartsController@cartInfo')->name('get-cart-info');
/*----------------------------------------------------------------------------*/
//User
/*----------------------------------------------------------------------------*/

Route::get('user/login.html', 'AccountsController@login')->name('login');
Route::post('check-login', 'AccountsController@checkLogin')->name('check-login');
Route::post('check-register', 'AccountsController@checkRegister')->name('check-register');
Route::get('logout', 'AccountsController@logout')->name('logout');
/*----------------------------------------------------------------------------*/
//User
/*----------------------------------------------------------------------------*/


//cái này chính là dùng cái có sẵn đó
//Auth::routes();



Route::get('/home', 'HomeController@index');
