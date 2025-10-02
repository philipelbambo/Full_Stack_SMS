<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentSubjectController;
use App\Http\Controllers\CourseHistoryController;
use App\Http\Controllers\StudentComplaintController;
use App\Http\Controllers\StudentClubController;
use App\Http\Controllers\AssignedSubjectController;
use App\Http\Controllers\ArchivedController; // ✅ added for Archived module
use App\Http\Controllers\TrashController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Student module
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/form/store', [StudentController::class, 'createForm'])->name('students.form.store');
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
    Route::get('/student/{id}', [StudentController::class, 'showGrades'])->name('student.show');

    // Subject module
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/subjects/form/store', [SubjectController::class, 'createForm'])->name('subjects.form.store');
    Route::post('/subjects/store', [SubjectController::class, 'store'])->name('subjects.store');

    // Faculty module
    Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
    Route::get('/faculty/form/store', [FacultyController::class, 'createForm'])->name('faculty.form.store');
    Route::post('/faculty/store', [FacultyController::class, 'store'])->name('faculty.store');

    // Department module
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/form/store', fn () => view('modules.departments.create'))->name('departments.form.store');
    Route::post('/departments/store', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/department/{id}', [DepartmentController::class, 'showInfo'])->name('department.show');

    // Grade module
    Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');
    Route::get('/grades/form/store', [GradeController::class, 'createForm'])->name('grades.form.store');
    Route::post('/grades/store', [GradeController::class, 'store'])->name('grades.store');

    // Course module
    Route::prefix('courses')->name('courses.')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/', [CourseController::class, 'store'])->name('store');
        Route::get('/{course}', [CourseController::class, 'show'])->name('show');
        Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('edit');
        Route::put('/{course}', [CourseController::class, 'update'])->name('update');
        Route::delete('/{course}', [CourseController::class, 'destroy'])->name('destroy');

        Route::get('/trashed', [CourseController::class, 'trashed'])->name('trashed');
        Route::post('/{id}/restore', [CourseController::class, 'restore'])->name('restore');
        Route::delete('/{id}/force-delete', [CourseController::class, 'forceDelete'])->name('forceDelete');
    });

    // Section module
    Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
    Route::get('/sections/create', [SectionController::class, 'create'])->name('sections.create');
    Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
    Route::get('/sections/{section}/edit', [SectionController::class, 'edit'])->name('sections.edit');
    Route::put('/sections/{section}', [SectionController::class, 'update'])->name('sections.update');
    Route::delete('/sections/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');

    // Enrollment module
    Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
    Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
    Route::get('/enrollments/{enrollment}/edit', [EnrollmentController::class, 'edit'])->name('enrollments.edit');
    Route::put('/enrollments/{enrollment}', [EnrollmentController::class, 'update'])->name('enrollments.update');
    Route::delete('/enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
    Route::get('/enrollments/{enrollment}', [EnrollmentController::class, 'show'])->name('enrollments.show');

    Route::get('/enrollments/trashed', [EnrollmentController::class, 'trashed'])->name('enrollments.trashed');
    Route::post('/enrollments/{id}/restore', [EnrollmentController::class, 'restore'])->name('enrollments.restore');
    Route::delete('/enrollments/{id}/force-delete', [EnrollmentController::class, 'forceDelete'])->name('enrollments.forceDelete');

    // Course Histories module
    Route::resource('course_histories', CourseHistoryController::class);

    // Student Subjects module
    Route::prefix('student-subjects')->name('student-subjects.')->group(function () {
        Route::get('/', [StudentSubjectController::class, 'index'])->name('index');
        Route::get('/create', [StudentSubjectController::class, 'create'])->name('create');
        Route::post('/', [StudentSubjectController::class, 'store'])->name('store');
        Route::get('/{studentSubject}/edit', [StudentSubjectController::class, 'edit'])->name('edit');
        Route::put('/{studentSubject}', [StudentSubjectController::class, 'update'])->name('update');
        Route::delete('/{studentSubject}', [StudentSubjectController::class, 'destroy'])->name('destroy');
    });

    // Student Complaints module
    Route::prefix('student-complaints')->name('student-complaints.')->group(function () {
        Route::get('/', [StudentComplaintController::class, 'index'])->name('index');
        Route::get('/create', [StudentComplaintController::class, 'create'])->name('create');
        Route::post('/', [StudentComplaintController::class, 'store'])->name('store');
        Route::get('/{studentComplaint}/edit', [StudentComplaintController::class, 'edit'])->name('edit');
        Route::put('/{studentComplaint}', [StudentComplaintController::class, 'update'])->name('update');
        Route::delete('/{studentComplaint}', [StudentComplaintController::class, 'destroy'])->name('destroy');
    });

    // Student Clubs module
    Route::prefix('student-clubs')->name('student-clubs.')->group(function () {
        Route::get('/', [StudentClubController::class, 'index'])->name('index');
        Route::get('/create', [StudentClubController::class, 'create'])->name('create');
        Route::post('/', [StudentClubController::class, 'store'])->name('store');
        Route::get('/{studentClub}/edit', [StudentClubController::class, 'edit'])->name('edit');
        Route::put('/{studentClub}', [StudentClubController::class, 'update'])->name('update');
        Route::delete('/{studentClub}', [StudentClubController::class, 'destroy'])->name('destroy');
    });

    // Assigned Subjects module
    Route::prefix('assigned-subjects')->name('assigned-subjects.')->group(function () {
        Route::get('/', [AssignedSubjectController::class, 'index'])->name('index');
        Route::get('/create', [AssignedSubjectController::class, 'create'])->name('create');
        Route::post('/', [AssignedSubjectController::class, 'store'])->name('store');
        Route::get('/{assignedSubject}/edit', [AssignedSubjectController::class, 'edit'])->name('edit');
        Route::put('/{assignedSubject}', [AssignedSubjectController::class, 'update'])->name('update');
        Route::delete('/{assignedSubject}', [AssignedSubjectController::class, 'destroy'])->name('destroy');
    });

    // ✅ Archived module (added safely)
    Route::resource('archived', ArchivedController::class);


    Route::get('/trash', [TrashController::class, 'index'])->name('trash.index');
    Route::post('/trash/{id}/restore', [TrashController::class, 'restore'])->name('trash.restore');
    Route::delete('/trash/{id}', [TrashController::class, 'destroy'])->name('trash.destroy');

    
});
