<?php

namespace App\Api\v1\Controllers;

use App\Api\v1\Models\Car;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use DB;


class SearchController extends RestController
{

    protected  $searchFields;
    protected  $order_by_map;
    use Helpers;

    public function __construct()
    {
        $this->searchFields = ['exterior_colour','interior_colour','cylinders','engine_size','description','model_details'];
        $this->order_by_map = array(
            'featured' => 'featured',
            '~price' => 'price',
            'price' => 'price',
            '~odometer' => 'odometer',
            'odometer' => 'odometer',
            '~year' => 'year',
            'year' => 'year',
            'updated' => 'updated_at'
        );
    }


    public function result(Request $request)
    {
        $limit = $request->input('limit') ?: 20;

        $query = $this->getQuery($request);

        $query = $this->getOrderBy($request,$query);

        $results = $query->paginate($limit);

        return $results;
    }

    private function getQuery(Request $request)
    {
        $searchFields = $this->searchFields;

        $make = $request->input('make');
        $model = $request->input('model');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $location = $request->input('location');
        $transmission = $request->input('transmission') ?: '';
        $fuel_type = $request->input('fuel_type') ?: '';
        $engine_min = $request->input('engine_min') ?: '';
        $engine_max = $request->input('engine_max') ?: '';
        $cylinders = $request->input('cylinders') ?: '';

        $keyword = $request->input('keyword');

        $query = Car::where('active',true);
        if(!empty($make)){
            $query->where('make_id',$make);
        }

        if(!empty($model)) {
            $query->where('model_id',$model);
        }

        if(!empty($min_price)) {
            $query->where('price','>=',$min_price);
        }

        if(!empty($max_price)) {
            $query->where('price','<=',$max_price);
        }

        if(!empty($transmission)) {
            $query->where('transmission_id',$transmission);
        }

        if(!empty($cylinders)) {
            $query->where('cylinders',$cylinders);
        }

        if(!empty($fuel_type)) {
            $query->where('fuel_type_id',$fuel_type);
        }

        if(!empty($engine_min)) {
            $query->where('engine_size','>=', $engine_min);
        }

        if(!empty($engine_max)) {
            $query->where('engine_size','<=', $engine_max);
        }

        if(!empty($location)) {
            $query->where('city_id',$model);
        }

        if(!empty($keyword)){
            $query->Where(function ($q) use ($searchFields,$keyword) {
                foreach($searchFields as $searchField){
                    $q->orwhere($searchField, 'like', '%'.$keyword.'%');
                }

            });
        }

        return $query;
    }

    private function getOrderBy($request,$query)
    {
        $order_by_map = $this->order_by_map;
        $order_by = $request->input('order_by') ?: 'featured';

        $sort = 'desc';

        if(strpos($order_by,"~") !== false){
            $sort = 'asc';
        }
        $query->orderBy($order_by_map[$order_by],$sort);

        return $query;
    }

}