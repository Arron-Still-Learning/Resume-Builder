<?php

namespace App\Dao;

use App\Contracts\Dao\ResumeDaoInterface;
use App\Models\PersonalDetail;
use App\Models\Designation;
use App\Models\Objective;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Project;

/**
 * Class ResumeDao
 *
 * This Data Access Object (DAO) handles the creation of various resume components.
 */
class ResumeDao implements ResumeDaoInterface
{
    /**
     * Create a personal detail record.
     *
     * @param array $data
     * @param string $imagePath
     * @return \App\Models\PersonalDetail
     */
    public function createPersonalDetail(array $data, $imagePath)
    {

        $personalDetail = PersonalDetail::where('user_id', $data['user_id'])->first();

        if ($personalDetail && $personalDetail->photo_path) {
            $oldImagePath = storage_path('app/public/' . $personalDetail->photo_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image
            }
        }


        return PersonalDetail::updateOrCreate(
            ['user_id' => $data['user_id']],
            [
                'id' => $data['user_id'],
                'full_name' => $data['full_name'],
                'phone_number' => $data['phone_number'],
                'address' => $data['address'],
                'email' => $data['email'],
                'date_of_birth' => $data['date_of_birth'],
                'photo_path' => $imagePath,
            ]
        );
    }

    /**
     * Delete existing records and create a designation record.
     *
     * @param int $personalDetailsId
     * @param string|null $designation
     * @return void
     */
    public function createDesignation($personalDetailsId, $designation)
    {
        Designation::where('personal_details_id', $personalDetailsId)->delete();
//
        if ($designation) {
            Designation::create([
                'personal_details_id' => $personalDetailsId,
                'designation' => $designation,
            ]);
        }
    }

    /**
     * Delete existing records and create an objective record.
     *
     * @param int $personalDetailsId
     * @param string|null $objective
     * @return void
     */
    public function createObjective($personalDetailsId, $objective)
    {
        Objective::where('personal_details_id', $personalDetailsId)->delete();

        if ($objective) {
            Objective::create([
                'personal_details_id' => $personalDetailsId,
                'objective' => $objective,
            ]);
        }
    }

    /**
     * Delete existing records and create multiple skill records.
     *
     * @param int $personalDetailsId
     * @param array $skillNames
     * @param array $skillLevels
     * @return void
     */
    public function createSkills($personalDetailsId, $skillNames, $skillLevels)
    {
        Skill::where('personal_details_id', $personalDetailsId)->delete();

        foreach ($skillNames as $index => $skillName) {
            if($skillName) {
            Skill::create([
                'personal_details_id' => $personalDetailsId,
                'skill_name' => $skillName,
                'skill_level' => $skillLevels[$index] ?? null,
            ]);
        }

    }
    }

    /**
     * Delete existing records and create multiple education records.
     *
     * @param int $personalDetailsId
     * @param array $institutions
     * @param array $degrees
     * @param array $startDates
     * @param array $endDates
     * @return void
     */
    public function createEducation($personalDetailsId, $institutions, $degrees, $startDates, $endDates)
    {
        Education::where('personal_details_id', $personalDetailsId)->delete();

        foreach ($institutions as $index => $institution) {
        if ($institution) {
            Education::create([
                'personal_details_id' => $personalDetailsId,
                'institution' => $institution,
                'degree' => $degrees[$index] ?? null,
                'start_date' => $startDates[$index] ?? null,
                'end_date' => $endDates[$index] ?? null,
            ]);
        }
    }
    }

    /**
     * Delete existing records and create multiple experience records.
     *
     * @param int $personalDetailsId
     * @param array $companies
     * @param array $positions
     * @param array $startDates
     * @param array $endDates
     * @param array $descriptions
     * @return void
     */
    public function createExperience($personalDetailsId, $companies, $positions, $startDates, $endDates, $descriptions)
    {
        Experience::where('personal_details_id', $personalDetailsId)->delete();

        foreach ($companies as $index => $company) {
            if ($company) {
            Experience::create([
                'personal_details_id' => $personalDetailsId,
                'company' => $company,
                'position' => $positions[$index] ?? null,
                'start_date' => $startDates[$index] ?? null,
                'end_date' => $endDates[$index] ?? null,
                'description' => $descriptions[$index] ?? null,
            ]);
        }
    }
    }

    /**
     * Delete existing records and create multiple language records.
     *
     * @param int $personalDetailsId
     * @param array $languageNames
     * @param array $proficiencies
     * @return void
     */
    public function createLanguages($personalDetailsId, $languageNames, $proficiencies)
    {
        Language::where('personal_details_id', $personalDetailsId)->delete();

        foreach ($languageNames as $index => $languageName) {
            if ($languageName) {
            Language::create([
                'personal_details_id' => $personalDetailsId,
                'language_name' => $languageName,
                'proficiency' => $proficiencies[$index] ?? null,
            ]);
        }
    }
    }

    /**
     * Delete existing records and create multiple project records.
     *
     * @param int $personalDetailsId
     * @param array $projectNames
     * @param array $descriptions
     * @return void
     */
    public function createProjects($personalDetailsId, $projectNames, $descriptions)
    {
        Project::where('personal_details_id', $personalDetailsId)->delete();

        foreach ($projectNames as $index => $projectName) {
            if ($projectName) {
            Project::create([
                'personal_details_id' => $personalDetailsId,
                'project_name' => $projectName,
                'description' => $descriptions[$index] ?? null,
            ]);
        }
    }
    }

    /**
     * Create multiple project records.
     *
     * @return array
     */
    public function getData(): array
    {
        $data = [];
        $PersonalDetail = PersonalDetail::get();
        $Project = Project::get();
        $Designation = Designation::get();
        $Objective = Objective::get();
        $Language = Language::get();
        $Experience = Experience::get();
        $Education = Education::get();
        $Skill = Skill::get();
        return $data;
    }


//
//      /**
//     * Get personal details for the resume.
//     *
//     * @return \App\Models\PersonalDetail
//     */
//    public function getPersonalDetail()
//    {
//        return PersonalDetail::find(1);
//
//    }


 /**
     * Get personal details for the resume.
     *
     * @return \App\Models\PersonalDetail
     */
    public function getPersonalDetail($userId)
    {
        return PersonalDetail::with([
            'designations',
            'objectives',
            'skills',
            'educations',
            'experiences',
            'languages',
            'projects'
        ])->where('user_id', $userId)->first();
    }
}
