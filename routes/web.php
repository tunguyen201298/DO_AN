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
	Route::get('register', ['as' => 'admin.register', 'uses' => 'AuthController@getRegister']);
	Route::post('check-register', 'AuthController@checkRegister')->name('check-register');
	Route::get('logout', 'AuthController@logout');

	/*----------------------------------------------------------------------------*/
	/* Group Admin bắt buộc đăng nhập
	/* 'middleware' => ['admin.auth', 'role'] cái này là mảng có thể bỏ nhiều middleware
	/*----------------------------------------------------------------------------*/
	Route::group(array('middleware' => ['admin.auth', 'role']), function () {
	    Route::get('/', 'HomesController@index');
    	Route::get('home', 'HomesController@index');

    	Route::group(array('middleware' => ['role.admin']), function () {
    		Route::group(array('prefix' => '/user'), function () {
    			/*----------------------------------------------------------------------------*/
				//User
				/*----------------------------------------------------------------------------*/
				Route::get('/', 'UsersController@index');
				Route::get('create', 'UsersController@create');
				Route::get('/customer', 'UsersController@customer');
				Route::get('/info-user/{id}', 'UsersController@infoUser');
				Route::get('/edit/{id}', 'UsersController@edit');
				Route::post('/update/{id}', 'UsersController@update');
				Route::post('/destroy', 'UsersController@destroy');

			});
    	});
    	
    	Route::group(array('middleware' => ['role.staff.sell']), function () {

    		/*----------------------------------------------------------------------------*/
			//Blogs
			/*----------------------------------------------------------------------------*/
			Route::group(array('prefix' => '/blog'), function () {
				Route::get('/', 'BlogsController@index');
				Route::get('create', 'BlogsController@create');
				Route::post('store', 'BlogsController@store');
				Route::post('destroy', 'BlogsController@destroy');
				Route::get('edit/{id}', 'BlogsController@edit');
				Route::post('update/{id}', 'BlogsController@update');
				Route::post('/active', 'BlogsController@active');
			});
			/*------------------------------------------------------------------------*/
			/* Product
			/*------------------------------------------------------------------------*/
			Route::group(array('prefix' => '/product'), function () {
				Route::get('/', 'ProductsController@productShow');
				Route::get('/create', 'ProductsController@create');
				Route::get('/edit/{id}', 'ProductsController@edit');
				Route::post('/store', 'ProductsController@store');
				Route::post('/update/{id}', 'ProductsController@update');
				Route::post('/destroy', 'ProductsController@destroy');
				Route::post('/active', 'ProductsController@active');
				Route::get('/search', 'ProductsController@search');

			});
			/*------------------------------------------------------------------------*/
			/* Bill  
			/*------------------------------------------------------------------------*/
			Route::group(array('prefix' => '/bill'), function () {
				Route::get('/', 'BillsController@billShow');
				Route::post('/destroy', 'BillsController@destroy');
				Route::get('/invoice/{id}', 'BillsController@invoice');
				Route::get('/print/{id}', 'BillsController@print');
				Route::post('/active', 'BillsController@active');
				Route::post('/update-status', 'BillsController@updateStatus');
				Route::post('/check-read', 'BillsController@checkRead');
			});
			/*------------------------------------------------------------------------*/
			/* Promotion
			/*------------------------------------------------------------------------*/
			Route::group(array('prefix' => '/promotion'), function () {
				Route::get('/', 'PromotionsController@index');
				Route::post('/store', 'PromotionsController@store');
				Route::post('/destroy', 'PromotionsController@destroy');
				Route::get('/create', 'PromotionsController@create');
				Route::get('/edit/{id}', 'PromotionsController@edit');
				Route::post('/update/{id}', 'PromotionsController@update');
				//Route::post('/de', 'BillsController@active');
				//Route::post('/check-read', 'BillsController@checkRead');
			});
			/*----------------------------------------------------------------------------*/
			//Image
			/*----------------------------------------------------------------------------*/
			Route::get('img/banner', 'ImagesController@index')->name('banner');
			Route::get('img/banner/create', 'ImagesController@create')->name('create');
			Route::post('img/banner/store', 'ImagesController@store')->name('store');
			Route::post('img/banner/destroy', 'ImagesController@destroy')->name('destroy');
			//Route::get('img/slide', 'HomesController@slide')->name('slide');
			/*----------------------------------------------------------------------------*/
			//Slider
			/*----------------------------------------------------------------------------*/
			Route::get('slider', 'SlideController@sliderShow')->name('slider');
			Route::get('slider/create', 'SlideController@create');
			Route::get('slider/edit/{id}', 'SlideController@edit');
			Route::post('slider/update/{id}', 'SlideController@update');
			Route::post('slider/destroy', 'SlideController@destroy');
			Route::post('slider/store', 'SlideController@store');
			Route::post('slider/active', 'SlideController@active');
    	});
		
		Route::group(array('middleware' => ['admin.auth', 'role.staff']), function () {
			/*------------------------------------------------------------------------*/
			/* Supplier
			/*------------------------------------------------------------------------*/
			Route::get('supplier', 'SupplierController@index');
			Route::get('supplier/create', 'SupplierController@create');
			Route::post('supplier/store', 'SupplierController@store');
			Route::get('supplier/edit/{id}', 'SupplierController@edit');
			Route::post('supplier/update/{id}', 'SupplierController@update');
			Route::post('supplier/destroy', 'SupplierController@destroy');
			Route::post('supplier/active', 'SupplierController@active');
			
			/*----------------------------------------------------------------------------*/
			//warehouse
			/*----------------------------------------------------------------------------*/
			Route::group(array('prefix' => '/warehouse'), function () {
				Route::get('/', 'WarehousesController@index');
			});
			/*----------------------------------------------------------------------------*/
			//warehouse
			/*----------------------------------------------------------------------------*/
			Route::group(array('prefix' => '/import-bills'), function () {
				Route::get('/', 'ImportbillController@index');
			});
		});
	});
});
/*-----------------------------------------------------------*/
/*-----------------------------------------------------------*/


Route::group(array('middleware' => ['auth']), function () {

});

Route::get('list-product.html', 'ProductsController@listView')->name('list-product');

Route::get('product-details/{id}', 'ProductsController@productDetail')->name('product-details');
Route::get('product-category/{id}', 'ProductsController@productCategory')->name('product-category');
Route::post('product/search', 'SearchsController@index')->name('product-search');
Route::get('product', 'ProductsController@productShow')->name('product-show');
Route::get('product-heart', 'ProductsController@productWishlist')->name('product-heart');
Route::get('track-order', 'ProductsController@trackOrder')->name('track-order');
Route::post('submit-track-order', 'ProductsController@submitTrackOrder');


Route::get('cart.html', 'CartsController@cart')->name('cart');
Route::get('grid-product.html', 'ProductsController@gridView')->name('grid-product');
Route::get('promotions', 'PromotionsController@index')->name('promotions');
Route::get('three-col.html', 'ProductsController@threeColumn')->name('three-col');
Route::get('four-col.html', 'ProductsController@fourColumn')->name('four-col');
Route::post('product-reviews', 'ProductsController@review')->name('product-reviews');
Route::get('insert', 'AdminCategoryController@insert')->name('insert');
Route::get('insertproduct', 'AdminCategoryController@insertProduct')->name('insertProduct');
/*----------------------------------------------------------------------------*/
//Cart
/*----------------------------------------------------------------------------*/
Route::get('load-cart', 'CartsController@loadCart')->name('load-cart-ajax');
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
Route::post('add-address','CartsController@address');
Route::post('update-address-default', 'CartsController@updateAddressDefault');
Route::post('checked-address-default', 'CartsController@checkedAddressDefault');
//Route::get('my-test-mail','HomesController@myTestMail');
/*----------------------------------------------------------------------------*/
//User
/*----------------------------------------------------------------------------*/

Route::get('user/login.html', 'AccountsController@login')->name('login');
Route::get('forgot-password', 'AccountsController@forgotPassword')->name('forgot-password');
Route::post('submit-forgot-password', 'AccountsController@forgotPasswordSubmit')->name('forgot-password-submit');
Route::get('submit-email', 'AccountsController@forgotPassword')->name('forgot-password');
Route::post('check-login', 'AccountsController@checkLogin')->name('check-login');
Route::post('check-register', 'AccountsController@checkRegister')->name('check-register');
Route::get('logout', 'AccountsController@logout')->name('logout');
//Route::get('user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');
Route::get('register/verify/{confirmation_code}', 'AccountsController@activateUser')->name('user.activate');
//Route::get('register/verify/{confirmation_code}', 'AccountsController@activateUser')->name('user.activate');

/*----------------------------------------------------------------------------*/
//Blogs
/*----------------------------------------------------------------------------*/
Route::get('blogs', 'BlogsController@index')->name('blogs');
Route::get('blogs/detail/{id}', 'BlogsController@detail')->name('blogs-detail');
Route::get('contact', 'ContactsController@contact')->name('contact');
Route::get('introduce', 'HomesController@introduce')->name('introduce');

//cái này chính là dùng cái có sẵn đó
//Auth::routes();

//Chưa làm mấy cái đó àdạ mấy cái dưới chwua làm
//Còn phần nào khó nữa ko coi chỉnh lại cái hiện ẩn với

Route::get('/ship', 'HomeController@index');
Route::get('abc', 'CartsController@index');
