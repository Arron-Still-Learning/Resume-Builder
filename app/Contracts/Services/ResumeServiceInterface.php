<?php

namespace App\Contracts\Services;

/**
 * Interface ResumeServiceInterface
 *
 * This interface defines the methods for the Resume Service.
 */
interface ResumeServiceInterface
{
    /**
     * Store a newly created resume in storage.
     *
     * @param array $validated
     * @return void
     */
    public function store(array $validated);

    /**
     * Get Resume Data
     *
     * @return array
     */
    public function getData(): array;

    /**
     * Export PDF
     * @param int $id
     */
    public function generatePDF(int $id, $personalDetail);
}
