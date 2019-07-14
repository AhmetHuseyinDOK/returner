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
    //(new App\Models\Customer())->notify(); 
    return view('welcome');
});

// use App\Models\Customer;
// Route::get('/notify/{id}',function(){
//      return response(Customer::findOrFail(request()->id)->notify("deneme"));
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( [
     "prefix"=>"user",
     "middleware"=>"auth"
],function(){
     Route::get('/home', 'HomeController@index')->name('user.home');
     Route::group([
          'prefix' => 'clients',
      ], function () {
          Route::get('/', 'User\ClientsController@index')
          ->name('user.clients.client.index');
          Route::get('/create','User\ClientsController@create')
               ->name('user.clients.client.create');
          Route::get('/show/{client}','User\ClientsController@show')
               ->name('user.clients.client.show')->where('id', '[0-9]+');
          Route::get('/{client}/edit','User\ClientsController@edit')
               ->name('user.clients.client.edit')->where('id', '[0-9]+');
          Route::post('/', 'User\ClientsController@store')
               ->name('user.clients.client.store');
          Route::put('client/{client}', 'User\ClientsController@update')
               ->name('user.clients.client.update')->where('id', '[0-9]+');
          Route::delete('/client/{client}','User\ClientsController@destroy')
               ->name('user.clients.client.destroy')->where('id', '[0-9]+');
     });
});

Route::group(  [
     "prefix" => "admin",
     "middleware" => ["admin"]
],function(){
     Route::group([
          'prefix' => 'clients',
      ], function () {
          Route::get('/', 'ClientsController@index')
               ->name('clients.client.index');
          Route::get('/create','ClientsController@create')
               ->name('clients.client.create');
          Route::get('/show/{client}','ClientsController@show')
               ->name('clients.client.show')->where('id', '[0-9]+');
          Route::get('/{client}/edit','ClientsController@edit')
               ->name('clients.client.edit')->where('id', '[0-9]+');
          Route::post('/', 'ClientsController@store')
               ->name('clients.client.store');
          Route::put('client/{client}', 'ClientsController@update')
               ->name('clients.client.update')->where('id', '[0-9]+');
          Route::delete('/client/{client}','ClientsController@destroy')
               ->name('clients.client.destroy')->where('id', '[0-9]+');
      });
      
      Route::group([
          'prefix' => 'customers',
      ], function () {
          Route::get('/', 'CustomersController@index')
               ->name('customers.customer.index');
          Route::get('/create','CustomersController@create')
               ->name('customers.customer.create');
          Route::get('/show/{customer}','CustomersController@show')
               ->name('customers.customer.show')->where('id', '[0-9]+');
          Route::get('/{customer}/edit','CustomersController@edit')
               ->name('customers.customer.edit')->where('id', '[0-9]+');
          Route::post('/', 'CustomersController@store')
               ->name('customers.customer.store');
          Route::put('customer/{customer}', 'CustomersController@update')
               ->name('customers.customer.update')->where('id', '[0-9]+');
          Route::delete('/customer/{customer}','CustomersController@destroy')
               ->name('customers.customer.destroy')->where('id', '[0-9]+');
      });
      
      Route::group([
          'prefix' => 'baskets',
      ], function () {
          Route::get('/', 'BasketsController@index')
               ->name('baskets.basket.index');
          Route::get('/create','BasketsController@create')
               ->name('baskets.basket.create');
          Route::get('/show/{basket}','BasketsController@show')
               ->name('baskets.basket.show')->where('id', '[0-9]+');
          Route::get('/{basket}/edit','BasketsController@edit')
               ->name('baskets.basket.edit')->where('id', '[0-9]+');
          Route::post('/', 'BasketsController@store')
               ->name('baskets.basket.store');
          Route::put('basket/{basket}', 'BasketsController@update')
               ->name('baskets.basket.update')->where('id', '[0-9]+');
          Route::delete('/basket/{basket}','BasketsController@destroy')
               ->name('baskets.basket.destroy')->where('id', '[0-9]+');
      });
      
      Route::group([
          'prefix' => 'orders',
      ], function () {
          Route::get('/', 'OrdersController@index')
               ->name('orders.order.index');
          Route::get('/create','OrdersController@create')
               ->name('orders.order.create');
          Route::get('/show/{order}','OrdersController@show')
               ->name('orders.order.show')->where('id', '[0-9]+');
          Route::get('/{order}/edit','OrdersController@edit')
               ->name('orders.order.edit')->where('id', '[0-9]+');
          Route::post('/', 'OrdersController@store')
               ->name('orders.order.store');
          Route::put('order/{order}', 'OrdersController@update')
               ->name('orders.order.update')->where('id', '[0-9]+');
          Route::delete('/order/{order}','OrdersController@destroy')
               ->name('orders.order.destroy')->where('id', '[0-9]+');
      });
      
      Route::group([
          'prefix' => 'order_items',
      ], function () {
          Route::get('/', 'OrderItemsController@index')
               ->name('order_items.order_item.index');
          Route::get('/create','OrderItemsController@create')
               ->name('order_items.order_item.create');
          Route::get('/show/{orderItem}','OrderItemsController@show')
               ->name('order_items.order_item.show')->where('id', '[0-9]+');
          Route::get('/{orderItem}/edit','OrderItemsController@edit')
               ->name('order_items.order_item.edit')->where('id', '[0-9]+');
          Route::post('/', 'OrderItemsController@store')
               ->name('order_items.order_item.store');
          Route::put('order_item/{orderItem}', 'OrderItemsController@update')
               ->name('order_items.order_item.update')->where('id', '[0-9]+');
          Route::delete('/order_item/{orderItem}','OrderItemsController@destroy')
               ->name('order_items.order_item.destroy')->where('id', '[0-9]+');
      });
      
      Route::group([
          'prefix' => 'products',
      ], function () {
          Route::get('/', 'ProductsController@index')
               ->name('products.product.index');
          Route::get('/create','ProductsController@create')
               ->name('products.product.create');
          Route::get('/show/{product}','ProductsController@show')
               ->name('products.product.show')->where('id', '[0-9]+');
          Route::get('/{product}/edit','ProductsController@edit')
               ->name('products.product.edit')->where('id', '[0-9]+');
          Route::post('/', 'ProductsController@store')
               ->name('products.product.store');
          Route::put('product/{product}', 'ProductsController@update')
               ->name('products.product.update')->where('id', '[0-9]+');
          Route::delete('/product/{product}','ProductsController@destroy')
               ->name('products.product.destroy')->where('id', '[0-9]+');
      });
      
      Route::group([
          'prefix' => 'coupon_codes',
      ], function () {
          Route::get('/', 'CouponCodesController@index')
               ->name('coupon_codes.coupon_code.index');
          Route::get('/create','CouponCodesController@create')
               ->name('coupon_codes.coupon_code.create');
          Route::get('/show/{couponCode}','CouponCodesController@show')
               ->name('coupon_codes.coupon_code.show')->where('id', '[0-9]+');
          Route::get('/{couponCode}/edit','CouponCodesController@edit')
               ->name('coupon_codes.coupon_code.edit')->where('id', '[0-9]+');
          Route::post('/', 'CouponCodesController@store')
               ->name('coupon_codes.coupon_code.store');
          Route::put('coupon_code/{couponCode}', 'CouponCodesController@update')
               ->name('coupon_codes.coupon_code.update')->where('id', '[0-9]+');
          Route::delete('/coupon_code/{couponCode}','CouponCodesController@destroy')
               ->name('coupon_codes.coupon_code.destroy')->where('id', '[0-9]+');
      });
      
      Route::group([
          'prefix' => 'views',
      ], function () {
          Route::get('/', 'ViewsController@index')
               ->name('views.view.index');
          Route::get('/create','ViewsController@create')
               ->name('views.view.create');
          Route::get('/show/{view}','ViewsController@show')
               ->name('views.view.show')->where('id', '[0-9]+');
          Route::get('/{view}/edit','ViewsController@edit')
               ->name('views.view.edit')->where('id', '[0-9]+');
          Route::post('/', 'ViewsController@store')
               ->name('views.view.store');
          Route::put('view/{view}', 'ViewsController@update')
               ->name('views.view.update')->where('id', '[0-9]+');
          Route::delete('/view/{view}','ViewsController@destroy')
               ->name('views.view.destroy')->where('id', '[0-9]+');
      });
      
      Route::group([
          'prefix' => 'roles',
      ], function () {
          Route::get('/', 'RolesController@index')
               ->name('roles.role.index');
          Route::get('/create','RolesController@create')
               ->name('roles.role.create');
          Route::get('/show/{role}','RolesController@show')
               ->name('roles.role.show')->where('id', '[0-9]+');
          Route::get('/{role}/edit','RolesController@edit')
               ->name('roles.role.edit')->where('id', '[0-9]+');
          Route::post('/', 'RolesController@store')
               ->name('roles.role.store');
          Route::put('role/{role}', 'RolesController@update')
               ->name('roles.role.update')->where('id', '[0-9]+');
          Route::delete('/role/{role}','RolesController@destroy')
               ->name('roles.role.destroy')->where('id', '[0-9]+');
      });
      
});