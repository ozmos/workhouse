<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyData;
use Illuminate\Support\Facades\Log;

class PropertyDataController extends Controller
{
    /**
     * Display a listing of all properties.
     *
     * @return array
     */
    public function index(Request $request)
    {
        $properties = PropertyData::select("*")
            ->where(function ($query) use($request){
                if($request->name !=null){
                    $query->where('name', 'LIKE', "%{$request->name}%");
                }
                if($request->address !=null){
                    $query->where('address', 'LIKE', "%{$request->address}%");
                }
                if($request->bedrooms !=null){
                    $query->where('bedrooms', '=', $request->bedrooms);
                }
                if($request->bathrooms !=null){
                    $query->where('bathrooms', '=', $request->bathrooms);
                }
                if($request->garages !=null){
                    $query->where('garages', '=', $request->garages);
                }
                if($request->frontage !=null){
                    $query->where('frontage', '=', $request->frontage);
                }
                if($request->priceMin !=null && $request->priceMax !=null){
                    $query->whereBetween('price', [$request->priceMin, $request->priceMax]);
                }
            })
        ->get()
        ->toArray();

        return response()->json(
            $properties
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    // public function store(Request $request): string
    // {
    //     $property = new PropertyData([
    //         'name' => $request->get('name'),
    //         'address' => $request->get('address'),
    //         'price' => $request->get('price'),
    //         'bedrooms' => $request->get('bedrooms'),
    //         'bathrooms' => $request->get('bathrooms'),
    //         'garages' => $request->get('garages'),
    //         'frontage' => $request->get('frontage'),
    //         'image' => $request->get('image'),
    //         'special' => $request->get('special'),
    //         'featured' => $request->get('featured'),
    //     ]);
    //     $property->save();
    //     return response()->json('Property Created!');
    // }

}
