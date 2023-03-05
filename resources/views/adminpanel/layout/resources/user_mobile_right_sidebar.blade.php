<nav class="js-menu sliding-menu-content init">
    <div class="side-view ">
    <div class="side-view-content">
      <div class="flex justify-between mb-sm hide-on-large-for-sidebar">
        <button class="button black nomar sliding-menu-close">
          Hide
          <svg style="margin-left: 6px;" width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.292787 9.70692C0.105316 9.51939 0 9.26508 0 8.99992C0 8.73475 0.105316 8.48045 0.292787 8.29292L3.58579 4.99992L0.292787 1.70692C0.110629 1.51832 0.00983372 1.26571 0.0121121 1.00352C0.0143906 0.741321 0.11956 0.490509 0.304968 0.305101C0.490376 0.119692 0.741189 0.0145233 1.00339 0.0122448C1.26558 0.00996641 1.51818 0.110761 1.70679 0.292919L5.70679 4.29292C5.89426 4.48045 5.99957 4.73475 5.99957 4.99992C5.99957 5.26508 5.89426 5.51939 5.70679 5.70692L1.70679 9.70692C1.51926 9.89439 1.26495 9.99971 0.999786 9.99971C0.734622 9.99971 0.480314 9.89439 0.292787 9.70692Z" fill="white"></path>
          </svg>
        </button>
      </div>

      <div class="nav-links-wrapper">

              <nav class="nav-links h-scroll">
                <a href="#">Anywhere<span class="badge">New</span></a>
                <a class="#"  href="/blog">Blog</a>
                <a class="" href="/influencers">Influencers</a>

              </nav>
      </div>


  <nav class="side-view-top-nav w-full ">
    <a href="#" class="user user-button-sidebar">

        @if (!empty(Auth::user()->avatar))
        <div class="avatar has-photo" style="background-image: url('{{asset('images/'.Auth::user()->avatar)}}')">
        @else
        <div class="avatar has-photo" style="background-image: url('{{asset('avatar/upload.png')}}')">
        @endif


        <div class="notification-badge" data-new-activity-badge="">1772</div>
      </div>
      <div>
        <div class="username"></div>
        <div class="earnings">$70.00</div>
      </div>
    </a>
  </nav>




        <ul class="accordion sidebar">
          <li id="earnings-glance">
            <nav class="js-accordion-trigger">Your earnings at a glance</nav>
            <div class="submenu">
              <div class="flex balance-row">
                <div class="balance">
                  <h2>$0.0 <span>Available</span></h2>
                </div>
                <div class="actions">
                  <a href="javascript:;" class="button small disabled">Withdraw to PayPal</a>
                </div>
              </div>
              <div class="flex">

  <div class="info">
      <p>Earn $25 in cash back or commission and receive a $5 bonus.</p>
  </div>
              </div>
            </div>
          </li>
          <li>
            <nav class="js-accordion-trigger">Complete your profile - earn $5</nav>
            <div class="submenu">
              <div class="complete-profile">
                <ul><li class="">Complete your 1st transaction</li>
                  <li class="done">Install our free browser extension</li>
                </ul>
              </div>
            </div>
          </li>
          <li>
            <nav class="js-accordion-trigger">Helpful tips</nav>
            <div class="submenu">
              <ul class="accordion accordion-tips">

                <li>
                  <nav class="js-accordion-trigger">Earning cash back</nav>
                  <div class="submenu">
                    <p>Earning cash back at Refermate has never been easier. Simply <a href="/search">search</a> for your favorite brand. Once on the store’s page, select “Cash Back”. Click on a coupon or discount you’d like to apply and complete your purchase at the brand’s website like you normally would.</p>
                  </div>
                </li>

                <li>
                  <nav class="js-accordion-trigger">Sharing my profile</nav>
                  <div class="submenu">
                    <p>Sharing your profile allows your friends and followers to shop your favorite products and looks. You’ll earn commission for every successfully inspired and referred purchase.</p>
                  </div>
                </li>

                <li>
                  <nav class="js-accordion-trigger">Refermate Anywhere</nav>
                  <div class="submenu">
                    <p>Refermate Anywhere is our free Chrome and Firefox browser extension that lets you use Refermate as you browse the web. You get the same great features as Refermate as well as the feature that applies coupon codes automatically for you at checkout. <a href="/anywhere">Download it here</a>.</p>
                  </div>
                </li>

              </ul>

              <nav class="nomar">
                <a class="button primary nomar" href="/help?ref=live_chat">Live Chat</a>
                <a href="mailto:help@refermate.com" class="button primary nomar">Email</a>
              </nav>
            </div>
          </li>
        </ul>

        <div class="card" id="invite-and-earn">
          <h2>invite friends &amp; earn forever</h2>
          <p>The more friends you invite, the more you’ll earn. Get up to 10% of every transaction that they earn for life.</p>
          <div class="buttons">
            <a href="{{route('social_media_share')}}" class="button white">Invite Now</a>
          </div>
          <div class="people"></div>
        </div>

        <ul class="accordion sidebar">
          <li id="earnings-glance">
            <nav class="js-accordion-trigger">Suggestions/Comments?</nav>
            <div class="submenu">
              <p>We take all feedback seriously. Let us know how we can make things better.</p>
              <a href="javascript:;" aria-label="Submit feedback" data-fancybox="" data-type="ajax" data-src="/feedback" data-filter=".for-modal" class="button hollow nomar b expand">Submit feedback</a>
            </div>
          </li>
        </ul>

      <div class="card flexcol">
        <h3>Follow us</h3>
        <div class="flex">
          <div class="social-icons">
                      <a target="_blank" rel="noopener" href="#" class="icon pinterest"></a>
            <a target="_blank" rel="noopener" href="#" class="icon instagram"></a>
            <a target="_blank" rel="noopener" href="#" class="icon twitter"></a>
            <a target="_blank" rel="noopener" href="#" class="icon facebook"></a>
          </div>
        </div>
      </div>

      <nav class="nav-links ">
          {{-- <a rel="nofollow" href="{{route('logout')}}">Log Out</a> --}}
          <a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
       </form>
        <a href="{{route('about')}}">About</a>
  <a href="{{route('all_post')}}">Blog</a>
  <a href="{{route('stores')}}">Stores</a>
  <a href="{{route('social_media_share')}}">Invite Friends</a>
  <a href="{{route('terms')}}">Privacy &amp; Terms</a>
  {{-- <a href="#" data-open-chat="">Help</a>
  <a href="#">Scholarship</a>
  <a href="#" target="_blank">Jobs</a> --}}
      </nav>

    </div>
  </div>

  </nav>
  <div class="js-menu-screen sliding-menu-fade-screen"></div>
