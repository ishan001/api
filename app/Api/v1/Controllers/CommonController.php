<?php

namespace App\Api\v1\Controllers;

use App\Api\v1\Models\CarModel;
use App\Api\v1\Models\CategoryLevelOne;
use App\Api\v1\Models\CategoryLevelTwo;
use App\Api\v1\Models\Features;
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
    public function showCities()
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

    /**
     * show all vehicle makes
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showCarMakes()
    {
        $makes = CarMake::all();
        if ($makes->count()) {
            $ret = $this->showResponse($makes);
        } else {
            $error = 'No Car Makes available!';
            $ret = $this->errorResponse($error);
        }

        return $ret;
    }

    /**
     * show all vehicle models according to make
     * @param $make
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showCarModels($make)
    {
        $models = CarMake::find($make)->CarModels;
        if ($models->count()) {
            $ret = $this->showResponse($models);
        } else {
            $error = 'No Car models available for this make';
            $ret = $this->errorResponse($error);
        }

        return $ret;
    }

    public function showFeatures()
    {
        $features = Features::all();

        if ($features->count()) {
            $ret = $this->showResponse($features);
        } else {
            $error = 'No Features available for this categories!';
            $ret = $this->errorResponse($error);
        }

        return $ret;
    }
}
