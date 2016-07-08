<?php

namespace App\Api\v1\Controllers;

use App\Api\v1\Models\MakeModel;
Use App\Api\v1\Models\City;
Use App\Api\v1\Models\Make;
use App\Api\v1\Models\Features;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;


class CarController extends RestController
{

    use Helpers;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMakes()
    {
        $cities = City::all();
        if ($cities->count()) {
            $ret = $this->showResponse($cities);
        } else {
            $error = 'No Cities available!';
            $ret = $this->errorResponse($error);
        }

        return $ret;
    }

}
