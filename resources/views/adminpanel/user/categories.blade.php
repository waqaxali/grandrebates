@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')


@section('content')
    <div class="content-wrapper">
        <div id="category-page" class="bg-beige">
            <!-- <div class="category-page-hero" style="background-image: url('https://s3.us-east-1.amazonaws.com/refermate/store_categories/5/covers/large?1668698957')"></div> -->

            <div class="container row">
                <div class="column">
                    <nav class="breadcrumbs">
                        <a href="">Categories</a>
                        <a href="">{{ isset($stores[0]->categories->name) ? $stores[0]->categories->name : '' }}</a>
                    </nav>
                    <div class="title-w-meta">
                        <h2>{{ isset($stores[0]->categories->name) ? $stores[0]->categories->name : '' }}</h2>
                        <div class="meta">
                            <span class="stores">{{ count($stores) }} Stores</span>
                            {{-- <span class="offers">{{count($count_category_offers->deployments)}} Offers</span> --}}
                            {{-- <span class="cashback">4.54% Avg. Cash Back &amp; Commission</span> --}}
                        </div>
                    </div>

                    <p class="category-description"></p>


                    <h3>Featured {{ isset($stores[0]->categories->name) ? $stores[0]->categories->name : '' }} Stores</h3>

                    <div class="category-thumbs rows-of-3">

                        @foreach ($all_feature as $feature)
                            <div class="category-thumb">
                                <a href="{{ route('codes', $feature->featureable_item_id) }}"
                                    class="image lazy-background visible">

                                    {{-- {{route('codes',$feature->id)}} --}}

                                    <picture class="image">

                                        <img src="{{ asset('images/' . $feature->image) }}">
                                    </picture>
                                </a>
                                <h4>
                                    <a href="" uk="" stores="" vrbo-discount-codes"="">
                                        {{ $feature->title }}
                                        {{-- <br><span>Earn 1.5% </span> --}}
                                    </a>
                                </h4>
                            </div>
                        @endforeach
                    </div>


                    @if (count($stores) == 0)
                        <p class="bg-danger text-white p-1">No store found</p>
                    @else
                        <h3>All {{ $stores[0]->categories->name }} Stores</h3>
                    @endif

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
                            @foreach ($stores as $store)
                                <?php
                                //calculate cashback
                                $cashback = 0;

                                if ($store->use_network == config('constants.stores.use_network') && $store->cashback_commission == config('constants.stores.commission') && $store->network_flat_switch == config('constants.stores.network_flat_switch_active')) {
                                    $cashback = $store->network_flat_rate;
                                } elseif ($store->use_network == config('constants.stores.use_network') && $store->cashback_commission == config('constants.stores.commission') && $store->network_flat_switch == config('constants.stores.network_flat_switch_dactive')) {
                                    $cashback = cashback($store->network_cashback);
                                } elseif ($store->use_skimlinks == config('constants.stores.use_skimlinks') && $store->cashback_commission == config('constants.stores.commission') && $store->skimlinks_flat_rate == config('constants.stores.skimlinks_flat_rate_active')) {
                                    $cashback = $store->skimlinks_min;
                                } elseif ($store->use_skimlinks == config('constants.stores.use_skimlinks') && $store->cashback_commission == config('constants.stores.commission') && $store->skimlinks_flat_rate == config('constants.stores.skimlinks_flat_rate_dactive')) {
                                    $cashback = cashback($store->skimlinks_min);
                                } else {
                                }
                                ?>
                                <tr>
                                    <td>
                                        <a class="flex-row" href="{{ route('codes', $store->id) }}">
                                            <div class="logo lazy-background visible"
                                                style="background-image: url('{{ asset('images/' . $store->logo) }}')">
                                            </div>
                                            {{ $store->store_name }}
                                        </a>
                                    </td>

                                    <td> {{ $cashback }} %</td>
                                    <td>
                                        -
                                    </td>
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
                    <ul class="pagination">
                        <li></li>

                    </ul>
                </div>


            </div>
        </div>
    </div>
    <script>
        $(".track_store_true_or_false").on('change', function() {
            var store_id = $(this).attr('data-store');
            if ($(this).is(':checked')) {
                var like = $(this).val();


                $.ajax({
                    url: "{{ route('track_store_ajaxcall') }}",
                    type: "post",
                    data: {
                        'id': store_id,
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
                        'id': store_id,
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
