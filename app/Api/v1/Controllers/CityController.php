<?php

namespace App\Api\v1\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
Use App\Api\v1\Models\City;

class CityController extends Controller
{

    use Helpers;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cities = City::all();
        return $this->response->array($cities->toArray())->setStatusCode(200);;
    }
}
