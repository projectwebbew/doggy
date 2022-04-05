<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use Illuminate\Support\Facades\Request;

class DogController extends Controller
{
    public function index (Dog $dog)
    {

        return view ('sections.section_slider', compact ('dog'));
    }
}
