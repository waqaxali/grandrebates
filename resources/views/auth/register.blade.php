<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>| Registration Page (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('/dist/css/adminlte.min.css') }}">
       <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                {{-- <a href="{{ url('/admin/dashboard') }}" class="h1"><b>{{config('constants.app_name')}}</b></a> --}}
                <a href="{{ url('/admin/dashboard') }}" class="h1"><b>My Project</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>
                <!-- flash-message -->
                <div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                  @endforeach
                </div> <!-- end .flash-message -->

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control @error('fullname') is-invalid @enderror"
                            placeholder="Full name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            placeholder="Phone" value="{{ old('phone') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                      <div class="input-group mb-3">
                        <select name="group_id"
                        class="select2bs4 form-control" placeholder="Select Role">

                    </select>
                    <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-building"></span>
                      </div>
                  </div>
                          @error('group_id')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="123">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" required
                                    class="@error('terms') is-invalid @enderror" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                            @error('terms')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <a href="{{url('/admin/login')}}" class="text-center">I already have a membership</a>

                 <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="{{route('login.facebook')}}" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="{{route('login.google')}}" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                    <a href="{{route('login.github')}}" class="btn btn-block btn-secondary">
                        <i class="fab fa-github mr-2"></i> Sign in using gitHub
                    </a>
                </div>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ url('/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/dist/js/adminlte.min.js') }}"></script>
        <!-- Select2 -->
    <script src="{{ url('/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
                });
            });
            </script>
</body>

</html>
