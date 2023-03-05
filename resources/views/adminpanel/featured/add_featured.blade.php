@extends('adminpanel.layout.main')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Featured</h1>
          </div><!-- /.col -->

        </div>
        <div class="row mb-1 ml-1 mt-3">
            <a href="{{route('all_featured')}}" class="btn btn-success">Back to featured</a>
            </div>
      </div><!-- /.container-fluid -->
    </div>

<div class="container">
<div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <h5 class="pt-2 pl-2">Add New Featured...<h5>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">


                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal " method="post" action="{{route('save_featured')}}"enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">Location</label>
                            <div class="col-sm-12">
                              <select type="text" name="location" id="select_type" class="form-control  @error('location') is-invalid @enderror" id="inputName" placeholder="e.g. Apparel" value=" {{ old('location') }}">
                                <option ></option>
                                <option value="Home-Page-Featured-Store">Home Page Featured Store</option>
                                <option value="Home-Page-Featured-Category">Home Page Featured Category</option>
                                <option value="Home-Page-Top-Deals">Home Page Top Deals</option>




                              </select>
                              @error('location')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror

                            </div>
                          </div>

                          {{-- <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">Featureable type</label>
                            <div class="col-sm-12">
                              <select type="text" name="featuredable_type" id="featureable_type" class="form-control" id="inputName" placeholder="e.g. Apparel">
                                <option value=""></option>
                                <option value="store">Store</option>
                                <option value="category">Category</option>
                                <option value="offer">Offers</option>
                              </select>
                            </div>
                          </div> --}}
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">Featureable</label>
                            <div class="col-sm-12">
                              <select type="text" name="featureable_item_id" id="dependent_dropdown" class="form-control" id="inputName" placeholder="e.g. Apparel">

                              </select>
                            </div>
                          </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-12 col-form-label">Title/Custom name</label>
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
                        <label for="inputEmail" class="col-sm-12 col-form-label">Image <br> <small>Top deals: 600x576px</small><br><small>Featured stores: 800x600px</small></label>
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

$('#select_type').change(function(){
    var select_type=$(this).val();
    console.log(select_type);
    $("#dependent_dropdown").html('');
    $.ajax({
                    url: "{{route('ajaxcall')}}",
                    type: "post",
                    data: {
                        'select_type': select_type,
                        '_token': '{{csrf_token()}}'
                    },

                    success: function (res) {


                        $.each(res, function (key, value) {
                            if(select_type=='Home-Page-Featured-Store'){
                                $("#dependent_dropdown").append('<option data="'+select_type+'" value="' + value.id + '">' + value.store_name + '</option>');
                                console.log(value);
                            }
                            if(select_type=='Home-Page-Featured-Category'){
                                $("#dependent_dropdown").append('<option data="'+select_type+'" value="' + value.id + '">' + value.name + '</option>');
                            }
                            if(select_type=='Home-Page-Top-Deals'){
                                $("#dependent_dropdown").append('<option data="'+select_type+'" value="' + value.id + '">' + value.store_name + '</option>');
                            }
                            if(select_type=='Home-Page-Slider'){
                                $("#dependent_dropdown").append('<option data="'+select_type+'" value="' + value.id + '">' + value.store_name + '</option>');
                                console.log(value);
                            }

                        });
                    }
                });
            });

// $('#featureable_type').change(function(){
//     var featureable_type=$(this).val();
//     $("#dependent_dropdown").html('');
//     $.ajax({
//                     url: "{{route('ajaxcall')}}",
//                     type: "post",
//                     data: {
//                         'featureable_type': featureable_type,
//                         '_token': '{{csrf_token()}}'
//                     },

//                     success: function (res) {


//                         $.each(res, function (key, value) {
//                             if(featureable_type=='store'){
//                                 $("#dependent_dropdown").append('<option data="'+featureable_type+'" value="' + value.id + '">' + value.store_name + '</option>');
//                             }
//                             if(featureable_type=='category'){
//                                 $("#dependent_dropdown").append('<option data="'+featureable_type+'" value="' + value.id + '">' + value.name + '</option>');
//                             }


//                         });
//                     }
//                 });
//             });


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
