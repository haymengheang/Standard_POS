    <div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">

            <!-- Header -->
            <div class="modal-header border-0 p-4">

                <div>
                    <h3 class="fw-bold mb-1" style="color: var(--primary-orange)">
                        Edit Profile
                    </h3>

                    <p class="text-muted mb-0">
                        Update your personal information
                    </p>
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body px-4 pb-4">

                <form action="{{ route('skills.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      @method('PUT')
                    <div class="row g-4">

                        <!-- Profile Image -->
                        <div class="col-12 text-center">

                            <div class="position-relative d-inline-block">

                                <img src="{{ asset('uploads/' . Auth::user()->profile) }}" onclick="document.getElementById('inputfile').click()"
                                     id="previewImage"
                                     class="rounded-circle border border-4 border-white shadow"
                                     style="object-fit:cover; cursor:pointer;"
                                     width="120"
                                     height="120">

                                <label onclick="document.getElementById('inputfile').click()" style="background-color:var(--text-main); color: white;" class="btn btn-sm rounded-circle position-absolute bottom-0 end-0">
                                    <i class="fa fa-camera"></i>

                                    <input type="file" value="{{ Auth::user()->profile }}" name="image" id="inputfile" onchange="PreviewFile(event)" hidden>
                                </label>

                            </div>

                        </div>

                        <!-- Full Name -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Full Name
                            </label>

                            <input type="text" name="full_name" placeholder="Enter your full name"
                                   class="form-control rounded-3 p-3"
                                   value="{{ Auth::user()->full_name }}">
                        </div>

                        <!-- Username -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Username
                            </label>

                            <input type="text" name="name" placeholder="Enter your username"
                                   class="form-control rounded-3 p-3"
                                   value="{{ Auth::user()->name }}">
                        </div>

                        <!-- Location -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Location
                            </label>

                            <input type="text" name="location" placeholder="Enter your location"
                                   class="form-control rounded-3 p-3"
                                   value="{{ Auth::user()->location }}">
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">
                                Phone Number
                            </label>

                            <input type="text" name="phonenumber" placeholder="Enter your phone number"
                                   class="form-control rounded-3 p-3"
                                   value="{{ Auth::user()->phonenumber }}">
                        </div>

                        <!-- Bio -->
                        <div class="col-12">
                            <label class="form-label fw-semibold">
                                Bio
                            </label>

                            <textarea  class="form-control rounded-3 p-3"
                                      rows="4"
                                      placeholder="Write something about yourself..."name="bio">{{ Auth::user()->bio }}</textarea>
                        </div>


                        <!-- Skills -->
                        <div class="col-12">

                            <label class="form-label fw-semibold">
                                Skills
                            </label>

                            <div id="skills-container" class="d-flex flex-wrap gap-2 mb-3">
                            </div>
                            <div class="d-flex gap-2">


                            <div class="col-10">
                                <input type="text"
                                    id="skillInput"
                                    name="skillname"
                                    class="form-control rounded-3 p-3"
                                    placeholder="Add new skill">

                            </div>
                            <div class="col-3">
                                <button type="button" onclick="addSkill()"
                                        class="btn"
                                        style="background-color: var(--text-main); color: white; padding: 10px 20px; border-radius: 8px;">
                                    Add Skill
                                </button>
                            </div>

                            </div>

                            </div>
                        </div>

                    </div>
                    <!-- Footer Buttons -->
                    <div style="margin: 0px 30px 40px 0px" class=" d-flex justify-content-end gap-2 mt-4">
                             <button type="button"
                                class="btn btn-outline-dark px-4 py-2 rounded-3"
                                data-bs-dismiss="modal">
                            Cancel
                        </button>
                          <button style="background-color: var(--primary-orange); color: white;" type="submit"
                                class="btn px-4 py-2 rounded-3">
                            Save Changes
                        </button>
                    </div>
                     </form>
            </div>
        </div>
    </div>
</div>
