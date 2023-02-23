@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')

@section('content')
    <div class="content-wrapper">
        <section class="padded" id="invite-page">
            <header>
                <div class="container">
                    <div class="left">
                        <div class="people">&nbsp;</div>
                    </div>
                    <div class="right">
                        <div class="text-content">
                            <h1>invite friends &amp; earn forever</h1>
                            <p>The more friends you invite, the more you’ll earn. Get up to 10% of every transaction that
                                they earn for life.</p>
                        </div>
                    </div>
                </div>
            </header>
        </section>



        <section id="invite-steps">
            <div class="row">
                <div class="medium-12">
                    <div class="step">
                        <header>
                            <div class="number one"></div>
                            <h2>Invite a friend to sign up for Refermate using your personal invite link below.</h2>
                        </header>
                    </div>

                    <div class="step">
                        <header>
                            <div class="number two"></div>
                            <h2>Everytime your friend completes a purchase, we’ll pay you 10% of everything they’ve earned,
                                paid by Refermate.</h2>
                        </header>
                    </div>

                    <div class="step">
                        <header>
                            <div class=""></div>
                            <div class="example">
                                <p class="omg-11px">Example:</p>
                                <div class="example-timeline">
                                    <div id="you">
                                        <div class="illustration"></div>
                                        <p></p>
                                    </div>

                                    <div class="arrow">
                                        <p>Invite</p>
                                    </div>

                                    <div id="friend">
                                        <div class="illustration"></div>
                                        <p>Your friend</p>
                                    </div>

                                    <div class="arrow">
                                        <p>She earns</p>
                                    </div>

                                    <div id="cashback">
                                        <div class="illustration"></div>
                                        <p>$10 Cash Back</p>
                                    </div>

                                    <div class="arrow">
                                        <p></p>
                                    </div>

                                    <div id="">
                                        <img src="{{asset('avatar/grandrebates.png')}}" style="width:150px" alt="">
                                        <div class="illustration"></div>
                                        <p>pays you</p>
                                    </div>

                                    <div class="arrow">
                                        <p></p>
                                    </div>

                                    <div id="you">
                                        <div class="illustration"></div>
                                        <p>$1 (1%)</p>
                                    </div>

                                    <div class="arrow">
                                        <p></p>
                                    </div>

                                    <div id="repeat">
                                        <div class="illustration">Repeat and keep earning.</div>
                                        <p>There’s no limit on how much you can earn. $1000 earned by friends will earn you
                                            $100, etc...</p>
                                    </div>
                                </div>

                                <h2>$10 earned by a friend = $1 (10%) earned for you.</h2>
                                <p class="gray">Your friend just completed a purchase at SKIMS and earned $10 in cash
                                    back. Because you invited her to Refermate, you’ll earn $1, paid by Refermate, not your
                                    friend). Same goes for if your friend earns $10 in commission at SKIMS, we’ll pay you $1
                                    for the referral. With the $50 earnings bonus, you could make $10. Your earnings amount
                                    is uncapped on the 10% bonus, so keep on inviting friends!</p>
                            </div>
                        </header>
                    </div>

                    <div class="step hide-on-small">
                        <header>
                            <div class="number two"></div>
                            <h2>Invite as many friends as you like. The more you invite, the more you earn.</h2>
                        </header>
                    </div>
                </div>
            </div>

            {!! $shareComponent !!}


        </section>



        <section id="invite-now">
            <div class="row">
                <div class="medium-12">
                    <div class="container">
                        <h1>invite <span class="hide-on-small"><br></span> now</h1>
                        <div class="h">
                            <div class="button-group f1 nomar">
                                <input type="text" name="" class="dashed f1"
                                    value="{{config('app.url').'/reffereduser/'.Auth::user()->username}}">
                                <a href="javascript:;" class="clipboard button black"
                                    data-clipboard-text="{{config('app.url').'/reffereduser/'.Auth::user()->username}}">Copy URL</a>
                            </div>
                            {{-- <p>
                                or share via:
                            </p> --}}
                            <div class="share-icons with-names">

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
