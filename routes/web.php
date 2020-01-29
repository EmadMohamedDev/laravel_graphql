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

get_static_routes() ;
get_dynamic_routes();

Route::get('test',function(){
    //echo "dd";die;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "127.0.0.1:8000/graphql",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS =>"{\"query\":\"query {\\r\\n    users {\\r\\n        id\\r\\n        name\\r\\n    }\\r\\n}\",\"variables\":{}}",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json"
      ),
    ));
    $response = curl_exec($curl);

    curl_close($curl);
    return  dd($response);
});
