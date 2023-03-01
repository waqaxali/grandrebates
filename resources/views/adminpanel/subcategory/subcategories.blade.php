@extends('adminpanel.layout.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sub Category Listings <a href="{{ route('add_subcategory') }}"
                                class="btn btn-inline btn-primary">Add New Sub Category</a></h1>
                    </div><!-- /.col -->
                </div>

            </div><!-- /.container-fluid -->
        </div>

        <div class="container-fluid">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="stores_table mb-4">
                            <table id="example1" class="table table-bordered projects table-striped">
                                <thead>
                                    <tr>


                                        <th>Category</th>
                                        <th>Tags</th>

                                        <th style="text-align: center;">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $subcategory)
                                        <tr>

                                        <td>{{ $subcategory->categories->name }}</td>

                                        <td>{{ $subcategory->tags }}</td>



                                            <td class="project-actions text-right">


                                                    <a class="btn btn-outline-info btn-sm mb-1"
                                                        href="{{ route('edit_subcategory', $subcategory->id) }}" style="width:110px">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>


                                                <form method="POST" action="{{ route('delete_subcategory', $subcategory->id) }}">
                                                    @csrf

                                                    <button type="submit" id="delete_record_" onclick="delete_record({{$subcategory->id}})" class="btn btn-outline-danger btn-sm show_confirm"
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
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {{-- {!! $data->links() !!} --}}
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
        <script>
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
    @endsection
