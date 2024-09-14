<div class="border border-secondary p-2 mb-2 rounded h-100">
    <div class="row">
        <div class="col-md-10">
            <a href="{{$repo['html_url']}}" target="_blank"><h6 class="mb-1">{{$repo['name']}}</h6></a>
        </div>
        <div class="col-md-2 text-start text-md-end">
            <span class="badge bg-dark text-success border border-success rounded"><i class="fa fa-code"></i> {{$repo['language']}}</span>
        </div>
        
        
    </div>
    <p class="mb-1 pb-1">{{$repo['description']}}</p>
    <div class="d-flex">
        <span class="badge bg-success me-2 text-sm"><i class="fa fa-code-fork"></i> Forks: {{$repo['forks_count']}}</span>
        <span class="badge bg-success text-sm"><i class="fa fa-star-o"></i> Stars: {{$repo['stargazers_count']}}</span>
    </div>
</div>
