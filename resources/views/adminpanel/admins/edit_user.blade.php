@extends('adminpanel.layout.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit user</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row mb-1 ml-1 mt-3">
                    <a href="{{route('users')}}" class="btn btn-success">Back to users</a>
                    </div>
            </div><!-- /.container-fluid -->
        </div>



        <div class="container">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <h5 class="pt-2 pl-2">Edit user...<h5>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal " method="post"
                                    action="{{ route('update_admin', $current_user->id) }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-12 col-form-label">User name</label>
                                        <div class="col-sm-12">
                                          <input type="text" name="username" class="form-control  " id="inputName" placeholder="e.g. Apparel" value="{{ $current_user->username }}">

                                        </div>
                                      </div>
                                      {{-- <div class="form-group row">
                                        <label for="inputName" class="col-sm-12 col-form-label">Email</label>
                                        <div class="col-sm-12">
                                          <input type="email" name="email" class="form-control  " id="inputName" placeholder="e.g. Apparel" value="{{ $current_user->email }}">

                                        </div>
                                      </div> --}}

                                      <div class="form-group row">
                                        <label for="inputName" class="col-sm-12 col-form-label">Password</label>
                                        <div class="col-sm-12">
                                          <input type="password" name="password" class="form-control  " id="inputName" placeholder="Enter new password" >

                                        </div>
                                      </div>



                                  <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-6 mt-4">
                                      <button type="submit" class="btn btn-success btn-block">Save</button>
                                    </div>
                                  </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    </div>
@endsection
@section('js')
    <script>

        $('.custom-file input').change(function(e) {
            if (e.target.files.length) {
                $(this).next('.custom-file-label').html(e.target.files[0].name);
            }
        });


        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img1')
                        .attr('src', e.target.result).width(200).height(150).border('1px');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
