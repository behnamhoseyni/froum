<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\thread;



class threadController extends Controller
{
    protected $thread;

    public function __construct(thread $thread)
    {
        $this->thread=$thread;
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        $threads=thread::latest()->paginate(10);
        return view('threads.index',compact('threads'));
    }


    public function show($ChannelId,thread $thread)
    {
        return view('threads.show',compact('thread'));
    }

    public function create()
    {
        if (auth()->check()) {
            return view('threads.create');
        }else{
            return redirect('index');
        }
    }
    public function newthreads(Request $request)
    {
        $thread= new thread();
        $thread-> title = $request->get('title');
        $thread-> body = $request->get('body');
        $thread-> user_id = $request->get('user_id');

        $thread->save();

        return "ok";


    }

    protected function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'channel_id'=>'required|exists:channels,id'
        ]);

    $thread=thread::create([
        'user_id'=>auth()->id(),
        'title' => request('title'),
        'channel_id' => request('channel_id'),
        'body' => request('body'),
    ]);
    return redirect($thread->path());
    }

}
