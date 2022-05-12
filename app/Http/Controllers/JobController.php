<?php

namespace App\Http\Controllers;

use App\Services\EmployeeManagement\Applicant;
use App\Services\EmployeeManagement\Employee;
use Illuminate\Http\Request;

class JobController extends Controller
{
    protected Employee $applicant;

    public function __construct(Employee $applicant)
    {
        $this->applicant = $applicant;
    }

    public function apply(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $this->applicant->applyJob();

        return response()->json([
            'data' => $data
        ]);
    }
}
