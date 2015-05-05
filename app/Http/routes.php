<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/{pays}/{ville}', function($pays,$ville) {

	$nom_table="GeoPC_".$pays;
	
			$villes= DB::table($nom_table)->select(DB::raw('City, ZIP'));
	

	if (preg_match('#[0-9]#',$ville)){
		
									  $villes= $villes->where('ZIP','LIKE',"$ville%")
									  ->get();

	}else{
		$villes= $villes->where('City','LIKE',"$ville%")->get();

	}

	return Response::json($villes);
});

	Route::get('/', function() {
echo("hi! this is working bro");

});
