<div class="rts-single-wized search">
    <div class="wized-header">
        <h5 class="title">
            Search here
        </h5>
    </div>
    <div class="wized-body">
        <form method="get" id="searchform" action="{{route('searchJob')}}">
            <div class="rts-search-wrapper">
                <input class="Search" type="text" id="s"
                       name="s" placeholder="Search Jobs.."  oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
                <button type="submit"><i class="fal fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
<div class="rts-single-wized Recent-post">
    <div class="wized-header">
        <h5 class="title">
            Recent Posts
        </h5>
    </div>
    <div class="wized-body">
        @foreach($latestJobs as $index => $latest)
            <div class="recent-post-single">
                <div class="thumbnail">
                    <a href="{{route('job.single',@$latest->slug)}}">
                        <img class="lazy" data-src="{{(@$latest->image) ? asset('/images/job/thumb/thumb_'.@$latest->image):  asset('assets/frontend/images/space.png') }}" alt=""></a>
                </div>
                <div class="content-area">
                    <div class="user">
                        <i class="fal fa-clock"></i>
                        <span>
                            @if(@$latest->end_date >= $today)
                                Expires on - {{date('M j, Y',strtotime(@$latest->end_date))}}
                            @else
                                Expired
                            @endif</span>
                    </div>
                    <a class="post-title" href="{{route('job.single',@$latest->slug)}}">
                        <h6 class="title">{{ucwords(@$latest->name)}}</h6>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
