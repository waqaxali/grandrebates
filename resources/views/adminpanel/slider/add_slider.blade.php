@extends('adminpanel.layout.main')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Slider</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Add New Featured</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="container">
<div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h5 class="pt-2 pl-2">Add New Slider...<h5>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">


                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal " method="post" action="{{route('save_slider')}}"enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">Name</label>
                            <div class="col-sm-12">
                              <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="inputName" placeholder="e.g. Apparel" value="{{ old('name') }}">
                              @error('name')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                            </div>
                          </div>


                      <div class="form-group row">
                        <label for="inputName" class="col-sm-12 col-form-label">Title</label>
                        <div class="col-sm-12">
                          <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" id="inputName" placeholder="e.g. Apparel" value="{{ old('title') }}">
                          @error('title')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-12 col-form-label">Description</label>
                        <div class="col-sm-12">
                          <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror" id="inputName" placeholder="e.g. Apparel" value="{{ old('description') }}">
                          @error('description')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-12 col-form-label">URL /Uniform Resource Locators</label>
                        <div class="col-sm-12">
                          <input type="text" name="url" class="form-control  @error('url') is-invalid @enderror" id="inputName" placeholder="e.g. Apparel" value="{{ old('url') }}">
                          @error('url')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-12 col-form-label">Image <br><small>Featured image: 800x600px</small></label>
                        <div class="col-sm-8">
                          					<div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" onchange="readURL1(this);" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                    </div>
                        </div>
						<div class="col-sm-4"><img class="img-fluid mb-3" id="img1" src="avatar/upload.png" alt="upload" width="200px" height="150px"></div>
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

</script>
@endsection
