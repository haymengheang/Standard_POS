@extends('Main')

@section('content')
<meta name="csrf-token"
      content="{{ csrf_token() }}">

<script>

    const skillStoreUrl =
        "{{ route('skills.store') }}";

    const skillIndexUrl =
        "{{ route('skills.index') }}";

    const skillDestroyUrl = (id) =>
        "{{ url('/skills') }}/" + id;

    // // Load existing skills from database
    // async function loadSkills(containerId, showDelete = false) {
    //     try {
    //         let response = await fetch(skillIndexUrl);
    //         let skills = await response.json();

    //         let container = document.getElementById(containerId);
    //         container.innerHTML = ''; // Clear existing

    //         // Random colors
    //         let colors = [
    //             'bg-primary-subtle text-primary',
    //             'bg-success-subtle text-success',
    //             'bg-danger-subtle text-danger',
    //             'bg-warning-subtle text-warning',
    //             'bg-info-subtle text-info'
    //         ];

    //         skills.forEach(skill => {
    //             let randomColor = colors[Math.floor(Math.random() * colors.length)];

    //             let badge = document.createElement('span');
    //             badge.className = `badge ${randomColor} px-3 py-2`;

    //             let badgeContent = skill.skillname;
    //             if (showDelete) {
    //                 badgeContent += ` <i class="fa fa-xmark ms-2" style="cursor:pointer" onclick="deleteSkill(${skill.id})"></i>`;
    //             }

    //             badge.innerHTML = badgeContent;

    //             container.appendChild(badge);
    //         });
    //     } catch (error) {
    //         console.log('Error loading skills:', error);
    //     }
    // }

    // // Load skills for profile
    // async function loadSkillsForProfile() {
    //     await loadSkills('profile-skills-container', false);
    // }

    // // Load skills for modal
    // async function loadSkillsForModal() {
    //     await loadSkills('skills-container', true);
    // }

    // // Delete a skill
    // async function deleteSkill(skillId) {
    //     if (!confirm('Are you sure you want to delete this skill?')) {
    //         return;
    //     }

    //     try {
    //         const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    //         let response = await fetch(skillDestroyUrl(skillId), {
    //             method: 'DELETE',
    //             headers: {
    //                 'X-CSRF-TOKEN': csrfToken || ''
    //             }
    //         });

    //         if (response.ok) {
    //             // Reload skills
    //             loadSkillsForProfile();
    //             loadSkillsForModal();
    //         } else {
    //             alert('Failed to delete skill');
    //         }
    //     } catch (error) {
    //         console.log('Error deleting skill:', error);
    //     }
    // }

    // // Load skills when modal is shown
    // document.addEventListener('DOMContentLoaded', function () {
    //     const editProfileModal = document.getElementById('editProfileModal');
    //     if (editProfileModal) {
    //         editProfileModal.addEventListener('show.bs.modal', function () {
    //             loadSkillsForModal();
    //         });
    //     }
    // });

</script>
<script src="{{ asset('assets/JS/ProfileInformation.js') }}"></script>
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
            <button class="btn px-4 py-2 rounded-3"  style="background-color: var(--primary-orange); color: white;"
                    data-bs-toggle="modal"
                    data-bs-target="#editProfileModal">

                <i class="fa fa-pen-to-square me-2"></i>
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
                        <img src="{{ Auth::user()->profile ? asset('uploads/' . Auth::user()->profile) : 'https://i.pravatar.cc/150?img=12' }}"
                             class="profile-avatar"
                             alt="User Profile">
                    </div>

                    <div class="card-body text-center pt-2">

                        <h3 class="fw-bold mb-1">
                           {{ Auth::user()->full_name }}
                        </h3>

                        <p class="text-muted mb-4">
                            {{ Auth::user()->position }}
                        </p>

                        <!-- Skills -->
                        <div id="profile-skills-container" class="d-flex justify-content-center gap-2 flex-wrap mb-4">
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
                                       {{ Auth::user()->email }}
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
                                        {{ Auth::user()->phonenumber }}
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
                                        {{ Auth::user()->location }}
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

                            <div style="color: var(--primary-orange); background-color: rgba(236, 166, 35, 0.205);" class="icon-box me-3">
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
                                       value="{{ Auth::user()->full_name }}"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Username
                                </label>

                                <input type="text"
                                       class="form-control"
                                       value="{{ Auth::user()->name }}"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Email Address
                                </label>

                                <input type="email"
                                       class="form-control"
                                       value="{{ Auth::user()->email }}"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input type="text"
                                       class="form-control"
                                       value="{{ Auth::user()->phonenumber }}"
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

                            <button style="background-color: var(--primary-orange); color: white;" class="btn  rounded-3 px-4">
                                Change Password
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    {{-- =====================Models Change Profile ======================= --}}
    @include('AuthLogin.Models.ModelsChangeProfile');
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
        background:linear-gradient(135deg ,#1e293b,#1e293b);
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
        border-color: var(--primary-orange);
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
