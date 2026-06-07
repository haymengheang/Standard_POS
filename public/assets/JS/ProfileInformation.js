
    //=============== Load existing skills from database ================
    async function loadSkills(containerId, showDelete = false) {
        try {
            let response = await fetch(skillIndexUrl);
            let skills = await response.json();

            let container = document.getElementById(containerId);
            container.innerHTML = ''; // Clear existing

            // Random colors
            let colors = [
                'bg-primary-subtle text-primary',
                'bg-success-subtle text-success',
                'bg-danger-subtle text-danger',
                'bg-warning-subtle text-warning',
                'bg-info-subtle text-info'
            ];

            skills.forEach(skill => {
                let randomColor = colors[Math.floor(Math.random() * colors.length)];

                let badge = document.createElement('span');
                badge.className = `badge ${randomColor} px-3 py-2`;

                let badgeContent = skill.skillname;
                if (showDelete) {
                    badgeContent += ` <i class="fa fa-xmark ms-2" style="cursor:pointer" onclick="deleteSkill(${skill.id})"></i>`;
                }

                badge.innerHTML = badgeContent;

                container.appendChild(badge);
            });
        } catch (error) {
            console.log('Error loading skills:', error);
        }
    }

    // Load skills for profile
    async function loadSkillsForProfile() {
        await loadSkills('profile-skills-container', false);
    }

    // Load skills for modal
    async function loadSkillsForModal() {
        await loadSkills('skills-container', true);
    }

    // Delete a skill
    async function deleteSkill(skillId) {
        if (!confirm('Are you sure you want to delete this skill?')) {
            return;
        }

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            let response = await fetch(skillDestroyUrl(skillId), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken || ''
                }
            });

            if (response.ok) {
                // Reload skills
                loadSkillsForProfile();
                loadSkillsForModal();
            } else {
                alert('Failed to delete skill');
            }
        } catch (error) {
            console.log('Error deleting skill:', error);
        }
    }

    // Load skills when modal is shown
    document.addEventListener('DOMContentLoaded', function () {
        const editProfileModal = document.getElementById('editProfileModal');
        if (editProfileModal) {
            editProfileModal.addEventListener('show.bs.modal', function () {
                loadSkillsForModal();
            });
        }
    });



    // ============= Profile Information JS ==========
    function PreviewFile(event){
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('previewImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    // ============== skills initialization ==============
    document.addEventListener('DOMContentLoaded', function () {

        let skillInput = document.getElementById('skillInput');

        skillInput.addEventListener('keydown', function (e) {

            if (e.key === 'Enter') {

                e.preventDefault();

                addSkill();
            }

        });

        loadSkillsForProfile();

    });

    async function addSkill() {

        let input = document.getElementById('skillInput');

        let skill = input.value.trim();

        if (skill === '') {
            return;
        }

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            let response = await fetch(skillStoreUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken || ''
                },
                body: JSON.stringify({
                    skillname: skill
                })
            });

            if (!response.ok) {
                const responseText = await response.text();
                throw new Error(`Request failed with status ${response.status}: ${responseText}`);
            }

            let data = await response.json();

            if (data.success) {

                // Random colors
                let colors = [
                    'bg-primary-subtle text-primary',
                    'bg-success-subtle text-success',
                    'bg-danger-subtle text-danger',
                    'bg-warning-subtle text-warning',
                    'bg-info-subtle text-info'
                ];

                let randomColor =
                    colors[Math.floor(Math.random() * colors.length)];

                // Create badge
                let badge =
                    document.createElement('span');

                badge.className =
                    `badge ${randomColor} px-3 py-2`;

                badge.innerHTML = `
                    ${skill}
                    <i class="fa fa-xmark ms-2"
                    style="cursor:pointer"
                    onclick="deleteSkill(${data.skill.id})">
                    </i>
                `;

                document
                    .getElementById('skills-container')
                    .appendChild(badge);

                // Clear input
                input.value = '';

                // Reload skills
                loadSkillsForProfile();
                loadSkillsForModal();
            }

        } catch (error) {

            console.log(error);

        }

    }

    //=================== Delete a skill ===================
    async function deleteSkill(skillId) {
        // if (!confirm('Are you sure you want to delete this skill?')) {
        //     return;
        // }

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            let response = await fetch(skillDestroyUrl(skillId), {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken || ''
                }
            });

            if (response.ok) {
                // Reload skills
                loadSkillsForProfile();
                loadSkillsForModal();
            } else {
                alert('Failed to delete skill');
            }
        } catch (error) {
            console.log('Error deleting skill:', error);
        }
    }


