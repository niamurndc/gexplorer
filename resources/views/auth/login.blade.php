@extends('layouts.app')

@section('contnet')
<div class="container vh-100">
    <div class="row d-flex justify-content-center h-100 align-items-center">
        
        <div class="col-md-4">
            <div class="card bg-dark border border-secondary p-3 text-center">
                <h2 class="text-center mb-4">GEXplorer</h2>
                <h5>Login</h5>

                <a href="{{route('github.login')}}" class="btn btn-light fw-bold my-4"><i class="fa fa-github"></i> Login with GitHub</a>
            </div>
        </div>
    </div>
</div>
@endsection
