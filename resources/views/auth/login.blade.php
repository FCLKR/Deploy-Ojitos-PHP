<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="document" class="form-label">Numero de documento</label>
                    <input type="text" id="document" name="document" value="{{ old('document') }}" required autofocus autocomplete="document" class="form-control @error('document') is-invalid @enderror">
                    @error('document')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="current-password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input type="checkbox" id="remember_me" name="remember" class="form-check-input">
                    <label for="remember_me" class="form-check-label">Remember me</label>
                </div>

                <div class="d-flex justify-content-end">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="btn btn-link">
                            Forgot your password?
                        </a>
                    @endif
                    <button type="submit" class="btn btn-primary ms-3">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
