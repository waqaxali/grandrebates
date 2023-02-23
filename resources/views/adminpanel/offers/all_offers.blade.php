@extends('adminpanel.layout.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Offers</h1>
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

                @if ($path == '')
                    {{-- <div class="row">
                        <div class="col-md-8 offset-md-2 mt-4 mb-4">
                            <form action="simple-results.html">
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-lg"
                                        placeholder="Search or paste a product link">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                    <form action="{{ route('search_offers') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-4 mb-2">
                                <select class="form-control select2" name="type" style="width: 100%;">
                                    <option {{($request->type=='empty')? 'selected' : ''}} selected="selected" value="empty">Type:All</option>
                                    <option {{($request->type=='coupon')? 'selected' : ''}} value="coupon">Coupon</option>
                                    <option {{($request->type=='deal')? 'selected' : ''}} value="deal">Deal</option>

                                </select>

                            </div>
                            <!--/col-->
                            <div class="col-md-4 mb-2">
                                <select class="form-control select2" name="store_id" style="width: 100%;">
                                    {{!! all_store_options($request->store_id) !!}}
                                    {{-- <option selected="selected" value="empty">Stores : All</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                                    @endforeach --}}


                                </select>

                            </div>
                            <!--/col-->
                            <div class="col-md-4 mb-2">
                                <button class="form-control btn btn-success" style="width: 100%;">
                                    search

                                </button>

                            </div>
                            <!--/col-->

                        </div>
                    </form>
                    <!--/form row-->
                    <div class="row mt-4 mb-2">
                        <div class="col-md-2">
                            <a href="{{ route('add_offer') }}" class="form-control  btn btn-success" value=""><b>Add
                                    New Offer</b></a>
                        </div>

                    </div>
                @else
                    <div class="row mt-4 ">
                        <div class="col-md-1">
                            <a href="{{ route('all_store') }}" class="form-control  btn btn-outline-secondary"
                                value=""><b>All stores</b></a>

                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('add_offer', $store->slug) }}" class="form-control  btn btn-outline-secondary"
                                value=""><b>Add New Offer</b></a>

                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('codes', $store->id) }}" class="form-control  btn btn-outline-secondary"
                                value=""><b>View store</b></a>

                        </div>
                        <div class="col-md-2">
                            <a href="{{ $store->homepage_url }}" class="form-control  btn btn-outline-secondary"
                                value=""><b>Store direct URL</b></a>

                        </div>
                        <div class="col-md-1">
                            <a href="{{ route('all_offers') }}" class="form-control  btn btn-outline-secondary"
                                value=""><b>Offers</b></a>

                        </div>
                        <div class="col-md-1">
                            <a href="{{ route('edit_store', [$store->slug, $store->slug]) }}"
                                class="form-control  btn btn-outline-secondary" value=""><b>Edit store</b></a>

                        </div>


                        {{-- deals --}}
                        <div class="col-md-12 mt-4">
                            <div class="form-group ">
                                <span> <b>{{ $store->store_name }}</b></span><br>
                                <span> Quality offer:<b>{{ count($all_offers) }}</b></span><br>
                                <span> Coupens: <b>{{ count($coupen) }}</b></span><br>
                                <span> Deals:<b>{{ count($deal) }}</b></span><br>

                            </div>
                        </div>

                        <div class="col-md-6 ">
                            <label>Notes</label>
                            <div class="form-group ">
                                <input type="hidden" name="store_id" id="store_id" value="{{ $store->id }}">
                                <textarea class=" form-control mb-3" rows="4" name="store_notes" id="store_notes"
                                    style="overflow: hidden;  height: 80px;">{{ $store->store_notes }}</textarea>
                                <input type="submit" name="commit" onclick="save_store_notes()" value="Save notes"
                                    id="hide" class="btn btn-outline-success">
                            </div>
                        </div>
                @endif
            </div>
            <!--/form row-->

            <div class="stores_table mb-4">
                <table id="example1" class="table table-bordered projects table-striped">
                    <thead>
                        <tr>
                            <th>Kind</th>

                            <th>Store</th>
                            <th>Short title</th>
                            <th>Title</th>

                            <th>Code</th>
                            <th>Exp date</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_offers as $offer)
                            <tr>
                                <td>{{ $offer->kind }}</td>

                                <td>{{ $offer->stores->store_name }}</td>
                                <td>{{ $offer->short_title }}%</td>

                                <td>{{ $offer->title }}</td>
                                <td>{{ $offer->code }}</td>
                                <td>{{ $offer->end_date }}</td>
                                @if (get_date()->toDateString()<=$offer->end_date)
                                <td>Active</td>
                                @else
                                <td>Expired</td>
                                @endif

                                <td class="project-actions text-right">

                                    @if ($path == '')
                                        <a class="btn btn-outline-info btn-sm mb-1"
                                            href="{{ route('edit_offer', $offer->slug) }}" style="width:110px">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                    @else
                                        <a class="btn btn-outline-info btn-sm mb-1"
                                            href="{{ route('edit_offer', [$offer->slug, $store->slug]) }}"
                                            style="width:110px">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                    @endif

                                    <form method="POST" action="{{ route('delete_offer', $offer->slug) }}">
                                        @csrf

                                        <button type="submit" class="btn btn-outline-danger btn-sm show_confirm"
                                            style="width:110px" data-toggle="tooltip" title='Delete'>
                                            <i class="fas fa-trash">
                                            </i>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tfoot>
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




        $(document).ready(function() {
            $('#hide').hide();
        });


        $("#store_notes").keypress(function() {
            $('#hide').show();
        });


        function save_store_notes() {
            var notes = $('#store_notes').val();
            var store_id = $('#store_id').val();
            console.log(store_id);
            $.ajax({
                url: "{{ route('save_store_notes') }}",
                type: "post",
                data: {
                    'notes': notes,
                    'store_id': store_id,
                    '_token': '{{ csrf_token() }}',

                },
                success: function(data) {

                }
            });

        }
    </script>
@endsection
