@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')

@section('content')
    <div class="content-wrapper">

        <section class="container padded-bottom">
            <form class="two-column-form" id="edit_user_866" enctype="multipart/form-data"
                action="{{route('update_user')}}" accept-charset="UTF-8" method="post">
@csrf
                <div class="form-row">
                    <div class="form-labels">
                        <label for="user_avatar">Your avatar</label>
                    </div>
                    <label for="user_avatar" class="add-avatar" style="background-image: url('{{asset('images/'.Auth::user()->avatar)}}')" >
                        {{-- <img class="" src="{{asset('images/'.Auth::user()->avatar)}}" alt=""> --}}
                        <input type="file" name="avatar" id="user_avatar" value="{{Auth::user()->avatar}}">

                        <span class="hover">EDIT</span>
                        @if (isset(Auth::user()->avatar))

                        @endif
                    </label>
                </div>

                {{-- <div class="form-row">
                    <div class="form-labels">
                        <label for="user_bio">Bio</label>
                    </div>
                    <div class="form-inputs">
                        <textarea class="autogrow large hollow expand" rows="6" placeholder="Bio" maxlength="500" name="user[bio]"
                            id="user_bio"></textarea>
                        <!-- <div class="error">{{ $errors->first('bio') }}</div> -->
                    </div>
                </div> --}}

                <div class="form-row">
                    <div class="form-labels">
                        <label for="user_first_name">Name</label>
                    </div>
                    <div class="form-inputs">
                        <input class="large hollow expand" required="required" maxlength="50" size="50" type="text"
                            value="{{Auth::user()->name}}" name="name" id="user_first_name">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-labels">
                        <label for="user_last_name">User name</label>
                    </div>
                    <div class="form-inputs">
                        <input class="large hollow expand" maxlength="50" size="50" type="text" value="{{Auth::user()->username}}"
                            name="username" >
                    </div>
                </div>

                {{-- <div class="form-row col-on-small">
                    <div class="form-labels">
                        <label for="user_username">Username</label>
                    </div>
                    <div class="form-inputs">
                        <input class="large hollow expand" pattern="[a-zA-Z0-9]+" title="Username" value="HaiderJaved"
                            required="required" maxlength="30" size="30" type="text" name="user[username]"
                            id="user_username">
                        <p>Cannot contain any special characters.<br>
                            20 characters max.
                        </p>

                    </div>

                </div> --}}



                <div class="form-row">
                    <div class="form-labels">
                        <label required="required" for="user_email">Email</label>
                    </div>
                    <div class="form-inputs">

                        <input class="large hollow expand" required="required" type="email"
                            value="{{Auth::user()->email}}" name="user[email]" id="user_email">

                        <p>Can't be changed.</p>
                        {{-- <p><a rel="nofollow" data-method="post"
                                href="/users/haiderjaved-866/resend_email_confirmation?locale=uk">Resend</a></p> --}}

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-labels">
                        <label required="required" for="user_email">Phone</label>
                    </div>
                    <div class="form-inputs">

                        <input class="large hollow expand"  type="text"
                            value="{{Auth::user()->phone}}" name="phone" id="user_email">

                    </div>
                </div>

                {{-- <div class="form-row">
                    <div class="form-labels">
                        <label for="user_paypal_email">PayPal Email</label>
                    </div>
                    <div class="form-inputs">
                        <input class="large hollow expand" type="email" value="" name="user[paypal_email]"
                            id="user_paypal_email">
                        <p>Withdrawals will be sent to this PayPal account</p>
                    </div>
                </div> --}}

                {{-- <div class="form-row">
                    <div class="form-labels">
                        <label for="user-email">Instagram</label>
                    </div>
                    <div class="form-inputs">
                        <input placeholder="Your Username" class="large hollow expand" type="text"
                            name="user[instagram_username]" id="user_instagram_username">
                    </div>
                </div> --}}

                <div class="form-row">
                    <div class="form-labels">
                        <label for="user_apple">Apple ID</label>
                    </div>
                    <div class="form-inputs">
                        <a href="#" class="button large hollow expand"
                            data-turbolinks="false"><span class="large has-icon icon-apple">Connect Apple ID</span></a>
                        <small>Allows to sign in with Apple</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-labels">
                        <label for="user_facebook_url">Facebook</label>
                    </div>
                    <div class="form-inputs">
                        <a href="{{route('login.facebook')}}" class="button large hollow expand"
                            data-turbolinks="false"><span class="large has-icon icon-facebook-colored">Connect
                                Facebook</span></a>
                        <small>Allows to sign in using Facebook</small>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-labels">
                        <label for="user_facebook_url">Google</label>
                    </div>
                    <div class="form-inputs">
                        <a href="{{route('login.google')}}" class="button large hollow expand"
                            data-turbolinks="false"><span class="large has-icon icon-google">Connect
                                Google</span></a>
                        <small>Allows to sign in using Google</small>
                    </div>
                </div>




                <div class="form-row">
                    <div class="form-labels">
                        <label for="user-password">Password</label>
                    </div>
                    <div class="form-inputs">
                        <a class="button large hollow" href="{{route('change_password')}}">Change
                            password</a>
                    </div>
                </div>





                <div class="mb-20 form-row">
                    <div class="form-labels">

                    </div>
                </div>



                <div class="mt-10 actions equalize mb-30">
                    <div class="left">
                        <input type="submit" name="commit" value="Save" class="button large primary nomar"
                            data-disable-with="Save">
                        <!-- <a href="/users/haiderjaved-866?locale=uk" class="button large hollow">Cancel</a> -->
                    </div>
                    <div class="right">
                        <p class="delete-account-text">To delete your account, <a href="javascript:;" data-fancybox=""
                                data-type="ajax" data-src="/users/haiderjaved-866/delete-confirmation?locale=uk">click
                                here</a></p>
                    </div>
                </div>
            </form>
            <script type="text/javascript">
                $(document).on('input', '#delete-input-confirmation', function() {
                    console.log($(this).val());
                    if ($(this).val() == "DELETE") {
                        console.log("Can delete now");
                        $('#delete-account-final-step').removeAttr('disabled')
                    } else {
                        $('#delete-account-final-step').attr('disabled', 'true');
                    }
                })
            </script>

        </section>

    </div>
@endsection
