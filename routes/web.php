<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TourDetailsController;

Route::get('/', function () {
   return redirect()->route('login');
});

Auth::routes();
Route::get('/admin/login', [HomeController::class, 'Login'])->name('login');
Route::post('/login', [HomeController::class, 'LoginStore'])->name('loginstore');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');

Route::get('/forget-password', [DashboardController::class, 'showForgetPasswordForm'])->name('forget.password');
Route::post('/forget-password', [DashboardController::class, 'sendResetLinkEmail'])->name('forget.password.email');
Route::get('/reset/{token}', [DashboardController::class, 'reset'])->name('reset');
Route::post('/reset/{token}', [DashboardController::class, 'postReset'])->name('post_reset');
Route::post('/check-current-password', [HomeController::class, 'checkCurrentPassword'])->name('checkCurrentPassword');
Route::get('/change-password', [HomeController::class, 'cPassword'])->name('change-password');
Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');

Route::middleware(['auth'])->group(function () {
   Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
   Route::get('/home', [HomeController::class, 'index'])->name('home');



// User routes
Route::get('/users', [UserController::class, 'Users'])->name('users');
Route::get('/users/create', [UserController::class, 'UserCreate'])->name('users.create');
Route::post('/users', [UserController::class, 'UserStore'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
Route::post('/users/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
Route::delete('/users/delete/{id}', [UserController::class, 'UserDestroy'])->name('users.destroy');

// Category
Route::get('category',[CategoryController::class,'Category'])->name('category');
Route::get('category/create',[CategoryController::class,'CategoryCreate'])->name('category.create');
Route::post('category',[CategoryController::class,'CategoryStore'])->name('category.store');
Route::get('category/edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class,'CategoryUpdate'])->name('category.update');
Route::delete('category/delete/{id}',[CategoryController::class,'CategoryDestroy'])->name('category.destroy');

// Service
Route::get('service',[ServiceController::class,'Service'])->name('service');
Route::get('service/create',[ServiceController::class,'ServiceCreate'])->name('service.create');
Route::post('service/store',[ServiceController::class,'ServiceStore'])->name('service.store');
Route::get('service/edit/{id}',[ServiceController::class,'ServiceEdit'])->name('service.edit');
Route::post('service/update/{id}',[ServiceController::class,'ServiceUpdate'])->name('service.update');
Route::delete('service/delete/{id}',[ServiceController::class,'ServiceDestroy'])->name('service.destroy');

// Contact
Route::get('contact',[ContactController::class,'Contact'])->name('contact');
Route::delete('/contact/delete/{id}', [ContactController::class, 'ContactDestroy'])->name('contact.destroy');

// Enquiry
Route::get('/enquiry', [EnquiryController::class, 'Enquiry'])->name('enquiry');
Route::get('/enquiries/create', [EnquiryController::class, 'EnquiryCreate'])->name('enquiry.create');
Route::post('/enquiries/store', [EnquiryController::class, 'EnquiryStore'])->name('enquiry.store');
Route::get('/enquiries/{id}', [EnquiryController::class, 'EnquiryShow'])->name('enquiry.show');
Route::get('/enquiries/{id}/edit', [EnquiryController::class, 'EnquiryEdit'])->name('enquiry.edit');
Route::post('/enquiries/{id}', [EnquiryController::class, 'EnquiryUpdate'])->name('enquiry.update');
Route::delete('/enquiries/{id}', [EnquiryController::class, 'EnquiryDestroy'])->name('enquiry.destroy');

// Testimonial
Route::get('/testimonial', [TestimonialController::class, 'Testimonial'])->name('testimonial');
Route::get('/testimonial/create', [TestimonialController::class, 'TestimonialCreate'])->name('testimonial.create');
Route::post('/testimonial/store', [TestimonialController::class, 'TestimonialStore'])->name('testimonial.store');
Route::get('/testimonial/{id}', [TestimonialController::class, 'TestimonialShow'])->name('testimonial.show');
Route::get('/testimonial/{id}/edit', [TestimonialController::class, 'TestimonialEdit'])->name('testimonial.edit');
Route::post('/testimonial/{id}', [TestimonialController::class, 'TestimonialUpdate'])->name('testimonial.update');
Route::delete('/testimonial/{id}', [TestimonialController::class, 'TestimonialDestroy'])->name('testimonial.destroy');

// Country
Route::get('/country', [CountryController::class, 'Country'])->name('country');
Route::get('/country/create', [CountryController::class, 'CountryCreate'])->name('country.create');
Route::post('/country/store', [CountryController::class, 'CountryStore'])->name('country.store');
Route::get('/country/{id}/edit', [CountryController::class, 'CountryEdit'])->name('country.edit');
Route::post('/country/{id}', [CountryController::class, 'CountryUpdate'])->name('country.update');
Route::delete('/country/{id}', [CountryController::class, 'CountryDestroy'])->name('country.destroy');


// Information
Route::get('/information', [InformationController::class, 'Information'])->name('information');
Route::get('/information/create', [InformationController::class, 'InformationCreate'])->name('information.create');
Route::post('/information/store', [InformationController::class, 'InformationStore'])->name('information.store');
Route::get('/information/{id}/edit', [InformationController::class, 'InformationEdit'])->name('information.edit');
Route::post('/information/{id}', [InformationController::class, 'InformationUpdate'])->name('information.update');
Route::get('/information/{id}', [InformationController::class, 'InformationDestroy'])->name('information.destroy');

// Tour Details
Route::get('/tour_details', [TourDetailsController::class, 'TourDetails'])->name('tour_details');
Route::get('/tour_details/create', [TourDetailsController::class, 'TourDetailsCreate'])->name('tour_details.create');
Route::post('/tour_details/store', [TourDetailsController::class, 'TourDetailsStore'])->name('tour_details.store');
Route::get('/tour_details/{id}/edit', [TourDetailsController::class, 'TourDetailsEdit'])->name('tour_details.edit');
Route::put('/tour_details/{id}', [TourDetailsController::class, 'TourDetailsUpdate'])->name('tour_details.update');
Route::get('/tour_details/{id}', [TourDetailsController::class, 'TourDetailsDestroy'])->name('tour_details.destroy');


});