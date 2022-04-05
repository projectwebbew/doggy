<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactFormsController extends Controller
{
    public function ContactUsForm (Request $request): RedirectResponse
    {

        // Form validation
        $this->validate ($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message' => 'required'
        ]);
        //  Store data in database
        ContactForm::create ($request->all ());
        \Mail::send ('mail', array (
            'name' => $request->get ('name'),
            'email' => $request->get ('email'),
            'phone' => $request->get ('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get ('message'),
        ), function ($message) use ($request) {
            $message->from ($request->email);
            $message->to ('admin@blog.ru', 'Admin')->subject ($request->get ('subject'));
        });
        return back ()->with ('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
