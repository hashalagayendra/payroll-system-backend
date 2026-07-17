<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('auth')->group(function () {
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::get('/validate', [\App\Http\Controllers\AuthController::class, 'validateToken']);
});

Route::prefix('users')->group(function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'getAllUsers']);
    Route::get('/{user}', [\App\Http\Controllers\UserController::class, 'getUserById']);
    Route::put('/{user}', [\App\Http\Controllers\UserController::class, 'updateUserName']);
    Route::delete('/{user}', [\App\Http\Controllers\UserController::class, 'deleteUser']);
});

Route::prefix('employees')->group(function () {
    Route::get('/', [\App\Http\Controllers\EmployeeController::class, 'getAllEmployees']);
    Route::get('/{id}', [\App\Http\Controllers\EmployeeController::class, 'getEmployeeById']);
    Route::post('/', [\App\Http\Controllers\EmployeeController::class, 'createEmployee']);
    Route::put('/{id}', [\App\Http\Controllers\EmployeeController::class, 'updateEmployee']);
    Route::delete('/{id}', [\App\Http\Controllers\EmployeeController::class, 'deleteEmployee']);
});

Route::get('/employee-documents', [\App\Http\Controllers\EmployeeDocumentController::class, 'getAllDocuments']);
Route::post('/employee-documents', [\App\Http\Controllers\EmployeeDocumentController::class, 'uploadDocument']);
Route::delete('/employee-documents/{id}', [\App\Http\Controllers\EmployeeDocumentController::class, 'deleteDocument']);

Route::get('/employee-bank-details', [\App\Http\Controllers\EmployeeBankDetailController::class, 'getAllBankDetails']);
Route::post('/employee-bank-details', [\App\Http\Controllers\EmployeeBankDetailController::class, 'createBankDetail']);
Route::put('/employee-bank-details/{id}', [\App\Http\Controllers\EmployeeBankDetailController::class, 'updateBankDetail']);
Route::delete('/employee-bank-details/{id}', [\App\Http\Controllers\EmployeeBankDetailController::class, 'deleteBankDetail']);

Route::get('/timesheets', [\App\Http\Controllers\TimesheetController::class, 'getAllTimesheets']);

Route::get('/attendance', [\App\Http\Controllers\AttendanceController::class, 'getDailyAttendance']);
Route::get('/attendance/monthly-summary', [\App\Http\Controllers\AttendanceController::class, 'getMonthlySummary']);
Route::post('/attendance', [\App\Http\Controllers\AttendanceController::class, 'markAttendance']);
Route::post('/attendance/bulk', [\App\Http\Controllers\AttendanceController::class, 'bulkMarkAttendance']);

Route::get('/branches', function () {
    return response()->json([
        'success' => true,
        'data' => \App\Models\Branch::all()
    ]);
});

Route::get('/departments', function () {
    return response()->json([
        'success' => true,
        'data' => \App\Models\Department::all()
    ]);
});

Route::get('/designations', function () {
    return response()->json([
        'success' => true,
        'data' => \App\Models\Designation::all()
    ]);
});

Route::get('/projects', function () {
    return response()->json([
        'success' => true,
        'data' => \App\Models\Project::all()
    ]);
});
