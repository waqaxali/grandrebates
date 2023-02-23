@extends('adminpanel.layout.resources.user_main')
@section('user_content')
    <div class="content-wrapper">



        <section class="profile-completion">
            <div class="container">
                <p><b>Bonus Earnings Level: +5%</b> - Increase your earnings by up to 10% on every transaction</p>
                <div class="profile-completion-bar">
                    <div class="progress" style="width: 16.67%"></div>
                    <span>
                        <span class="milestone">5%</span>
                    </span>
                    <span>
                    </span>
                    <span>
                    </span>
                    <span>
                    </span>
                    <span>
                    </span>
                    <span>
                    </span>
                </div>
                <p><a href="javascript:;" data-fancybox="" data-type="ajax" data-filter=".modal"
                        data-src="/users/haiderjaved-866/profile_completion"><span class="icon"></span> Increase
                        Earnings</a></p>
            </div>
        </section>



        <section class="profile-header container">
            <div class="left">
                <div class="avatar-wrapper">
                    <div class="avatar"
                        style="background-image: url(https://lh3.googleusercontent.com/a/ALm5wu2T3KJV-kHktRQtXXUOzlqD1UySi09pLSbYbYI4Yw=s96-c)">
                    </div>
                </div>
                <div class="content">
                    <h1>{{ Auth::user()->name }}</h1>
                    <div class="stats">
                        <span><b>$0.0</b> Earned</span>
                        {{-- <a href="/users/haiderjaved-866/saves"><b></b> Saves</a> --}}
                        <a href=""><b data-followers-counter-id="866">{{count($user->referrals)}}</b> Followers</a>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="action-wrapper">
                    <h6 class="action-wrapper-title">Available Earnings</h6>
                    <h1>$<span data-user-balance="866">0.00</span></h1>
                    <a href="javascript:;" class="button small paypal-button" data-fancybox="" data-type="ajax"
                        data-filter=".modal" data-src="/users/haiderjaved-866/add_paypal"><span class="icon"></span> Add
                        your PayPal</a>
                </div>
            </div>
        </section>


        <div class="tabs">
            <a href="{{route('earnings')}}" class="">Earnings</a>
            <a href="#" class="">Activity
                <div class="notification-badge" data-new-activity-badge=""></div>
            </a>
            <!-- <a href="/users/haiderjaved-866/store" class="">Store</a> -->
            {{-- <a href="{{route('saves')}}" class="">Saves</a> --}}
            <a href="{{route('settings')}}" class="">Settings</a>
        </div>


        <section class="padded">
            <div class="container">
                <header class="text-center border-bottom">
                    <h3 class="text-gray">Change password</h3>
                </header>

                <form action="{{ route('update_password') }}" method="post">

                    @csrf
                    <div class="field">
                        <label for="user_current_password">Current password</label>
                        <input placeholder="Current password" autocomplete="off" type="password" name="current_password"
                            class=" form-control @error('current_password') is-invalid @enderror">
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="user_password">New password</label>
                        <input placeholder="New password" autocomplete="new-password" type="password" name="new_password"
                            class="form-control @error('new_password') is-invalid @enderror">
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="user_password_confirmation">Password confirmation</label>
                        <input placeholder="New password" autocomplete="new-password" type="password"
                            name="confirm_password"
                            class=" form-control @error('confirm_password') is-invalid @enderror">
                        @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <input type="submit" name="submit" value="Update" >
                </form>
            </div>
        </section>

    </div>
@endsection
