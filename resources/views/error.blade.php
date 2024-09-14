@extends('layouts.master')


@section('content')
    <div class="card p-2 my-5 bg-dark border border-secondary text-center">
        <h1><i class="fa fa-github"></i></h1>

        <h2>{{$status}}</h2>

        @if($status == 404)
            <p>Not Found</p>
        @elseif($status = 403)
            <p>Forbidden</p>
        @elseif($status = 304)
            <p>Not modified</p>
        @elseif($status = 422)
            <p>Validation failed, or the endpoint has been spammed.</p>  
        @else
            <p>Something went wrong</p>
        @endif
    </div>
@endsection