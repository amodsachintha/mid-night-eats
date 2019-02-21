@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Auth::user()->password == '' || Auth::user()->password == null)

                <div class="alert alert-danger" role="alert">
                    Please secure your account with a <a href="#" class="btn-link" data-toggle="modal" data-target="#exampleModal">password</a>.
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create new Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('create.password')}}" method="post">
                                <div class="modal-body">
                                    @csrf()
                                    <div class="form-group">
                                        <label for="password1" class="col-form-label">Password:</label>
                                        <input type="password" class="form-control form-control-sm" id="password1" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password2" class="col-form-label">Confirm Password:</label>
                                        <input type="password" class="form-control form-control-sm" id="password2" name="password_confirmation" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Create Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif



            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
