<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - INV-MGR</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/Auth/Login.css')}}">
</head>
<body>

<div class="container-fluid login-container">
    <div class="row h-100">

        <!-- LEFT SIDE (Brand / Info) -->
        <div class="col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center left-panel">
            <h2 class="mb-3">INV-MGR</h2>
            <p class="text-center px-5">
                Manage your inventory, orders, and reports in one powerful system.
            </p>

            <div class="mt-4">
                <div class="icon-box">📦 Inventory</div>
                <div class="icon-box">📊 Reports</div>
                <div class="icon-box">🚚 Orders</div>
            </div>
        </div>

        <!-- RIGHT SIDE (Login Form) -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="card login-card p-4 col-md-8">

                <h4 class="mb-3 brand">Find your email</h4>
                <p class="text-muted">Enter your phone number or recovery email</p>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('Send-LinkPassword') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-login w-100">Next</button>
                </form>

                <div class="text-center mt-3">
                    <small>© 2026 INV-MGR System</small>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
