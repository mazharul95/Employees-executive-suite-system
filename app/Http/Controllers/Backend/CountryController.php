<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;

class CountryController extends Controller
{
     public function index()
     {
         $countries = Country::all();
         return view('countries.index', compact('countries'));
     }

     public function create()
     {
         return view('countries.create');
     }
 
     public function store(CountryStoreRequest $request)
     {
         Country::create($request->validated());
 
         return redirect()->route('countries.index')->with('message', 'Country Created Successfully');
     }

}
