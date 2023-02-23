@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')
@section('content')
    <div class="content-wrapper">
        <section class="padded" id="stores-page">
            <div class="container row">

                <div class="column">

                    <h2>Categories</h2>
                    <div class="hs-wrapper">
                        <div class="hs-items">
                            @foreach ($all_category as $category)
                                <a href="{{ route('categories', $category->id) }}" class="hs-item">
                                    <img style="height: 200px;" src="{{ asset('images/' . $category->featured_image) }}"
                                        alt="Baby &amp; Kids">

                                    <h3>{{ $category->name }}</h3>
                                </a>
                            @endforeach
                        </div>
                    </div>


                    <div class="title-w-search">
                        <h2>All stores</h2>

                        <div class="search-container">
                            {{-- <form action="/search" id="main-search-form" method="get">
                                <svg width="49" height="24" viewBox="0 0 49 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.74272 4.80009C8.46969 4.80009 7.24879 5.3058 6.34861 6.20598C5.44844 7.10615 4.94272 8.32705 4.94272 9.60009C4.94272 10.8731 5.44844 12.094 6.34861 12.9942C7.24879 13.8944 8.46969 14.4001 9.74272 14.4001C11.0158 14.4001 12.2367 13.8944 13.1368 12.9942C14.037 12.094 14.5427 10.8731 14.5427 9.60009C14.5427 8.32705 14.037 7.10615 13.1368 6.20598C12.2367 5.3058 11.0158 4.80009 9.74272 4.80009ZM2.54272 9.60009C2.54258 8.46693 2.8099 7.34974 3.32293 6.33938C3.83596 5.32902 4.58023 4.45401 5.4952 3.78552C6.41017 3.11703 7.47 2.67394 8.5885 2.49229C9.707 2.31063 10.8526 2.39554 11.9321 2.74011C13.0116 3.08468 13.9945 3.67917 14.8009 4.47524C15.6073 5.27132 16.2145 6.24649 16.5729 7.32145C16.9314 8.39641 17.0311 9.5408 16.8639 10.6616C16.6967 11.7823 16.2673 12.8478 15.6107 13.7713L21.3911 19.5517C21.6097 19.778 21.7307 20.0811 21.7279 20.3958C21.7252 20.7104 21.599 21.0114 21.3765 21.2339C21.154 21.4564 20.853 21.5826 20.5384 21.5853C20.2238 21.588 19.9206 21.4671 19.6943 21.2485L13.9151 15.4693C12.838 16.2352 11.5707 16.6899 10.2523 16.7834C8.93393 16.877 7.61521 16.6058 6.44068 15.9997C5.26616 15.3935 4.28115 14.4757 3.59359 13.3469C2.90604 12.2181 2.54247 10.9218 2.54272 9.60009Z"
                                        fill="#374151"></path>
                                    <path
                                        d="M34.3147 10.1719C35.0649 9.42204 36.0821 9.00077 37.1427 9.00077C38.2034 9.00077 39.2206 9.42204 39.9707 10.1719L43.9707 14.1719C44.3528 14.5409 44.6575 14.9823 44.8671 15.4703C45.0768 15.9583 45.1871 16.4832 45.1917 17.0143C45.1964 17.5454 45.0952 18.0722 44.894 18.5637C44.6929 19.0553 44.3959 19.5019 44.0203 19.8775C43.6448 20.2531 43.1981 20.5501 42.7066 20.7512C42.215 20.9523 41.6883 21.0535 41.1571 21.0489C40.626 21.0443 40.1011 20.934 39.6131 20.7243C39.1251 20.5147 38.6837 20.21 38.3147 19.8279L37.2127 18.7269M37.9707 13.8279C37.2206 14.5778 36.2034 14.9991 35.1427 14.9991C34.0821 14.9991 33.0649 14.5778 32.3147 13.8279L28.3147 9.82792C27.5861 9.07351 27.1829 8.0631 27.192 7.01431C27.2012 5.96553 27.6218 4.96228 28.3635 4.22065C29.1051 3.47901 30.1083 3.05834 31.1571 3.04922C32.2059 3.04011 33.2163 3.44329 33.9707 4.17192L35.0707 5.27192"
                                        stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                                <input id="top-bar-search-input" class="sitewide-search has-suggestions initialized"
                                    type="search" name="query" value=""
                                    placeholder="Search for your favorite store"
                                    data-placeholder-desktop="Search for your favorite store"
                                    data-placeholder-mobile="Search for your favorite store" autocomplete="off">
                                <div class="close-search"></div>
                            </form> --}}
                            {{-- <div class="search-input-suggestions">
                                <ul class="suggestions-search-result hide">
                                </ul>
                                <ul class="stores-search-result hide"></ul>
                                <ul class="users-search-result"></ul>
                                <ul class="categories-search-result"></ul>
                                <ul class="products-search-result"></ul>
                                <ul>
                                    <li><a href="javascript:;" class="submit-url" data-submit="#main-search-form">Add
                                            product</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>

                    <table class="store-table">
                        <thead>
                            <tr>
                                <th>Store</th>
                                <th>Cashback &amp; Commission</th>
                                <th>Avg. Earnings</th>
                                <th>Never miss another coupon code</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_store as $store)

                                <tr>
                                    <td>
                                        <a class="flex-row" href="{{ route('codes', $store->id) }}">
                                            <div class="logo lazy-background visible"
                                                style="background-image: url('{{ asset('images/' . $store->logo) }}')">
                                            </div>
                                            {{ $store->store_name }}
                                        </a>
                                    </td>

                                        <td>{{cashback_calculate($store)}}% Cash Back</td>

                                    <td> — </td>
                                    @if (Auth::check())
                                        <td>
                                            <div class="switch-wrapper">
                                                <label class="label-switch" for="track_store_{{ $store->id }}">
                                                    <input type="checkbox" class="track_store_true_or_false"
                                                        name="track_Store" value="0"
                                                        id="track_store_{{ $store->id }}"
                                                        data-store="{{ $store->id }}">
                                                    <div class="checkbox"></div>
                                                </label> <label for="track_store_{{ $store->id }}"
                                                    class="switch-text">Track
                                                    store</label>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <a href="user-sign-in" data-fancybox="" data-src="#modal-sign-up"
                                                data-source="category-page-track-store" data-store-subscribe="40081"
                                                class="switch-wrapper">
                                                <label class="label-switch" for="track_store_40081">
                                                    <input type="checkbox" name="track_store_40081" id="track_store_40081">
                                                    <div class="checkbox"></div>
                                                </label> <label for="track_store_40081" class="switch-text">Track
                                                    store</label>
                                            </a>
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <p> {!! $all_store->links() !!} </p>
                </div>

            </div>
        </section>

    </div>
    <script>
        $(".track_store_true_or_false").on('change', function() {
            var id = $(this).attr('data-store');
            if ($(this).is(':checked')) {
                var like = $(this).val();


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

                        }
                    }
                });
            } else {
                var z = $(this).val('1');
                var like = $(this).val();
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

                        }
                    }
                });
            }
        });
    </script>
@endsection
