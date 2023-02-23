@extends('adminpanel.layout.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category Listings <a href="{{ route('add_category') }}"
                                class="btn btn-inline btn-primary">Add New Category</a></h1>
                    </div><!-- /.col -->
                    {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Category Listings</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div> --}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <select class="form-control" onchange="onchange_fun()"id="type" name="type"
                            style="width: 100%; font-size: 20px; padding: 5px;color:brown">
                            <option value="store">Store</option>
                            <option value="post"> Post</option>

                        </select>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class=" table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:100px"></th>
                                    <th>Name</th>
                                    <th>URL Path</th>
                                    <th>Offers</th>
                                    <th>Category Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="trr">



                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">

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
            function count(array) {

                var c = 0;
                for (i in array)
                    if (array[i] != undefined)
                        c++;

                return c;
            }

            $(document).ready(function() {
                let onload_type = $('#type').val();
                console.log(onload_type);
                onchange_fun(onload_type);
            });


            function onchange_fun(onload_type = null) {
                var type;
                if (onload_type == null) {
                    type = $('#type').val();

                } else {
                    type = onload_type
                }

                var tr = '';
                $("#trr").html('');

                $.ajax({
                    url: "{{ route('track_store_category_ajaxcall') }}",
                    type: "post",
                    data: {
                        'slug': type,
                        '_token': '{{ csrf_token() }}',

                    },

                    success: function(res) {


                        if (res.categories) {
                            var area = eval(res.categories);
                            console.log(area);

                            $.each(area, function(key, value) {
                                var total = count(value.offers);
                                console.log(total);

                                tr += '<tr>';
                                if (value.slug == 'store') {
                                    tr +=
                                        ' <td class="align-middle"><img class="img-fluid mb-3" src="images/' +
                                        value.featured_image + '"></td>';
                                } else {
                                    tr += ' <td class="align-middle"></td>';
                                }
                                tr += '<td class="align-middle">' + value.name + '</td>'
                                if (value.slug == 'store') {
                                    tr += '<td class="align-middle"><a href="{{ route('categories') }}/' +
                                        value.id + '">categories/' + value.id + '</a></td>';
                                    tr += '<td class="align-middle"><span class="badge bg-primary"> ' +
                                        total + '</span></td>';
                                } else {
                                    tr += '<td class="align-middle">-</td>';
                                    tr += '<td class="align-middle">-</td>';
                                }
                                tr += '<td class="align-middle">' + value.category_type + '</td>';
                                tr += '<td class="align-middle text-align-right">';
                                tr += '  <div class="float-right text-right">';

                                tr += ' <a href="{{ route('edit_category') }}/' + value.id +
                                    '" class="btn btn-outline-info btn-sm mb-1"  style="width:110px ;color:#1190ad" >';
                                tr += '<i class="fas fa-pencil-alt"></i> Edit</a><br>';
                                tr += ' <form id="delete_record_'+ value.id +'" method="POST" action="{{ route('delete_category') }}/' + value
                                    .id + '">';
                                tr += ' @csrf';

                                tr +=
                                    ' <button type="submit" onclick="delete_record('+ value.id +')" class="btn btn-outline-danger btn-sm show_confirm"  style="width:110px" data-toggle="tooltip" > <i class="fas fa-trash"> </i>Delete</button>';
                                tr += '  </form>';
                                tr += ' </div>';
                                tr += '</td>';

                                tr += '</tr>';

                            });
                            $('#trr').append(tr);
                        }
                    }
                });
            }

function delete_record(id){

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
                            //alert('confirm');
                            $('#delete_record_'+id).submit();
                        }
                    });
}


        </script>
    @endsection
