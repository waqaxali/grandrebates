@extends('adminpanel.layout.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Country Listings <a href="{{ route('add_country') }}"
                                class="btn btn-inline btn-primary">Add New Country</a></h1>
                    </div><!-- /.col -->
                    {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Country Listings</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col --> --}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bordered Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class=" table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:100px"></th>
                                    <th>Name</th>


                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $country)
                                    <tr>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"><a href="#">{{ $country->country_name }}</a></td>


                                        <td class="align-middle text-align-right">
                                            <div class=" text-right">

                                                <a class="btn btn-outline-info btn-sm mb-1" style="width:110px"
                                                    href="{{ route('edit_country', $country->slug) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>

                                                <form method="POST" action="{{ route('delete_country', $country->slug) }}">
                                                    @csrf

                                                    <button type="submit" class="btn btn-outline-danger btn-sm show_confirm" style="width:110px" data-toggle="tooltip" title='Delete'>
                                                         <i class="fas fa-trash">
                                                    </i>Delete</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {!! $countries->links() !!}
                        </ul>
                    </div>
                </div>
                <!-- /.card -->

            </div>

            <!-- /.col -->
        </div>
        <!-- /.row -->
    @endsection
    @section('js')


    <script type="text/javascript">

        $('.show_confirm').click(function(event) {
             var form =  $(this).closest("form");
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

    @endsection
