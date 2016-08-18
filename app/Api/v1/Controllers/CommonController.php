<?php

namespace App\Api\v1\Controllers;

use App\Api\v1\Models\MakeModel;
Use App\Api\v1\Models\City;
Use App\Api\v1\Models\Make;
use App\Api\v1\Models\Features;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;


class CommonController extends RestController
{

    use Helpers;

    /**
     * Show all the cities.
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
    public function showMakes()
    {
        $makes = Make::all();
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
    public function showModels($make)
    {
        $models = Make::find($make)->MakeModels;
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
    public function addData()
    {
        $names = ["Don't know",'Manual','Automatic','Tiptronic'];
        foreach($names as $name){
            $app =  new \App\Api\v1\Models\Transmission();
            $app->name = $name;
            $app->save();
        }



    }
}
