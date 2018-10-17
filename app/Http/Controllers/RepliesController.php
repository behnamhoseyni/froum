<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\thread;
use Illuminate\Support\Facades\Redirect;
Use App\Model\Reply;
class RepliesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth'); 
    }
    public function reply(Request $request)
    {

        $reply= new reply();
        $reply-> body = $request->get('body');
        $reply-> thread_id = request('thread_id');
        $reply-> user_id = request('user_id');
        $reply->save();
        session()->put('success','Item created successfully.');
        return back();
    }
};
