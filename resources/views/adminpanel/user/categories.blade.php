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


                    <div class="row">
                        <div class="col-sm-8 ">
                            @if (count($stores) == 0)
                                {{-- <p class="bg-danger text-white p-1">No store found</p> --}}
                            @else
                                <h3 style="float:left;margin-right:25px">All {{ $stores[0]->categories->name }} Stores</h3>
                            @endif
                            <form action="{{ route('categories', $id) }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $id }}" name="hidden_category_id">
                                <select class="form-control select2" name="subcategory_id" id="status">
                                    <option value="">Explore sub category</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{$subcategory->id==$request->subcategory_id?'selected':''}}>{{ $subcategory->tags }}</option>
                                    @endforeach


                                </select>
                                <input type="submit" style="padding:5px" value="search">
                            </form>

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
                            @foreach ($stores as $store)
                                <?php
                                if (Auth::check()) {
                                    if (Auth::user()->premium == config('constants.user.premium')) {
                                        $cashback = cashback_calculate($store, true);
                                    } else {
                                        $cashback = cashback_calculate($store);
                                    }
                                } else {
                                    $cashback = cashback_calculate($store);
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


                                    <td>{{ $cashback }}% Cash Back</td>

                                    <td>
                                        -
                                    </td>
                                    @if (Auth::check())
                                        <td>
                                            <div class="switch-wrapper">
                                                <label class="label-switch" for="track_store_{{ $store->id }}">
                                                    <input type="checkbox" class="track_store_true_or_false"
                                                        name="track_Store" value="0"
                                                        {{ in_array($store->id, save_stores()) ? 'checked' : '' }}
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
