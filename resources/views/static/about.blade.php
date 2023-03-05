@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')

@section('content')
    <div class="content-wrapper">
        <section id="about-hero">
            <div class="row">
                <div class="medium-12">
                    <div class="decor hide-on-small"></div>
                    <div class="content">
                        <h1>A community built on Inspiration</h1>
                        <p>Grandrebates allows you to shop community-curated inspiration and save money while doing so. We
                            believe that Inspiration can come from anywhere, so we built Grandrebates as a platform for
                            everyone to contribute and share — while earning and saving money in the process.</p>
                    </div>
                    <div class="decor hide-on-medium"></div>
                </div>
            </div>
        </section>


        <section class="arc-peach">
            <div class="row">
                <div class="content">
                    <h4>Your favorite brands, products, and coupons are on Grandrebates </h4>
                    <div class="big-numbers">
                        <div class="big-number">
                            <h1>1K+</h1>
                            <h6>Brands and Stores</h6>
                        </div>
                        <div class="big-number">
                            <h1>20K+</h1>
                            <h6>Products and Inspiration</h6>
                        </div>
                        <div class="big-number">
                            <h1>20K+</h1>
                            <h6>Coupons and Offers</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section id="about-team">
    <div class="row">
    <div class="medium-12">
      <h4>Our Team</h4>
      <div class="team-members">

        <div class="team-member">
          <div class="photo bright"></div>
          <div class="content">
            <h4>Bright Williams</h4>
            <p>Co-Founder</p>
            <a href="https://Grandrebates.com/users/bright" class="button v2 hollow small">View Profile</a>
          </div>
        </div>

      </div>
    </div>
    </div>
    </section> -->

        <section id="get-in-touch">
            <div class="row">
                <div class="medium-12">
                    <h4 class="text-center">Get In Touch With Us</h4>
                    <div class="about-cards">
                        <div class="about-card">
                            <h4>Partnerships &amp; Careers</h4>
                            <p>Any questions regarding brand partnerships, influencer partnerships, or interested in career
                                opportunities? Drop us a line below.</p>
                            <a href="mailto:to.waqaxali@gmail.com" class="button v2 hollow mt-30">Send Us A Message</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <script type="application/ld+json">
{
"@context": "https://schema.org",
"@type": "Organization",
"url": "https://Grandrebates.com",
"logo": "https://Grandrebates.com/assets/logo-Grandrebates.svg"
}
</script> --}}

    </div>
@endsection
