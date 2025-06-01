<?php

namespace App\Services;

use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Dao\ResumeDaoInterface;
use App\Contracts\Services\ResumeServiceInterface;

/**
 * Class ResumeService
 *
 * This service handles the business logic for managing resumes.
 */
class ResumeService implements ResumeServiceInterface
{
    /**
     * @var ResumeDaoInterface
     */
    private $resumeDao;

    /**
     * ResumeService constructor.
     *
     * @param ResumeDaoInterface $resumeDaoInterface
     */
    public function __construct(ResumeDaoInterface $resumeDaoInterface)
    {
        $this->resumeDao = $resumeDaoInterface;
    }

    /**
     * Store a newly created resume in storage.
     *
     * @param array $validated
     * @return void
     */
    public function store(array $validated)
    {

        $validated['user_id'] = Auth::id();

        $imagePath = null;

        if (isset($validated['img'])) {
            $imagePath = $validated['img']->store('profile_photos', 'public');
        }

        $personalDetail = $this->resumeDao->createPersonalDetail($validated, $imagePath);
        // dd($validated);

        $this->resumeDao->createDesignation($personalDetail->id, $validated['designation'] ?? null);
        $this->resumeDao->createObjective($personalDetail->id, $validated['objective'] ?? null);
        $this->resumeDao->createSkills($personalDetail->id, $validated['skill_name'] ?? [], $validated['skill_level'] ?? []);
        $this->resumeDao->createEducation($personalDetail->id, $validated['institution'] ?? [], $validated['degree'] ?? [], $validated['start_date_education'] ?? [], $validated['end_date_education'] ?? []);
        $this->resumeDao->createExperience($personalDetail->id, $validated['company'] ?? [], $validated['position'] ?? [], $validated['start_date_experience'] ?? [], $validated['end_date_experience'] ?? [], $validated['description_experience'] ?? []);
        $this->resumeDao->createLanguages($personalDetail->id, $validated['language_name'] ?? [], $validated['proficiency'] ?? []);
        $this->resumeDao->createProjects($personalDetail->id, $validated['project_name'] ?? [], $validated['description_project'] ?? []);
    }

    /**
     * Get Resume Data
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->resumeDao->getData();
    }

    /**
     * Get personal details for the resume.
     *
     * @return \App\Models\PersonalDetail
     */
    //public function getPersonalDetail()
    //{
    //    return $this->resumeDao->getPersonalDetail();
    //}

    public function getPersonalDetail()
    {
        $userId = Auth::id();
        return $this->resumeDao->getPersonalDetail($userId);
    }

    /**
     * Export PDF
     * @param int $id
     */
    public function generatePDF(int $id, $personalDetail)
    {
        switch ($id) {
            case 1:
                $url = 'resume.temp1PDF';
                break;
            case 2:
                $url = 'resume.temp2PDF';
                break;
            case 3:
                $url = 'resume.temp3PDF';
                break;
        }
        return Pdf::loadView($url, ['personalDetail' => $personalDetail])->setPaper('A4', 'portrait');
    }
}
