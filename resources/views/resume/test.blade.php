<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Resume</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/create-resume.js') }}"></script>
</head>

<body>
    <div class="wrapper">
        <div class="inner-edit">
            <h2 class="resume-title">Create Your Resume</h2>
            <form class="form-edit-resume" action="{{ route('user.resume.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Personal Details -->
                <fieldset class="fieldset-edit-resume">
                    <legend class="legend-edit-resume">Personal Details</legend>
                    <div class="one-row">
                        <div>
                            <label class="label-edit-resume required" for="full_name">Full Name:</label>
                            <input type="text" id="full_name" name="full_name" class="input-edit-resume" value="{{ old('full_name') }}">
                            @error('full_name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <div class="upload-profile-photo">
                                <img id="profilePhoto" src="{{ asset('images/upload_resume_photo.png') }}" alt="Profile Photo" class="profile-img-edit-resume" onclick="document.getElementById('img').click();">
                                <input type="file" id="img" name="img" style="display:none;" onchange="previewImage(event);">
                                <label class="label-edit-resume" for="img">Upload Photo</label>
                            </div>
                            @error('img')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="one-row">
                        <div>
                            <label class="label-edit-resume required" for="phone_number">Phone Number:</label>
                            <input type="text" id="phone_number" name="phone_number" class="input-edit-resume" value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="label-edit-resume" for="address">Address:</label>
                            <input type="text" id="address" name="address" class="input-edit-resume" value="{{ old('address') }}">
                            @error('address')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="one-row">
                        <div>
                            <label class="label-edit-resume required" for="email">Email:</label>
                            <input type="email" id="email" name="email" class="input-edit-resume" value="{{ old('email') }}">
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="label-edit-resume required" for="date_of_birth">Date of Birth:</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" class="input-edit-resume" value="{{ old('date_of_birth') }}">
                            @error('date_of_birth')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <!-- Designation -->
                <fieldset class="fieldset-edit-resume">
                    <legend class="legend-edit-resume">Designation</legend>
                    <div class="one-row">
                        <div>
                            <label class="label-edit-resume" for="designation">Designation:</label>
                            <input type="text" id="designation" name="designation" class="input-edit-resume" value="{{ old('designation') }}">
                            @error('designation')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <!-- Objective -->
                <fieldset class="fieldset-edit-resume objective-entry-edit-resume">
                    <legend class="legend-edit-resume">Objective</legend>
                    <div class="textarea-fields-edit-resume">
                        <label class="label-edit-resume" for="objective">Objective:</label>
                        <textarea id="objective" name="objective" class="textarea-edit-resume">{{ old('objective') }}</textarea>
                        @error('objective')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </fieldset>

                <!-- Skills -->
                <section class="skill_set">
                    <fieldset class="fieldset-edit-resume" id="skills_fieldset">
                        <legend class="legend-edit-resume">Skills</legend>
                        @php
                            $skills = old('skill_name', []);
                            $skill_levels = old('skill_level', []);
                        @endphp
                        @for($i = 0; $i < count($skills); $i++)
                        <div class="skill-entry-edit-resume" id="skill_section_{{ $i }}">
                            <div class="one-row">
                                <div>
                                    <label class="label-edit-resume" for="skill_name_{{ $i }}">Skill:</label>
                                    <input type="text" id="skill_name_{{ $i }}" name="skill_name[]" class="input-edit-resume" value="{{ $skills[$i] }}">
                                    @error("skill_name.$i")
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="skill_level_{{ $i }}">Level:</label>
                                    <select id="skill_level_{{ $i }}" name="skill_level[]" class="select-edit-resume">
                                        <option value="Beginner" {{ $skill_levels[$i] == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                        <option value="Intermediate" {{ $skill_levels[$i] == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                        <option value="Advanced" {{ $skill_levels[$i] == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                        <option value="Expert" {{ $skill_levels[$i] == 'Expert' ? 'selected' : '' }}>Expert</option>
                                        <option value="Master" {{ $skill_levels[$i] == 'Master' ? 'selected' : '' }}>Master</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </fieldset>

                    <div class="add-sec-copy">
                        <button type="button" class="button-edit-resume add_section_btn" data-section="skill" id="add_skill">Add Skill</button>
                    </div>
                </section>

                <!-- Education -->
                <section class="education_set">
                    <fieldset class="fieldset-edit-resume" id="educations_fieldset">
                        <legend class="legend-edit-resume">Education</legend>
                        @php
                            $institutions = old('institution', []);
                            $degrees = old('degree', []);
                            $start_dates = old('start_date_education', []);
                            $end_dates = old('end_date_education', []);
                        @endphp
                        @for($i = 0; $i < count($institutions); $i++)
                        <div class="education-entry-edit-resume" id="education_section_{{ $i }}">
                            <div class="one-row">
                                <div>
                                    <label class="label-edit-resume" for="institution_{{ $i }}">Institution:</label>
                                    <input type="text" id="institution_{{ $i }}" name="institution[]" class="input-edit-resume" value="{{ $institutions[$i] }}">
                                    @error("institution.$i")
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="degree_{{ $i }}">Degree:</label>
                                    <input type="text" id="degree_{{ $i }}" name="degree[]" class="input-edit-resume" value="{{ $degrees[$i] }}">
                                    @error("degree.$i")
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="date-fields-edit-resume">
                                <div>
                                    <label class="label-edit-resume" for="start_date_education_{{ $i }}">Start Date:</label>
                                    <input type="date" id="start_date_education_{{ $i }}" name="start_date_education[]" class="input-edit-resume" value="{{ $start_dates[$i] }}">
                                    @error("start_date_education.$i")
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="end_date_education_{{ $i }}">End Date:</label>
                                    <input type="date" id="end_date_education_{{ $i }}" name="end_date_education[]" class="input-edit-resume" value="{{ $end_dates[$i] }}">
                                    @error("end_date_education.$i")
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endfor
                    </fieldset>

                    <div class="add-sec-copy">
                        <button type="button" class="button-edit-resume add_section_btn" data-section="education" id="add_education">Add Education</button>
                    </div>
                </section>

                <!-- Experience -->
                <section class="experience_set">
                    <fieldset class="fieldset-edit-resume" id="experiences_fieldset">
                        <legend class="legend-edit-resume">Experience</legend>
                        @php
                            $companies = old('company_name', []);
                            $positions = old('position', []);
                            $start_dates_exp = old('start_date_experience', []);
                            $end_dates_exp = old('end_date_experience', []);
                            $descriptions = old('job_description', []);
                        @endphp
                        @for($i = 0; $i < count($companies); $i++)
                        <div class="experience-entry-edit-resume" id="experience_section_{{ $i }}">
                            <div class="one-row">
                                <div>
                                    <label class="label-edit-resume" for="company_name_{{ $i }}">Company Name:</label>
                                    <input type="text" id="company_name_{{ $i }}" name="company_name[]" class="input-edit-resume" value="{{ $companies[$i] }}">
                                    @error("company_name.$i")
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="position_{{ $i }}">Position:</label>
                                    <input type="text" id="position_{{ $i }}" name="position[]" class="input-edit-resume" value="{{ $positions[$i] }}">
                                    @error("position.$i")
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="date-fields-edit-resume">
                                <div>
                                    <label class="label-edit-resume" for="start_date_experience_{{ $i }}">Start Date:</label>
                                    <input type="date" id="start_date_experience_{{ $i }}" name="start_date_experience[]" class="input-edit-resume" value="{{ $start_dates_exp[$i] }}">
                                    @error("start_date_experience.$i")
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="end_date_experience_{{ $i }}">End Date:</label>
                                    <input type="date" id="end_date_experience_{{ $i }}" name="end_date_experience[]" class="input-edit-resume" value="{{ $end_dates_exp[$i] }}">
                                    @error("end_date_experience.$i")
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="textarea-fields-edit-resume">
                                <label class="label-edit-resume" for="job_description_{{ $i }}">Job Description:</label>
                                <textarea id="job_description_{{ $i }}" name="job_description[]" class="textarea-edit-resume">{{ $descriptions[$i] }}</textarea>
                                @error("job_description.$i")
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @endfor
                    </fieldset>

                    <div class="add-sec-copy">
                        <button type="button" class="button-edit-resume add_section_btn" data-section="experience" id="add_experience">Add Experience</button>
                    </div>
                </section>

                <!-- Languages -->
                <section class="language_set">
                    <fieldset class="fieldset-edit-resume" id="languages_fieldset">
                        <legend class="legend-edit-resume">Languages</legend>
                        @php
                            $languages = old('language_name', []);
                            $proficiency_levels = old('language_level', []);
                        @endphp
                        @for($i = 0; $i < count($languages); $i++)
                        <div class="language-entry-edit-resume" id="language_section_{{ $i }}">
                            <div class="one-row">
                                <div>
                                    <label class="label-edit-resume" for="language_name_{{ $i }}">Language:</label>
                                    <input type="text" id="language_name_{{ $i }}" name="language_name[]" class="input-edit-resume" value="{{ $languages[$i] }}">
                                    @error("language_name.$i")
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="language_level_{{ $i }}">Proficiency Level:</label>
                                    <select id="language_level_{{ $i }}" name="language_level[]" class="select-edit-resume">
                                        <option value="Basic" {{ $proficiency_levels[$i] == 'Basic' ? 'selected' : '' }}>Basic</option>
                                        <option value="Conversational" {{ $proficiency_levels[$i] == 'Conversational' ? 'selected' : '' }}>Conversational</option>
                                        <option value="Fluent" {{ $proficiency_levels[$i] == 'Fluent' ? 'selected' : '' }}>Fluent</option>
                                        <option value="Native" {{ $proficiency_levels[$i] == 'Native' ? 'selected' : '' }}>Native</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </fieldset>

                    <div class="add-sec-copy">
                        <button type="button" class="button-edit-resume add_section_btn" data-section="language" id="add_language">Add Language</button>
                    </div>
                </section>

                <button class="button-edit-resume" type="submit">Save Resume</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let sectionCounters = {
                skill: {{ count($skills) }},
                education: {{ count($institutions) }},
                experience: {{ count($companies) }},
                language: {{ count($languages) }},
            };

            function addSection(sectionType) {
                let sectionCounter = sectionCounters[sectionType];
                let sectionTemplate = document.querySelector(`#${sectionType}_template`).content.cloneNode(true);
                sectionTemplate.querySelectorAll('[id]').forEach(function (element) {
                    let originalId = element.id;
                    element.id = `${originalId}_${sectionCounter}`;
                    element.name = element.name.replace('[]', `[${sectionCounter}]`);
                });
                document.getElementById(`${sectionType}s_fieldset`).appendChild(sectionTemplate);
                sectionCounters[sectionType]++;
            }

            document.querySelectorAll('.add_section_btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    let sectionType = this.getAttribute('data-section');
                    addSection(sectionType);
                });
            });
        });
    </script>

    <template id="skill_template">
        <div class="skill-entry-edit-resume">
            <div class="one-row">
                <div>
                    <label class="label-edit-resume" for="skill_name">Skill:</label>
                    <input type="text" id="skill_name" name="skill_name[]" class="input-edit-resume">
                </div>
                <div>
                    <label class="label-edit-resume" for="skill_level">Level:</label>
                    <select id="skill_level" name="skill_level[]" class="select-edit-resume">
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                        <option value="Expert">Expert</option>
                        <option value="Master">Master</option>
                    </select>
                </div>
            </div>
        </div>
    </template>

    <template id="education_template">
        <div class="education-entry-edit-resume">
            <div class="one-row">
                <div>
                    <label class="label-edit-resume" for="institution">Institution:</label>
                    <input type="text" id="institution" name="institution[]" class="input-edit-resume">
                </div>
                <div>
                    <label class="label-edit-resume" for="degree">Degree:</label>
                    <input type="text" id="degree" name="degree[]" class="input-edit-resume">
                </div>
            </div>
            <div class="date-fields-edit-resume">
                <div>
                    <label class="label-edit-resume" for="start_date_education">Start Date:</label>
                    <input type="date" id="start_date_education" name="start_date_education[]" class="input-edit-resume">
                </div>
                <div>
                    <label class="label-edit-resume" for="end_date_education">End Date:</label>
                    <input type="date" id="end_date_education" name="end_date_education[]" class="input-edit-resume">
                </div>
            </div>
        </div>
    </template>

    <template id="experience_template">
        <div class="experience-entry-edit-resume">
            <div class="one-row">
                <div>
                    <label class="label-edit-resume" for="company_name">Company Name:</label>
                    <input type="text" id="company_name" name="company_name[]" class="input-edit-resume">
                </div>
                <div>
                    <label class="label-edit-resume" for="position">Position:</label>
                    <input type="text" id="position" name="position[]" class="input-edit-resume">
                </div>
            </div>
            <div class="date-fields-edit-resume">
                <div>
                    <label class="label-edit-resume" for="start_date_experience">Start Date:</label>
                    <input type="date" id="start_date_experience" name="start_date_experience[]" class="input-edit-resume">
                </div>
                <div>
                    <label class="label-edit-resume" for="end_date_experience">End Date:</label>
                    <input type="date" id="end_date_experience" name="end_date_experience[]" class="input-edit-resume">
                </div>
            </div>
            <div class="textarea-fields-edit-resume">
                <label class="label-edit-resume" for="job_description">Job Description:</label>
                <textarea id="job_description" name="job_description[]" class="textarea-edit-resume"></textarea>
            </div>
        </div>
    </template>

    <template id="language_template">
        <div class="language-entry-edit-resume">
            <div class="one-row">
                <div>
                    <label class="label-edit-resume" for="language_name">Language:</label>
                    <input type="text" id="language_name" name="language_name[]" class="input-edit-resume">
                </div>
                <div>
                    <label class="label-edit-resume" for="language_level">Proficiency Level:</label>
                    <select id="language_level" name="language_level[]" class="select-edit-resume">
                        <option value="Basic">Basic</option>
                        <option value="Conversational">Conversational</option>
                        <option value="Fluent">Fluent</option>
                        <option value="Native">Native</option>
                    </select>
                </div>
            </div>
        </div>
    </template>
</body>

</html>
