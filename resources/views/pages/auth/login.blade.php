@extends('/include/layouts/admin-empty-layout')
@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg ">Đăng nhập vào trang admin</p>
        @if (Session::has('error'))
            <p class="login-box-msg text-danger">{{ Session::get('error') }}</p>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class=" mb-3">
                <x-input name="email" type="email" placeholder="email" />
            </div>
            <div class="mb-3">
                <x-input name="password" type="password" placeholder="mật khậu" />
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">
                            nhớ mặt khẩu
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <x-button type="submit" class="btn-block">Đăng nhập </x-button>
                </div>
            </div>
        </form>
        <div class="social-auth-links text-center mb-3">
            <x-button link="{{ route('auth.driver', ['driver' => 'facebook']) }}" class="btn-block">
                <i class="fab fa-facebook mr-2"></i> đăng nhập Facebook
            </x-button>
            <x-button link="{{ route('auth.driver', ['driver' => 'google']) }}" class=" btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> đăng nhập Google+
            </x-button>
        </div>
    </div>
@endsection
