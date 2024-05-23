@extends('/include/layouts/admin-empty-layout')
@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg ">login</p>
        @if (Session::has('error'))
            <p class="login-box-msg text-danger">{{ Session::get('error') }}</p>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class=" mb-3">
                <x-input name="email" type="email" placeholder="email" />
            </div>
            <div class="mb-3">
                <x-input name="password" type="password" placeholder="password" />
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <x-button type="submit" class="btn-block">Sign In </x-button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <x-button link="#" class="btn-block">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </x-button>
            <x-button href="#" class=" btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </x-button>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p>
    </div>
    <!-- /.login-card-body -->
@endsection
