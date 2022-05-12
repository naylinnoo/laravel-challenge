<?php

namespace App\Http\Controllers;

use App\Services\EmployeeManagement\Employee;

class StaffController extends Controller
{
    protected $staff;

    public function __construct(Employee $staff)
    {
        $this->staff = $staff;
    }

    public function payroll(): \Illuminate\Http\JsonResponse
    {
        $data = $this->staff->salary();

        return response()->json([
            'data' => $data
        ]);
    }
}
