$(document).ready(function () {
    var counters = {
        skill: 1,
        education: 1,
        experience: 1,
        language: 1,
        project: 1,
    };


    function createSkillSection() {
        var sectionHtml = `
            <div class="skill-entry-edit-resume" id="skill_section_${counters.skill}">
            <span class="color-bar"></span>
                <div class="one-row">
                    <div>
                        <label class="label-edit-resume" for="skill_name_${counters.skill}">Skill:</label>
                        <input type="text" id="skill_name_${counters.skill}" name="skill_name[${counters.skill}]" class="input-edit-resume">
                    </div>
                    <div>
                        <label class="label-edit-resume" for="skill_level_${counters.skill}">Level:</label>
                        <select id="skill_level_${counters.skill}" name="skill_level[${counters.skill}]" class="select-edit-resume">
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                            <option value="Expert">Expert</option>
                            <option value="Master">Master</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="remove_section_btn" data-section-id="skill_section_${counters.skill}">Remove</button>
            </div>
        `;
        counters.skill++;
        return sectionHtml;
    }

    function createLanguageSection() {
        var sectionHtml = `
            <div class="language-entry-edit-resume " id="language_section_${counters.language}">
            <span class="color-bar"></span>
                <div class="one-row">
                    <div>
                        <label class="label-edit-resume" for="language_name${counters.language}">Language:</label>
                        <input type="text" id="language_name_${counters.language}" name="language_name[${counters.language}]" class="input-edit-resume">
                    </div>
                    <div>
                        <label class="label-edit-resume" for="proficiency_${counters.language}">Proficiency:</label>
                        <select id="proficiency_${counters.language}" name="proficiency[${counters.language}]" class="select-edit-resume">
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                            <option value="Fluent">Fluent</option>
                            <option value="Native">Native</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="remove_section_btn" data-section-id="language_section_${counters.language}">Remove</button>
            </div>
        `;
        counters.language++;
        return sectionHtml;
    }

    function createEducationSection() {
        var sectionHtml = `
            <div class="education-entry-edit-resume" id="education_section_${counters.education}">
            <span class="color-bar"></span>
                <div class="one-row">
                    <div>
                        <label class="label-edit-resume" for="institution_${counters.education}">Institution:</label>
                        <input type="text" id="institution_${counters.education}" name="institution[${counters.education}]" class="input-edit-resume">
                    </div>
                    <div>
                        <label class="label-edit-resume" for="degree_${counters.education}">Degree:</label>
                        <input type="text" id="degree_${counters.education}" name="degree[${counters.education}]" class="input-edit-resume">
                    </div>
                </div>
                <div class="date-fields-edit-resume">
                    <div>
                        <label class="label-edit-resume" for="start_date_education_${counters.education}">Start Date:</label>
                        <input type="date" id="start_date_education_${counters.education}" name="start_date_education[${counters.education}]" class="input-edit-resume">
                    </div>
                    <div>
                        <label class="label-edit-resume" for="end_date_education_${counters.education}">End Date:</label>
                        <input type="date" id="end_date_education_${counters.education}" name="end_date_education[${counters.education}]" class="input-edit-resume">
                    </div>
                </div>
                <button type="button" class="remove_section_btn" data-section-id="education_section_${counters.education}">Remove</button>
            </div>
        `;
        counters.education++;
        return sectionHtml;
    }

    function createExperienceSection() {
        var sectionHtml = `
            <div class="experience-entry-edit-resume" id="experience_section_${counters.experience}">
            <span class="color-bar"></span>
                <div class="one-row">
                    <div>
                        <label class="label-edit-resume" for="company${counters.experience}">Company:</label>
                        <input type="text" id="company${counters.experience}" name="company[${counters.experience}]" class="input-edit-resume">
                    </div>
                    <div>
                        <label class="label-edit-resume" for="position${counters.experience}">Positon:</label>
                        <input type="text" id="position${counters.experience}" name="position[${counters.experience}]" class="input-edit-resume">
                    </div>
                </div>
                <div class="date-fields-edit-resume">
                    <div>
                        <label class="label-edit-resume" for="start_date_experience_${counters.experience}">Start Date:</label>
                        <input type="date" id="start_date_experience_${counters.experience}" name="start_date_experience[${counters.experience}]" class="input-edit-resume">
                    </div>
                    <div>
                        <label class="label-edit-resume" for="end_date_experience_${counters.experience}">End Date:</label>
                        <input type="date" id="end_date_experience_${counters.experience}" name="end_date_experience[${counters.experience}]" class="input-edit-resume">
                    </div>
                </div>
                <label class="label-edit-resume" for="description_experience_${counters.experience}">Description:</label>
                <textarea id="description_experience_${counters.experience}" name="description_experience[${counters.experience}]" class="textarea-edit-resume"></textarea>
                <button type="button" class="remove_section_btn" data-section-id="experience_section_${counters.experience}">Remove</button>
            </div>
        `;
        counters.experience++;
        return sectionHtml;
    }

    function createProjectSection() {
        var sectionHtml = `
            <div class="project-entry-edit-resume" id="project_section_${counters.project}">
            <span class="color-bar"></span>
                    <div>
                        <label class="label-edit-resume" for="project_name${counters.project}">Project Name:</label>
                        <input type="text" id="project_name_${counters.project}" name="project_name[${counters.project}]" class="input-edit-resume">
                    </div>

                <label class="label-edit-resume" for="description_project${counters.project}">Description:</label>
                <textarea id="description_project_${counters.project}" name="description_project[${counters.project}]" class="textarea-edit-resume"></textarea>
                <button type="button" class="remove_section_btn" data-section-id="project_section_${counters.project}">Remove</button>
            </div>
        `;
        counters.project++;
        return sectionHtml;
    }

    $(".add_section_btn").on("click", function () {
        var section = $(this).data("section");
        var newSectionHtml = "";
        switch (section) {
            case "skill":
                if (counters.skill < 5) newSectionHtml = createSkillSection();
                else alert("You can only add up to 4 skill sections.");
                $("#skills_fieldset").append(newSectionHtml);
                break;
            case "language":
                if (counters.language < 5) newSectionHtml = createLanguageSection();
                else alert("You can only add up to 4 language sections.");
                $("#languages_fieldset").append(newSectionHtml);
                break;
            case "project":
                if (counters.project < 3) newSectionHtml = createProjectSection();
                else alert("You can only add up to 2 project sections.");
                $("#projects_fieldset").append(newSectionHtml);
                break;
            case "education":
                if (counters.education < 3) newSectionHtml = createEducationSection();
                else alert("You can only add up to 2 education sections.");
                $("#educations_fieldset").append(newSectionHtml);
                break;
            case "experience":
                if (counters.experience < 3) newSectionHtml = createExperienceSection();
                else alert("You can only add up to 2 experience sections.");
                $("#experiences_fieldset").append(newSectionHtml);
                break;
            default:
                break;
        }
    });

    $(document).on("click", ".remove_section_btn", function () {
        var sectionId = $(this).data("section-id");
        $("#" + sectionId).remove();
        var sectionType = sectionId.split("_")[0];
        counters[sectionType]--;
    });
});

function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('profilePhoto');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}


