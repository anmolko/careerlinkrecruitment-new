<div class="rts-single-wized Recent-post service-list">
    <div class="wized-header">
        <h5 class="title">
            Recent Posts
        </h5>
    </div>
    <div class="wized-body">
        @foreach($slider_lists as $index => $latest)
            <div class="recent-post-single">
                <div class="thumbnail">
                    <a href="{{url('/slider-list/'.$latest->subheading)}}">
                        <img class="lazy"
                             data-src="{{ asset('/images/section_elements/list_1/thumb/thumb_'.$latest->list_image) }}" alt=""></a>
                </div>
                <div class="content-area">
                    <div class="user">
                        <i class="fal fa-clock"></i>
                        <span>{{date('j M, Y',strtotime(@$latest->created_at))}}</span>
                    </div>
                    <a class="post-title" href="{{url('/slider-list/'.$latest->subheading)}}">
                        <h6 class="title"> {{{ucwords(@$latest->list_header)}}}</h6>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
