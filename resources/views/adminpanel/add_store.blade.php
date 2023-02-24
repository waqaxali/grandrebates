@extends('adminpanel.layout.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Adding a Store
                        </h1>
                    </div>
                </div>
                <div class="row mb-2 ml-1">
                <a href="{{route('all_store')}}" class="btn btn-success">Back to stores</a>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <form method="post" action="{{ route('save_store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-9 p-0">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#general_section"
                                            data-toggle="tab">General</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#social_media_section"
                                            data-toggle="tab">Social Media</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#seo_section" data-toggle="tab">SEO</a>
                                    </li>

                                </ul>
                            </div><!-- /.card-header -->

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="general_section">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Store Name</label>
                                            <input type="text"
                                                class="form-control @error('store_name') is-invalid @enderror"
                                                name="store_name" placeholder="Enter Store Name"
                                                value="{{ old('store_name') }}">

                                            @error('store_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="bold">Monetization</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="float-left font-weight-normal">Use Network</label>
                                                    <div class="custom-control custom-switch float-left ml-4">
                                                        <input type="checkbox" name="network_type" value="1"
                                                            class="custom-control-input use_network" id="use_networks">
                                                        <label class="custom-control-label" for="use_networks"></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="float-left font-weight-normal">Use Skimlinks</label>
                                                    <div class="custom-control custom-switch float-left ml-4">
                                                        <input type="checkbox" name="network_type" value="2"
                                                            class="custom-control-input use_skimlinks" id="use_kimlinks">
                                                        <label class="custom-control-label" for="use_kimlinks"></label>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--//row-->
                                            <div class="row mt-4">
                                                <div class="col-md-4">

                                                    <div class="custom-control custom-switch float-left">
                                                        <input type="checkbox" value="1" class="custom-control-input"
                                                            name="cashback_commission" checked="checked"
                                                            id="cashback_commission" value="0">
                                                        <label class="custom-control-label ml-2"
                                                            for="cashback_commission">Cashback/Commission</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--//row-->
                                            <div class="row mt-3" id="commission_section">
                                                <div class="col-md-5 border border-success rounded p-4 mr-4"
                                                    id="commission_inner">
                                                    <h5>Network commission</h5>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for=""
                                                                    class="font-weight-normal">Cashback</label>
                                                                <input type="number" name="network_cashback" min="0"
                                                                    max="100" step="any"
                                                                    class="form-control" placeholder="0.00"  value="{{ old('network_cashback') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" id="inr_c">
                                                            <div class="form-group">
                                                                <label for=""
                                                                    class="font-weight-normal">Commission</label>
                                                                <input type="number" name="network_commission"
                                                                    min="0" max="100" step="any"
                                                                     class="form-control" placeholder="0.00"  value="{{ old('network_commission') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-normal">Flat
                                                                    rate</label>
                                                                <div class="custom-control custom-switch float-left">
                                                                    <input type="checkbox"  placeholder="0.00"
                                                                        name="network_flat_switch"
                                                                        class="custom-control-input" id="flat_rate"  value="1">
                                                                    <label class="custom-control-label ml-2"
                                                                        for="flat_rate"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3" id="flat_rate_field" style="display:none">
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-normal">Flat
                                                                    rate</label>
                                                                <input type="number" name="network_flat_rate"
                                                                    min="0" max="100" step="any"
                                                                     class="form-control" placeholder="0.00" value="{{ old('network_flat_switch') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//col-->
                                                <div class="col-md-5 border border-success rounded p-4">
                                                    <h5>Skimlinks commission</h5>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-normal">Skimlinks
                                                                    min.</label>
                                                                <input type="number" name="skimlinks_min" min="0"
                                                                    max="100" step="any"
                                                                    class="form-control" placeholder="0.00"value="{{ old('skimlinks_min') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-normal">Skimlinks
                                                                    max.</label>
                                                                <input type="number" name="skimlinks_max" min="0"
                                                                    max="100" step="any"
                                                                    class="form-control" placeholder="0.00" value="{{ old('skimlinks_max') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-normal">Flat
                                                                    rate</label>
                                                                <div class="custom-control custom-switch float-left">
                                                                    <input type="checkbox" value="1"
                                                                        name="skimlinks_flat_rate"
                                                                        class="custom-control-input" id="flat_rate_2">
                                                                    <label class="custom-control-label ml-2"
                                                                        for="flat_rate_2"></label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--//col-->
                                            </div>
                                            <!--//row end here-->
                                        </div>
                                        <!--/form-group-->
                                        <div class="row mt-4">
                                            <div class="col-md-4" id="network_hide">
                                                <label for="">Networks</label>
                                                <select class="form-control  select2" name="network_id"
                                                    style="width: 100%;">
                                                    {{!! all_network_options() !!}}


                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Status</label>
                                                <select class="form-control  select2" name="status" style="width: 100%;">

                                                    <option value="1">Active</option>
                                                    <option value="0">Deactivated (Pause)</option>

                                                </select>
                                            </div>


                                        </div>
                                        <!--//row end here-->
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <label for="">Countries</label>
                                                <select class="form-control  select2" name="country_id"
                                                    style="width: 100%;">

                                                    @foreach ($all_country as $country)
                                                        <option value="{{ $country->country_name }}">{{ $country->country_name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="">Categories</label>
                                                <select class="form-control  select2" name="category_id"
                                                    style="width: 100%;">

                                                    @foreach ($all_category as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--//row end here-->
                                        <div class=" mt-4">
                                            <div class="form-group mb-4">
                                                <label for="" class="font-weight-normal mb-0">Direct URL aka
                                                    Homepage</label>
                                                <p class="m-0 p-0"><small>e.g. https://zaful.com • URL that goes directly
                                                        to store's website. It is required to generate a Skimlinks/VigLink
                                                        affiliate URL</small></p>
                                                <input type="text" class="form-control" name="homepage_url"
                                                    placeholder="—"  value="{{ old('homepage_url') }}">
                                            </div>
                                            <div class="form-group mb-4" id="affliated_url">
                                                <label for="" class="font-weight-normal mb-0">Affiliate
                                                    URL</label>
                                                <p class="m-0 p-0"><small>This is used when monetized with a network. Not
                                                        used if monetized by Skimlinks or Viglink</small></p>
                                                <input type="text" class="form-control" name="affliated_url"
                                                    placeholder="—"  value="{{ old('affliated_url') }}">
                                            </div>
                                            <div class="form-group mb-4">
                                                <div class="custom-control custom-switch mb-1">
                                                    <input type="checkbox" value="1"name="show_store_description"
                                                        class="custom-control-input" checked="checked"
                                                        id="show_store_descriptions">
                                                    <label class="custom-control-label ml-2"
                                                        for="show_store_descriptions">Show store descriptions</label>
                                                </div>
                                                <label for="" class="font-weight-normal">Additional description
                                                    (above the main description)</label>
                                                <textarea class="form-control" name="store_main_description" cols="4" placeholder="Enter ...">{{ old('store_main_description') }}</textarea>
                                            </div>
                                            <div class="form-group mb-4">

                                                <label for="" class="font-weight-normal">Main description (about
                                                    section)</label>
                                                <textarea class="form-control" name="description_about_section" cols="4"
                                                    placeholder="Will auto-generate if blank">{{ old('description_about_section') }}</textarea>
                                            </div>
                                            <div class="form-group mb-4">

                                                <label for="" class="font-weight-normal">Custom no cashback
                                                    title</label>
                                                <textarea class="form-control" cols="4" name="custom_cashback_title"
                                                    placeholder="Sorry, looks like  doesn’t allow cash back at this time!">{{ old('custom_cashback_title') }}</textarea>
                                            </div>
                                            <div class="form-group mb-4">

                                                <label for="" class="font-weight-normal">Custom no cashback
                                                    subtitle</label>
                                                <textarea class="form-control" name="custom_cashback_subtitle" cols="4"
                                                    placeholder="You can still use our verified  coupon codes to save on your purchases.">{{ old('custom_cashback_subtitle') }}</textarea>
                                            </div>

                                            <div class="form-group mb-4">

                                                <label for="" class="font-weight-normal">Custom no commission
                                                    subtitle</label>
                                                <textarea class="form-control" name="custom_commission_subtitle" cols="4"
                                                    placeholder="You can still save & share  with your friends & followers.">{{ old('custom_commission_subtitle') }}</textarea>
                                            </div>

                                            <div class="form-group mb-4">

                                                <label for="" class="font-weight-normal">Custom no commission
                                                    title</label>
                                                <textarea class="form-control" name="custom_commission_title" cols="4"
                                                    placeholder="Sorry, looks like  doesn’t allow commission at this time!">{{ old('custom_commission_title') }}</textarea>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-12 col-form-label">Logo</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                name="logo" onchange="readURL1(this);"
                                                                id="exampleInputFile" >
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-sm-4">

                                                    <img class="img-fluid mb-3" id="img1"
                                                        src="{{ asset('avatar/upload.png') }}">


                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-12 col-form-label">Featured image
                                                    <small>Recommended size: 440x330px</small></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                name="featured_image" onchange="readURL2(this);"
                                                                id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-sm-4">

                                                    <img class="img-fluid mb-3" id="img2"
                                                        src="{{ asset('avatar/upload.png') }}">


                                                </div>
                                            </div>

                                            {{-- <div class="form-group mb-4">

                    <label for="" class="font-weight-normal">FMTC ID</label>
					<input type="text" class="form-control"></textarea>
                  </div> --}}

                                            <div class="row">
                                                {{-- <div class="col-md-3">
						<div class="custom-control custom-switch float-left">
										  <input type="checkbox" value="1" class="custom-control-input" checked="checked" id="extension_show">
										  <label class="custom-control-label ml-2 font-weight-normal" for="extension_show">Show in extension</label>
							</div>
						 </div>			 --}}
                                                {{-- <div class="col-md-3">
						<div class="custom-control custom-switch float-left">
										  <input type="checkbox" value="1" name="show_serp" class="custom-control-input" checked="checked" id="SERP">
										  <label class="custom-control-label ml-2 font-weight-normal" for="SERP">Show in SERP</label>
							</div>
						 </div>	 --}}
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-switch float-left">
                                                        <input type="checkbox" value="1" name="scrap_promocodes"
                                                            class="custom-control-input" checked="checked"
                                                            id="Promocodes">
                                                        <label class="custom-control-label ml-2 font-weight-normal"
                                                            for="Promocodes">Scrape Promocodes</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-switch float-left">
                                                        <input type="checkbox" value="1" name="show_amazon"
                                                            class="custom-control-input" checked="checked"
                                                            id="eBay_offers">
                                                        <label class="custom-control-label ml-2 font-weight-normal"
                                                            for="eBay_offers">Show Amazon & eBay offers</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!--//row end here-->
                                    </div><!-- /.tab-pane -->

                                    <div class="tab-pane" id="social_media_section">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Instagram
                                                URL</label>
                                            <input type="text" class="form-control" name="instagram_url"
                                                placeholder=" Enter Instagram URL" value="{{ old('instagram_url') }}">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Pinterest
                                                URL</label>
                                            <input type="text" class="form-control" name="pinterest_url"
                                                placeholder="Enter Pinterest URL" value="{{ old('pinterest_url') }}">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Youtube URL</label>
                                            <input type="text" class="form-control" name="youtube_url"
                                                placeholder="Enter Youtube URL" value="{{ old('youtube_url') }}">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Facebook
                                                URL</label>
                                            <input type="text" class="form-control" name="facebook_url"
                                                placeholder="Enter Facebook URL" value="{{ old('facebook_url') }}">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Twitter URL</label>
                                            <input type="text" class="form-control" name="twitter_url"
                                                placeholder="Enter Twitter URL" value="{{ old('twitter_url') }}">
                                        </div><!-- /.form-group -->

                                    </div><!-- /.tab-pane -->

                                    <div class="tab-pane" id="seo_section">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Custom h1</label>
                                            <input type="text" class="form-control" name="custom_h1"
                                                placeholder="Coupons and Promo Codes" value="{{ old('custom_h1') }}">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal mb-0">Slug
                                                suffix</label>
                                            <p class="p-0 m-0"><small>Appends a suffix to the URL</small></p>
                                            <input type="text" class="form-control" name="slug_suffix"
                                                placeholder="promo-codes" value="{{ old('slug_suffix') }}">
                                        </div><!-- /.form-group -->
                                        {{-- <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Referral
                                                slug</label>
                                            <input type="text" class="form-control" name="referral_slug"
                                                placeholder="referral-program">
                                        </div><!-- /.form-group --> --}}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="">Clean slug:</label>
                                            <p><small>Supported dynamic tags: {{ 'year' }} {{ 'month' }}
                                                    {{ 'day' }} {{ 'best_offer' }} {{ 'active_offers' }}
                                                    {{ 'store_name' }}

                                                </small><br>Custom meta title</p>
                                                {{-- {{dd(date()->year);}} --}}
                                            <input type="text" name="custom_meta_title" class="form-control"
                                                placeholder="25% off  Coupons, Promo Codes - {{get_date()->year}}, " value="{{ old('custom_meta_title') }}">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Custom meta
                                                description</label>
                                            <textarea class="form-control" cols="4" name="custom_meta_description"
                                                placeholder=" Coupons for {{get_date()->year}}, . Choose from 0 active  promo codes & coupons.  Promo Codes verified on {{get_date()->toFormattedDateString()}} .">{{ old('custom_meta_description') }}</textarea>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.tab-pane -->



                                    <div class="row mt-4 mb-4">
                                        <div class="offset-md-3"></div>
                                        <div class="col-md-6"><button type="submit"
                                                class="btn btn-primary btn-block">Create Store</button></div>
                                    </div>
                                </div><!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                </form>
                <!-- /.card -->
            </div>



    </div>
    <!--//container-fluid-->
    </section>
    <!--//content-->
@endsection

@section('js')
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
            $('.use_network').prop('checked', true);
            $('#network_hide').show();

        })
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

        $('.custom-file input').change(function(e) {
            if (e.target.files.length) {
                $(this).next('.custom-file-label').html(e.target.files[0].name);
            }
        });

        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
        $(function() {
            bsCustomFileInput.init();
        });

        $('#cashback_commission').on('change', function() {
            if ($('#cashback_commission:checked').length) {
                //alert();
                $('#commission_section').show(500)
            } else {
                $('#commission_section').hide(500)
            }
        })

        $('#flat_rate').on('change', function() {
            if ($('#flat_rate:checked').length) {
                //alert(); inr_c
                $('#flat_rate_field').show(500)
                $('#commission_inner').addClass("col-md-6");
                $('#inr_c').removeClass("col-md-4");
                $('#inr_c').addClass("col-md-3");
            } else {
                $('#flat_rate_field').hide()
                $('#commission_inner').removeClass("col-md-6");
                $('#commission_inner').addClass("col-md-5");
                $('#inr_c').addClass("col-md-4");
            }
        });


        $('.use_skimlinks').on('change', function() {
            $('.use_skimlinks').prop('checked', true);
            $('.use_network').prop('checked', false);
            $('.use_viglink').prop('checked', false);
            $('#network_hide').hide();
            $('#affliated_url').hide();
            //affliated_url
        });

        $('.use_viglink').on('change', function() {
            $('.use_skimlinks').prop('checked', false);
            $('.use_network').prop('checked', false);
            $('.use_viglink').prop('checked', true);
            $('#network_hide').hide();
            $('#affliated_url').hide();
        });

        $('.use_network').on('change', function() {
            $('.use_skimlinks').prop('checked', false);
            $('.use_network').prop('checked', true);
            $('.use_viglink').prop('checked', false);
            $('#network_hide').show();
            $('#affliated_url').show();
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

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img2')
                        .attr('src', e.target.result).width(200).height(150).border('1px');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
