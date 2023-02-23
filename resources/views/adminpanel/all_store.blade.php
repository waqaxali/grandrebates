@extends('adminpanel.layout.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Stores</h1>
                    </div><!-- /.col -->
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col --> --}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row" style="justify-content: center">
                    {{-- <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4>FMTC merchants</h4>

                                <p>started syncing about 18 hours ago</p>
                                <br><br>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <span class="small-box-footer"><br></span>
                        </div>
                    </div> --}}
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4>Stores</h4>

                                <p> Total Stores : {{ $all_store->count() }}</p>
                                <br><br>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <span class="small-box-footer"><br></span>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4 class="text-white">Coupons</h4>

                                <p>New Found: 17120 <br> Aleardy There: 11683 <br> Updated: 1605</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <span class="small-box-footer"><br></span>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4 class="text-white">Promocodes scrapper</h4>

                                <p class="text-white">finished about 11 hours ago</p>
                                <br><br>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <span class="small-box-footer"><br></span>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>


                <div class="row">
                    <div class="col-md-8 offset-md-2 mt-4 ">
                        <form action="simple-results.html">
                            <div class="input-group">
                                <input type="search" id="search" class="form-control form-control-lg"
                                    placeholder="Search or paste a product link">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 offset-md-2 mb-4">

                        <div class="search-input-suggestions form-control form-control-lg d-none"  style="width:92%">
                          <ul class="searchContainer">

                          </ul>
                        </div>

                </div>
                </div>
                <form action="{{ route('search_store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label for="">Monetization</label>
                            <select class="form-control select2" name="network_type" id="monetization" style="width: 100%;">
                                <option {{ $request->network_type == '' ? 'selected' : '' }} selected="selected"
                                    value="">Select Monetization</option>
                                <option {{ $request->network_type == 1 ? 'selected' : '' }} value="1">Network</option>
                                <option {{ $request->network_type == 2 ? 'selected' : '' }} value="2">Skimlinks</option>
                            </select>

                        </div>
                        <!--/col-->
                        <div class="col-md-3 mb-2">
                            <label for="">Networks</label>
                            <select class="form-control select2" name="network_id" id="network_id" style="width: 100%;">
                                <option  value="">Select Network</option>
                                {!! all_network_options($network_selected_id) !!}

                            </select>

                        </div>
                        <!--/col-->
                        <div class="col-md-3 mb-2">
                            <label for="">Status</label>
                            <select class="form-control select2" name="status" id="status" style="width: 100%;">

                                <option {{ $request->status == '' ? 'selected' : '' }} value="">Select Status</option>
                                <option {{ $request->status == '1' ? 'selected' : '' }} value="1">Active</option>
                                <option {{ $request->status == '0' ? 'selected' : '' }} value="0">Deactive(pause)
                                </option>

                            </select>

                        </div>
                        <!--/col-->
                        <div class="col-md-3 mb-2 ">
                            <button class="form-control btn btn-success" style="width: 100%;    margin-top: 31px;">
                                Search

                                </select>

                        </div>
                        <!--/col-->
                    </div>
                    <!--/form row-->

                    <div class="row">
                        {{-- <div class="offset-md-3 col-md-3 mb-2">
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Checkout AutoPlay:All</option>
                            <option>Alaska</option>

                        </select>

                    </div> --}}
                        <!--/col-->
                        {{-- <div class="col-md-3 mb-2">
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Other Platforms</option>
                            <option>Alaska</option>

                        </select>

                    </div> --}}
                        <!--/col-->

                    </div>
                    <!--/form row-->

                    <div class="row mt-4">

                        <div class="col-md-3">
                            <label>Missing Data</label>
                            <select class="form-control  select2" id="missing_data" name="missing_data"
                                style="width: 100%;">
                                <option {{ $request->missing_data == '' ? 'selected' : '' }} selected="selected"
                                    value="">Select Option </option>
                                <option {{ $request->missing_data == 'affliated_url' ? 'selected' : '' }}
                                    value="affliated_url">affiliate_url_missing</option>
                                <option {{ $request->missing_data == 'logo' ? 'selected' : '' }} value="logo ">logo_missing
                                </option>
                                <option {{ $request->missing_data == 'homepage_url' ? 'selected' : '' }}
                                    value="homepage_url">direct_url_missing</option>


                            </select>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group row">
                                <label for="inputSkills" class="ccol-sm-8 col-form-label">⚠️ {{ $all_store->count() }}
                                    stores
                                    need your attention</label>

                            </div>

                        </div> --}}
                    </div>
                </form>
                <!--/form row-->

                <div class="row mt-3 mb-3">

                    <div class="col-md-2">
                        <a href="{{ route('add_store') }}" class="form-control  btn btn-outline-secondary"
                            value=""><b>Add store</b></a>

                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('all_category') }}" class="form-control  btn btn-outline-secondary"
                            value=""><b>Store categories</b></a>

                    </div>
                    <div class="col-md-1">
                        @if (isset($change_excel_button_route))
                            <form action="{{ route('all_store') }}" method="get">
                                @csrf

                                <input type="hidden" name="hidden_excel_export" value="hidden_excel_export">
                                <input type="submit" value="Excel" class="form-control  btn btn-outline-secondary"
                                    value="">
                            </form>
                        @else
                            <form action="{{ route('search_store') }}" method="post">
                                @csrf
                                <input type="hidden" name="monotization" value="{{ $request->monotization }}">
                                <input type="hidden" name="status" value="{{ $request->status }}">
                                <input type="hidden" name="network_id" value="{{ $request->network_id }}">
                                <input type="hidden" name="missing_data" value="{{ $request->missing_data }}">
                                <input type="hidden" name="hidden_excel_export" value="hidden_excel_export">
                                <input type="submit" value="Excel" class="form-control  btn btn-outline-secondary"
                                    value="">
                            </form>
                        @endif

                    </div>
                    {{-- <div class="col-md-2">
                        <a href="{{ route('to_skimlinks') }}" class="form-control  btn btn-outline-secondary" value=""><b>Move to skimlinks</b></a>

                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('to_networks') }}" class="form-control  btn btn-outline-secondary" value=""><b>Move to networks</b></a>

                    </div> --}}
                </div>

                <div class="stores_table mb-4">
                    <table id="example1" class="table table-bordered projects table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Network</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Featured Image</th>
                                <th>Category</th>
                                <th>Slug</th>
                                {{-- <th>Domain</th> --}}
                                {{--
                                <th>Coupons</th>
                                <th>Deals</th> --}}

                                <th>Cashback</th>
                                <th>Country</th>

                                <th>Created</th>
                                <th>Updated</th>
                                <th>Status</th>
                                <th>Offers</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody id="hide_all_stores">

                            @forelse($all_store as $store)

                                <tr>
                                    <td>{{ $store->networks->name }}</td>
                                    <td>{{ $store->store_name }}</td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar"
                                                    src="{{ asset('images/' . $store->logo) }}">
                                            </li>

                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                @if (isset($store->featured_image))
                                                <img alt="Avatar" class="table-avatar" src="{{ asset('images/' . $store->featured_image) }}">
                                                @endif

                                            </li>

                                        </ul>
                                    </td>
                                    <td>{{ $store->categories->name }}</td>
                                    <td>{{ $store->slug }}</td>
                                    {{-- <td>-</td> --}}
                                    {{-- <td>-</td> --}}

                                    <td>{{ cashback_calculate($store) }} %</td>

                                    <td>{{ $store->country_id }}</td>

                                    <td>{{ $store->created_at }}</td>
                                    <td>{{ $store->updated_at }}</td>
                                    @if ($store->status == '1')
                                        <td>Active</td>
                                    @else
                                        <td>Deactive(Pause)</td>
                                    @endif

                                    <td>
                                        <span class="badge bg-primary "> {{ count_offers($store->id) }}</span>
                                        <a class="btn  btn-sm btn-success mb-1" style="width:100px;"
                                            href="{{ route('all_offers', $store->slug) }}">

                                            View Offers
                                        </a>
                                    </td>

                                    {{--  <td>-</td> --}}

                                    <td class="project-actions text-right">
                                        {{-- <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a> --}}
                                        <a class="btn  btn-sm btn-outline-info mb-1" style="width:110px"
                                            href="{{ route('edit_store', $store->slug) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('delete_store', $store->slug) }}">
                                            @csrf

                                            <button type="submit" class="btn btn-outline-danger btn-sm show_confirm"
                                                style="width:110px" data-toggle="tooltip" title='Delete'>
                                                <i class="fas fa-trash">
                                                </i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty

                                <p>No store found</p>
                            @endforelse



                        </tbody>





                        <tbody id="show_ajax_stores"></tbody>

                    </table>
                </div>
                <!--/table row-->
            </div>
            <!--//container-fluid-->
        </section>
        <!--//content-->
    @endsection
    @section('js')
        <script type="text/javascript">
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Are you sure you want to delete this record?`,
                        text: "If you delete this, it will be gone forever.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        </script>
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
