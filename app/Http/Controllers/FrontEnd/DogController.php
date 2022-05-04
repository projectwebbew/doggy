<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\Reviews;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class DogController extends Controller
{
    public function index(Dog $dog, Reviews $reviews, User $user)
    {

        $reviews = Reviews::with('user') ->where('dog_id', $dog->id)

            ->get();

        return view('item.product', compact('dog', 'reviews'));
    }

    public function review(Request $request, Dog $dog): \Illuminate\Http\RedirectResponse
    {


//        $this->validate($request::all(),[
//            'user_id' => ['required', 'string', 'max:255'],
//            'dog_id' => ['required', 'string', 'max:255'],
//            'review' => ['required','string','max:1000','min:10'],
//        ]);

        $review = \App\Models\Reviews::create([
            'user_id' => $request::all()['user_id'],
            'dog_id' => $request::all()['dog_id'],
            'review' => $request::all()['review'], //шифровка пароля
            'status' => '1'
        ]);
        return redirect()->back()->with([
            'status' => 'Профиль обновлен успешно',
        ]);

    }
}
