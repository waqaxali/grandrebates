@extends('adminpanel.layout.main')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row">
                <div class="col-md-8 offset-md-2 mt-4 mb-4">
                    <form action="simple-results.html">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Search or paste a product link">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
	<div class="container">
		<div class="content-header">
			<h1 class="text-dark">Welcome to Grandrebates,{{Auth::user()->name}} 👋</h1>
		</div>

		<div class="p-5 bg-white mb-4">
		<h3 class="col-md-12 p-0 mb-3">Featured Stores</h3>
		<div class="row">

			<div class="col-md-4">
				<img class="img-fluid" src="{{asset('dist/img/photo1.png')}}" alt="Photo">
				<h4 class="text-lg mt-2 mb-1">Cannabolish</h4>
                <p>6% commission &amp; cash back</p>
			</div>
			<div class="col-md-4">
				<img class="img-fluid" src="{{asset('dist/img/photo1.png')}}" alt="Photo">
				<h4 class="text-lg mt-2 mb-1">Cannabolish</h4>
                <p>6% commission &amp; cash back</p>
			</div>
			<div class="col-md-4">
				<img class="img-fluid" src="{{asset('dist/img/photo1.png')}}" alt="Photo">
				<h4 class="text-lg mt-2 mb-1">Cannabolish</h4>
                <p>6% commission &amp; cash back</p>
			</div>
		</div>
	</div><!--/content-->
		<div class="p-5 bg-white mb-4">
		<h3 class="col-md-12 p-0 mb-3">Top Deals</h3>
		<div class="row">

			<div class="col-md-3">
				<img class="img-fluid" src="{{asset('dist/img/photo1.png')}}" alt="Photo">
				<h4 class="text-lg mt-2 mb-1">Cannabolish</h4>
                <p>6% commission &amp; cash back</p>
			</div>
			<div class="col-md-3">
				<img class="img-fluid" src="{{asset('dist/img/photo1.png')}}" alt="Photo">
				<h4 class="text-lg mt-2 mb-1">Cannabolish</h4>
                <p>6% commission &amp; cash back</p>
			</div>
			<div class="col-md-3">
				<img class="img-fluid" src="{{asset('dist/img/photo1.png')}}" alt="Photo">
				<h4 class="text-lg mt-2 mb-1">Cannabolish</h4>
                <p>6% commission &amp; cash back</p>
			</div>
						<div class="col-md-3">
				<img class="img-fluid" src="{{asset('dist/img/photo1.png')}}" alt="Photo">
				<h4 class="text-lg mt-2 mb-1">Cannabolish</h4>
                <p>6% commission &amp; cash back</p>
			</div>
		</div>
	</div><!--/content-->
	</div><!--/main conttent end here-->
  </div><!-- /.content-wrapper -->



  @stop('content')





