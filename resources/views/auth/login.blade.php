<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome/all.min.css') }}">
  <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/kanit_thai/index.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
</head>

<body>

  <!-- ========== signin-section start ========== -->
  <section class="signin-section">
    <div class="container-fluid">

      <div class="row g-0 auth-row">
        <div class="col-lg-6">
          <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
              <div class="title text-center">
                <h1 class="text-primary mb-10">Welcome Back</h1>
                <p class="text-medium">
                  Sign in to your Existing account to continue
                </p>
              </div>
              <div class="cover-image">
                <img src="https://demo.plainadmin.com/assets/images/auth/signin-image.svg" alt="" />
              </div>
              <div class="shape-image">
                <img src="https://demo.plainadmin.com/assets/images/auth/shape.svg" alt="" />
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
        <div class="col-lg-6">
          <div class="signin-wrapper">
            <div class="form-wrapper">
              <img src="{{asset('image/logo_overflow.png')}}" alt="" width="300"
                class="mx-auto d-block mb-3 mb-md-4 mb-lx-5 img-fluid">
              <h2 class="mb-15">Sign In Form</h2>
              <p class="text-sm mb-25">
                Start creating the best possible user experience for you
                customers.
              </p>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="input-style-1">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" class="@error('email') is-invalid @enderror" required autocomplete="email" autofocus />
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <p>{{ $message }}</p>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="input-style-1">
                      <label for="password">Password</label>
                      <input type="password" id="password" placeholder="Password" name="password" required class="@error('password') is-invalid @enderror" autocomplete="current-password" />
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <p>{{ $message }}</p>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-xxl-6 col-lg-12 col-md-6">
                    <div class="form-check checkbox-style mb-30">
                      <input class="form-check-input" type="checkbox" name="remember" id="checkbox-remember"
                        {{ old('remember') ? 'checked' : '' }} />
                      <label class="form-check-label" for="checkbox-remember">
                        Remember me next time</label>

                    </div>
                  </div>
                  <!-- end col -->
                  <div class="col-xxl-6 col-lg-12 col-md-6">
                    @if (Route::has('password.request'))
                    <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                      <a href="{{ route('password.request') }}" class="hover-underline">Forgot Password?</a>
                    </div>
                    @endif
                  </div>
                  <!-- end col -->
                  <div class="col-12">
                    <div class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          ">
                      <button class="
                              main-btn
                              primary-btn
                              btn-hover
                              w-100
                              text-center
                            ">
                        Sign In
                      </button>
                    </div>
                  </div>
                </div>
                <!-- end row -->
              </form>

            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
  </section>
  <!-- ========== signin-section end ========== -->
  <!-- ======== main-wrapper end =========== -->

  <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/fontawesome/all.min.js') }}"></script>
  <script src="{{ asset('js/admin/main.js') }}"></script>
  <script src="{{ asset('js/admin/custom.js') }}"></script>

</body>

</html>