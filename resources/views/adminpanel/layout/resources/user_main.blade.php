<!DOCTYPE html>
<html lang="en-us">
<head>
<title>Grandebetes</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, width=device-width">

  <script src="{{asset('packs/js/application.js')}}"></script>
  <link rel="stylesheet" media="screen" href="{{asset('packs/css/application.css')}}"/>
  <link rel="stylesheet" media="screen" href="{{asset('packs/css/bootstrap.grid.utilities.v5.css')}}"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script defer="defer" type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="{{asset('packs/js/sliders.js')}}" data-turbolinks-track="reload" defer="defer"></script>


  <script defer="defer" type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script defer="defer" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <script defer="defer" src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</head>


<body class="page-users-overview controller-users signed-in with-sidebars">
    @include('sweetalert::alert')
<div class="sidebary">
    <div id="sidebar">
        <div class="sidebar-content">
            <a href="{{route('home')}}" class="">
                <img src="{{asset('avatar/grandrebates.png')}}" alt="AdminLTE Logo" class="brand-image " style="padding-left:20px;">
                {{-- <span class=" font-weight-light">Grandrebates   class="img-circle elevation-3"</span> --}}
              </a>
          <div class="top">
            <nav>
              <a href="{{route('home')}}" class="has-icon button-overview active"><span>Home</span></a>
              <a href="{{route('earnings')}}" class="has-icon button-earnings "><span>Earnings</span></a>
              <a href="{{route('stores')}}" class="has-icon button-search highlighted "><span>Explore</span></a>
              <a href="{{route('saves')}}" class="has-icon button-saves "><span>Saves</span></a>
              <a href="{{route('settings')}}" class="has-icon button-profile "><span>Settings</span></a>
              <a href="{{route('referrals')}}" ><i class="fa fa-users" style="font-size:22px"></i> &nbsp;&nbsp;&nbsp;&nbsp;Referrals</a>
              <a href="{{route('subscription')}}" ><i class="fa fa-money" style="font-size:22px"></i>&nbsp;&nbsp;&nbsp;&nbsp;Premium</a>
            </nav>
          </div>
          <div class="bottom">
            <nav>
              <a class="compact" href="#">Admin</a>
            </nav>
          </div>
        </div>
      </div>

<div class="main-content"><!--main-content-->
<div class="pre-footer"><!--/pre-footer-->

<div class="top-bar static-top-bar"> <!--top-bar static-top-bar-->
  <div class="top-bar-container">
    <a href="/" title="Refermate" class="logo hide-on-medium">
      <svg class="logo-type" width="118" height="25" viewBox="0 0 140 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.5117 18.0001L14.5037 11.7601C16.7117 10.9921 17.9597 9.40809 17.9597 6.76809C17.9597 3.38409 15.6077 1.20009 11.0477 1.20009H0.679688V18.0001H4.54369V12.3121H10.5677C10.5917 12.3121 10.6397 12.3121 10.6637 12.3121L14.2157 18.0001H18.5117ZM4.54369 4.17609H10.9037C13.3037 4.17609 14.0237 5.32809 14.0237 6.76809C14.0237 8.16009 13.2557 9.38409 10.9037 9.38409H4.54369V4.17609Z" fill="black"></path>
        <path d="M33.8831 12.5521C34.2671 7.15209 30.4031 4.87209 26.6831 4.87209C23.0111 4.87209 19.2431 6.88809 19.2431 11.6161C19.2431 16.3441 23.0591 18.3601 26.7071 18.3601C29.8751 18.3601 32.7791 17.0881 33.6191 13.8961H30.4031C29.8991 14.9761 28.6511 15.8401 26.7071 15.8401C24.0431 15.8401 22.8191 14.3041 22.5311 12.5521H33.8831ZM26.6831 7.36809C29.0831 7.36809 30.1631 8.61609 30.5471 10.1521H22.6511C23.1311 8.61609 24.4031 7.36809 26.6831 7.36809Z" fill="black"></path>
        <path d="M44.3257 3.04809V0.456087C43.5817 0.360086 43.0298 0.288086 42.1898 0.288086C37.9178 0.288086 37.0298 2.66408 37.0298 5.20809H34.8937V7.70409H37.0298V18.0001H40.6538V7.70409H43.9897V5.20809H40.6538C40.6538 2.95209 41.9497 2.85609 44.3257 3.04809Z" fill="black"></path>
        <path d="M59.6878 12.5521C60.0718 7.15209 56.2078 4.87209 52.4878 4.87209C48.8158 4.87209 45.0478 6.88809 45.0478 11.6161C45.0478 16.3441 48.8638 18.3601 52.5118 18.3601C55.6798 18.3601 58.5838 17.0881 59.4238 13.8961H56.2078C55.7038 14.9761 54.4558 15.8401 52.5118 15.8401C49.8478 15.8401 48.6238 14.3041 48.3358 12.5521H59.6878ZM52.4878 7.36809C54.8878 7.36809 55.9678 8.61609 56.3518 10.1521H48.4558C48.9358 8.61609 50.2078 7.36809 52.4878 7.36809Z" fill="black"></path>
        <path d="M70.3168 4.89609C67.5808 4.89609 66.0688 6.64809 65.5408 7.56009V5.20809H61.8928V18.0001H65.5408V11.9281C65.5408 9.93609 66.6448 8.04009 69.6688 8.04009C70.7728 8.04009 71.6368 8.25609 72.0928 8.44809H72.2128V5.08809C71.7808 4.96809 71.1568 4.89609 70.3168 4.89609Z" fill="black"></path>
        <path d="M91.0712 4.87209C88.2632 4.87209 86.8232 6.40809 86.3672 7.10409C85.6472 5.68809 84.1592 4.87209 81.9272 4.87209C79.3112 4.87209 78.2072 6.09609 77.7512 6.88809V5.20809H74.1272V18.0001H77.7512V10.4401C77.7512 8.95209 78.5192 7.58409 80.5592 7.58409C82.5992 7.58409 83.2712 8.90409 83.2712 10.4401V18.0001H86.9192V10.4401C86.9192 8.92809 87.6632 7.58409 89.7032 7.58409C91.7432 7.58409 92.4152 8.90409 92.4152 10.4401V18.0001H96.0632V9.52809C96.0632 6.64809 94.3592 4.87209 91.0712 4.87209Z" fill="black"></path>
        <path d="M105.308 4.87209C101.804 4.87209 99.2115 6.07209 98.8035 8.90409H102.212C102.404 8.01609 103.1 7.36809 105.308 7.36809C107.948 7.36809 108.548 8.35209 108.548 9.69609V10.2961C99.6195 9.74409 98.2275 11.9041 98.2275 14.5921C98.2275 17.1121 100.291 18.3601 103.291 18.3601C106.147 18.3601 107.996 17.1361 108.548 16.2961V18.0001H112.196V9.69609C112.196 5.92809 108.98 4.87209 105.308 4.87209ZM108.548 14.2561C107.876 15.3841 106.339 16.1521 104.371 16.1521C102.787 16.1521 101.899 15.6721 101.899 14.4721C101.899 12.6481 103.7 12.1921 108.548 12.4561V14.2561Z" fill="black"></path>
        <path d="M123.646 7.70409V5.20809H119.902V1.89609H116.254V5.20809H113.878V7.70409H116.254V13.0081C116.254 16.2001 117.142 18.1921 121.75 18.1921C122.59 18.1921 123.166 18.0721 123.646 18.0001V15.2641C120.67 15.5761 119.902 15.1681 119.902 13.0801V7.70409H123.646Z" fill="black"></path>
        <path d="M139.727 12.5521C140.111 7.15209 136.247 4.87209 132.527 4.87209C128.855 4.87209 125.087 6.88809 125.087 11.6161C125.087 16.3441 128.903 18.3601 132.551 18.3601C135.719 18.3601 138.623 17.0881 139.463 13.8961H136.247C135.743 14.9761 134.495 15.8401 132.551 15.8401C129.887 15.8401 128.663 14.3041 128.375 12.5521H139.727ZM132.527 7.36809C134.927 7.36809 136.007 8.61609 136.391 10.1521H128.495C128.975 8.61609 130.247 7.36809 132.527 7.36809Z" fill="black"></path>
      </svg>
      <svg class="logo-glyph" width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.048 22.4H25.024L19.776 14.24C22.624 13.152 24.256 11.008 24.256 7.552C24.256 2.976 20.896 0 14.688 0H0V22.4H6.368V15.104H13.504L18.048 22.4ZM6.368 4.544H14.496C17.44 4.544 17.792 6.496 17.792 7.552C17.792 8.608 17.408 10.592 14.496 10.592H6.368V4.544Z" fill="black"></path>
      </svg>
    </a>


<div class="search-container">
    <form action="/search" id="" method="get">
        <input id="search" class="" type="search" name="store_name" value=""
            placeholder="Start earning here"
            data-placeholder-desktop="Search for your favorite store or paste a specific product URL."
            data-placeholder-mobile="Start earning here" autocomplete="off">
        <div class="close-search"></div>
        <input type="submit" name=" " value="" class="large clear icon-search-url">
    </form>
  <div class="search-input-suggestions">
    {{-- <ul class="suggestions-search-result hide">
    </ul>
    <ul class="stores-search-result hide"></ul>
    <ul class="users-search-result"></ul>
    <ul class="categories-search-result"></ul>
    <ul class="products-search-result"></ul>
    <ul>
      <li><a href="javascript:;" class="submit-url" data-submit="#main-search-form">Add product</a></li>
    </ul> --}}
  </div>
</div>
<script>
    function count(array) {

        var c = 0;
        for (i in array)
            if (array[i] != undefined)
                c++;

        return c;
    }
    $('#search').on('keyup', function() {
        var store_name = $(this).val();
        var ul = ''
        $(".search-input-suggestions").html('');
        $.ajax({
            url: "{{ route('autocomplete_search') }}",
            type: "post",
            data: {
                'store_name': store_name,
                '_token': '{{ csrf_token() }}',

            },

            success: function(res) {
                $('.search-input-suggestions').show();
                var stores = eval(res.stores);

                var cashback = 0;
                $.each(stores, function(key, value) {
                    var total_offers = count(value.offers);
                    console.log(value.logo);
                    ul +=
                        '  <ul class="stores-search-result"><li><a href="{{ route('codes') }}/'+ value.id +'">';
                    ul +=
                        ' <span class="logo" ><img class="img-fluid mb-3" style="width:100px; height:65px" src="{{asset('images')}}/'+value.logo+'"></span>';
                    ul += '<div class="right">';
                    ul += '    <h5>' + value.store_name + '</h5>';
                    ul += '  <p><span>' + total_offers + ' Coupons &amp; Deals</span>';
                    // ul += '  <span class="divider"> | </span>';
                    // ul +=
                    //     '  <span class="text-accent">' + cashback +
                    //     '% Cash Back &amp; Commission</span>';
                    ul += ' </p>';
                    ul += ' </div></a>';
                    ul += '</li>';
                    ul += '</ul>';
                    //   ul+='<ul class="suggestions-search-result ">'+ value.store_name + '</ul>';


                });
                $('.search-input-suggestions').append(ul);
            }
        });

    });
</script>
    <div class="right top-bar-actions">

<div class="sticky" data-margin-top="24" data-sticky-class="is-sticky" data-sticky-for="1280" style="">
  <nav class="side-view-top-nav side-view-top-nav-top-bar ">
    <a href="#!" class="user sliding-menu-button">
      {{-- <div class="avatar has-photo" style="background-image: url('https://lh3.googleusercontent.com/a/ALm5wu2T3KJV-kHktRQtXXUOzlqD1UySi09pLSbYbYI4Yw=s96-c')">

          <div class="notification-badge" data-new-activity-badge="">1772</div>
      </div> --}}
      <div>
        <div class="username hide-on-small">{{Auth::user()->name}}</div>
        <div class="username hide-on-medium">•••</div>
        <div class="earnings">$0.00</div>
      </div>
    </a>
  </nav>
</div>
    </div>

  </div>

</div> <!--/top-bar static-top-bar end here-->





@yield('user_content')






</div><!--pre-footer end here-->
</div><!--/main-content end here-->
<!--RightSideBar-->
<div class="side-view ">


 {{-- @extends('adminpanel.layout.resources.user_right_sidebar') --}}
</div><!--/side-view end here-->

</div><!--pre-footer-->

@extends('adminpanel.layout.resources.user_mobile_right_sidebar')
</div><!--/sidebary-->


<footer id="footer">
<div class="container">
<div class="left">
<a href="" class="logo"></a>
<nav><a href="about.html">About</a>
<a href="#">Blog</a>
<a href="#">Stores</a>
<a href="#">Partner</a>
<a href="#">Privacy & Terms</a>
<a href="#" data-open-chat>Help</a>
<a href="#">Scholarship</a>
<a href="#" target="_blank">Jobs</a></nav>
</div>
</div>
</footer>



<script>
/***** for pricing table (tabs | monthly & yearly) ******/
$(document).ready(function() {
$("#monthly").click(function(){
        $(this).addClass('active');
        $("#yearly").removeClass('active')

        $(".monthlyPriceList").removeClass('d-none');
        $(".monthlyPriceList").addClass('fadeIn');
        $(".yearlyPriceList").addClass('d-none');

        $(".indicator").css("left","2px");
})

$("#yearly").click(function(){
        $(this).addClass('active');
        $("#monthly").removeClass('active');

        $(".yearlyPriceList").removeClass('d-none');
        $(".yearlyPriceList").addClass('fadeIn');
        $(".monthlyPriceList").addClass('d-none');

        $(".indicator").css("left","163px");
})
})
/***** for pricing table (tabs | monthly & yearly) ******/
</script>
@yield('use_content_js')

</body>
</html>
