@extends('layouts.app')

@section('contnet')
<div class="container vh-100">
    <div class="row d-flex justify-content-center h-100 align-items-center">
        <div class="col-md-4">
            <div class="card bg-dark border border-secondary p-3 text-center">
                <h3>Login</h3>

                <a href="{{route('github.login')}}" class="btn btn-light fw-bold my-4"><i class="fa fa-github"></i> Login with GitHub</a>
            </div>
        </div>
    </div>
</div>
@endsection