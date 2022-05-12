<?php

namespace App\Providers;

use App\Http\Controllers\JobController;
use App\Http\Controllers\StaffController;
use App\Services\EmployeeManagement\Applicant;
use App\Services\EmployeeManagement\Employee;
use App\Services\EmployeeManagement\Staff;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->when(JobController::class)
            ->needs(Employee::class)
            ->give(Applicant::class);

        $this->app->when(StaffController::class)
            ->needs(Employee::class)
            ->give(Staff::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
