@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')

@section('content')
    <div class="content-wrapper">
        <div class="store-page-wrapper" data-controller="banner">

            <div class="store-header-wrapper">
                <div class="container visible">
                    {{-- <nav class="store-breadcrumbs">
                        <a href="/?locale=uk">Home</a>
                        <a href="/categories/travel-coupons?locale=uk">Travel</a>
                        <span class="active">{{ $feature->name }} </span>
                    </nav> --}}


                    <?php
//calculate cashback
$cashback=0;

if ($feature->stores->use_network == config('constants.stores.use_network') && $feature->stores->cashback_commission == config('constants.stores.commission') &&  $feature->stores->network_flat_switch == config('constants.stores.network_flat_switch_active'))
{
    $cashback=$feature->stores->network_flat_rate;

}
elseif ($feature->stores->use_network == config('constants.stores.use_network') && $feature->stores->cashback_commission == config('constants.stores.commission') && $feature->stores->network_flat_switch == config('constants.stores.network_flat_switch_dactive'))
{
    $cashback=cashback($feature->stores->network_cashback);

}

elseif( $feature->stores->use_skimlinks == config('constants.stores.use_skimlinks') &&$feature->stores->cashback_commission == config('constants.stores.commission') && $feature->stores->skimlinks_flat_rate == config('constants.stores.skimlinks_flat_rate_active')){
    $cashback=$feature->stores->skimlinks_min;

}
elseif( $feature->stores->use_skimlinks == config('constants.stores.use_skimlinks') &&$feature->stores->cashback_commission == config('constants.stores.commission') && $feature->stores->skimlinks_flat_rate == config('constants.stores.skimlinks_flat_rate_dactive')){
    $cashback=cashback($feature->stores->skimlinks_min);

}

 else{


}


?>

                    <header class="store-header">
                        <div class="left">
                            <div class="left">
                                <div class="logo-wrapper">
                                    <img class="logo" width="126px" height="64px"
                                        src="{{ asset('images/' . $feature->image) }}">
                                </div>
                            </div>
                            <div class="right">
                                <h1>{{ $feature->title }} Coupons &amp; Promo Codes</h1>
                                <div class="stats">
                                    @if($cashback !='0')
                                    <span class="stats-badge">
                                        <span class="hide-on-small">
                                            Coupons for
                                        </span>

                                        {{ $cashback }}% Cash Back


                                    </span>
                                    @endif
                                    <span class="icon icon-calendar">
                                        <span class="hide-on-small">Updated: {{ $feature->stores->updated_at }}</span>
                                        <span class="hide-on-medium">01/26/23</span>
                                    </span>

                                </div>
                            </div>
                        </div>
                        @if (Auth::check())
                            <div class="right actions">

                                <a onclick='track_store_like({{ $feature->id }})' id="like"
                                    class="data_id button secondary">

                                    <span class=" track_store has-icon right icon-heart"> Track Store</span>
                                </a>
                                <a onclick='track_store_dislike({{ $feature->id }})' id="dislike" style="height: 37px;"
                                    class="data_id button secondary">
                                    Track Store<img src="{{ asset('avatar/heart.svg') }}" alt=""
                                        style="height:16px; width:16px;margin-left:5px;margin-bottom:8px"class="right">

                                </a>


                            </div>
                        @else
                            <div class="right actions">

                                <a href="/users/sign_in?" class="button secondary" data-fancybox=""
                                    data-src="#modal-sign-in" data-source="store-page-get-notified"
                                    data-store-subscribe="40081"><span class="has-icon right icon-heart">Track
                                        Store</span></a>


                            </div>
                        @endif

                    </header>

                    <nav class="merchant-page-nav">
                        <a class="current" href="">
                            <div class="icon icon-coupons"></div>Coupon Codes<div class="badge blue">1</div>
                        </a>
                        <a class="" href="">
                            <div class="icon icon-referral"></div>Referral Program
                        </a>
                    </nav>
                </div>
            </div>




            <div id="merchant-page">


                <div class="merchant-page-wrapper design-2022 narrow narrow " data-banner-target="pageContent">
                    <div class="store-page">

                        @if (isset($feature->stores->custom_cashback_title) && $feature->stores->cashback_commission==config('constants.stores.commission'))

                            <div class="notice store-notice mb-md hide-on-small has-cashback">
                                <div class="icon bolt hide-on-small"></div>
                                <div class="content">
                                    <div class="left">
                                        <h6 class="nowrap">
                                            <span>
                                                <div class="icon bolt hide-on-medium"></div>
                                                <span>Don’t miss out!</span>
                                            </span>

                                        </h6>
                                        <p>{{ $feature->stores->custom_cashback_title }}  with an extra {{$cashback}}% in cash back.<br>

                                    </div>


                                    @if (!Auth::check())
                                            <a href="" target="_blank" class="button blue hide-on-small"data-fancybox="" data-src="#modal-sign-up">Activate</a>

                                    @endif
                                </div>
                                <!-- <div class="icon clear"></div> -->
                            </div>
                            @elseif (isset($feature->stores->custom_cashback_subtitle) && $feature->stores->cashback_commission!=config('constants.stores.commission'))
                            <div class="notice store-notice mb-md hide-on-small no-cashback">
                                <div class="content">
                                    <div class="left">
                                        <div class="flexcol">
                                            <h6>{{ $feature->stores->custom_cashback_subtitle }}</h6>

                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="icon clear"></div> -->
                            </div>

                        @else
                            <div class="notice store-notice mb-md hide-on-small no-cashback">
                                <div class="content">
                                    <div class="left">
                                        <div class="flexcol">
                                            <h6>Sorry, looks like {{ $feature->title }} doesn’t allow cash back at this
                                                time!</h6>
                                            <p>You can still use our verified {{ $feature->title }} coupon codes to save
                                                on your purchases.</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="icon clear"></div> -->
                            </div>
                        @endif







                        <header class="section-header">
                            <div class="left">
                                <h5>Shop {{ $feature->title }} Coupons, Promo Codes, &amp; Deals</h5>
                                <span class="flex">
                                </span>
                            </div>

                            <div class="right">

                            </div>
                        </header>
                        <?php
                        if($feature->stores->use_network==config('constants.stores.use_network'))

                        $link=$feature->stores->homepage_url;
                        if($feature->stores->use_skimlinks==config('constants.stores.use_skimlinks'))

                        $link=$feature->stores->affliated_url;
                        ?>


                        <section class="offer-stripes">
                            <?php $count = 0; ?>
                            @foreach ($offers as $offer)
                            @if($date<=$offer->end_date)
                            <div  class="offer-stripe  tappable  ">
                                <div class="right offer-stripe-main">
                                    <div class="left">
                                        <a href="{{$link}}" style="color:black">
                                        <h3>
                                            {{ $offer->title }}

                                        </h3>
                                    </a>

                                        <p>{{ $offer->description }}

                                        </p>

                                        <div class="tags">
                                            <span class="icon icon-verified">Verified</span>
                                            <span class="icon icon-star">Exclusive</span>
                                            <span>Used {{ random_time() }} times. Last used {{ random_days() }} day
                                                ago.</span>

                                            {{-- <span>Used 72 times. Last used 21 hours ago.</span> --}}
                                        </div>
                                    </div>
                                    <div class="right">
                                        <a href=""
                                            onclick="fencybox_value('{{ $offer->code }}','{{ $offer->title }}')"
                                            data-fancybox="" data-src="#offer" id="{{ $offer->id }}"
                                            target="_blank" class="button nomar coupon hide-on-small"><span>Get
                                                code</span></a>
                                        <span class="hide-on-medium arrow-icon">
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <?php $count++; ?>
                                @if ($count == 1)
                                    <div href="" class="offer-stripe  tappable  text-clipboard"
                                        data-offer-id="2399098">
                                        <div class="right offer-stripe-main">
                                            <div class="left">
                                                <h3>
                                                    Avon Offer

                                                </h3>

                                                <p>Enter to Win Makeup, Skincare and More.</p>

                                                <div class="tags">
                                                    <span class="icon icon-star">Exclusive</span>

                                                    <span>Used {{ random_time() }} times. Last used {{ random_days() }}
                                                        hour ago.</span>
                                                </div>
                                            </div>
                                            @if (!Auth::check())

                                                <div class="right">
                                                    <a href="" class="button secondary bordered nomar hide-on-small"
                                                        onclick="fencybox_value('','')" data-fancybox="" data-src="#offer"
                                                        id="">Activate</a>
                                                    <span class="hide-on-medium arrow-icon">
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endif
                            @endforeach

                            {{-- start premium offer --}}

                            <div href="" class="offer-stripe  tappable  text-clipboard"
                            data-offer-id="2399098">
                            <div class="right offer-stripe-main">
                                <div class="left">
                                    <h3>
                                        Grandrebates premium offers

                                    </h3>

                                    <p>Enter to Win more offers.</p>

                                    <div class="tags">
                                        <span class="icon icon-star">Exclusive</span>

                                        <span>Used {{ random_time() }} times. Last used {{ random_days() }}
                                            hour ago.</span>
                                    </div>
                                </div>
                                @if (!Auth::check())

                                    <div class="right">
                                        <a href="" class="button secondary bordered nomar hide-on-small"
                                            onclick="fencybox_value('','')" data-fancybox="" data-src="#offer"
                                            id="">Activate</a>
                                        <span class="hide-on-medium arrow-icon">
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
{{-- end premium offer --}}

                            @if ($feature->stores->show_amazon == '1')
                                <div class="offers-tab-title-wrapper">
                                    <div class="offers-tab-title"><span>Grandrebates Member Exclusive</span></div>
                                </div>


                                <div href="" data-offer-open-mobile="amazon-40081" data-affiliate-open-mobile=""
                                    class="offer-stripe tappable text-clipboard" data-offer-id="amazon-40081">
                                    <div class="right offer-stripe-main">
                                        <div class="left">
                                            <h3>39% off {{ $feature->name }} products</h3>

                                            <p>Get Up to 10% Off {{ $feature->name }} Items at Amazon + Free Shipping w/
                                                Prime</p>

                                            <div class="tags">
                                                <span class="icon icon-amazon">Amazon Deal</span>
                                                <span>Used 76 times. Last used 1 day ago.</span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <a href="" class="button nomar amazon hide-on-small"
                                                data-offer-open="amazon-40081" target="_blank">
                                                Shop at Amazon
                                            </a>
                                            <span class="hide-on-medium arrow-icon amazon">
                                                <span>at Amazon</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div href="" data-offer-open-mobile="ebay-40081" data-affiliate-open-mobile=""
                                    class="offer-stripe tappable text-clipboard" data-offer-id="ebay-40081">
                                    <div class="right offer-stripe-main">
                                        <div class="left">
                                            <h3>39% off {{ $feature->name }} products</h3>

                                            <p>Get Up to 10% Off {{ $feature->name }} Items at ebay + Free Shipping w/
                                                Prime</p>

                                            <div class="tags">
                                                <span class="icon icon-ebay">Save at eBay</span>
                                                <span>Used 76 times. Last used 1 day ago.</span>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <a href="" class="button nomar ebay hide-on-small"
                                                data-offer-open="ebay-40081" target="_blank">
                                                Shop at eBay
                                            </a>
                                            <span class="hide-on-medium arrow-icon ebay">
                                                <span>at eBay</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endif




                        </section>







                    </div>



                    {{-- <header class="section-header">
                        <div class="left">
                            <h5>{{ $feature->name }} Promo Codes: Timetable</h5>
                            <span class="flex">
                                <span class="subtitle icon icon-bolt"><span class="hide-on-small">You’ll earn</span> <span
                                        class="hide-on-medium">Earn</span> 6% Cash Back on every purchase at
                                    {{ $feature->name }} .</span>
                                <a href="@" data-affiliate-open="" class="button hollow blue small"
                                    target="_blank">Activate</a>
                            </span>
                        </div>

                        <div class="right">
                            <a href="/users/sign_in?locale=uk" data-fancybox="" data-src="#modal-sign-up"
                                data-source="section-header-track-store" data-store-subscribe="40081"
                                class="switch-wrapper">
                                <label class="label-switch" for="track_store_40081_62">
                                    <input type="checkbox" name="track_store_40081_62" id="track_store_40081_62"
                                        data-remote-on="/stores/horizn-studios-uk-discount-codes/subscription?locale=uk&amp;subscribe=true"
                                        data-remote-off="/stores/horizn-studios-uk-discount-codes/subscription?locale=uk&amp;subscribe=false"
                                        data-store-subscription="40081">
                                    <div class="checkbox"></div>
                                </label> <label for="track_store" class="switch-text small">
                                    <span>Track store</span>
                                    <span><span data-subscribers-counter-id="40081">121</span> Followers</span>
                                </label>
                            </a>
                        </div>
                    </header> --}}

                    {{-- <div class="table-wrapper">
                        <table class="coupon-table">
                            <thead>
                                <tr>
                                    <th>Promo Code</th>
                                    <th>Discount</th>
                                    <th>Description</th>
                                    <th>Date Issued</th>
                                    <th>
                                        Likely to Work?
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>MYSET20</td>
                                    <td>20% Off</td>
                                    <td style="min-width: 250px">Enjoy 20% Off two or more Luggage Sets

                                    </td>
                                    <td>
                                        09/01/2022<br>
                                        <small>5 months ago</small>
                                    </td>
                                    <td>
                                        <span class="text-warning">Maybe</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}

                    <article class="store-info mt-md row">

                        <div class="row collapse ">
                            <div class="col-md-6">
                                <h2 class="square-card-title">{{ $feature->title }} Promo Codes FAQ </h2>

                                <div class="square-card">
                                    <div class="faq-item">
                                        <p class="faq-title">🏷Where to Get Coupons for {{ $feature->title }}?</p>
                                        <p>Well, you are at the right place. You can find {{ $feature->title }} coupons at
                                            Grandrebates.com. Make sure to check {{ $feature->title }}’s social media accounts
                                            as
                                            sometimes they offer exclusive coupons from these channels. However, you’ll most
                                            likely find the same coupons across the web. Luckily, you are at Grandrebates so on
                                            top of saving with {{ $feature->title }} promo codes, you can also earn extra
                                            with
                                            {{ $feature->title }} cash back.</p>
                                    </div>
                                    <div class="faq-item">
                                        <p class="faq-title">🎟What is the best Promo Code {{ $feature->title }} has ever
                                            published?
                                        </p>
                                        <p>The highest discounted promo code for {{ $feature->title }} is 20% off. It was
                                            published in
                                            January, 2023.</p>
                                    </div>
                                    <div class="faq-item">
                                        <p class="faq-title">💵What is the best way to refer {{ $feature->title }} to my
                                            friends?</p>
                                        <p>Simply grab your referral URL from our {{ $feature->title }} promo code page and
                                            share it
                                            with your friends. You can also paste your link on forums and social media. Make
                                            sure to combine your link along with January, 2023 {{ $feature->title }}
                                            coupons.</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <h2 class="square-card-title">About {{ $feature->title }} Coupons</h2>

                                <div class="square-card">
                                    @if(isset($feature->stores->store_main_description) && ($feature->stores->show_store_description==1))
                                    {{$feature->stores->store_main_description}}<br><br>
                                    @endif
                                    @if(isset($feature->stores->description_about_section) && $feature->stores->show_store_description==1)
                                    {{$feature->stores->description_about_section}}<br><br>
                                    @endif

                                    @if ($feature->stores->show_store_description==null)
                                        <p>Whether you are looking for the most up to date {{ $feature->title }} promo
                                            codes, you came to
                                            the right place. Here at Grandrebates.com we work tirelessly to look for most up to
                                            date verified {{ $feature->title }} coupon codes. Today we have 5 active
                                            {{ $feature->title }} coupons
                                            at your disposal.</p>

                                        <p>At Grandrebates.com, not only you will find the best <a href=""
                                                target="_blank">{{ $feature->title }}</a> coupons and promo codes, but
                                            also save whenever
                                            you refer your favorite store to your friends. Just copy your unique referral
                                            URL
                                            and send it to your friends and we will pay you commission for every referral
                                            you
                                            make. Don’t forget to add {{ $feature->title }} coupons in addition to the URL
                                            so they save as
                                            well! </p>
                                    @endif
                                </div>


                            </div>
                        </div>






                    </article>
                </div>

            </div>

        </div>



        <!-- Button trigger modal -->
        <div class="modal multimodal modal-offer fancybox-content" id="model-hide"style="">

            <div class="modal" id="offer" style="max-width: 500px;position: static; height:auto">

                <div class="content">
                    <header>
                        <div>
                            <img style="width:200px"src="{{ asset('images/' . $feature->image) }}" alt="">
                        </div>
                        <div id="inner_value"></div>
                        <!-- <p><small>Take 25% Off EVERYTHING when you use this coupon code at Cannabolish.</small></p> -->

                        <p class="text-center">
                            <span class="text-green">Verified</span>
                        </p>
                    </header>

                    <p class="text-center">Tap the offer to copy the coupon code. Remember to paste the code when you check
                        out. Online only.</p>

                    <label class="copy-input" for="copy-code-input" id="hide_input_section">
                        <input type="text" name="" id="copy-code-input" class="dashed text-center"
                            value="">
                        <a href="javascript:;" class="clipboard button" id="copy-code" style="margin-left: 150px"
                            data-clipboard-text="">Copy</a>
                    </label>

                    <p class="text-center mt-10">Copy and paste this code at <a target="_blank" href=""
                            class="text-blue u">{{ $feature->title }}</a></p>

                </div>

                <div class="subscribe-to-store align-center">
                    <div class="text">
                        <p class="lead"><b>Never miss another coupon code.</b></p>
                        <p>Get notified when there’s another new top {{ $feature->title }} coupon.</p>
                    </div>
                    <a class="button hollow nomar" href="/?auth=sign_in" data-fancybox="" data-modal="false"
                        data-src="#modal-sign-up" data-fancybox-close-parent="" data-source="coupon-code">Sign up</a>
                </div>


            </div>





            <button type="button" data-fancybox-close="" class="fancybox-button fancybox-close-small"
                title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24">
                    <path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path>
                </svg></button>
        </div>

        <!-- Modal -->



    </div>




    <script>
        $(document).ready(function() {
            $("#dislike").hide();
            $("#model-hide").hide();
        });

        function fencybox_value(code, title) {



            $('#copy-code').attr('data-clipboard-text', code);
            $('#inner_value').html(title);
            $('#copy-code-input').val(code);
            $('#hide_input_section').show();
            if (code == '') {
                $('#hide_input_section').hide();
            }

        };
    </script>


    <script>
        function track_store_like(id) {
            var like = 0;
            $.ajax({
                url: "{{ route('track_store_ajaxcall') }}",
                type: "post",
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}',
                    'like': like,
                },

                success: function(res) {
                    if (res.success) {
                        console.log(res.success);
                        $("#like").hide();
                        $("#dislike").show();
                    }
                }
            });
        }

        function track_store_dislike(id) {
            var like = 1;
            $.ajax({
                url: "{{ route('track_store_ajaxcall') }}",
                type: "post",
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}',
                    'like': like,
                },

                success: function(res) {
                    if (res.success) {

                        $("#like").show();
                        $("#dislike").hide();

                    }
                }
            });
        }

        function activate() {
            $('#change_activate').text('Activated');

        }

        function activate_avon_offer() {
            $('#change_avon_offer_activate').text('Activated');

        }
    </script>

@endsection
