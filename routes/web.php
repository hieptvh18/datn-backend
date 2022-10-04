<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\Patient\PatientController;
use App\Http\Controllers\Backend\Level\LevelsController;
use App\Http\Controllers\Backend\Schedule\ScheduleController;
use App\Http\Controllers\Backend\Specialist\SpecialistController;
use App\Http\Controllers\Backend\Permission\PermissionController;
use App\Http\Controllers\Backend\Role\RoleController;
use App\Http\Controllers\Backend\Room\RoomControler;
use App\Http\Controllers\Backend\Equipments\EquipmentsController;
use App\Http\Controllers\Backend\Orders\OrderController;
use App\Http\Controllers\Backend\Products\ProductController;
use App\Http\Controllers\Backend\Products\ProductTypeController;
use App\Http\Controllers\Backend\Profile\ProfileController;
use App\Http\Controllers\Backend\Service\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('getLogin');
});

// =========== route admin
Route::middleware('auth:admin')->prefix('admin')->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/',[DashboardController::class,'index'])->name('dashboard');

    // schedules
    Route::get('schedules',[ScheduleController::class,'index'])->name('schedules.index');
    Route::get('schedules/create',[ScheduleController::class,'create'])->name('schedules.create');
    Route::post('schedules/store',[ScheduleController::class,'store'])->name('schedules.store');
    Route::get('schedules/edit/{id}',[ScheduleController::class,'edit'])->name('schedules.edit');
    Route::post('schedules/update/{id}',[ScheduleController::class,'update'])->name('schedules.update');
    Route::delete('schedules/destroy/{id}',[ScheduleController::class,'destroy'])->name('schedules.destroy');
    Route::get('schedules/searching',[ScheduleController::class,'search'])->name('schedules.search');
    Route::post('schedules/import',[ScheduleController::class,'importSchedule'])->name('schedules.import');
    Route::post('schedules/export',[ScheduleController::class,'exportSchedule'])->name('schedules.export');


    //chuyen khoa
    Route::get('specialist',[SpecialistController::class,'index'])->name('specialist.index');
    Route::get('specialist/add',[SpecialistController::class,'add'])->name('specialist.add');
    Route::post('specialist/add',[SpecialistController::class,'save'])->name('specialist.save');
    Route::get('specialist/edit/{id}',[SpecialistController::class,'edit'])->name('specialist.edit');
    Route::put('specialist/edit/{id}',[SpecialistController::class,'update'])->name('specialist.update');
    Route::delete('specialist/delete/{id}',[SpecialistController::class,'delete'])->name('specialist.delete');
    Route::get('specialist/searching',[SpecialistController::class,'search'])->name('specialist.search');
    Route::get('specialist/addPatient',[SpecialistController::class,'addPatient'])->name('specialist.patient');

    // benh an
    Route::get('patient/searching',[PatientController::class,'search'])->name('patient.search');
    Route::resource('patient',PatientController::class);
    Route::post('patient/import',[PatientController::class, 'importPatient'])->name('patient.importPatient');
    Route::post('patient/export',[PatientController::class, 'exportPatient'])->name('patient.exportPatient');

    //service
    Route::resource('service', ServiceController::class)->except('show');
    Route::post('service/deleteSelected',[ServiceController::class,'multiDelete'])->name('service.deleteSelected');
    Route::get('service/search', [ServiceController::class, 'search'])->name('service.search');

    // permissions
    Route::middleware('can:permission-list')->get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::middleware('can:permission-add')->get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::middleware('can:permission-edit')->get('/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/update/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::middleware('can:permission-delete')->delete('/permissions/destroy/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    // roles
    Route::middleware('can:role-list')->get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::middleware('can:role-add')->get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::middleware('can:role-edit')->get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::middleware('can:role-delete')->delete('/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

    // account admin
    Route::middleware('can:admin-list')->get('/account_admins', [AdminController::class, 'index'])->name('account_admins.index');
    Route::middleware('can:admin-add')->get('/account_admins/create', [AdminController::class, 'create'])->name('account_admins.create');
    Route::post('/account_admins/store', [AdminController::class, 'store'])->name('account_admins.store');
    Route::middleware('can:admin-edit')->get('/account_admins/edit/{id}', [AdminController::class, 'edit'])->name('account_admins.edit');
    Route::get('/account_admins/updateStatus/{id}', [AdminController::class, 'updateStatus'])->name('account_admins.updateStatus');
    Route::post('/account_admins/update/{id}', [AdminController::class, 'update'])->name('account_admins.update');
    Route::middleware('can:admin-delete')->delete('/account_admins/destroy/{id}', [AdminController::class, 'destroy'])->name('account_admins.destroy');
    Route::get('/account_admins/searching', [AdminController::class, 'search'])->name('account_admins.search');

    // rooms
    Route::middleware('can:room-list')->get('/rooms', [RoomControler::class, 'index'])->name('rooms.index');
    Route::middleware('can:room-add')->get('/rooms/create', [RoomControler::class, 'create'])->name('rooms.create');
    Route::post('/rooms/store', [RoomControler::class, 'store'])->name('rooms.store');
    Route::middleware('can:room-edit')->get('/rooms/edit/{id}', [RoomControler::class, 'edit'])->name('rooms.edit');
    Route::post('/rooms/update/{id}', [RoomControler::class, 'update'])->name('rooms.update');
    Route::middleware('can:room-delete')->delete('/rooms/destroy/{id}', [RoomControler::class, 'destroy'])->name('rooms.destroy');
    Route::get('/rooms/searching', [RoomControler::class, 'search'])->name('rooms.search');

    // Quản lý trang thiết bị
    Route::get('equipment',[EquipmentsController::class,'index'])->name('equipment.index');
    Route::get('equipment/add',[EquipmentsController::class,'add'])->name('equipment.add');
    Route::post('equipment/add',[EquipmentsController::class,'save'])->name('equipment.save');
    Route::get('equipment/edit/{id}',[EquipmentsController::class,'edit'])->name('equipment.edit');
    Route::put('equipment/edit/{id}',[EquipmentsController::class,'update'])->name('equipment.update');
    Route::delete('equipment/delete/{id}',[EquipmentsController::class,'delete'])->name('equipment.delete');
    Route::get('equipment/searching',[EquipmentsController::class,'search'])->name('equipment.search');
    Route::post('equipment/deleteMultiple',[EquipmentsController::class,'deleteMultiple'])->name('equipment.deleteMultiple');


    // Quản lý cấp bậc, chức vụ
    Route::get('level',[LevelsController::class,'index'])->name('level.index');
    Route::get('level/add',[LevelsController::class,'add'])->name('level.add');
    Route::post('level/add',[LevelsController::class,'save'])->name('level.save');
    Route::get('level/edit/{id}',[LevelsController::class,'edit'])->name('level.edit');
    Route::put('level/edit/{id}',[LevelsController::class,'update'])->name('level.update');
    Route::delete('level/delete/{id}',[LevelsController::class,'delete'])->name('level.delete');
    // logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // product
    Route::post('product/deleteMultiple',[ProductController::class, 'deleteMultiple'])->name('product.deleteMultiple');
    Route::resource('product',ProductController::class);
    Route::resource('product-type',ProductTypeController::class);

    //order
    Route::get('order',[OrderController::class,'index'])->name('order.index');
    Route::get('order/add',[OrderController::class,'add'])->name('order.add');
    Route::post('order/save',[OrderController::class,'save'])->name('order.store');

    Route::delete('order/delete/{id}',[OrderController::class,'delete'])->name('order.delete');
    Route::get('order/detail/{id}',[OrderController::class,'detail'])->name('order.detail');

    // profile
    Route::get('/view-profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit-profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/update-profile/{id}', [ProfileController::class, 'update'])->name('profile.update');


});

// =========== route login, register, forgot password
Route::middleware('guest')->prefix('/')->group(function(){
    // login
    Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
    Route::post('postLogin', [AuthController::class, 'postLogin'])->name('postLogin');

    // register
    Route::get('register', [AuthController::class, 'getRegister'])->name('getRegister');
    Route::post('postRegister', [AuthController::class, 'postRegister'])->name('postRegister');

    // forgot password
    Route::get('forgotPassword', [AuthController::class, 'getForgotPassword'])->name('getForgotPassword');
    Route::post('postForgotPassword', [AuthController::class, 'postForgotPassword'])->name('postForgotPassword');
    Route::get('changePassword/{id}', [AuthController::class, 'getChangePassword'])->name('getChangePassword');
    Route::post('postChangePassword/{id}', [AuthController::class, 'postChangePassword'])->name('postChangePassword');

});
