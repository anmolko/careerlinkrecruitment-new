<div class="rts-single-wized Recent-post service-list">
    <div class="wized-header">
        <h5 class="title">
            Recent Posts
        </h5>
    </div>
    <div class="wized-body">
        @foreach($latestServices as $index => $latest)
            <div class="recent-post-single">
                <div class="thumbnail">
                    <a href="{{route('service.single',$latest->slug)}}">
                        <img class="lazy"
                             data-src="{{($latest->banner_image !== null) ? asset('/images/service/thumb/thumb_'.@$latest->banner_image):""}}" alt=""></a>
                </div>
                <div class="content-area">
                    <div class="user">
                        <i class="fal fa-clock"></i>
                        <span>{{date('j M, Y',strtotime(@$latest->created_at))}}</span>
                    </div>
                    <a class="post-title" href="{{route('service.single',$latest->slug)}}">
                        <h6 class="title">{{ucwords(@$latest->title)}}</h6>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
