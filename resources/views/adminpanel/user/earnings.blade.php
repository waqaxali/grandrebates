@extends('adminpanel.layout.resources.user_main')

@section('user_content')

<div class="content-wrapper">
    <div class="double-col">
      <main>
        <h1>Earnings</h1>

        <div class="card earnings-withdrawal">
          <div class="left">

            <p>Add your PayPal to transfer payments.</p>
            <div class="actions">
              <a href="javascript:;" class="button primary" data-fancybox="" data-type="ajax" data-filter=".modal" data-src="/users/haiderjaved-866/add_paypal"><span class="icon"></span> Add your PayPal</a>
            </div>
          </div>
        </div>


    <h5 class="card-title">Your transactions</h5>


      <ul class="accordion-tabs-minimal">
        <li class="tab-header-and-content">
          <a href="javascript:;" class="tab-link is-active" data-loaded="true">Earnings</a>
          <div class="tab-content is-open">
            <ul class="accordion earnings-accordion">
              <li>
                <nav class="js-accordion-trigger"><span>Pending</span> <div class="meta">$0.51</div></nav>
                <div class="submenu earnings-menu pending">

                  <table class="table earnings-table">
                    <thead>
                      <tr>
                        <th><p><b>Store</b></p></th>
                        <th><p><b>Date / Time</b></p></th>
                        <th class="hide-on-small"><p><b>Transaction ID</b></p></th>
                        <th><p><b>Amount</b></p></th>
                        <!-- <th><p><b>Status</b></p></th> -->
                      </tr>
                    </thead>
                    <tbody id="transactions">
                      <tr>
                        <td>Crown Brush</td>
                        <td>2020/05/06  9:01 AM</td>
                        <td class="hide-on-small">
                            a6d3179e0e
                        </td>
                        <td>$0.51</td>
                        <!-- <td class="text-color-pending">pending</td> -->
                     </tr>
                    </tbody>
                  </table>

                </div>
              </li>
            </ul>
          </div>
        </li>
      </ul>



        <h5 class="card-title">Invite a friend - Earn $</h5>

        <div class="invite-a-friend">
          <header>
            <div class="left">
              <h3>Invite a friend to join Refermate and earn 10% of what they earn forever.</h3>
              <p>We’ll match 10% of whatever your friend earns. For example, if they earn $100 in cash back or commission, we’ll match you $10.</p>
            </div>
            <div class="illustration"></div>
          </header>
          <footer>
            <div class="h">
              <div class="button-group f1 nomar">
                <input type="text" name="" class="dashed f1" value="refermate.com/u/haiderjaved-866">
                <a href="javascript:;" class="clipboard button hollow" data-clipboard-text="https://refermate.com/u/haiderjaved-866">Copy URL</a>
              </div>
              <p>
                <small>or share via:</small>
              </p>
              <div class="share-icons ">
      <a target="_blank" title="Share on Facebook" href="" id="profile-facebook-share" class=" facebook">

      </a>
      <a target="_blank" title="Share on Twitter" href="" class=" twitter">

      </a>
      <a target="_blank" title="Share on Messenger" href="" id="profile-facebook-messenger" class=" messenger hide-on-small">

      </a>
      <a target="_blank" title="Share on Messenger" href="" id="profile-facebook-messenger-mobile" class=" messenger hide-on-medium">

      </a>
      <a target="_blank" title="Share on Pinterest" href="" class=" pinterest">

      </a>
      <a href="javascript:void(0);" title="Share via Email" id="email-profile-link" class=" mail" data-fancybox="" data-type="ajax" data-src="/">

      </a>
    </div>

            </div>
          </footer>
        </div>

        </main>

    </div>

    </div>
@endsection
