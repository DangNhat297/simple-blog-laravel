@extends('layout.client.master')

@section('title', 'Trang chủ')

@section('content')
 <!-- blog-slider-->
 <section class="blog blog-home4 d-flex align-items-center justify-content-center" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel">
                    @foreach ($posts as $i => $post)
                    @php if($i == 3) break; @endphp
                    <!--post3-->
                     <div class="blog-item" style="background-image: url('{{ $post->thumbnail }}')">
                        <div class="blog-banner">
                            <div class="post-overly">
                                <div class="post-overly-content">
                                    <div class="entry-cat">
                                        <a href="blog-layout-1.html" class="category-style-2">{{ $post->categories[0]->name }}</a>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="{{ route('single-post', ['slug' => $post->slug, 'id' => $post->id]) }}">{{ $post->title }}</a>
                                    </h2>
                                    <ul class="entry-meta">
                                        <li class="post-author"> <a href="author.html">{{ $post->author->name }}</a></li>
                                        <li class="post-date"> <span class="line"></span> {{ $post->publishedAt }}</li>
                                    </ul>
                                </div>   
                            </div>
                        </div>
                     </div>
                     <!--/-->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- top categories-->
<div class="categories">
    <div class="container-fluid">
        <div class="categories-area">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="categories-items">
                        @foreach ($categories as $cat)
                        <a class="category-item" href="#">
                            <div class="image">
                                <img src="{{ $cat->image }}" alt="">
                            </div>
                            <p>{{ $cat->name }}  <span>{{ $cat->posts->count() }}</span> </p>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--ads-->
<div class="ads ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="image">
                <img src="/client-assets/img/ads/ads.jpg" alt="">
            </div>
            </div>
        </div>
    </div>             
</div>


<!-- Recent articles-->
<section class="section-feature-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 oredoo-content">
                <div class="theiaStickySidebar">
                    <div class="section-title">
                        <h3>recent Articles </h3>
                        <p>Discover the most outstanding articles in all topics of life.</p>
                    </div>
            
                    @foreach ($posts as $post)
                    <!--post-->
                    <div class="post-list post-list-style4"> 
                        <div class="post-list-image">
                            <a href="{{ route('single-post', ['slug' => $post->slug, 'id' => $post->id]) }}">
                                <img src="{{ $post->thumbnail }}" alt="">
                            </a>
                        </div>
                        <div class="post-list-content">
                            <ul class="entry-meta"> 
                                <li class="entry-cat">
                                    <a href="blog-layout-1.html" class="category-style-1">{{ $post->categories[0]->name }}</a>
                                </li>
                                <li class="post-date"> <span class="line"></span> {{ $post->publishedAt }}</li>
                            </ul>
                            <h5 class="entry-title">
                                <a href="{{ route('single-post', ['slug' => $post->slug, 'id' => $post->id]) }}">{{ $post->title }}</a>
                            </h5> 
                        
                            <div class="post-btn">
                                <a href="{{ route('single-post', ['slug' => $post->slug, 'id' => $post->id]) }}" class="btn-read-more">Xem thêm <i class="las la-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                          
                    <!--pagination-->
                    {{-- <div class="pagination">
                        <div class="pagination-area">
                            <div class="pagination-list">
                                <ul class="list-inline">
                                    <li><a href="#" ><i class="las la-arrow-left"></i></a></li>
                                    <li><a href="#" class="active">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#" ><i class="las la-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    {{ $posts->links('vendor.pagination.custom') }}
                    {{-- @include('vendor.pagination.custom', ['paginator' => $posts]) --}}
                </div>
            </div>

            <!--Sidebar-->
            <div class="col-lg-4 oredoo-sidebar">
                <div class="theiaStickySidebar">
                    <div class="sidebar">
                        <!--search-->
                        <div class="widget">
                            <div class="widget-title">
                                <h5>Search</h5>
                            </div>
                            <div class=" widget-search">
                                <form action="https://assiagroupe.site/demo/html/template/oredoo/Oredoo/search.html">
                                    <input type="search" id="gsearch" name="gsearch" placeholder="Search ....">
                                    <a href="search.html" class="btn-submit"><i class="las la-search"></i></a>
                                </form>
                            </div>
                        </div>
                      
                         <!--popular-posts-->
                        <div class="widget">
                            <div class="widget-title">
                                <h5>popular Posts</h5>
                            </div>
                        
                            <ul class="widget-popular-posts">

                                @foreach ($popularPosts as $i => $post)
                                <!--post-->
                                <li class="small-post">
                                    <div class="small-post-image">
                                        <a href="{{ route('single-post', ['slug' => $post->slug, 'id' => $post->id]) }}">
                                            <img src="{{ $post->thumbnail }}" alt="">
                                            <small class="nb">{{ $i+1 }}</small>
                                        </a>
                                    </div>
                                    <div class="small-post-content">
                                        <p>
                                            <a href="{{ route('single-post', ['slug' => $post->slug, 'id' => $post->id]) }}">{{ $post->title }}</a>
                                        </p>
                                        <small> <span class="slash"></span>{{ $post->publishedAt }}</small>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>

                        <!--newslatter-->
                        <div class="widget widget-newsletter">
                            <h5>Subscribe To Our Newsletter</h5>
                            <p>No spam, notifications only about new products, updates.</p>
                            <form action="#" class="newslettre-form">
                                <div class="form-flex">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email Adress" required="required">
                                    </div>
                                    <button class="btn-custom" type="submit">Subscribe now</button>
                                </div>
                            </form>
                        </div>

                         <!--stay connected-->
                         <div class="widget ">
                            <div class="widget-title">
                                <h5>Stay connected</h5>
                            </div>
                            
                            <div class="widget-stay-connected">
                                <div class="list">
                                    <div class="item color-facebook">
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <p>Facebook 12k</p>
                                    </div>

                                    <div class="item color-instagram">
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <p>instagram 102k</p>
                                    </div>

                                    <div class="item color-twitter">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        <p>twitter 22k</p>
                                    </div>

                                    <div class="item color-youtube">
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                        <p>Youtube 120k</p>
                                    </div>

                                    <div class="item color-dribbble">
                                        <a href="#"><i class="fab fa-dribbble"></i></a>
                                        <p>dribbble 17k</p> 
                                    </div>

                                    <div class="item color-pinterest">
                                        <a href="#"><i class="fab fa-pinterest"></i></a>
                                        <p>pinterest 10k</p> 
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--Tags-->
                        <div class="widget">
                            <div class="widget-title">
                                <h5>Tags</h5>
                            </div>
                            <div class="widget-tags">
                                <ul class="list-inline">
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Nature</a>
                                    </li>
                                    <li>
                                        <a href="#">tips</a>
                                    </li>
                                    <li>
                                        <a href="#">forest</a>
                                    </li>
                                    <li>
                                        <a href="#">beach</a>
                                    </li>
                                    <li>
                                        <a href="#">fashion</a>
                                    </li>
                                    <li>
                                        <a href="#">livestyle</a>
                                    </li>
                                    <li>
                                        <a href="#">healty</a>
                                    </li>
                                    <li>
                                        <a href="#">food</a>
                                    </li>
                                    <li>
                                        <a href="#">interior</a>
                                    </li>
                                    <li>
                                        <a href="#">branding</a>
                                    </li>
                                    <li>
                                        <a href="#">web</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <!--Ads-->
                        <div class="widget pb-0">
                            <div class="widget-ads">
                                <img src="/client-assets/img/ads/ads2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/-->
        </div>
    </div> 
</section>
@endsection