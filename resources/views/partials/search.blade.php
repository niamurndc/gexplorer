<form action="{{route('dashboard')}}" method="get">
<div class="input-group mb-3">
    <input type="text" class="form-control border border-secondary bg-dark text-light" required placeholder="Search your repositories" aria-label="Search repositories" name="query" aria-describedby="button-addon2" value="{{$query}}">
    <button type="submit" class="btn btn-success" type="button" id="button-addon2"><i class="fa fa-search"></i> Search</button>
</div>
</form>