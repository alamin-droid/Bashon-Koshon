<?php

Route::get('/', 'FrontEnd\IndexController@index')->name('welcome');

Route::get('/kitchen', 'FrontEnd\KitchenController@index')->name('frontend_kitchen.index');
Route::get('/kitchen/cookware', 'FrontEnd\KitchenController@cookware')->name('frontend_kitchen.cookware');
Route::get('/kitchen/fryinpan', 'FrontEnd\KitchenController@fryinpan')->name('frontend_kitchen.fryinpan');
Route::get('/kitchen/kitchenstore', 'FrontEnd\KitchenController@kitchenstore')->name('frontend_kitchen.kitchenstore');
Route::get('/kitchen/D&D', 'FrontEnd\KitchenController@dishrak')->name('frontend_kitchen.DishRak_Drainer');
Route::get('/kitchen/F.C.B', 'FrontEnd\KitchenController@foodbox')->name('frontend_kitchen.foodcontantstor');
Route::get('/kitchen/pressurecookers', 'FrontEnd\KitchenController@pressurecooker')->name('frontend_kitchen.pressurecooker');
Route::get('/kitchen/tawas', 'FrontEnd\KitchenController@tawa')->name('frontend_kitchen.tawa');
Route::get('/kitchen/hotpot', 'FrontEnd\KitchenController@hotpot')->name('frontend_kitchen.hotpot');
Route::get('/kitchen/tiffine', 'FrontEnd\KitchenController@tiffinbox')->name('frontend_kitchen.stainsteltifin');



Route::get('/dining', 'FrontEnd\diningController@index')->name('frontend_dining.index');
Route::get('dining/dinner_set', 'FrontEnd\diningController@dinner')->name('frontend_dining.DinnerSet');
Route::get('/dining/fullplateset', 'FrontEnd\diningController@FullSet')->name('frontend_dining.FullPlateSet');
Route::get('/dining/buffetset', 'FrontEnd\diningController@buffet')->name('frontend_dining.chafingDish');
Route::get('/dining/casserole', 'FrontEnd\diningController@casserole')->name('frontend_dining.CasseroleDishest');
Route::get('/dining/servwere', 'FrontEnd\diningController@serve')->name('frontend_dining.ServeWare');
Route::get('/dining/cakeserve', 'FrontEnd\diningController@Cakeserve')->name('frontend_dining.CakeServingPlate');
Route::get('/dining/waterbottle', 'FrontEnd\diningController@waterbottle')->name('frontend_dining.WaterBottle');
Route::get('/dining/jugjug', 'FrontEnd\diningController@jug')->name('frontend_dining.jug&jugSet');
Route::get('/dining/cupset', 'FrontEnd\diningController@CupSet')->name('frontend_dining.CupSet');
Route::get('/dining/teacoffi', 'FrontEnd\diningController@teacoffi')->name('frontend_dining.TeaCoffiMug');
Route::get('/dining/kettle', 'FrontEnd\diningController@kettlytea')->name('frontend_dining.KettleTeaPot');
Route::get('/dining/caly', 'FrontEnd\diningController@calyset')->name('frontend_dining.CalySet');


//Route::resource('/products', BlogController::class);
Route::get('/product/create', 'FrontEnd\BlogController@index')->name('FrontEnd_product.contact');

Route::get('/lifestyle/tablecloth', 'FrontEnd\Lifestyle@tablecloth')->name('frontend_Lifestyle.tablecloth');
Route::get('/lifestyle/homedecore', 'FrontEnd\Lifestyle@homedecor')->name('frontend_Lifestyle.homedecor');
Route::get('/lifestyle/bedset', 'FrontEnd\Lifestyle@bedset')->name('frontend_Lifestyle.bedset');
Route::get('/lifestyle/cf', 'FrontEnd\Lifestyle@cf')->name('frontend_Lifestyle.canfurniture');
Route::get('/lifestyle/wf', 'FrontEnd\Lifestyle@wf')->name('frontend_Lifestyle.woodfurnuture');
Route::get('/lifestyle/wc', 'FrontEnd\Lifestyle@wc')->name('frontend_Lifestyle.woodcrafe');

Route::get('/bathroom/sd','FrontEnd\bathroom@bathroom')->name('frontend_bathroom.soapdispenser');
Route::get('/bathroom/bf','FrontEnd\bathroom@bf')->name('frontend_bathroom.bathroomfitings');
Route::get('/bathroom/ba','FrontEnd\bathroom@ba')->name('frontend_bathroom.bathroomaccessories');
Route::get('/bathroom/dl','FrontEnd\bathroom@dl')->name ('frontend_bathroom.door&locks');
