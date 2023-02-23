@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')
@section('content')


<div class="content-wrapper">

    <div class="container padded">
      <article>
        <header>
          <div class="article-meta">
            <div>
              <h5>Lifestyle</h5>
              <!-- <h5></h5> -->
            </div>
          </div>
          <h1>{{$single_post->name}}</h1>
          <div class="article-cover">
            <img title="How Companies Like Sonder &amp; AirBNB are Changing the Way We Travel" src="{{asset('images/'.$single_post->featured_image)}}">
          </div>
        </header>
        <div class="trix-content">
     <p>{!! $single_post->description  !!}</p>
    </div>

      </article>

      <!--
      <div id="comment-section">

        <header>
          <h3>Leave a comment</h3>
          <p>0 comments</p>
        </header>


        <div class="comments">
        </div>
      </div>
      -->

      <div class="suggested-articles">

    <div class="articles-page">
      <div class="article-filters">

        <ul>
          <li>
            <a class="" href="{{route('all_post')}}">All</a>
          </li>
          @foreach ($all_category as $category)
          <li><a class="" href="{{route('all_post',$category->id)}}">{{$category->name}}</a></li>
          @endforeach


        </ul>
      </div>

      <div class="article-main">
        <div class="articles-list">
          @foreach ($all_post as $post )


          <div class="article-preview">
      <div class="left">
        <a href="/blog/your-ultimate-guide-to-shein-2023" class="">
          <picture class="article-cover">

            <img src="{{asset('images/'.$post->featured_image)}}" alt="">
          </picture>
        </a>
      </div>
      <div class="right">
        <div class="article-meta">
          <div>
            <h5>Fashion</h5>
            <!-- <h5></h5> -->
          </div>
        </div>
        <a href="{{url('single_post/'.$post->id)}}">
            <h2>{{$post->name}}</h2>

   </a>
   <p class="card-text">{!! Str::limit($post->description,400) !!}</p>
      </div>
    </div>
    @endforeach

        </div>

      </div>
    </div>

      </div>
    </div>



          </div>


@endsection
