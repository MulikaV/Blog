<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeMail;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request,[
            'email' => 'email|required|unique:subscriptions'
        ]);

        $subs = Subscription::add($request->get('email'));
        $subs->generateToken();
        Mail::to($subs)->send(new SubscribeMail($subs));

        return redirect()->back()->with('status','На вашу почту было отправлено письмо!');
    }

    public function verify($token)
    {

        $subscr = Subscription::where('token',$token)->firstOrFail();

        $subscr->verified();

        return redirect('/')->with('status','Вы подтвердили подписку. Спасибо!');
    }
}
