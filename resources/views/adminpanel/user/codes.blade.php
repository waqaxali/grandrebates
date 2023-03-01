@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')

@section('content')
@push('meta')

<meta property="og:custom_meta_title" content="{{$store->custom_meta_title}}">
<meta property="og:custom_meta_description" content="{{$store->custom_meta_description}}">

@endpush


<?php
if(Auth::check()){
    if (Auth::user()->premium == config('constants.user.premium'))
        $cashback=cashback_calculate($store, true);
        else
        $cashback= cashback_calculate($store);
}

else
$cashback= cashback_calculate($store);


?>
    <div class="content-wrapper">
        <div class="store-page-wrapper" data-controller="banner">

            <div class="store-header-wrapper">
                <div class="container visible">
                    {{-- <nav class="store-breadcrumbs">
                        <a href="/?locale=uk">Home</a>
                        <a href="/categories/travel-coupons?locale=uk">Travel</a>
                        <span class="active">{{ $store->store_name }} </span>
                    </nav> --}}

                    <header class="store-header">
                        <div class="left">
                            <div class="left">
                                <div class="logo-wrapper">
                                    <img class="logo" width="126px" height="64px"
                                        src="{{ asset('images/' . $store->logo) }}">
                                </div>
                            </div>
                            <div class="right">
                                <h1>{{ $store->store_name }} Coupons &amp; Promo Codes</h1>
                                <div class="stats">
                                    @if ($cashback != '0')
                                        <span class="stats-badge">
                                            <span class="hide-on-small">
                                                Coupons for
                                            </span>

                                            {{ $cashback }}% Cash Back


                                        </span>
                                    @endif


                                    <span class="icon icon-calendar">
                                        <span class="hide-on-small">Updated: {{ $store->updated_at }}</span>
                                        <span class="hide-on-medium">01/26/23</span>
                                    </span>

                                </div>
                            </div>
                        </div>
                        @if (Auth::check())
                            <div class="right actions">

                                <a onclick='track_store_like({{ $store->id }})' id="like"
                                    class="data_id button secondary">

                                    <span class=" track_store has-icon right icon-heart"> Track Store</span>
                                </a>
                                <a onclick='track_store_dislike({{ $store->id }})' id="dislike" style="height: 37px;"
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


                        {{-- start of cashback activate  --}}
                        @if ( $store->cashback_commission == config('constants.stores.commission') && empty($store->custom_cashback_title))
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
                                    <p>You could combine these {{$store->store_name }} coupon codes  with an extra {{ $cashback }}% in cash
                                        back.<br>

                                    </p>

                                </div>
                                @if (!Auth::check())
                                    <a href="" onclick="pass_id_and_page_source({{$store->id}},'from_codes')" target="_blank" class="button blue hide-on-small"data-fancybox=""
                                        data-src="#modal-sign-up">Activate</a>
                                @endif

                            </div>
                            <!-- <div class="icon clear"></div> -->
                        </div>

                        @elseif (isset($store->custom_cashback_title) && $store->cashback_commission == config('constants.stores.commission'))
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
                                        <p>{{ $store->custom_cashback_title }} with an extra {{ $cashback }}% in cash
                                            back.<br>

                                        </p>

                                    </div>
                                    @if (!Auth::check())
                                        <a href=""  onclick="pass_id_and_page_source({{$store->id}},'from_codes')"  target="_blank" class="button blue hide-on-small"data-fancybox=""
                                            data-src="#modal-sign-up">Activate</a>
                                    @endif

                                </div>
                                <!-- <div class="icon clear"></div> -->
                            </div>
                        @elseif (isset($store->custom_cashback_subtitle) && $store->cashback_commission != config('constants.stores.commission'))
                            <div class="notice store-notice mb-md hide-on-small no-cashback">
                                <div class="content">
                                    <div class="left">
                                        <div class="flexcol">
                                            <h6>{{ $store->custom_cashback_subtitle }}</h6>

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
                                            <h6>Sorry, looks like {{ $store->store_name }} doesn’t allow cash back at this
                                                time!</h6>
                                            <p>You can still use our verified {{ $store->store_name }} coupon codes to save
                                                on your purchases.</p>
                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="icon clear"></div> -->
                            </div>
                        @endif
                        {{-- end of cashback activate  --}}


                        <header class="section-header">
                            <div class="left">
                                <h5>Shop {{ $store->store_name }} Coupons, Promo Codes, &amp; Deals</h5>
                                <span class="flex">
                                </span>
                            </div>


                        </header>

                        {{-- <a href="/uk/stores/horizn-studios-uk-discount-codes?all_coupons=40081"
                            data-affiliate-open="https://click.linksynergy.com/fs-bin/click?id=WN6MZoSkmIs&amp;u1=0v18985796xcbxszwebx40081&amp;offerid=623137.18&amp;type=3&amp;subid=0"
                            class="show-all-coupons">Show all coupon codes</a> --}}

                        <?php
                        if ($store->use_network == config('constants.stores.use_network')) {
                            $link = $store->homepage_url;
                        }
                        if ($store->use_skimlinks == config('constants.stores.use_skimlinks')) {
                            $link = $store->affliated_url;
                        }
                        ?>
{{-- {{dd(get_date()->toDateString());}} --}}
                        <section class="offer-stripes" data-has-more="content-list-item" data-show-count="6">
                            <?php $count = 0; ?>
                            @foreach ($offers as $offer)
                            @if(get_date()->toDateString()<=$offer->end_date)



                                <div class="offer-stripe  tappable  ">
                                    <div class="right offer-stripe-main">
                                        <div class="left">
                                            <a href="{{ $link }}" style="color:black">
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
                                                onclick="fencybox_value('{{ $offer->code }}','{{ $offer->title }}','{{ $store->id }}')"
                                                data-fancybox="" data-src="#offer" id="{{ $offer->id }}" target="_blank"
                                                class="button nomar coupon hide-on-small"><span>Get
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
                                                    15% off Extra Holidays Coupon

                                                </h3>

                                                <p>Get 15% off bookings when you enter this Extra Holidays coupon code.</p>

                                                <div class="tags">
                                                    <span class="icon icon-star">Exclusive</span>

                                                    <span>Used {{ random_time() }} times. Last used {{ random_days() }}
                                                        hour ago.</span>
                                                </div>
                                            </div>
                                            @if (!Auth::check())
                                                <div class="right">
                                                    <a href=""
                                                        class="button secondary bordered nomar hide-on-small"
                                                        onclick="fencybox_value('','','{{ $store->id }}')" data-fancybox=""
                                                        data-src="#offer" id="">Activate</a>
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
                            <div href="" class="offer-stripe  tappable  text-clipboard" data-offer-id="2399098">
                                <div class="right offer-stripe-main">
                                    <div class="left">
                                        <h3>
                                            Grandrebates premium offers

                                        </h3>

                                        <p>Enter to Win {{$cashback}} % cashback & commission</p>

                                        <div class="tags">
                                            <span class="icon icon-star">Exclusive</span>

                                            <span>Used {{ random_time() }} times. Last used {{ random_days() }}
                                                hour ago.</span>
                                        </div>
                                    </div>
                                    @if (!Auth::check())
                                        <div class="right">
                                            <a href="" class="button secondary bordered nomar hide-on-small"
                                                onclick="fencybox_value('','','{{ $store->id }}')" data-fancybox="" data-src="#offer"
                                                id="" >Activate</a>
                                            <span class="hide-on-medium arrow-icon">
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{-- end premium offer --}}
                            @if ($store->show_amazon == 1)
                                <div class="offers-tab-title-wrapper">
                                    <div class="offers-tab-title"><span>Grandrebates Member Exclusive</span></div>
                                </div>


                                <div href="" data-offer-open-mobile="amazon-40081" data-affiliate-open-mobile=""
                                    class="offer-stripe tappable text-clipboard" data-offer-id="amazon-40081">
                                    <div class="right offer-stripe-main">
                                        <div class="left">
                                            <h3>39% off {{ $store->store_name }} products</h3>

                                            <p>Get Up to 10% Off {{ $store->store_name }} Items at Amazon + Free Shipping
                                                w/
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
                                            <h3>39% off {{ $store->store_name }} products</h3>

                                            <p>Get Up to 10% Off {{ $store->store_name }} Items at ebay + Free Shipping w/
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
                            <h5>{{ $store->store_name }} Promo Codes: Timetable</h5>
                            <span class="flex">
                                <span class="subtitle icon icon-bolt"><span class="hide-on-small">You’ll earn</span> <span
                                        class="hide-on-medium">Earn</span> 6% Cash Back on every purchase at
                                    {{ $store->store_name }} .</span>
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
                                <h2 class="square-card-title">{{ $store->store_name }} Promo Codes FAQ </h2>

                                <div class="square-card">
                                    <div class="faq-item">
                                        <p class="faq-title">🏷Where to Get Coupons for {{ $store->store_name }}?</p>
                                        <p>Well, you are at the right place. You can find {{ $store->store_name }} coupons
                                            at
                                            Refermate.com. Make sure to check {{ $store->store_name }}’s social media
                                            accounts as
                                            sometimes they offer exclusive coupons from these channels. However, you’ll most
                                            likely find the same coupons across the web. Luckily, you are at refermate so on
                                            top of saving with {{ $store->store_name }} promo codes, you can also earn
                                            extra with
                                            {{ $store->store_name }} cash back.</p>
                                    </div>
                                    <div class="faq-item">
                                        <p class="faq-title">🎟What is the best Promo Code {{ $store->store_name }} has
                                            ever published?
                                        </p>
                                        <p>The highest discounted promo code for {{ $store->store_name }} is 20% off. It
                                            was published in
                                            January, 2023.</p>
                                    </div>
                                    <div class="faq-item">
                                        <p class="faq-title">💵What is the best way to refer {{ $store->store_name }} to
                                            my friends?</p>
                                        <p>Simply grab your referral URL from our {{ $store->store_name }} promo code page
                                            and share it
                                            with your friends. You can also paste your link on forums and social media. Make
                                            sure to combine your link along with January, 2023 {{ $store->store_name }}
                                            coupons.</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <h2 class="square-card-title">About {{ $store->store_name }} Coupons</h2>





                                <div class="square-card">

                                    {{-- {{dd($store->show_store_description);}} --}}
                                    @if (isset($store->store_main_description) && $store->show_store_description == 1)
                                        {{ $store->store_main_description }}<br><br>
                                    @endif
                                    @if (isset($store->description_about_section) && $store->show_store_description == 1)
                                        {{ $store->description_about_section }}<br><br>
                                    @endif

                                    @if ($store->show_store_description == null ||$store->description_about_section=='')
                                        <p>Whether you are looking for the most up to date {{ $store->store_name }} promo
                                            codes, you came to
                                            the right place. Here at Refermate.com we work tirelessly to look for most up to
                                            date verified {{ $store->store_name }} coupon codes. Today we have 5 active
                                            {{ $store->store_name }} coupons
                                            at your disposal.</p>

                                        <p>At Refermate.com, not only you will find the best <a href=""
                                                target="_blank">{{ $store->store_name }}</a> coupons and promo codes, but
                                            also save whenever
                                            you refer your favorite store to your friends. Just copy your unique referral
                                            URL
                                            and send it to your friends and we will pay you commission for every referral
                                            you
                                            make. Don’t forget to add {{ $store->store_name }} coupons in addition to the
                                            URL so they save as
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
        <div class="modal multimodal modal-offer fancybox-content" id="model-hide"style=" max-width:400px">

            <div class="modal" id="offer" style="max-width: 500px ;position: static; height:auto">

                <div class="content">
                    <header>
                        <div>
                            <img style="width:200px"src="{{ asset('images/' . $store->logo) }}" alt="">
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

                    {{-- <p class="text-center mt-10">Copy and paste this code at <a target="_blank" href=""
                            class="text-blue u">Cannabolish</a></p> --}}

                </div>

                <div class="subscribe-to-store align-center">
                    <div class="text">
                        <p class="lead"><b>Never miss another coupon code.</b></p>
                        <p>Get notified when there’s another new top Cannabolish coupon.</p>
                    </div>
                    <a class="button hollow nomar" href="/?auth=sign_in" data-fancybox="" data-modal="false"
                        data-src="#modal-sign-up" data-fancybox-close-parent="" data-source="coupon-code">Sign up</a>
                </div>

                <div class="cashback-area hide">
                    <h5>Get an extra 4.5% off Cannabolish with Cash Back</h5>
                    <a href="javascript:;" data-fancybox="" data-source="offer-combine" data-store-subscribe="39796"
                        data-type="ajax" data-src="" class="button small primary">Combine this Coupon with Cash
                        Back</a>
                    <footer>
                        <p>Already have an account? <a href="/users/sign_in" data-fancybox=""
                                data-src="#modal-sign-in">Log In</a></p>
                    </footer>
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

        var url = '{{ $store->affliated_url }}';
        console.log(url);
        $(document).ready(function() {
            $("#dislike").hide();
            $("#model-hide").hide();

            $('#hide_activated').hide();
        });

        function fencybox_value(code, title ,store_id) {

//put these value to register form
// $('#hidden_store_id').val(id);
// $('#hidden_from_codes').val(source);

            $('#copy-code').attr('data-clipboard-text', code);

            $('#inner_value').html(title);
            $('#copy-code-input').val(code);
            $('#hide_input_section').show();
            if (code == '') {
                $('#hide_input_section').hide();
            }
            if (store_id != '') {
                pass_id_and_page_source(store_id,'from_code')
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

        function pass_id_and_page_source(id,source) {
            console.log(id);
//send value to modal
$('#hidden_store_id').val(id);
$('#hidden_from_codes').val(source);
        }





    </script>
@endsection
