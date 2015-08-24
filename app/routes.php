<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//echo 'trace';exit;

Route::get('index', function()
{
	$lastProduct = DB::table('product')->limit(8)->get();

	$topSell     =DB::table('basket_product')
										   ->leftJoin('basket' , 'basket_product.basketId'  , '=' , 'basket.id')
										  
										   ->leftJoin('product', 'basket_product.productId' , '=' , 'product.id')
										   
										   ->select('product.name', 'product.id' )
										   
										   ->orderBy(DB::raw('sum(basket.productCount*basket.price)' , 'DESC'))
										   
										   ->groupBy('product.id')
										   
										   ->limit(8)
										   
										   ->get();
	return View::make('index')
							->with('lastProducts' , $lastProduct)

							->with('$topSells'    , $topSell);
});

/*Route::get('basket', ['as'=>'basket' , function(){

	return View::make('basket');
}])	;	


Route::get('add-to-basket', [ 'as'=>'add.to.basket' , function()
{
	$pid    = Input::get('id');

	$pcount = Input::get('count');

	 

	$res    = DB::table('basket')
								-> where('sessionId', '=' , Session::getId())

								-> get();
	if($res==1)
	{
		$basket = $res->first();
	}

	else
	{
		$dt = new DateTime();

		$dt->format('Y-m-d H:i:s');

		DB::table('basket')->insert(

			array(
					'date'         => $dt , 
					'status'       => 1 , 
					'price'        => 0 , 
					'productCount' => 0 ,
				 	'sessionId'    => Session::getId()  
				 )

			);
		$res = DB::table('basket')
								-> where('sessionId', '=' , Session::getId())

								-> get();

	}

	


}])	;	*/						   
