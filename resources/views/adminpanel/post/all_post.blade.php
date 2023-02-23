@extends('adminpanel.layout.resources.header')
@section('content')
    <div class="content-wrapper">
        <div class="container large padded">

            <div class="articles-page">
                <div class="article-filters">

                    <ul>
                        <li>
                            <a class="is-active" href="{{ route('all_post') }}">All</a>
                        </li>
                        @foreach ($all_category as $category)
                            <li><a class="" href="{{ route('all_post', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach


                    </ul>
                </div>

                <div class="article-main">
                    <div class="articles-list">
                        @forelse ($all_post as $post)
                            <div class="article-preview">
                                <div class="left">
                                    <a href="blog/a-wonderful-christmas-at-gaylor-ice-hotels.html" class="">
                                        <picture class="article-cover">

                                            <img src="{{ asset('images/' . $post->featured_image) }}"
                                                alt="A Wonderful Christmas at Gaylor ICE Hotels">
                                        </picture>
                                    </a>
                                </div>

                                <div class="right">
                                    <div class="article-meta">
                                        <div>
                                            <h5>{{ $post->categories->name }}</h5>
                                            <!-- <h5></h5> -->
                                        </div>
                                    </div>
                                    <a href="{{ route('single_post', $post->id) }}">
                                        <h2>{{ $post->name }}</h2>
                                    </a>
                                    <p class="card-text">{!! Str::limit($post->description, 500) !!}</p>

                                </div>
                            </div>
                            <div style="clear:both"></div>
                        @empty
                            <p>No post found!</p>
                        @endforelse



                    </div>

                    <ul class="pagination">
                        <li></li>

                    </ul>

                </div>
            </div>

        </div>

    </div>
@endsection
@extends('adminpanel.layout.resources.modals')
