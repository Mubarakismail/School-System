<?php

namespace App\Providers;

/* use App\Repository\FeesInvoicesRepository;
use App\Repository\FeesInvoicesRepositoryInterface;
use App\Repository\FeesRepository;
use App\Repository\FeesRepositoryInterface;
use App\Repository\GraduatedStudentsRepository;
use App\Repository\GraduatedStudentsRepositoryInterface;
use App\Repository\ReceiptStudentRepository;
use App\Repository\ReceiptStudentRepositoryInterface;
use App\Repository\StudentPromotionRepository;
use App\Repository\StudentPromotionRepositoryInterface;
use App\Repository\StudentRepositoryInterface; */

use Illuminate\Support\ServiceProvider;
/* use App\Repository\TeacherRepositoryInterface;
use App\Repository\TeacherRepository;
use App\Repository\StudentRepository; */

use App\Repository\{
    FeesInvoicesRepository,
    FeesInvoicesRepositoryInterface,
    FeesRepository,
    FeesRepositoryInterface,
    GraduatedStudentsRepository,
    GraduatedStudentsRepositoryInterface,
    ReceiptStudentRepository,
    ReceiptStudentRepositoryInterface,
    StudentPromotionRepository,
    StudentPromotionRepositoryInterface,
    StudentRepositoryInterface,
    TeacherRepositoryInterface,
    TeacherRepository,
    StudentRepository,
};

class RepoProviderService extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TeacherRepositoryInterface::class,
            TeacherRepository::class,
        );
        $this->app->bind(
            StudentRepositoryInterface::class,
            StudentRepository::class
        );
        $this->app->bind(
            StudentPromotionRepositoryInterface::class,
            StudentPromotionRepository::class
        );
        $this->app->bind(
            GraduatedStudentsRepositoryInterface::class,
            GraduatedStudentsRepository::class
        );
        $this->app->bind(
            FeesRepositoryInterface::class,
            FeesRepository::class
        );
        $this->app->bind(
            FeesInvoicesRepositoryInterface::class,
            FeesInvoicesRepository::class
        );
        $this->app->bind(
            ReceiptStudentRepositoryInterface::class,
            ReceiptStudentRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
