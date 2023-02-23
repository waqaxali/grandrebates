@extends('adminpanel.layout.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit a Store
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit a Store
                                </a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <form method="post" action="{{ route('update_store', $current_store->slug) }}"
                    enctype="multipart/form-data">
                    @csrf
@if (isset($store_name))
    <input type="hidden" name="hidden_store" value="{{$store_name}}">
@endif
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
                                            <input type="text" class="form-control"
                                                value="{{ $current_store->store_name }}" name="store_name"
                                                placeholder="Enter Store Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="bold">Monetization</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="float-left font-weight-normal">Use Network</label>
                                                    <div class="custom-control custom-switch float-left ml-4">
                                                        <input type="checkbox" name="use_network"
                                                            {{ $current_store->use_network == '1' ? ' checked' : '' }}
                                                            value="1" class="custom-control-input use_network"
                                                            id="use_networks">
                                                        <label class="custom-control-label" for="use_networks"></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="float-left font-weight-normal">Use Skimlinks</label>
                                                    <div class="custom-control custom-switch float-left ml-4">
                                                        <input type="checkbox" name="use_skimlinks"
                                                            {{ $current_store->use_skimlinks == '1' ? ' checked' : '' }}
                                                            value="1" class="custom-control-input use_skimlinks"
                                                            id="use_kimlinks">
                                                        <label class="custom-control-label" for="use_kimlinks"></label>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-4">
							<label class="float-left font-weight-normal">Use VigLink</label>
						<div class="custom-control custom-switch float-left ml-4">
										  <input type="checkbox" name="use_viglink" {{  ($current_store->use_viglink == '1' ? ' checked' : '') }} value="1" class="custom-control-input use_viglink" id="use_vigLink">
										  <label class="custom-control-label" for="use_vigLink"></label>
							</div>
						 </div> --}}
                                            </div>
                                            <!--//row-->
                                            <div class="row mt-4">
                                                <div class="col-md-4">

                                                    <div class="custom-control custom-switch float-left">
                                                        <input type="checkbox"
                                                            {{ $current_store->cashback_commission == '1' ? ' checked' : '' }}
                                                            value="1" class="custom-control-input cashback_commission"
                                                            name="cashback_commission" id="cashback_commission">
                                                        <label class="custom-control-label ml-2"
                                                            for="cashback_commission">Cashback/Commission</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--//row-->
                                            <div class="row mt-3 commission_section" id="commission_section">
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
                                                                    value="{{ $current_store->network_cashback }}"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" id="inr_c">
                                                            <div class="form-group">
                                                                <label for=""
                                                                    class="font-weight-normal">Commission</label>
                                                                <input type="number" name="network_commission"
                                                                    min="0" max="100" step="any"
                                                                    value="{{ $current_store->network_commission }}"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-normal">Flat
                                                                    rate</label>
                                                                <div class="custom-control custom-switch float-left">
                                                                    <input type="checkbox" value="1"
                                                                        name="network_flat_switch"
                                                                        {{ $current_store->network_flat_switch == '1' ? ' checked' : '' }}
                                                                        class="custom-control-input" id="flat_rate">
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
                                                                    value="{{ $current_store->network_flat_rate }}"
                                                                    class="form-control" placeholder="">
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
                                                                    value="{{ $current_store->skimlinks_min }}"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-normal">Skimlinks
                                                                    max.</label>
                                                                <input type="number" name="skimlinks_max" min="0"
                                                                    max="100" step="any"
                                                                    value="{{ $current_store->skimlinks_max }}"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="" class="font-weight-normal">Flat
                                                                    rate</label>
                                                                <div class="custom-control custom-switch float-left">
                                                                    <input type="checkbox" value="1"
                                                                        name="skimlinks_flat_rate"
                                                                        class="custom-control-input"
                                                                        {{ $current_store->skimlinks_flat_rate == '1' ? ' checked' : '' }}
                                                                        id="flat_rate_2">
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
                                                <select class="form-control  select2" name="network_id"
                                                    style="width: 100%;">
                                                    @foreach ($all_network as $network)
                                                        <option value="{{ $network->id }}"
                                                            {{ $current_store->network_id == $network->id ? 'selected' : '' }}>
                                                            {{ $network->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control  select2" name="status"
                                                    style="width: 100%;">

                                                    <option
                                                        value="1"{{ $current_store->status == '1' ? 'selected' : '' }}>
                                                        Active</option>
                                                    <option value="0"
                                                        {{ $current_store->status == '0' ? 'selected' : '' }}>Deactivated
                                                        (Pause)</option>

                                                </select>
                                            </div>


                                        </div>
                                        <!--//row end here-->
                                        <div class="row mt-4">

                                            <div class="col-md-4">
                                                <select class="form-control  select2" name="country_id"
                                                    style="width: 100%;">

                                                    @foreach ($all_country as $country)
                                                        <option value="{{ $country->country_name }}"
                                                            {{ $current_store->country_id == $country->country_name ? 'selected' : '' }}>
                                                            {{ $country->country_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control  select2" name="category_id"
                                                    style="width: 100%;">

                                                    @foreach ($all_category as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $current_store->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}</option>
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
                                                    value="{{ $current_store->homepage_url }}" placeholder="—">
                                            </div>
                                            <div class="form-group mb-4">
                                                <label for="" class="font-weight-normal mb-0">Affiliate
                                                    URL</label>
                                                <p class="m-0 p-0"><small>This is used when monetized with a network. Not
                                                        used if monetized by Skimlinks or Viglink</small></p>
                                                <input type="text" class="form-control" name="affliated_url"
                                                    value="{{ $current_store->affliated_url }}" placeholder="—">
                                            </div>
                                            <div class="form-group mb-4">
                                                <div class="custom-control custom-switch mb-1">
                                                    <input type="checkbox" value="1" name="show_store_description"
                                                        {{ $current_store->show_store_description == '1' ? ' checked' : '' }}
                                                        class="custom-control-input" id="show_store_descriptions">
                                                    <label class="custom-control-label ml-2"
                                                        for="show_store_descriptions">Show store descriptions</label>
                                                </div>
                                                <label for="" class="font-weight-normal">Additional description
                                                    (above the main description)</label>
                                                <textarea class="form-control" name="store_main_description" cols="4" placeholder="Enter ...">{{ $current_store->store_main_description }}</textarea>
                                            </div>
                                            <div class="form-group mb-4">

                                                <label for="" class="font-weight-normal">Main description (about
                                                    section)</label>
                                                <textarea class="form-control" name="description_about_section" cols="4"
                                                    placeholder="Will auto-generate if blank">{{ $current_store->description_about_section }}</textarea>
                                            </div>
                                            <div class="form-group mb-4">

                                                <label for="" class="font-weight-normal">Custom no cashback
                                                    title</label>
                                                <textarea class="form-control" cols="4" name="custom_cashback_title"
                                                    placeholder="Sorry, looks like  doesn’t allow cash back at this time!">{{ $current_store->custom_cashback_title }}</textarea>
                                            </div>
                                            <div class="form-group mb-4">

                                                <label for="" class="font-weight-normal">Custom no cashback
                                                    subtitle</label>
                                                <textarea class="form-control" name="custom_cashback_subtitle" cols="4"
                                                    placeholder="You can still use our verified  coupon codes to save on your purchases.">{{ $current_store->custom_cashback_subtitle }}</textarea>
                                            </div>

                                            <div class="form-group mb-4">

                                                <label for="" class="font-weight-normal">Custom no commission
                                                    subtitle</label>
                                                <textarea class="form-control" name="custom_commission_subtitle" cols="4"
                                                    placeholder="You can still save & share  with your friends & followers.">{{ $current_store->custom_commission_subtitle }}</textarea>
                                            </div>

                                            <div class="form-group mb-4">

                                                <label for="" class="font-weight-normal">Custom no commission
                                                    title</label>
                                                <textarea class="form-control" name="custom_commission_title" cols="4"
                                                    placeholder="Sorry, looks like  doesn’t allow commission at this time!">{{ $current_store->custom_commission_title }}</textarea>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-12 col-form-label">Logo</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                name="logo" onchange="readURL1(this);"
                                                                id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-4">
                                                    @if (!empty($current_store->logo))
                                                        <img class="img-fluid mb-3" id="img1"
                                                            src="{{ asset('images/' . $current_store->logo) }}">
                                                    @else
                                                        <img class="img-fluid mb-3" id="img1"
                                                            src="{{ asset('avatar/upload.png') }}">
                                                    @endif

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
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Upload</span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-4">
                                                    @if (!empty($current_store->featured_image))
                                                        <img class="img-fluid mb-3" id="img2"
                                                            src="{{ asset('images/' . $current_store->featured_image) }}">
                                                    @else
                                                        <img class="img-fluid mb-3" id="img2"
                                                            src="{{ asset('avatar/upload.png') }}">
                                                    @endif

                                                </div>
                                            </div>




                                            <div class="row">
                                                {{-- <div class="col-md-3">
						<div class="custom-control custom-switch float-left">
										  <input type="checkbox" value="1" class="custom-control-input" checked="checked" id="extension_show">
										  <label class="custom-control-label ml-2 font-weight-normal" for="extension_show">Show in extension</label>
							</div>
						 </div>			 --}}
                                                {{-- @dd($current_store->show_serp); --}}
                                                {{-- <div class="col-md-3">
						<div class="custom-control custom-switch float-left">
										  <input type="checkbox"  name="show_serp" value="1"  {{  ($current_store->show_serp == '1' ? 'checked' : '') }} class="custom-control-input"  id="SERP">
										  <label class="custom-control-label ml-2 font-weight-normal" for="SERP">Show in SERP</label>
							</div>
						 </div>				 --}}
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-switch float-left">
                                                        <input type="checkbox" name="scrap_promocodes"
                                                            {{ $current_store->scrap_promocodes == '1' ? ' checked' : '' }}
                                                            value="1" class="custom-control-input" id="Promocodes">
                                                        <label class="custom-control-label ml-2 font-weight-normal"
                                                            for="Promocodes">Scrape Promocodes</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-switch float-left">
                                                        <input type="checkbox" name="show_amazon" value="1"
                                                            class="custom-control-input" id="eBay_offers"
                                                            {{ $current_store->show_amazon == '1' ? 'checked' : '' }}>
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
                                            <input type="text" class="form-control"
                                                value="{{ $current_store->instagram_url }}" name="instagram_url"
                                                placeholder=" Enter Instagram URL">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Pinterest
                                                URL</label>
                                            <input type="text" class="form-control"
                                                value="{{ $current_store->pinterest_url }}" name="pinterest_url"
                                                placeholder="Enter Pinterest URL">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Youtube URL</label>
                                            <input type="text" class="form-control"
                                                value="{{ $current_store->youtube_url }}" name="youtube_url"
                                                placeholder="Enter Youtube URL">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Facebook
                                                URL</label>
                                            <input type="text" class="form-control"
                                                value="{{ $current_store->facebook_url }}" name="facebook_url"
                                                placeholder="Enter Facebook URL">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Twitter URL</label>
                                            <input type="text" class="form-control"
                                                value="{{ $current_store->twitter_url }}" name="twitter_url"
                                                placeholder="Enter Twitter URL">
                                        </div><!-- /.form-group -->

                                    </div><!-- /.tab-pane -->

                                    <div class="tab-pane" id="seo_section">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Custom h1</label>
                                            <input type="text" class="form-control"
                                                value="{{ $current_store->custom_h1 }}" name="custom_h1"
                                                placeholder="Coupons and Promo Codes">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal mb-0">Slug
                                                suffix</label>
                                            <p class="p-0 m-0"><small>Appends a suffix to the URL</small></p>
                                            <input type="text" class="form-control"
                                                value="{{ $current_store->slug_suffix }}" name="slug_suffix"
                                                placeholder="promo-codes">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Referral
                                                slug</label>
                                            <input type="text" class="form-control"
                                                value="{{ $current_store->referral_slug }}" name="referral_slug"
                                                placeholder="referral-program">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="">Clean slug:</label>
                                            <p><small>Supported dynamic tags: {{ 'year' }} {{ 'month' }}
                                                    {{ 'day' }} {{ 'best_offer' }} {{ 'active_offers' }}
                                                    {{ 'store_name' }}

                                                </small><br>Custom meta title</p>
                                            <input type="text" class="form-control"
                                                value="{{ $current_store->custom_meta_title }}" name="custom_meta_title"
                                                placeholder="25% off  Coupons, Promo Codes - {{$date->format('F')}}, {{$date->year}}">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="font-weight-normal">Custom meta
                                                description</label>
                                            <textarea class="form-control" cols="4" name="custom_meta_description"
                                            placeholder=" Coupons for {{$date->format('F')}}, {{$date->year}}. Choose from 0 active  promo codes & coupons.  Promo Codes verified on {{$date->format('F')}} {{$date->day}}, {{$date->year}}.">{{ $current_store->custom_meta_description }}</textarea>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.tab-pane -->



                                    <div class="row mt-4 mb-4">
                                        <div class="offset-md-3"></div>
                                        <div class="col-md-6"><button type="submit"
                                                class="btn btn-primary btn-block">Update Store</button></div>
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
        var cashback_commission = '<?php echo $current_store->cashback_commission; ?>'
        var network_flat_switch = '<?php echo $current_store->network_flat_switch; ?>'
        // hide commission_section for checked value 0
        if (cashback_commission == '') {
            $('#commission_section').hide();

        }
        // show flat_rate_field for checked value 1
        if (network_flat_switch == '1') {
            $('#flat_rate_field').show();

        }

        $(function() {

            $('.select2').select2()


        });

        $('.custom-file input').change(function(e) {
            if (e.target.files.length) {
                $(this).next('.custom-file-label').html(e.target.files[0].name);
            }
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
