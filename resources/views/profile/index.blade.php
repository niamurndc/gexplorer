@extends('layouts.master')


@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">

            <div class="card p-3 bg-dark border border-secondary">
                <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data"> @csrf 
                <h3 class="border-bottom border-secondary mb-3">Profile</h3>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 text-start text-md-end col-form-label">Name</label>
                    <div class="col-sm-9">
                    <input type="text" readonly class="form-control form-control-sm" value="{{$user->name}}" id="name">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="github_id" class="col-sm-3 text-start text-md-end col-form-label">Github ID</label>
                    <div class="col-sm-9">
                    <input type="text" readonly class="form-control form-control-sm" value="{{$user->github_id}}" id="github_id">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-3 text-start text-md-end col-form-label">Email</label>
                    <div class="col-sm-9">
                    @if($user->email == null)
                    <span class="text-xs text-danger">Will not change after update</span>
                    @endif
                    <input type="email" @if($user->email != null) readonly @endif class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" id="email">
                    @error('email')
                    
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-sm-3 text-end"></div>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
