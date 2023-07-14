<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function contactForm()
    {
        return view('contact.contactForm');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function storeContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required',
        ]);

        $input = $request->all();

        Contact::create($input);

        //  Send mail to admin
        \Mail::send('contactMail', array(
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'subject' => $input['subject'],
            'content' => $input['content'],
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('p.brown@tutanota.com', 'Admin')->subject($request->get('subject'));
        });

        return redirect()->back()->with(['success' => 'Message submitted! We will get in touch with you as soon as possible. ']);
    }
}