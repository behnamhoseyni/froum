@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>
                  <a href="#"> {{$thread->creator->name}}</a> Posted:
                   {{$thread->title}}
                    </h4></div>
                    <div class="card-body">
                               <div class="body">{{$thread->body}}</div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">

                  @foreach($thread->replies as $reply)
                   @include('threads.reply')
                      @endforeach
               </div>
        </div>

 @if(auth()->check())
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class='notifications top-right'></div>
                <form method="post" action="/threads/{thread}/replies">
                    @csrf
                    <div class="form-group">
                     <textarea name="body" id="body" class="form-control"  rows="5">How Somthing to say? </textarea>
                        <input type="hidden" name="thread_id" value="{{$thread->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                    </div>

                    <button type="submit" class="btn btn-primary">Post</button>
                </form>

                @if(Session::has('success'))$('.top-right').notify({message: { text: "{{ Session::get('success') }}" } }).show();
                    @php
                        Session::forget('success');
                    @endphp
                @endif

               </div>
        </div>
 @else
            <div class="text-center">Please<a href="{{route('login')}}"> Sign </a>to participate in this discussion web!</div>
@endif
    </div>
@endsection
