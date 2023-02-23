@extends('adminpanel.layout.main')
@section('content')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add New Post</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="container">
<div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h5 class="pt-2 pl-2">Publish your post...<h5>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">


                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal" method="post" action="{{route('save_post')}}" enctype="multipart/form-data">
@csrf
                        <div class="form-group row">
                            <label for="inputName2"  class="col-sm-12 col-form-label">Select Category <br>
                           <small>Appends a suffix to the URL</small></label>
                            <div class="col-sm-12">
                              <select class="form-control" name="category_id">

                                @foreach ($all_category as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            </div>
                          </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-12 col-form-label">Name</label>
                        <div class="col-sm-12">
                          <input type="text" name="name" class="form-control" id="inputName" placeholder="e.g. Apparel">
                        </div>
                      </div>


					  <div class="form-group row">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Description bottom (Shopping & Savings Tips)</label>
                        <div class="col-sm-12">
                           <textarea id="summernote" name="description"  class="form-control" style="min-height:200px"></textarea>
                        </div>
                      </div>

					  <div class="form-group row">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Featured image <small>Recommended size: 440x330px</small></label>
                        <div class="col-sm-8">
                          					<div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="featured_image" onchange="readURL1(this);" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                        </div>
						<div class="col-sm-4"><img class="img-fluid mb-3" id="img1" src="avatar/upload.png" alt="Photo"></div>
                      </div>





					  	<div class="form-group row">
                        <label for="inputName2" class="col-sm-12 col-form-label">Meta Keywords<br>
<small>Appends a suffix to the URL</small></label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="" name="meta_keyword" placeholder="meta tag">
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
$(document).ready(function() {
  $('#summernote').summernote({
    height:'400px'
  });
});

</script>

@endsection
