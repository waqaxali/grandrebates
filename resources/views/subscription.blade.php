@extends('adminpanel.layout.resources.modals')
@extends('adminpanel.layout.resources.header')

@section('content')
    <div class="container-fluid pricingTable pt-90">
        <div class="container">
		<h3 style="text-align:center">Choose the premium account to get double cashback!</h3>
		{{-- <p class="pb-30">
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
		</p> --}}


            <div class="row monthlyPriceList animated" style="margin-top:4%">
                <div class="col-md-4">

                </div>

                <div class="col-md-4">
                    <form  action="{!! URL::route('paypal1') !!}" method="POST">
                        @csrf
                    <div class="inner holder active">
                        <div class="hdng">
                            <p>Basic Plan</p>
                        </div>
                        <div class="price mt-5">
                            <p><b>$2.0</b><span> / month</span></p>
                        </div>
                        <input type="hidden" value="2" name="amount">
                        <div class="info">
                            <p>cashback 4%</p>
                            <p>Backlink Analysis</p>
                            <p>Organic Trafic 215%</p>
                            <p>10 Free Optimization</p>
                            <p>24/7 Support</p>
                        </div>
                        <div class="btn">
                            <input type ="submit" value="Buy Now"class="readon">
                        </div>
                    </div>
                </form>
                </div>


                <div class="col-md-4">

                </div>
            </div>


        </div>
    </div>





 {{-- <section id="faq mt-30" style="margin-top:5%;">
 <div class="container">
    <div class="column">
      <h2>Frequently Asked Questions</h2>

      <ul class="accordion faq">
        <li>
          <nav class="js-accordion-trigger">How does Refermate work?</nav>
          <div class="submenu">
            <p>Refermate gets paid by brands to send them sales. We pass a portion of what they pay us to you. It’s that simple.</p>
          </div>
        </li>
        <li>
          <nav class="js-accordion-trigger">How does the Refermate Anywhere browser extension work?</nav>
          <div class="submenu">
            <p>With the Refermate Anywhere app, you can use all the features of Refermate while you browse on your desktop computer or Safari browser for iOS (iPhone 6S and later models only). Supported browsers on the desktop are Google Chrome, Mozilla Firefox, and Safari.</p>
          </div>
        </li>
        <li>
          <nav class="js-accordion-trigger">Are there any hidden fees or costs?</nav>
          <div class="submenu">
            <p>Refermate will always be free to use. We get paid by brands to send them sales so there is no cost to you.</p>
          </div>
        </li>
      </ul>
    </div>
 </div>
</section> --}}



@endsection


