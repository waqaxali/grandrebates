@extends('adminpanel.layout.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Network</h1>
                    </div><!-- /.col -->

                </div>
                <div class="row mb-1 ml-1 mt-3">
                    <a href="{{route('all_store')}}" class="btn btn-success">All Networks</a>
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <div class="container">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <h5 class="pt-2 pl-2">Edit Network...<h5>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">


                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal " method="post"
                                    action="{{ route('update_network', $network->slug) }}"enctype="multipart/form-data">
                                    @csrf





                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-12 col-form-label">network name</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="form-control" id="inputName"
                                                placeholder="e.g. Apparel" value="{{ $network->name }}">

                                        </div>
                                    </div>












                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-6 mt-4">
                                            <button type="submit" class="btn btn-success btn-block">Update</button>
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
    <script></script>
@endsection
