@extends('adminpanel.layout.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add New Offer</h1>
                    </div><!-- /.col -->
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add New Offer</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col --> --}}
                </div><!-- /.row -->
                <div class="row mb-1 ml-1 mt-3">
                    <a href="{{route('all_offers')}}" class="btn btn-success">Back to offers</a>
                    </div>
            </div><!-- /.container-fluid -->
        </div>

        <div class="container">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <h5 class="pt-2 pl-2">Add New Offer...<h5>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">


                            <div class="tab-pane active" id="settings">
                                <form class="form-horizontal " method="post"
                                    action="{{ route('save_offer') }}"enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($store_slug))
                                    <h6><b>This offer is going to be assigned to <a href="{{route('all_offers',$store_slug)}}"> {{$store_slug}}</a><b></h6>
                                        <input type="hidden" value="{{$store_slug}}" name="hidden_store_slug">
                                    @else
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-12 col-form-label">Store</label>
                                        <div class="col-sm-12">
                                            <select type="text" name="store_id" id="" class="form-control"
                                                id="inputName" placeholder="e.g. Apparel">
                                                @foreach ($all_store as $store)
                                                    <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-12 col-form-label">Kind</label>
                                        <div class="col-sm-12">
                                            <select type="text" name="kind" id="kind" class="form-control  @error('kind') is-invalid @enderror"  value="{{ old('kind') }}"
                                                id="inputName" placeholder="e.g. Apparel">
                                                <option value=""></option>
                                                <option value="coupon">Coupon</option>
                                                <option value="deal">Deal</option>

                                            </select>
                                            @error('kind')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-12 col-form-label">Short title</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="short_title" class="form-control  @error('short_title') is-invalid @enderror" id="inputName"
                                            value="{{ old('short_title') }}" placeholder="e.g. 15%">
                                            @error('short_title')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-12 col-form-label">Title</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" id="inputName"  value="{{ old('title') }}">
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
                                            <textarea name="description" class="form-control" id="inputName">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-12 col-form-label">Imported description</label>
                                        <div class="col-sm-12">
                                            <textarea name="imported_desciption" class="form-control" id="inputName">{{ old('imported_desciption') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-12 col-form-label">Code</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="code" class="form-control  @error('code') is-invalid @enderror" id="inputName"  value="{{ old('code') }}">
                                            @error('code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-12 col-form-label">End date</label>
                                        <div class="col-sm-12">
                                            <input type="date" name="end_date" class="form-control  @error('end_date') is-invalid @enderror" id="inputName"
                                                placeholder="e.g. Apparel"  value="{{ old('end_date') }}">
                                                @error('end_date')
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
