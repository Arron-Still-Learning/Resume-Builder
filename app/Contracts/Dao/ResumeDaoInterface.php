<?php

namespace App\Contracts\Dao;

/**
 * Interface ResumeDaoInterface
 *
 * This interface defines the methods for the Resume Data Access Object (DAO).
 */
interface ResumeDaoInterface
{
    /**
     * Create a personal detail record.
     *
     * @param array $data
     * @param string|null $imagePath
     * @return \App\Models\PersonalDetail
     */
    public function createPersonalDetail(array $data, $imagePath);

    /**
     * Create a designation record.
     *
     * @param int $personalDetailsId
     * @param string|null $designation
     * @return void
     */
    public function createDesignation($personalDetailsId, $designation);

    /**
     * Create an objective record.
     *
     * @param int $personalDetailsId
     * @param string|null $objective
     * @return void
     */
    public function createObjective($personalDetailsId, $objective);

    /**
     * Create multiple skill records.
     *
     * @param int $personalDetailsId
     * @param array $skillNames
     * @param array $skillLevels
     * @return void
     */
    public function createSkills($personalDetailsId, $skillNames, $skillLevels);

    /**
     * Create multiple education records.
     *
     * @param int $personalDetailsId
     * @param array $institutions
     * @param array $degrees
     * @param array $startDates
     * @param array $endDates
     * @return void
     */
    public function createEducation($personalDetailsId, $institutions, $degrees, $startDates, $endDates);

    /**
     * Create multiple experience records.
     *
     * @param int $personalDetailsId
     * @param array $companies
     * @param array $positions
     * @param array $startDates
     * @param array $endDates
     * @param array $descriptions
     * @return void
     */
    public function createExperience($personalDetailsId, $companies, $positions, $startDates, $endDates, $descriptions);

    /**
     * Create multiple language records.
     *
     * @param int $personalDetailsId
     * @param array $languageNames
     * @param array $proficiencies
     * @return void
     */
    public function createLanguages($personalDetailsId, $languageNames, $proficiencies);

    /**
     * Create multiple project records.
     *
     * @param int $personalDetailsId
     * @param array $projectNames
     * @param array $descriptions
     * @return void
     */
    public function createProjects($personalDetailsId, $projectNames, $descriptions);

    /**
     * Create multiple project records.
     *
     * @return array
     */
    public function getData(): array;
}
