@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')

@section('content')
    <div class="content-wrapper">


        <div class="extension-page">
            <section class="hero-section text-center">
                <div class="mb-3"><img src="{{asset('avatar/grandrebates.png')}}" style="width:200px">|anywhere</div>
                <div class="text">
                    <h1>Never search for a coupon &amp; earn <span>cash back</span> everytime you shop online.</h1>
                    <p>Grandrebates Anywhere auto-applies coupons and finds you the best one. <br class="hide-on-small"> Combine
                        coupons with cash back. Get paid directly with Paypal.</p>
                </div>

                <div class="container">
                    {{-- <div class="hide-on-small">
                        <a href="""
                            data-ahoy="Extension download click"
                            data-ahoy-properties="{&quot;browser&quot;:&quot;Chrome&quot;,&quot;click_location&quot;:&quot;Anywhere landing page top&quot;}"
                            rel="nofollow" target="_blank" class="button button-ext-download">Add to Chrome for free</a>
                    </div> --}}
                    {{-- <div class="hide-on-medium">
                        <!-- <a href="mailto:?subject=Grandrebates anywhere - browser extension&body=Try out this extension: https://Grandrebates.com/anywhere" class="button button-ext-download">Send me the Desktop Link</a> -->
                        <a href="javascript:;" data-fancybox="" data-type="ajax" data-src="/anywhere_send_the_link .modal"
                            class="button button-ext-download">Send me the Desktop Link</a>
                    </div> --}}
                </div>

                {{-- <div class="extension-hero">
                    <video id="video" src="/videos/cashback_Grandrebates_5.mp4" loop="true" muted="true"
                        autoplay="true" playsinline=""></video>
                </div> --}}

                <footer class="container">
                    <h2>Earn cash, not points</h2>
                    <p>Other browser extensions like to pay you in gift cards or points. Grandrebates pays you in cold, hard
                        cash. We guarantee the highest cash back rates.</p>
                </footer>

            </section>


            <section class="features-section">
                <div class="container">
                    <h1 class="text-center">Full of features to help you save &amp; earn money</h1>
                </div>

                <div class="feature">
                    <div class="left">
                        <div class="feature-image feature-image-1"></div>
                    </div>
                    <div class="right">
                        <div class="content">
                            <h5>Coupons &amp; Cash Back</h5>
                            <h2>Auto-apply coupons &amp; earn cash back</h2>
                            <p>When you’re at the checkout page of your favorite store, Grandrebates Anywhere notifies you of
                                all available coupons, plus cash back. Hit apply and save with the best coupons &amp; get
                                your cash back.</p>

                            <blockquote>
                                <img src="/images/anywhere-landing/author2.png" alt="Gen C.">
                                <p>“Grandrebates allowed me to earn over $124 in cash back just from shopping this year.” — Gen
                                    C.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>


                <div class="feature">
                    <div class="left">
                        <div class="feature-image feature-image-2"></div>
                    </div>
                    <div class="right">
                        <div class="content">
                            <h5>Withdraw to PayPal</h5>
                            <h2>Get paid quickly &amp; securely with PayPal</h2>
                            <p>We process your earnings through PayPal so you can earn with peace of mind. Withdraw your
                                earnings at any time.</p>
                        </div>
                    </div>
                </div>


                <div class="feature">
                    <div class="left">
                        <div class="feature-image feature-image-3"></div>
                    </div>
                    <div class="right">
                        <div class="content">
                            <h5>Commission</h5>
                            <h2>Refer brands &amp; earn commission</h2>
                            <p>With Grandrebates Anywhere, anyone is an influencer. Get instant access to 18,000 brands to
                                refer from, instantly. We will pay you in cash for every sale you refer to. Get your unique
                                referral link with Grandrebates Anywhere and share it with your friends. Get paid when they
                                complete a purchase.</p>

                            <blockquote>
                                <img src="/images/anywhere-landing/author1.png" alt="Alex F.">
                                <p>“As a growing influencer, Grandrebates allowed me to easily refer brands with 1-click.” —
                                    Alex F.</p>
                            </blockquote>
                        </div>
                    </div>
                </div>



                <div class="feature">
                    <div class="left">
                        <div class="feature-image feature-image-4"></div>
                    </div>
                    <div class="right">
                        <div class="content">
                            <h5>Search Results</h5>
                            <h2>Compare directly within search results</h2>
                            <p>We’ll show you the best cash back and commission rates while you Google search.</p>
                        </div>
                    </div>
                </div>


                <div class="feature">
                    <div class="left">
                        <div class="feature-image feature-image-5"></div>
                    </div>
                    <div class="right">
                        <div class="content">
                            <h5>Alerts</h5>
                            <h2>Price drops &amp; coupon alerts</h2>
                            <p>We’ll notify you if a product goes on sale or if a brand offers a new coupon. Rest easy
                                knowing you’ll always get the best price.</p>
                        </div>
                    </div>
                </div>


            </section>



            <section class="testimonials">
                <h2>See what everyone’s saying</h2>

                <div class="testimonials-list">
                    <div class="testimonial">
                        <p>Already saved $55 in a month! Awesome extension!</p>
                        <p class="author">— Bright W.</p>
                    </div>

                    <div class="testimonial">
                        <p>Love the cash back on top of coupon codes!</p>
                        <p class="author">— Mike W.</p>
                    </div>

                    <div class="testimonial">
                        <p>As an influencer, this has helped me save time and earn extra money by making it much easier to
                            refer products.</p>
                        <p class="author">— Gen C.</p>
                    </div>

                    <div class="testimonial">
                        <p>The price drop alerts really saved me money. I saved $20 just by using Grandrebates (and that was
                            without the coupon!)</p>
                        <p class="author">— Ben K.</p>
                    </div>
                </div>
            </section>


            <section class="cta">
                <div class="container">
                    <h2>Don’t miss out on the easiest way to save &amp; earn money</h2>
                    <p>Grandrebates is free-to-use forever. Join us and our community of thousands of shoppers and influencers
                        today and start saving and earning money.</p>

                    {{-- <div class="container">
                        <div class="hide-on-small">
                            <a href="https://Grandrebates.com/download_extension?browser=Chrome&amp;click_location=Anywhere+landing+page+top"
                                data-ahoy="Extension download click"
                                data-ahoy-properties="{&quot;browser&quot;:&quot;Chrome&quot;,&quot;click_location&quot;:&quot;Anywhere landing page top&quot;}"
                                rel="nofollow" target="_blank" class="button button-ext-download">Add to Chrome for free</a>
                        </div>
                        <div class="hide-on-medium">
                            <a href="mailto:?subject=Grandrebates anywhere - browser extension&amp;body=Try out this extension: https://Grandrebates.com/anywhere"
                                class="button button-ext-download">Send me the Desktop Link</a>
                        </div>
                    </div> --}}

                </div>
            </section>

            <div class="stats-info">
                <h2>What Grandrebates members get access to:</h2>
                <div class="stats-list">
                    <div class="stat">
                        <h3>$126</h3>
                        <h4>Average Yearly Savings</h4>
                    </div>

                    <div class="stat">
                        <h3>20,000+</h3>
                        <h4>Brands &amp; Stores</h4>
                    </div>

                    <div class="stat">
                        <h3>18%</h3>
                        <h4>Average Discount</h4>
                    </div>

                    <div class="stat">
                        <h3>8%</h3>
                        <h4>Avg. Cash Back &amp; Commission</h4>
                    </div>


                </div>
            </div>

        </div>

    </div>
@endsection
