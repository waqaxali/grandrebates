@extends('adminpanel.layout.main')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add New Category</a></li>
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
                <h5 class="pt-2 pl-2">Add New Category...<h5>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">


                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal " method="post" action="{{route('save_category')}}"enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">Category Type</label>
                            <div class="col-sm-12">
                              <select type="text" name="category_type" id="category_type" class="form-control" id="inputName" placeholder="e.g. Apparel">
                                <option value="store">Store</option>
                                <option value="post">Post</option>
                              </select>
                            </div>
                          </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-12 col-form-label">Name</label>
                        <div class="col-sm-12">
                          <input type="text" name="name" class="form-control" id="inputName" placeholder="e.g. Apparel">
                        </div>
                      </div>
<div id="category">
                      <div class="form-group row" >
                        <label for="inputEmail"  class="col-sm-12 col-form-label">Description</label>
                        <div class="col-sm-12">
                          <textarea class="form-control" name="description" placeholder=""></textarea>
                        </div>
                      </div>

					  <div class="form-group row">
                        <label for="inputEmail"  class="col-sm-12 col-form-label">Description bottom (Shopping & Savings Tips)</label>
                        <div class="col-sm-12">
                          <textarea class="form-control" name="description_bottom" placeholder=""></textarea>
                        </div>
                      </div>

					  <div class="form-group row">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Featured image <small>Recommended size: 440x330px</small></label>
                        <div class="col-sm-8">
                          					<div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" onchange="readURL1(this);"  name="featured_image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                        </div>
						<div class="col-sm-4"><img class="img-fluid mb-3" id="img1" src="avatar/upload.png" alt="upload" width="200px" height="150px"></div>
                      </div>

					  					  <div class="form-group row">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Cover image <small>Recommended size: 2880x468px</small></label>
                        <div class="col-sm-8">
                          					<div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="cover_image" onchange="readURL2(this);" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                        </div>
						<div class="col-sm-4"><img class="img-fluid mb-3" id="img2" src="avatar/upload.png" alt="upload" width="200px" height="150px"></div>
                      </div>
</div>


					  	{{-- <div class="form-group row">
                        <label for="inputName2" class="col-sm-12 col-form-label">Slug suffix<br>
                          <small>Appends a suffix to the URL</small></label>
                        <div class="col-sm-12">
                          <input type="text" name="slug" class="form-control" id=""  placeholder="Coupns">
                        </div>
                      </div> --}}








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
    $('#category_type').change(function(){
        var type=$(this).val();
        if(type=='post')
        $('#category').hide();
        else
        $('#category').show();
    });

$('.custom-file input').change(function (e) {
        if (e.target.files.length) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        }
    });


    function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img1')
                        .attr('src', e.target.result).width(200).height(150).border('1px');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img2')
                        .attr('src', e.target.result).width(200).height(150).border('1px');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection
