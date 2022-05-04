<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reviews;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Reviews::query()
            ->paginate(10);

        return view('admin.reviews.index', compact('reviews'));
    }
}
