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

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fb;
        }

        .login-container {
            height: 100vh;
        }

        .login-card {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border: none;
        }

        .brand {
            font-weight: 600;
            color: #ff6b00;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ff6b00;
        }

        .btn-login {
            background: #ff6b00;
            color: #fff;
            border-radius: 10px;
            padding: 12px;
        }

        .btn-login:hover {
            background: #e65c00;
        }

        .left-panel {
            background: linear-gradient(135deg, #1f2937, #111827);
            color: #fff;
            border-radius: 0 20px 20px 0;
        }

        .left-panel h2 {
            font-weight: 600;
        }

        .icon-box {
            background: rgba(255,255,255,0.1);
            padding: 10px;
            border-radius: 10px;
            display: inline-block;
        }
    </style>
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
                <div class="icon-box">📦 Inventory123</div>
                <div class="icon-box">📊 Reports</div>
                <div class="icon-box">🚚 Orders</div>
            </div>
        </div>

        <!-- RIGHT SIDE (Login Form) -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <div class="card login-card p-4 col-md-8">

                <h4 class="mb-3 brand">Welcome Back 👋</h4>
                <p class="text-muted">Login to your account</p>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- <form method="POST" action="{{ route('login.post') }}"> --}}
                <form method="POST">
                    
                    @csrf

                    <div class="mb-3">
                        <label>Email12</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <input type="checkbox" name="remember"> Remember
                        </div>
                        <a href="#" class="text-decoration-none">Forgot?</a>
                    </div>

                    <button class="btn btn-login w-100">Login</button>
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
