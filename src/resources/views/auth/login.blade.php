<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン | @yield('title')</title>

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
        }

        .layout-login {
            background-color: #ecf0f1;
            min-height: 100vh;
        }

        .login-container {
            padding: 80px 16px;
            max-width: 480px;
            margin: 0 auto;
        }

        .login-title-block {
            text-align: center;
            padding-bottom: 24px;
        }

        .login-form-block {
            background-color: #fff;
            border-radius: 8px;
            padding: 24px;
        }

        .invalid-feedback {
            color: red;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .login-input-row {
            margin-top: 16px;
        }
    </style>

</head>

<body>

    <main class="layout-login">
        <div class="login-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="login-title-block">
                    <h1>{{ config('app.name') }} login</h1>
                </div>

                <div class="login-form-block">
                    {{-- Email --}}
                    <div class="login-input-row">
                        <label for="userEmailInput">
                            <span>E-mail</span>
                        </label>
                        <input id="userEmailInput" type="email" name="email"
                            value="{{ old('email') }}">
                    </div>

                    {{-- Password --}}
                    <div class="login-input-row">
                        <label for="userPasswordInput">
                            <span>Password</span>
                        </label>
                        <input id="userPasswordInput" type="password" name="password">
                    </div>

                    {{-- Remember Me --}}
                    <div class="login-input-row">
                        <label for="userRememberMeInput">
                            <input id="userRememberMeInput" type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>
                    </div>

                    {{-- Validation Message --}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="invalid-feedback">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <div class="login-input-row">
                        <button>ログイン</button>
                    </div>
                </div>

            </form>
        </div>
    </main>

</body>

</html>
