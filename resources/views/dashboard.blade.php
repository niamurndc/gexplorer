@extends('layouts.master')


@section('content')
    @include('partials.search')

    <div class="card p-2 bg-dark border border-secondary">
        <div class="row mx-0">
            <div class="col-3 col-md-2 col-lg-1">
                <div class="h-100 d-flex justify-content-center align-items-center">
                    <img src="{{$user['avatar_url']}}" alt="profile-image" class="w-100 rounded">
                </div>
            </div>
            <div class="col-9 col-md-10 col-lg-11">
                <div class="d-flex justify-content-between aling-items-end flex-wrap">
                    <h1 class="mb-0">{{$user['login']}}</h1>
                    <div class="d-flex align-items-end my-2 my-md-0">
                        <span class="btn btn-success btn-sm">{{$user['public_repos']}} Repositories</span>
                    </div>
                </div>
                
                <h6>{{$user['name']}}</h6>

                <p>{{$user['bio']}}</p>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center flex-wrap mt-4 mb-3">
        <h5 class="mb-0">Repositories</h5>

        <!-- repos count-->
        @if(count($repos) > 0)
        <div class="col-md-4 text-end">Showing {{$active_page * $per_page - ($per_page - 1)}} to {{$total_repos < $active_page * $per_page ? $total_repos : $active_page * $per_page}} out of {{$total_repos}} repos</div>
        @endif
        <!-- repos count end -->
    </div>
    


    @forelse($repos as $repo)
        @include('partials.single-repo')
    @empty
    <!-- empty result -->
    <div class="border border-secondary p-2 mb-2 rounded h-100 text-center">
        <p class="text-secondary pt-2">No Repositories Found!</p>
    </div>
    @endforelse

    @if($page_count > 1)
    @include('partials.pagination')
    @endif
@endsection