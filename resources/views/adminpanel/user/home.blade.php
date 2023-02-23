@extends('adminpanel.layout.resources.user_main')
@section('user_content')
    <div class="content-wrapper">

        <main>


            <section id="shop_to_save">

                <div class="container">
                    <h2>Welcome to Grandrebates, {{ Auth::user()->name }}! 👋</h2>
                    <p>Earn cashback at your favourite places to shop online, from travel and tech to fashion and gadgets,
                        thousands of exclusive rates are available when you shop using Quidco. It’s completely safe, secure
                        and there are absolutely no hidden charges.</p>
                    <p>Our average member earns a whopping £280 per year. You can even choose how you get paid, directly to
                        your bank account, Paypal, or choose from hundreds of great gift cards with exclusive top-up
                        bonuses!</p>


                </div>
                <!--container-->
            </section>



            <div class="card block floating">


                <section id="featured-stores">
                    <div class="container">
                        <header class="slide-header">
                            <h2>Featured Stores</h2>
                            <div class="slide-nav">
                                <nav class="slide-nav-prev"></nav>
                                <nav class="slide-nav-next"></nav>
                            </div>
                        </header>
                        <div class="slider homepage-slider slides-to-show-4">
                            @foreach ($home_feature_store as $feature)
                            <?php
                            //calculate cashback
                            $cashback = 0;

                            if ($feature->stores->use_network == config('constants.stores.use_network') && $feature->stores->cashback_commission == config('constants.stores.commission') && $feature->stores->network_flat_switch == config('constants.stores.network_flat_switch_active')) {
                                $cashback = $feature->stores->network_flat_rate;
                            } elseif ($feature->stores->use_network == config('constants.stores.use_network') && $feature->stores->cashback_commission == config('constants.stores.commission') && $feature->stores->network_flat_switch == config('constants.stores.network_flat_switch_dactive')) {
                                $cashback = cashback($feature->stores->network_cashback);
                            } elseif ($feature->stores->use_skimlinks == config('constants.stores.use_skimlinks') && $feature->stores->cashback_commission == config('constants.stores.commission') && $feature->stores->skimlinks_flat_rate == config('constants.stores.skimlinks_flat_rate_active')) {
                                $cashback = $feature->stores->skimlinks_min;
                            } elseif ($feature->stores->use_skimlinks == config('constants.stores.use_skimlinks') && $feature->stores->cashback_commission == config('constants.stores.commission') && $feature->stores->skimlinks_flat_rate == config('constants.stores.skimlinks_flat_rate_dactive')) {
                                $cashback = cashback($feature->stores->skimlinks_min);
                            } else {
                            }
                            ?>
                                <div class="slide-wrapper">
                                    <a href="{{ route('view_codes', [$feature->id, 'feature_store']) }}" class="slide-card">
                                        <picture class="image">
                                            <img src="{{ asset('images/' . $feature->image) }}" alt="Watchfinder">
                                        </picture>
                                        <p>{{ $cashback }}% commission &amp; cash back</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <div class="card block floating">
                <section id="featured-stores">
                    <div class="container">
                        <header class="slide-header">
                            <h2>Top Deals</h2>
                            <div class="slide-nav">
                                <nav class="slide-nav-prev"></nav>
                                <nav class="slide-nav-next"></nav>
                            </div>
                        </header>
                        <div class="slider homepage-slider slides-to-show-4">
                            @foreach ($home_feature_deal as $feature_deal)
                            <?php
                            //calculate cashback
                            $cashback = 0;

                            if ($feature_deal->stores->use_network == config('constants.stores.use_network') && $feature_deal->stores->cashback_commission == config('constants.stores.commission') && $feature_deal->stores->network_flat_switch == config('constants.stores.network_flat_switch_active')) {
                                $cashback = $feature_deal->stores->network_flat_rate;
                            } elseif ($feature_deal->stores->use_network == config('constants.stores.use_network') && $feature_deal->stores->cashback_commission == config('constants.stores.commission') && $feature_deal->stores->network_flat_switch == config('constants.stores.network_flat_switch_dactive')) {
                                $cashback = cashback($feature_deal->stores->network_cashback);
                            } elseif ($feature_deal->stores->use_skimlinks == config('constants.stores.use_skimlinks') && $feature_deal->stores->cashback_commission == config('constants.stores.commission') && $feature_deal->stores->skimlinks_flat_rate == config('constants.stores.skimlinks_flat_rate_active')) {
                                $cashback = $feature_deal->stores->skimlinks_min;
                            } elseif ($feature_deal->stores->use_skimlinks == config('constants.stores.use_skimlinks') && $feature_deal->stores->cashback_commission == config('constants.stores.commission') && $feature_deal->stores->skimlinks_flat_rate == config('constants.stores.skimlinks_flat_rate_dactive')) {
                                $cashback = cashback($feature_deal->stores->skimlinks_min);
                            } else {
                            }
                            ?>
                                <div class="slide-wrapper">
                                    <a href="{{ route('view_codes', [$feature_deal->id, 'feature_deal']) }}"
                                        class="slide-card">
                                        <picture class="image">
                                            <img src="{{ asset('images/' . $feature_deal->image) }}" alt="Watchfinder">
                                        </picture>
                                        <p>{{ $cashback }}% commission &amp; cash back</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <div class="card block floating hide">
            </div>
        </main>
    </div>
@endsection


