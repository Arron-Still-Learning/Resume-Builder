<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resume</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/create-resume.js') }}"></script>
</head>

<body>
    <div class="wrapper">
        {{--dd({{$personalDetail}})--}}
        <div class="inner-edit">
            <h2 class="resume-title">Edit Your Resume</h2>
            <form class="form-edit-resume" action="{{ route('user.resume.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <!-- Personal Details -->
                <fieldset class="fieldset-edit-resume">
                    <legend class="legend-edit-resume">Personal Details</legend>
                    <div class="one-row">
                        <div>
                            <label class="label-edit-resume required" for="full_name">Full Name:</label>
                            <input type="text" id="full_name" name="full_name" class="input-edit-resume"
                                value="{{ old('full_name', $personalDetail->full_name) }}">
                            @error('full_name')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <div class="upload-profile-photo">
                                <img id="profilePhoto"
                                    src="{{ $personalDetail->photo_path ? asset('storage/' . $personalDetail->photo_path) : asset('images/upload_resume_photo.png') }}"
                                    alt="Profile Photo" class="profile-img-edit-resume"
                                    onclick="document.getElementById('img').click();">
                                <input type="file" id="img" name="img" style="display:none;"
                                    onchange="previewImage(event);">
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
                            <input type="text" id="phone_number" name="phone_number" class="input-edit-resume"
                                value="{{ old('phone_number' , $personalDetail->phone_number) }}">
                            @error('phone_number')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="label-edit-resume" for="address">Address:</label>
                            <input type="text" id="address" name="address" class="input-edit-resume"
                                value="{{ old('address', $personalDetail->address)}}">
                            @error('address')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="one-row">
                        <div>
                            <label class="label-edit-resume required" for="email">Email:</label>
                            <input type="email" id="email" name="email" class="input-edit-resume"
                                value="{{ old('email' , $personalDetail->email) }}">
                            @error('email')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="label-edit-resume required" for="date_of_birth">Date of Birth:</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" class="input-edit-resume"
                                value="{{ old('date_of_birth' , $personalDetail->date_of_birth) }}">
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
                            <input type="text" id="designation" name="designation" class="input-edit-resume"
                                value="{{ old('designation', $personalDetail->designations->first()->designation ?? '') }}">
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
                        <textarea id="objective" name="objective"
                            class="textarea-edit-resume">{{ old('objective', $personalDetail->objectives->first()->objective ?? '') }}</textarea>
                        @error('objective')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </fieldset>

                <!-- Skills -->
                <section class="skill_set">
                    <fieldset class="fieldset-edit-resume" id="skills_fieldset">
                        <legend class="legend-edit-resume">Skills</legend>
                        <div class="skill-entry-edit-resume" id="skill_section_0">
                            <div class="one-row">
                                <div>
                                    <label class="label-edit-resume" for="skill_name">Skill:</label>
                                    <input type="text" id="skill_name" name="skill_name[]" class="input-edit-resume"
                                        value="{{ old('skill_name', $personalDetail->skills->first()->skill_name ?? '') }}">
                                    @error('skill_name.*')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="skill_level">Level:</label>
                                    <select id="skill_level" name="skill_level[]" class="select-edit-resume">
                                        <option value="Beginner" {{ old('skill_level', $personalDetail->skills->first()->skill_level ?? '') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                        <option value="Intermediate" {{ old('skill_level', $personalDetail->skills->first()->skill_level ?? '') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                        <option value="Advanced" {{ old('skill_level', $personalDetail->skills->first()->skill_level ?? '') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                        <option value="Expert" {{ old('skill_level', $personalDetail->skills->first()->skill_level ?? '') == 'Expert' ? 'selected' : '' }}>Expert</option>
                                        <option value="Master" {{ old('skill_level', $personalDetail->skills->first()->skill_level ?? '') == 'Master' ? 'selected' : '' }}>Master</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="add-sec-copy">
                        <button type="button" class="button-edit-resume add_section_btn" data-section="skill"
                            id="add_skill">Add Skill</button>
                    </div>
                </section>

                <!-- Education -->
                <section class="education_set">
                    <fieldset class="fieldset-edit-resume" id="educations_fieldset">
                        <legend class="legend-edit-resume">Education</legend>
                        <div class="education-entry-edit-resume" id="education_section_0">
                            <div class="one-row">
                                <div>
                                    <label class="label-edit-resume" for="institution">Institution:</label>
                                    <input type="text" id="institution" name="institution[]" class="input-edit-resume"
                                        value="{{ old('institution.0', $personalDetail->educations->first()->institution ?? '') }}">
                                    @error('institution.*')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="degree">Degree:</label>
                                    <input type="text" id="degree" name="degree[]" class="input-edit-resume"
                                        value="{{ old('degree.0', $personalDetail->educations->first()->degree ?? '') }}">
                                    @error('degree.*')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="date-fields-edit-resume">
                                <div>
                                    <label class="label-edit-resume" for="start_date_education">Start Date:</label>
                                    <input type="date" id="start_date_education" name="start_date_education[]"
                                        class="input-edit-resume"
                                        value="{{ old('start_date_education.0', $personalDetail->educations->first()->start_date ?? '') }}">
                                    @error('start_date_education.*')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="end_date_education">End Date:</label>
                                    <input type="date" id="end_date_education" name="end_date_education[]"
                                        class="input-edit-resume"
                                        value="{{ old('end_date_education.0', $personalDetail->educations->first()->end_date ?? '') }}">
                                    @error('end_date_education.*')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <div class="add-sec-copy">
                        <button type="button" class="button-edit-resume add_section_btn" data-section="education">Add
                            Education</button>
                    </div>
                </section>

                <!-- Languages -->
                <section class="lang_set">
                    <fieldset class="fieldset-edit-resume" id="languages_fieldset">
                        <legend class="legend-edit-resume">Languages</legend>
                        <div class="language-entry-edit-resume" id="language_section_0">
                            <div class="one-row">
                                <div>
                                    <label class="label-edit-resume" for="language_name">Language:</label>
                                    <input type="text" id="language_name" name="language_name[]"
                                        class="input-edit-resume"
                                        value="{{ old('language_name.0', $personalDetail->languages->first()->language_name ?? '') }}">
                                    @error('language_name>.*')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="proficiency">Proficiency:</label>
                                    <select id="proficiency" name="proficiency[]" class="select-edit-resume">
                                        <option value="Beginner" {{ old('proficiency.0', $personalDetail->languages->first()->proficiency ?? '') == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                        <option value="Intermediate" {{ old('proficiency.0', $personalDetail->languages->first()->proficiency ?? '') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                        <option value="Advanced" {{ old('proficiency.0', $personalDetail->languages->first()->proficiency ?? '') == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                                        <option value="Fluent" {{ old('proficiency.0', $personalDetail->languages->first()->proficiency ?? '') == 'Fluent' ? 'selected' : '' }}>Fluent</option>
                                        <option value="Native" {{ old('proficiency.0', $personalDetail->languages->first()->proficiency ?? '') == 'Native' ? 'selected' : '' }}>Native</option>
                                    </select>
                                    @error('proficiency.*')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <div class="add-sec-copy">
                        <button type="button" class="button-edit-resume add_section_btn" data-section="language">Add
                            Language</button>
                    </div>
                </section>

                <!-- Experience -->
                <section class="exp_set">
                    <fieldset class="fieldset-edit-resume" id="experiences_fieldset">
                        <legend class="legend-edit-resume">Experience</legend>
                        <div class="experience-entry-edit-resume" id="experience_section_0">
                            <div class="one-row">
                                <div>
                                    <label class="label-edit-resume" for="company">Company:</label>
                                    <input type="text" id="company" name="company[]" class="input-edit-resume"
                                        value="{{ old('company.0', $personalDetail->experiences->first()->company ?? '') }}">
                                    @error('company.*')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="position">Position:</label>
                                    <input type="text" id="position" name="position[]" class="input-edit-resume"
                                        value="{{ old('positon.0', $personalDetail->experiences->first()->position ?? '') }}">
                                    @error('position.*')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="date-fields-edit-resume">
                                <div>
                                    <label class="label-edit-resume" for="start_date_experience">Start Date:</label>
                                    <input type="date" id="start_date_experience" name="start_date_experience[]"
                                        class="input-edit-resume"
                                        value="{{ old('start_date_experience.0', $personalDetail->experiences->first()->start_date ?? '') }}">
                                    @error('start_date_experience.*')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="label-edit-resume" for="end_date_experience">End Date:</label>
                                    <input type="date" id="end_date_experience" name="end_date_experience[]"
                                        class="input-edit-resume"
                                        value="{{ old('end_date_experience.0', $personalDetail->experiences->first()->end_date ?? '') }}">
                                    @error('end_date_experience.*')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <label class="label-edit-resume" for="description_experience">Description:</label>
                            <textarea id="description_experience" name="description_experience[]"
                                class="textarea-edit-resume">{{ old('description_experience.0', $personalDetail->experiences->first()->description ?? '') }}</textarea>
                            @error('description_experience.*')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                    </fieldset>
                    <div class="add-sec-copy">
                        <button type="button" class="button-edit-resume add_section_btn" data-section="experience">Add
                            Experience</button>
                    </div>
                </section>

                <!-- Projects -->
                <section class="project_set">
                    <fieldset class="fieldset-edit-resume" id="projects_fieldset">
                        <legend class="legend-edit-resume">Projects</legend>
                        <div class="project-entry-edit-resume" id="project_section_0">
                            <div>
                                <label class="label-edit-resume" for="project_name">Project Name:</label>
                                <input type="text" id="project_name" name="project_name[]" class="input-edit-resume"
                                    value="{{ old('project_name.0', $personalDetail->projects->first()->project_name ?? '') }}">
                                @error('project_name.*')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <label class="label-edit-resume" for="description_project">Description:</label>
                            <textarea id="description_project" name="description_project[]"
                                class="textarea-edit-resume">{{ old('description_project.0', $personalDetail->projects->first()->description ?? '') }}</textarea>
                            @error('description_project.*')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </fieldset>
                    <div class="add-sec-copy">
                        <button type="button" class="button-edit-resume add_section_btn" data-section="project">Add
                            Project</button>
                    </div>
                </section>
                <div class="buttons-edit-resume">
                    <button type="button" class="button-edit-resume btn-resume-save" id="back_button">Back</button>
                    <button type="submit" class="button-edit-resume btn-resume-save" id="save_and_view_button">Save &
                        View</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>


