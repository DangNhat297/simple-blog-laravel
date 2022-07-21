@extends('layout.client.master')

@section('title', $post->title)

@section('content')
<!--post-single-->
<section class="post-single">
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-lg-12">
                <!--post-single-image-->
                    <div class="post-single-image">
                        <img src="{{ $post->thumbnail }}" style="width:100%;object-fit:cover" alt="{{ $post->title }}">
                    </div>
                      
                    <div class="post-single-body">
                        <!--post-single-title-->
                        <div class="post-single-title">  
                            <h2> {{ $post->title }} </h2>        
                            <ul class="entry-meta">
                                <li class="post-author-img"><img src="http://cdn.onlinewebfonts.com/svg/img_162386.png" alt=""></li>
                                <li class="post-author"> <a href="author.html">{{ $post->author->name }}</a></li>
                                <li class="post-date"> <span class="line"></span>{{ $post->publishedAt }}</li>
                            </ul>
                            
                        </div>

                        <!--post-single-content-->
                        <div class="post-single-content">
                            {!! $post->content !!}
                        </div>
                        
                        <!--post-single-bottom-->
                        <div class="post-single-bottom"> 
                            <div class="tags">
                                <p>Tags:</p>
                                <ul class="list-inline">
                                    @foreach ($post->categories as $cat)
                                    <li >
                                        <a href="#">{{ $cat->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="social-media">
                                <p>Share on :</p>
                                <ul class="list-inline">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>                      
                        </div>

                        <!--post-single-author-->
                        <div class="post-single-author ">
                            <div class="authors-info">
                                <div class="image">
                                    <a href="author.html" class="image">
                                        <img src="assets/img/author/1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h4>sarah smith</h4>
                                    <p> Etiam vitae dapibus rhoncus. Eget etiam aenean nisi montes felis pretium donec veni. Pede vidi condimentum et aenean hendrerit.
                                        Quis sem justo nisi varius.
                                    </p>
                                    <div class="social-media">
                                        <ul class="list-inline">
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" >
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" >
                                                    <i class="fab fa-pinterest"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($post->next || $post->previous)
                         <!--post-single-Related posts-->
                         <div class="post-single-next-previous">
                            <div class="row ">
                                <!--prevvious post-->
                                <div class="col-md-6">
                                    @if ($post->previous)
                                    <div class="small-post">
                                        <div class="small-post-image">
                                            <a href="{{ route('single-post', ['slug' => $post->previous->slug, 'id' => $post->previous->id]) }}">
                                                <img src="{{ $post->previous->thumbnail }}" alt="{{ $post->previous->title }}">
                                            </a>
                                        </div>
                        
                                        <div class="small-post-content">
                                        <small>  <a href="{{ route('single-post', ['slug' => $post->previous->slug, 'id' => $post->previous->id]) }}"> <i class="las la-arrow-left"></i>Bài viết trước</a></small>
                                        
                                        <p>
                                            <a href="{{ route('single-post', ['slug' => $post->previous->slug, 'id' => $post->previous->id]) }}">{{ $post->previous->title }}</a>
                                        </p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <!--/-->
                                <!--next post-->
                                <div class="col-md-6">
                                    @if ($post->next)
                                    <div class="small-post">
                                        <div class="small-post-image">
                                            <a href="{{ route('single-post', ['slug' => $post->next->slug, 'id' => $post->next->id]) }}">
                                                <img src="{{ $post->next->thumbnail }}" alt="{{ $post->next->title }}">
                                            </a>
                                        </div>
                        
                                        <div class="small-post-content">
                                            <small> <a href="{{ route('single-post', ['slug' => $post->next->slug, 'id' => $post->next->id]) }}">Bài viết sau <i class="las la-arrow-right"></i></a> </small>
                                            <p>
                                                <a href="{{ route('single-post', ['slug' => $post->next->slug, 'id' => $post->next->id]) }}">{{ $post->next->title }}</a>
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <!--/-->
                            </div>
                        </div>
                        @endif
                        <!--post-single-Ads-->
                        <div class="post-single-ads ">
                            <div class="ads">
                                <img src="assets/img/ads/ads.jpg" alt="">
                            </div>
                        </div>
                        
                        <!--post-single-comments-->
                        <div class="post-single-comments">
                            <!--Comments-->
                            <h4>{{ count($post->comments) }} Bình luận</h4>
                            <ul class="comments">
                                @foreach($post->comments as $comment)
                                <!--comment1-->
                                <li class="comment-item pt-0">
                                    <img src="https://wilcity.com/wp-content/uploads/2020/06/115-1150152_default-profile-picture-avatar-png-green.jpg" alt="">
                                    <div class="content">
                                        <div class="meta">
                                            <ul class="list-inline">
                                                <li><a href="#">{{ $comment->name }}</a> </li>
                                                {{-- <li class="slash"></li> --}}
                                                {{-- <li>3 Months Ago</li> --}}
                                            </ul>
                                        </div>
                                        <p>{{ $comment->content }}
                                        </p>
                                        {{-- <a href="#" class="btn-reply"><i class="las la-reply"></i> Reply</a> --}}
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <!--Leave-comments-->
                            <div class="comments-form">
                                <h4>Để lại lời nhắn</h4>
                                <!--form-->
                                <form class="form" action="" method="POST" id="main_contact_form">
                                    @csrf
                                    <p>Địa chỉ email của bạn sẽ không được xuất bản, Các hồ sơ bắt buộc được đánh dấu *.</p>
                                    @if (session()->has('success'))
                                    <div class="alert alert-success contact_msg" role="alert">
                                        {{ session()->get('success') }}.
                                    </div>
                                    @endif
                                    @if (session()->has('error'))
                                    <div class="alert alert-danger contact_msg" role="alert">
                                        {{ session()->get('error') }}.
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Họ và tên *" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email *" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="content" id="message" cols="30" rows="5" class="form-control" placeholder="Nội dung *" required="required"></textarea>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-12">
                                            <button type="submit" name="submit" class="btn-custom">
                                                Gửi bình luận
                                            </button>
                                        </div> 
                                    </div>
                                </form>
                                <!--/-->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection