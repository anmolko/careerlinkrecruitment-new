<div class="rts-single-wized search">
    <div class="wized-header">
        <h5 class="title">
            Search here
        </h5>
    </div>
    <div class="wized-body">
        <form method="get" id="searchform" action="{{route('searchBlog')}}">
            <div class="rts-search-wrapper">
                <input class="Search" type="text" id="s"
                       name="s" placeholder="Search Blogs.."  oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
                <button type="submit"><i class="fal fa-search"></i></button>
            </div>
        </form>
    </div>
</div>

@if(!empty($bcategories))
    <div class="rts-single-wized Categories">
        <div class="wized-header">
            <h5 class="title">
                Categories
            </h5>
        </div>
        <div class="wized-body">
            @foreach(@$bcategories as $bcategory)
                <ul class="single-categories">
                    <li><a href="{{route('blog.category',$bcategory->slug)}}">
                            {{ucwords(@$bcategory->name)}} ({{$bcategory->blogs->count()}}) <i class="fa fa-long-arrow-right"></i></a></li>
                </ul>
            @endforeach
        </div>
    </div>
@endif

<div class="rts-single-wized Recent-post">
    <div class="wized-header">
        <h5 class="title">
            Recent Posts
        </h5>
    </div>
    <div class="wized-body">
        @foreach($latestPosts as $index => $latest)
            <div class="recent-post-single">
                <div class="thumbnail">
                    <a href="{{route('blog.single',@$latest->slug)}}">
                        <img class="lazy" data-src="{{(@$latest->image) ? asset('/images/blog/thumb/thumb_'.@$latest->image):''}}" alt=""></a>
                </div>
                <div class="content-area">
                    <div class="user">
                        <i class="fal fa-clock"></i>
                        <span>{{date('j M, Y',strtotime(@$latest->created_at))}}</span>
                    </div>
                    <a class="post-title" href="{{route('blog.single',@$latest->slug)}}">
                        <h6 class="title">{{ucwords(@$latest->title)}}</h6>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
