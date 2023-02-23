@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')

@section('content')
    <div class="content-wrapper">
        <div class="hero">
            <div class="container visible hero_container">

                @foreach ($sliders as $slider)
                    <div class="hero-content">
                        <div class="left">
                            <h1>{{ $slider->title }}</h1>
                            <p class="lead">{{ $slider->description }}.</p>
                            <div class="buttons">
                                <a href="javascript:void(0);" class="button medium primary" data-fancybox
                                    data-src="#modal-sign-up" data-source="testimonials">Sign up for free</a>
                                <a href="{{ $slider->url }}" target="_blank"
                                    class="hide-on-small button medium success-btn" rel="nofollow">{{ $slider->name }}</a>
                            </div>
                        </div>
                        <div class="image-wrapper">
                            <div class="hero-slider"><img src="{{ asset('images/' . $slider->image) }}"
                                    alt="Demo screenshot #1"></div>
                        </div>
                    </div>
                @endforeach
                <!--slide one ends here -->
                {{-- <div class="hero-content">
                    <div class="left">
                        <h1>Up to £1300 Cashback</h1>
                        <p class="lead">Thousands of shoppers and influencers use Grandrebates to earn cash back for
                            shopping & earn commission for referring at over 24,000+ brands & stores.</p>
                        <div class="buttons">
                            {{-- <a href="javascript:void(0);" class="button medium primary" data-fancybox
                                data-src="#modal-sign-up" data-source="testimonials">Sign up for free</a> --}}
                {{-- <a href="#" target="_blank" class="hide-on-small button medium success-btn"
                                rel="nofollow">Store Name</a>
                        </div>
                    </div>
                    <div class="image-wrapper">
                        <div class="hero-slider"><img src="{{ asset('images/slides/slide_1.jpg') }}"
                                alt="Demo screenshot #1"></div>
                    </div>
                </div>
                 --}}

            </div>
            <!--/hero_container-->


        </div>



        <div class="partners_logos">
            <div class="container">
                <div class="store-logos-slider">
                    <img src="https://i.cashbacksrv.com/cbfe-temp/p/brand-logos/amazon-brand-logo.svg">
                    <img src="https://i.cashbacksrv.com/cbfe-temp/p/brand-logos/argos-brand-logo.svg">
                    <img src="https://i.cashbacksrv.com/cbfe-temp/p/brand-logos/ebay-brand-logo.svg">
                    <img src="https://i.cashbacksrv.com/cbfe-temp/p/brand-logos/wilkos-brand-logo.svg">
                    <img src="https://i.cashbacksrv.com/cbfe-temp/p/brand-logos/boots-brand-logo.svg">
                    <img src="https://i.cashbacksrv.com/cbfe/p/a5e33fb45189e207e7e6eae6aa0d167c">
                    <img src="https://i.cashbacksrv.com/cbfe/p/de3f39a073a0942e246c463276800abe">
                    <img src="https://i.cashbacksrv.com/cbfe/p/4905342dfd427b5e7f7fb60b4c97ebc5">
                    <img src="https://i.cashbacksrv.com/cbfe-temp/p/brand-logos/amazon-brand-logo.svg">
                    <img src="https://i.cashbacksrv.com/cbfe-temp/p/brand-logos/argos-brand-logo.svg">
                    <img src="https://i.cashbacksrv.com/cbfe-temp/p/brand-logos/ebay-brand-logo.svg">
                    <img src="https://i.cashbacksrv.com/cbfe-temp/p/brand-logos/wilkos-brand-logo.svg">
                    <img src="https://i.cashbacksrv.com/cbfe-temp/p/brand-logos/boots-brand-logo.svg">
                    <img src="https://i.cashbacksrv.com/cbfe/p/a5e33fb45189e207e7e6eae6aa0d167c">
                    <img src="https://i.cashbacksrv.com/cbfe/p/de3f39a073a0942e246c463276800abe">
                    <img src="https://i.cashbacksrv.com/cbfe/p/4905342dfd427b5e7f7fb60b4c97ebc5">
                </div>
            </div>
        </div>
        <!--partners logos-->
        <section class="features section_one">
            <div class="container">
                <h2>Highest Cashback Made Easy!<br> <small>Every time you shop any of the brands on Randerebates, we'll
                        reward you a slice of commission as cashback</small></h2>
                <div class="feature-list">
                    <div class="feature-list-item">
                        <img src="packs/media/step-one-tutorial-m.webp" class="feature_images_">
                        <h3>Personalized savings</h3>
                        <p>We’ll notify you on price drops, new coupon alerts, and commission increases tailored to only the
                            brands and products you care about.</p>
                    </div>
                    <div class="feature-list-item">
                        <img src="packs/media/step-two-tutorial-m.webp" class="feature_images_">
                        <h3>Never pay full price again</h3>
                        <p>Get access to over 24,000 brands and 100K+ coupon codes. Grandrebates has the highest cash back
                            and commission rates so you can earn with confidence.</p>
                    </div>
                    <div class="feature-list-item">
                        <img src="packs/media/step-three-tutorial-m.webp" class="feature_images_">
                        <h3>Earn cash not points</h3>
                        <p>Grandrebates pays you in cash and not gift cards or points like those other guys. Take advantage
                            of the cash you’ll actually use.</p>
                    </div>
                </div>
                @if (!Auth::check())
                    <div class="btn-row"><a class="button-" data-fancybox="" data-src="#modal-sign-up" href="#">JOIN
                            NOW
                            FOR FREE</a></div>
            </div>
            @endif
        </section>

        <!--Featured Categories -->
        <div class="featured_cat">
            <div class="container">

                <h2 class="section-title">Featured Categories</h2>
                {{-- style tag will have to remove after testing --}}
                <div class="cat-wrapper featured_categories_slider" style="display: block">
                    @foreach ($home_feature_category as $category)
                    
                        <div class="cat-col">
                            <a href="{{ route('categories', $category->featureable_item_id) }}">
                                <img src="{{ asset('images/' . $category->image) }}" class="cal_logos">
                                <p>{{ $category->title }}</p>
                            </a>
                        </div>
                    @endforeach


                </div>
                <!--/cat-wrapper ends here-->
                <div class="clearfix"></div>
            </div>
            <!--/cat container ends here-->
        </div>
        <!--/featured Categories end here-->

        <div id="homepage-slides">


            <section id="featured-stores">
                <div class="container">
                    <header class="slide-header">
                        <h2>Featured Stores</h2>
                    </header>

                    <div class="slider homepage-slider slides-to-show-5">
                        @foreach ($home_feature_store as $feature)
                        @if($feature->stores->status==config('constants.status.is_active'))

                            <div class="slide-wrapper">
                                <!--slide coloumn 1 -->
                                <a href="{{ route('view_codes', [$feature->id, 'feature_store']) }}" class="slide-card">
                                    <picture class="image">
                                        <img src="{{ asset('images/' . $feature->image) }}" alt="">
                                    </picture>
                                    <h4>{{ $feature->title }}</h4>
                                    <p>{{ cashback_calculate($feature->stores) }}% commission & cash back</p>
                                </a>
                            </div>
                            @endif
                            <!--slide coloumn 1 end here -->
                        @endforeach
                    </div>
                </div>
            </section>


            <section id="shop_to_save">

                <div class="container">
                    <h2>SHOP TO SAVE OVER 40000+ STORES</h2>
                    <p>Earn cashback at your favourite places to shop online, from travel and tech to fashion and gadgets,
                        thousands of exclusive rates are available when you shop using Quidco. It’s completely safe, secure
                        and there are absolutely no hidden charges.</p>
                    <p>Our average member earns a whopping £280 per year. You can even choose how you get paid, directly to
                        your bank account, Paypal, or choose from hundreds of great gift cards with exclusive top-up
                        bonuses!</p>
                    @if (!Auth::check())
                        <div class="btn-row" style="margin-top:5%"><a class="button-" data-fancybox=""
                                data-src="#modal-sign-up" href="#">JOIN NOW FOR FREE</a></div>
                </div>
                @endif

                <!--container-->

                <section id="featured-deals" class="slider-section mt-30">
                    <div class="container">
                        <header class="slide-header">
                            <h2 class="section-title">Trending Deals</h2>

                        </header>

                        <div class="slider homepage-slider slides-to-show-4">
                            @foreach ($home_feature_deal as $deal)
@if($deal->stores->status==config('constants.status.is_active'))
                                <div class="slide-wrapper">
                                    <a href="{{ route('view_codes', [$deal->id, 'feature_deal']) }}" class="slide-card">
                                        <picture class="image">
                                            <img src="{{ asset('images/' . $deal->image) }}" alt="Watchfinder">
                                        </picture>
                                        <p>{{ cashback_calculate($deal->stores) }}% commission & cash back</p>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </section>
            </section>
            <!--/shop_to_save end here-->
        </div>
        <section id="faq">
            <div class="row">
                <div class="column">
                    <h2>FAQs about Grandrebates.</h2>

                    <ul class="accordion faq">
                        <li>
                            <nav class="js-accordion-trigger">How does Grandrebates work?</nav>
                            <div class="submenu">
                                <p>Grandrebates gets paid by brands to send them sales. We pass a portion of what they pay
                                    us to you. It’s that simple.</p>
                            </div>
                        </li>
                        <li>
                            <nav class="js-accordion-trigger">How does the Grandrebates Anywhere browser extension work?
                            </nav>
                            <div class="submenu">
                                <p>With the Grandrebates Anywhere app, you can use all the features of Grandrebates while
                                    you browse on your desktop computer or Safari browser for iOS (iPhone 6S and later
                                    models only). Supported browsers on the desktop are Google Chrome, Mozilla Firefox, and
                                    Safari.</p>
                            </div>
                        </li>
                        <li>
                            <nav class="js-accordion-trigger">Are there any hidden fees or costs?</nav>
                            <div class="submenu">
                                <p>Grandrebates will always be free to use. We get paid by brands to send them sales so
                                    there is no cost to you.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>


        <section id="testimanials">
            <div class="container">
                <h1>Experience the best way to earn.</h1>
                <p class="lead">Join the thousands of shoppers and influencers using Grandrebates to earn cash back for
                    shopping & commission for referring at over 24,000+ brands & stores.</p>
                @if (!Auth::check())
                    <div class="btn-row" style="margin-bottom:5%"><a class="button-" data-fancybox=""
                            data-src="#modal-sign-up" href="#">JOIN NOW FOR FREE</a></div>
                @endif
                <h2>Read what everyone’s saying </h2>
                <div class="testimonials">
                    <figure class="testimonial">
                        <div class="avatar">
                            <img loading="lazy" alt="Alan C." src="{{ asset('images/avatars/avatar-1.jpg') }}" />
                        </div>
                        <blockquote>I’ve already earned $1500 this month just by sharing product links to my Instagram
                            stories!</blockquote>
                        <figcaption>— Alan C.</figcaption>
                    </figure>

                    <figure class="testimonial">
                        <div class="avatar">
                            <img alt="Jason T." src="{{ asset('images/avatars/avatar-2.jpg') }}" />
                        </div>
                        <blockquote>Just checked Honey and was offered 50 points for a gift card. Never again. Just used
                            Grandrebates instead and earned $10 in cash back in addition to a 20% off coupon code. Total
                            savings: $24! I’m hooked!</blockquote>
                        <figcaption>— Jason T.</figcaption>
                    </figure>

                    <figure class="testimonial">
                        <div class="avatar">
                            <img alt="Sarah S." src="{{ asset('images/avatars/avatar-3.jpg') }}" />
                        </div>
                        <blockquote>I tried applying for other programs, but was turned away because I didn’t have enough
                            followers. Grandrebates is amazing because it really allowed me to start earning right away.
                        </blockquote>
                        <figcaption>— Sarah S.</figcaption>
                    </figure>
                </div>
            </div>
        </section>

    @endsection
