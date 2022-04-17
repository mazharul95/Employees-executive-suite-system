<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;


class StateController extends Controller
{
   
    public function index()
    {
        $states = State::all();
        
        return view('states.index', compact('states'));
    }

    
    public function create()
    {
        $countries = Country::all();
        return view('states.create', compact('countries'));
    }

    
    public function store(StateStoreRequest $request)
    {
        State::create($request->validated());

        return redirect()->route('states.index')->with('message', 'State Created Successfully');
    }

    
    public function edit(State $state)
    {
        $countries = Country::all();
        return view('states.edit',compact('state','countries'));
    }

    
    public function update(StateStoreRequest $request, State $state)
    {
        $state->update([
            'country_id' => $request->country_id,
            'name'       => $request->name
        ]);

        return redirect()->route('states.index')->with('message', 'State Updated Successfully');


    }

    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('states.index')->with('message', 'State Deleted Successfully');

    }
}
