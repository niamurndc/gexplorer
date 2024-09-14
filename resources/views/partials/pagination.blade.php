<!-- pagination -->
@php
$page_link = '/dashboard?';
if($query != null){
    $page_link = '/dashboard?query='.$query.'&';
}
@endphp
<div class="d-flex justify-content-end">
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            <!-- prev button -->
            <li class="page-item @if($active_page == 1) disabled @endif">
            <a class="page-link bg-dark text-success border border-secondary" href="{{$page_link}}page={{$active_page - 1}}" aria-label="Previous">
                <i class="fa fa-chevron-left"></i>
            </a>
            </li>

            
            <!-- first page -->
            <li class="page-item"><a class="page-link bg-dark text-success border border-secondary" href="{{$page_link}}page=1">1</a></li>

            @if($page_count > 2)

            @if($active_page > 3)
            <!-- dot page -->
            <li class="page-item disabled"><a class="page-link bg-dark text-success border border-secondary" href="#">...</a></li>
            @endif

            <!-- current page -->
            @if($active_page == 1)
            <li class="page-item"><a class="page-link bg-dark text-success border border-secondary" href="{{$page_link}}page={{$active_page + 1}}">{{$active_page + 1}}</a></li>
            @elseif($active_page == $page_count)
            <li class="page-item"><a class="page-link bg-dark text-success border border-secondary" href="{{$page_link}}page={{$active_page - 1}}">{{$active_page - 1}}</a></li>
            @else
            @for($i = $active_page - 1; $i <= $active_page + 1; $i++)

            <!-- show previous and next page -->
            @if($i > 1 && $i < $page_count)
            <li class="page-item"><a class="page-link bg-dark text-success border border-secondary" href="{{$page_link}}page={{$i}}">{{$i}}</a></li>

            @endif
            @endfor
            @endif
            


            <!-- dot page -->
            @if($active_page < $page_count - 2)
            <li class="page-item disabled"><a class="page-link bg-dark text-success border border-secondary" href="#">...</a></li>
            @endif

            @endif

            <!-- last page -->
            <li class="page-item"><a class="page-link bg-dark text-success border border-secondary" href="{{$page_link}}page={{$page_count}}">{{$page_count}}</a></li>
            

            <!-- next button -->
            <li class="page-item @if($active_page == $page_count) disabled @endif">
            <a class="page-link bg-dark text-success border border-secondary" href="{{$page_link}}page={{$active_page + 1}}" aria-label="Next">
                <i class="fa fa-chevron-right"></i>
            </a>
            </li>
        </ul>
    </nav>
</div>
<!-- pagination end -->