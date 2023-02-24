@extends('adminpanel.layout.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 mt-4 mb-0">
                        <form action="#">
                            <div class="input-group">
                                <input type="search" id="search" class="form-control form-control-lg"
                                    placeholder="Search or paste a product link">
                                <div class="input-group-append">
                                    <button  class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 offset-md-2 mb-4">

                            <div class="search-input-suggestions form-control form-control-lg d-none" >
                              <ul class="searchContainer">
                                    {{-- <li><a href="#" class="d-block">
                                        <span class="search_logo" style="background-image: url({{asset('images/2023010415491519855918965.jpg')}})"></span>
                                        <div class="search_right"><h5>Teleflora</h5><p>32 Coupons &amp; Deals</p></div>
                                    </a></li> --}}
                              </ul>
                            </div>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container">
            <div class="content-header">
                <h1 class="text-dark">Welcome to Grandrebates,{{ Auth::user()->name }} 👋</h1>
            </div>

            <div class="p-5 bg-white mb-4">
                <h3 class="col-md-12 p-0 mb-3">Featured Stores</h3>
                <div class="row">
                    @foreach ($home_feature_store as $feature)
                        @if($feature->stores->status==config('constants.status.is_active'))
                        <div class="col-md-4">
                            <a href="{{ route('view_codes', [$feature->id, 'feature_store']) }}">
                                <img class="img-fluid" src="{{ asset('images/' . $feature->image) }}" alt="Photo">
                                <h4 class="text-lg mt-2 mb-1">{{ $feature->title }}</h4>

                                <p>{{cashback_calculate($feature->stores) }}% commission &amp; cash back</p>

                            </a>
                        </div>
                        @endif
                    @endforeach

                </div>
            </div>
            <!--/content-->
            <div class="p-5 bg-white mb-4">
                <h3 class="col-md-12 p-0 mb-3">Top Deals</h3>
                <div class="row">

                    @foreach ($home_feature_deal as $feature_deal)
                    @if($feature_deal->stores->status==config('constants.status.is_active'))
                        <div class="col-md-3">
                            <a href="{{ route('view_codes', [$feature_deal->id, 'feature_deal']) }}">
                                <img class="img-fluid" src="{{ asset('images/' . $feature_deal->image) }}" alt="Photo">
                                <h4 class="text-lg mt-2 mb-1">{{ $feature_deal->title }}</h4>
                                <p>{{ cashback_calculate($feature_deal->stores)}}% commission &amp; cash back</p>
                            </a>
                        </div>
                        @endif
                    @endforeach


                </div>
            </div>
            <!--/content-->
        </div>
        <!--/main conttent end here-->
    </div><!-- /.content-wrapper -->



@endsection
@section('js')


<script>
    function count(array) {

        var c = 0;
        for (i in array)
            if (array[i] != undefined)
                c++;

        return c;
    }
    $('#search').on('keyup', function() {
        $('.search-input-suggestions').addClass('d-none');
                $('.search-input-suggestions').removeClass('d-table');
        var store_name = $(this).val();
        var ul = ''
        $(".searchContainer").html('');
        $.ajax({
            url: "{{ route('autocomplete_search') }}",
            type: "post",
            data: {
                'store_name': store_name,
                '_token': '{{ csrf_token() }}',

            },

            success: function(res) {
                $('.search-input-suggestions').removeClass('d-none');
                $('.search-input-suggestions').addClass('d-table');
                var stores = eval(res.stores);

                var cashback = 0;
                $.each(stores, function(key, value) {
                    var total_offers = count(value.offers);

                                        ul+='<li><a href="{{route('codes')}}/'+value.id+'" id="store_id_'+value.id+'" class="d-block">';
                                            ul+='<span class="search_logo" "><img src="images/'+value.logo+'" style="width:80px;height:53px"> </span>';
                                            ul+=' <div class="search_right"><h5>'+value.store_name+'</h5><p>'+total_offers+' Coupons &amp; Deals</p></div>';
                                            ul+='</a></li>';

                });
                $('.searchContainer').append(ul);
            }
        });

    });
</script>
@endsection
