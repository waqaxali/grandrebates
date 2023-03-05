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
        </div>
        <div class="row mb-1 ml-1 mt-3">
            <a href="{{route('subcategories')}}" class="btn btn-success">Back to Subcategories</a>
            </div>
      </div><!-- /.container-fluid -->
    </div>

<div class="container">
<div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h5 class="pt-2 pl-2">Add New Subcategories...<h5>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">


                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal " method="post" action="{{route('save_subcategory')}}"enctype="multipart/form-data">
                        @csrf



                        <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">Category Type</label>
                            <div class="col-sm-12">
                              <select type="text" name="category_id" id="" class="form-control " id="inputName" placeholder="e.g. Apparel" >
                               {{!! all_category_options() !!}}
                              </select>

                            </div>
                          </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-12 col-form-label">Tags</label>
                        <div class="col-sm-12">
                          <input type="text" name="tags" class="form-control  @error('tags') is-invalid @enderror" id="inputName" placeholder="e.g. Apparel" value="{{ old('tags') }}">
                          @error('tags')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
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
