<?php

namespace App\Http\Controllers\Admin;

use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsribers = Subscription::all();
        return view('admin.subscribers.index',compact('subsribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=> 'email|required|unique:subscriptions'
        ]);

        Subscription::add($request->get('email'));
        return redirect()->route('subscribers.index');
    }


    public function destroy($id)
    {
        Subscription::find($id)->remove();
        return redirect()->route('subscribers.index');

    }
}
