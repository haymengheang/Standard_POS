@extends('Main')

@section('content')

<main class="main-wrapper">


    <div class="container py-4 content-wrapper">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

            <div>
                <h2 class="fw-bold mb-1 text-dark">
                    User Profile
                </h2>

                <p class="text-muted mb-0">
                    Manage your personal information
                </p>
            </div>

            <button class="btn btn-primary px-4 py-2 rounded-3 shadow-sm">
                <i class="fa-solid fa-pen-to-square me-2"></i>
                Edit Profile
            </button>

        </div>

        <div class="row g-4">

            <!-- LEFT PROFILE -->
            {{-- <div class="col-lg-4"> --}}
                <div class="col-xl-3 col-lg-4">

                <div class="card profile-card h-100">

                    <!-- Cover -->
                    <div class="profile-cover"></div>

                    <!-- Avatar -->
                    <div class="text-center">
                        <img src="https://i.pravatar.cc/150?img=12"
                             class="profile-avatar"
                             alt="User Profile">
                    </div>

                    <div class="card-body text-center pt-2">

                        <h3 class="fw-bold mb-1">
                            Hay Mengheang
                        </h3>

                        <p class="text-muted mb-4">
                            Full Stack Developer
                        </p>

                        <!-- Skills -->
                        <div class="d-flex justify-content-center gap-2 flex-wrap mb-4">

                            <span class="badge bg-primary-subtle text-primary badge-skill">
                                Laravel
                            </span>

                            <span class="badge bg-success-subtle text-success badge-skill">
                                VB.NET
                            </span>

                            <span class="badge bg-warning-subtle text-warning badge-skill">
                                SQL Server
                            </span>

                        </div>

                        <hr>

                        <!-- Contact -->
                        <div class="text-start mt-4">

                            <div class="d-flex align-items-center mb-4">

                                <div class="contact-icon text-primary">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>

                                <div>
                                    <small class="text-muted d-block">
                                        Email
                                    </small>

                                    <span>
                                        example@gmail.com
                                    </span>
                                </div>

                            </div>

                            <div class="d-flex align-items-center mb-4">

                                <div class="contact-icon text-success">
                                    <i class="fa-solid fa-phone"></i>
                                </div>

                                <div>
                                    <small class="text-muted d-block">
                                        Phone
                                    </small>

                                    <span>
                                        +855 12 345 678
                                    </span>
                                </div>

                            </div>

                            <div class="d-flex align-items-center">

                                <div class="contact-icon text-danger">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>

                                <div>
                                    <small class="text-muted d-block">
                                        Location
                                    </small>

                                    <span>
                                        Phnom Penh, Cambodia
                                    </span>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT CONTENT -->
            {{-- <div class="col-lg-8"> --}}
                <div class="col-xl-9 col-lg-8">

                <!-- Personal Information -->
                <div class="card custom-card mb-4">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-4">

                            <div class="icon-box bg-primary-subtle text-primary me-3">
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <div>
                                <h5 class="fw-bold mb-0">
                                    Personal Information
                                </h5>

                                <small class="text-muted">
                                    User account details
                                </small>
                            </div>

                        </div>

                        <div class="row g-4">

                            <div class="col-md-6">
                                <label class="form-label">
                                    Full Name
                                </label>

                                <input type="text"
                                       class="form-control"
                                       value="Hay Mengheang"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Username
                                </label>

                                <input type="text"
                                       class="form-control"
                                       value="mengheang"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Email Address
                                </label>

                                <input type="email"
                                       class="form-control"
                                       value="example@gmail.com"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input type="text"
                                       class="form-control"
                                       value="+855 12 345 678"
                                       readonly>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- Security -->
                <div class="card custom-card">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-4">

                            <div class="icon-box bg-warning-subtle text-warning me-3">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>

                            <div>
                                <h5 class="fw-bold mb-0">
                                    Security
                                </h5>

                                <small class="text-muted">
                                    Manage account security
                                </small>
                            </div>

                        </div>

                        <div class="security-box">

                            <div>

                                <h6 class="fw-semibold mb-1">
                                    Password
                                </h6>

                                <small class="text-muted">
                                    Last changed 30 days ago
                                </small>

                            </div>

                            <button class="btn btn-outline-primary rounded-3 px-4">
                                Change Password
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


</main>
<style>

    body{
        background:#f5f7fb;
    }

    .main-content{
        min-height:100vh;
        display:flex;
        flex-direction:column;
    }

    .content-wrapper{
         width:100%;
    max-width:100%;
        flex:1;
    }

    .profile-card,
    .custom-card{
        border:none;
        border-radius:22px;
        overflow:hidden;
        box-shadow:0 5px 18px rgba(0,0,0,0.05);
        transition:0.3s;
    }

    .profile-card:hover,
    .custom-card:hover{
        transform:translateY(-3px);
    }

    .profile-cover{
        height:130px;
        background:linear-gradient(135deg,#4f46e5,#7c3aed);
    }

    .profile-avatar{
        width:110px;
        height:110px;
        border-radius:50%;
        object-fit:cover;
        border:5px solid white;
        margin-top:-55px;
        box-shadow:0 4px 12px rgba(0,0,0,0.15);
    }

    .badge-skill{
        padding:8px 16px;
        border-radius:30px;
        font-size:13px;
    }

    .contact-icon{
        width:42px;
        height:42px;
        border-radius:12px;
        background:#f8f9fa;
        display:flex;
        align-items:center;
        justify-content:center;
        margin-right:15px;
        font-size:16px;
    }

    .icon-box{
        width:50px;
        height:50px;
        border-radius:15px;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:18px;
    }

    .form-control{
        height:50px;
        border-radius:14px;
        border:1px solid #e5e7eb;
    }

    .form-control:focus{
        box-shadow:none;
        border-color:#4f46e5;
    }

    .security-box{
        border:1px solid #ececec;
        border-radius:18px;
        padding:20px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;
        gap:15px;
    }

    .footer-area{
        margin-top:40px;
        background:white;
        border-top:1px solid #ececec;
        padding:20px 0;
    }

</style>

@endsection
