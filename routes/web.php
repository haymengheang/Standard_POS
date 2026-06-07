<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasbordController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLineController;
use App\Http\Controllers\ForgotPasswordController;
Use App\Http\Controllers\UnitofMeasureController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('Show.Dasbord')
        : redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

    // =========================Information Profile========================

});


Route::middleware('auth')->group(function () {

    Route::get('/Profile-User',[AuthController::class, 'InformationProfile'])->name('Information.Profile');
    Route::get('/Edit-Profile',[AuthController::class, 'EditProfile'])->name('Edit.Profile');
    Route::get('/dashboard', [DasbordController::class, 'ShowDasbord'])->name('Show.Dasbord');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //==========================Change Password===========================
    Route::get('/Change-password',[AuthController::class,'ChangePassword'])->name('Change.Password');
    Route::post('/Change-password',[AuthController::class,'UpdatePassword'])->name('Update.Password');

    // =========================Route Product============================
    Route::get('/SaveData', [MainController::class, 'SaveDate'])->name('Save.Information');
    Route::post('/SaveItem', [MainController::class, 'SaveData'])->name('Save.Data');
    Route::get('/ShowProduct', [ProductController::class, 'ShowProduct'])->name('Show.Product');
    Route::get('/ShowSaveProduct', [ProductController::class, 'ShowSaveProduct'])->name('Show.SaveProduct');
    Route::resource('products', ProductController::class);

    // =========================Route Product Line========================
    Route::get('/ShowProductLine', [ProductLineController::class, 'ShowProductLine'])->name('Show.ProductLine');
    Route::get('/ShowProductLineEdit', [ProductLineController::class, 'ShowProductLineEdit'])->name('Show.ProductLineEdit');
    Route::post('/SaveProductLine', [ProductLineController::class, 'SaveProductLine'])->name('Save.ProductLine');
    Route::resource('productsLine', ProductLineController::class);

    // =========================Route UnitofMeasure========================
    Route::get('/ShowUnitofMeasure',[UnitofMeasureController::class,'ShowUnitofMeasure'])->name('Show.Unitofmeasure');
    Route::get('/SaveUnitofMeasure',[UnitofMeasureController::class,'ShowPageSaveUnitofMeasure'])->name('show.SaveUnitofMeasure');
    Route::post('/SaveUnitofMeasure',[UnitofMeasureController::class,'SaveUnitofMeasure'])->name('show.SaveUnitofMeasure');
    Route::resource('unitofMeasure', UnitofMeasureController::class);

    //===========================Export Excel And PDF=======================
    Route::get('/Export-Excel',[ProductController::class,'ExportExcel'])->name('Product.ImportExcel');
    Route::get('Export-PDF',[ProductController::class,'ExportPDF'])->name('Product.ExportPDF');
    Route::post('/Product/import',[ProductController::class,'ImportExit'])->name('product.import');

    //============================Route Skill===============================
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::post('/skills/store',[SkillController::class, 'store'])->name('skills.store');
    Route::put('/skills/update', [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');

});
 //============================Change Language English Khmer Chinese ==================
Route::middleware('web')->group(function () {

    Route::get('/lang/km', function () {

        session()->put('locale', 'km');

        return redirect()->back();

    })->name('lang.switchkm');


    Route::get('/lang/en', function () {

        session()->put('locale', 'en');

        return redirect()->back();

    })->name('lang.switchen');

    Route::get('/lang/zh', function () {

        session()->put('locale', 'zh');

        return redirect()->back();

    })->name('lang.switchzh');

});

Route::get('/forgot-password', fn() => view('AuthLogin.ForgotPassword'))->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('Send-LinkPassword');
Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset-password');
Route::post('/verify-code',[ForgotPasswordController::class, 'verifycode'])->name('verifycode');
