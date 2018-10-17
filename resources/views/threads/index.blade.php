@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Forum Threads</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                       @foreach($threads as $thread)
                           <article>
                               <a href="{{$thread->path()}}">
                                  <div class="card-header">
                                   <h4>{{$thread->title}}</h4>
                                  </div>
                               </a>
                               <div class="card-body">{{$thread->body}}</div>
                           </article>
                       @endforeach
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
