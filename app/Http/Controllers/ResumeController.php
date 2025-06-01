<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\ResumeRequest;
use App\Contracts\Services\ResumeServiceInterface;
use Illuminate\Http\Response;

class ResumeController extends Controller
{

    /**
     * @var ResumeServiceInterface
     */
    private $resumeService;


    /**
     * ResumeController constructor.
     *
     * @param ResumeServiceInterface $resumeServiceInterface
     */
    public function __construct(ResumeServiceInterface $resumeServiceInterface)
    {
        $this->resumeService = $resumeServiceInterface;
    }


    /**
     * Show the form for creating a new resume.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('resume.create');
    }

    public function temp1()
    {
        $personalDetail = $this->resumeService->getPersonalDetail();
        return view('resume.temp1', compact('personalDetail'));
    }
    public function temp2()
    {
        $personalDetail = $this->resumeService->getPersonalDetail();
        return view('resume.temp2', compact('personalDetail'));
    }

    public function temp3()
    {
        $personalDetail = $this->resumeService->getPersonalDetail();
        return view('resume.temp3', compact('personalDetail'));
    }

    public function change()
    {
        return view('resume.change');
    }


    /**
     * Show the form for editing an existing resume.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $personalDetail = $this->resumeService->getPersonalDetail();
        return view('resume.edit', compact('personalDetail'));
    }


    /**
     * Store a newly created resume in storage.
     *
     * @param ResumeRequest $request
     * @return
     */
    public function store(ResumeRequest $request)
    {
        $validated = $request->validated();
        $this->resumeService->store($validated);
        // return redirect()->route('resume.generatepdf');
        // public function show()
        // {
        //     return view('resume.show');
        return view('resume.change');
    }

    /**
     * Get Resume Data
     *
     * @return \Illuminate\View\View
     */
    public function getData()
    {
        $data = $this->resumeService->getData();
        return view('resume.view_temp1', compact($data));
    }

    /**
     * Export PDF
     * @param int $id
     */
    public function generatePDF(int $id)
    {
        $personalDetail = $this->resumeService->getPersonalDetail();
        $pdf = $this->resumeService->generatePDF($id, $personalDetail);
        return $pdf->download('document.pdf');
    }
}
