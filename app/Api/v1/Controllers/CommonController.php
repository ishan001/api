<?php

namespace App\Api\v1\Controllers;

use App\Api\v1\Models\CarModel;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
Use App\Api\v1\Models\City;
Use App\Api\v1\Models\CarMake;

class CommonController extends RestController
{

    use Helpers;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCitites()
    {
        $cities = City::all();
        if($cities->count()){
            $ret = $this->showResponse($cities);
        }else{
            $error = 'No Cities available!';
            $ret = $this->errorResponse($error);
        }

        return $ret;
    }

    public function showCarMakes()
    {
        $makes = CarMake::all();
        if($makes->count()){
            $ret = $this->showResponse($makes);
        }else{
            $error = 'No Car Makes available!';
            $ret = $this->errorResponse($error);
        }

        return $ret;
    }

    public function showCarModels($make)
    {
        $models = CarModel::where('car_make_id',$make)->get();
        if($models->count()){
            $ret = $this->showResponse($models);
        }else{
            $error = 'No Car models available for this make';
            $ret = $this->errorResponse($error);
        }

        return $ret;
    }
}
