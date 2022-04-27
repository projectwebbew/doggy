<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;
use Stripe;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function stripe(Request $request)
    {
        $total = $request->total;
        return view('stripe.stripe', [
            'total' => $total
        ]);
    }

    /**
     * success response method.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Stripe\Exception\ApiErrorException
     */
    public function stripePost(Request $request): RedirectResponse
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $request->total,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "This payment is tested purpose http://sobakaben.zu"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
