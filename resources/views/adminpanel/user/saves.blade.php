@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')

@section('content')
    <div class="content-wrapper">



        <div class="double-col">
            <main>
                <header class="page-title align-baseline col-small">
                    <h1>Your saves</h1>


                </header>





                <div class="card bordered" id="share-profile-cta">
                    <div class="flexcol w100">
                        <p>Share your profile so your followers can shop your saves and collections.</p>
                        <div class="h">
                            <div class="button-group f1 nomar">
                                <input type="text" name="" class="dashed f1"
                                    value="{{ config('app.url').'/reffereduser'.'/'.Auth::user()->username}}">
                                <a href="javascript:;" class="clipboard button hollow"
                                    data-clipboard-text="{{ config('app.url').'/reffereduser'.'/'.Auth::user()->username}}">Copy URL</a>
                            </div>
                            <p>
                                {{-- <small>or share via:</small> --}}
                            </p>
                            <div class="share-icons ">


                            </div>

                        </div>
                    </div>
                </div>


                <div class="saves-card">
                    <header>
                        <div class="left">

                        </div>
                        {{-- <div class="right hide-on-small">

                            <a href="" class="button secondary ">Stores <span>(0)</span></a>

                        </div> --}}
                    </header>



                    <div class="products-list narrow masonry" id="product-list"
                        style="position: relative; height: 5086.39px;">
                        @foreach ($users as $user)
                            @foreach ($user->stores as $store)
                                <div class="content-list-item" id="content-list-item-265391" data-product-id="265391"
                                    style="position: absolute; left: 0px; top: 0px;">
                                    <div class="image-wrapper">
                                        <img src="{{ asset('images/' . $store->logo) }}"
                                            alt="SHEIN Unity Solid Tank Top &amp; Split Thigh Skirt">
                                        <a class="click-area" href=""></a>
                                    </div>



                                    <div class="content-list-item-info">
                                        <div class="left">
                                            <h6>{{$store->store_name}}
                                                 <a onclick='track_store_dislike({{ $store->id }})' id="dislike">
                                                    <img src="{{ asset('avatar/heart.svg') }}" alt="" style="height:16px; width:16px;margin-left:5px;margin-bottom:8px"class="right">
                                                 </a>
                                                </h6>
                                            <h5>{{cashback($store->network_cashback)}}% Cashback &amp; Comission</h5>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach


                    </div>


                    <ul class="pagination">
                        <li></li>

                    </ul>





                </div>
            </main>

        </div>
    </div>

    <script>
function track_store_dislike(id) {
            var like = 1;
            $.ajax({
                url: "{{ route('track_store_ajaxcall') }}",
                type: "post",
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}',
                    'like': like,
                },

                success: function(res) {
                    if (res.success) {

                        location.reload(true);

                    }
                }
            });
        }
        </script>
@endsection
