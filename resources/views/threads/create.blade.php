@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a New Thread</div>

                 <div class="card-body">
                        <form method="post" action="/newthreads">
                         @csrf
                          <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" id="title" placholder="title">
                              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                          </div>

                          <div class="form-group">
                            <label for="Body">Body:</label>
                            <textarea name="body" id="body" class="form-control" rows="8"></textarea>
                          </div>

                              <button type="submit" class="btn btn-primary">Pubish</button>
                        </form>

                 </div>
                </div>
            </div>
        </div>
    </div>
@endsection
