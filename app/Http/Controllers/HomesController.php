<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Home;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function index (Request $request, Dog $dog)
    {

        if (!empty($request->category_id_female) || !empty($request->category_id_male)) {
            $dogs = Dog::query ()
                ->sort($request)
                ->where ('gender', '=', $request->category_id_female)
                ->orWhere ('gender', '=', $request->category_id_male)
                ->paginate (6);
            return view ('header', ['dogs' => $dogs]);
        } else
            $dogs = Dog::query ()->paginate (6);

        return view ('header', ['dogs' => $dogs]);
    }

    public function create ()
    {
        //
    }

    public function store (Request $request)
    {
        //
    }

    public function show (Home $home)
    {
        //
    }

    public function edit (Home $home)
    {
        //
    }

    public function update (Request $request, Home $home)
    {
        //
    }

    public function destroy (Home $home)
    {
        //
    }

    public function dog (Request $request)
    {
        return $request;
    }

}
