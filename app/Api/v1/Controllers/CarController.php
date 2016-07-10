<?php

namespace App\Api\v1\Controllers;

use App\Api\v1\Models\Car;
use App\Api\v1\Models\MakeModel;
Use App\Api\v1\Models\City;
Use App\Api\v1\Models\Make;
use App\Api\v1\Models\Features;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use DB;


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
        $makes = Car::
            select(DB::raw('count(*) as make_count, cars.make_id'),'makes.make')
            ->join('makes', 'makes.id', '=', 'cars.make_id')
            ->groupBy('cars.make_id')
            ->having('cars.make_id', '>', 0)
            ->orderBy('makes.make')->get();
        if ($makes->count()) {
            $ret = $this->showResponse($makes);
        } else {
            $error = 'No Makes available!';
            $ret = $this->errorResponse($error);
        }

        return $ret;
    }


    public function showModels($make)
    {
        $models = Car::where('cars.make_id',$make)
            ->select(DB::raw('count(*) as model_count, cars.model_id'),'make_models.model')
            ->join('make_models', 'make_models.id', '=', 'cars.model_id')
            ->groupBy('cars.model_id')
            ->having('cars.model_id', '>', 0)
            ->orderBy('make_models.model')->get();
        if ($models->count()) {
            $ret = $this->showResponse($models);
        } else {
            $error = 'No models available!';
            $ret = $this->errorResponse($error);
        }

        return $ret;
    }

}
