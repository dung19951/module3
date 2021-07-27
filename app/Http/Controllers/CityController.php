<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $cities = City::all();
        return view('city.list', compact('cities'));
    }
    public function create(){
        return view('city.create');
    }
    public function store(Request $request){
        $city = new City();
        $city->name     = $request->input('name');
        $city->save();
        return redirect()->route('customers.index');
    }
    public function edit($id){
        $city = City::findOrFail($id);
        return view('city.edit', compact('city'));
    }

    public function update( Request $request,$id)
    {
$city=City::findOrFail($id);
$city->name = $request->input('name');
$city->save();
return redirect()->route('cities.index');
    }
    public function destroy($id){
        $city = City::findOrFail($id);
        $city->customers()->delete();
        $city->delete();
        return redirect()->route('cities.index');
    }
}
