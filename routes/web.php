<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/send-inquiry', [InquiryController::class, 'send'])->name('inquiry.send');

// Cart Routes
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/data', [CartController::class, 'getCartData'])->name('cart.data');

// Order Routes
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('order.place');
Route::post('/payment/callback', [OrderController::class, 'handlePayment'])->name('payment.callback');
Route::post('/payment/failed', [OrderController::class, 'handlePaymentFailed'])->name('payment.failed');
Route::get('/order/success/{order}', [OrderController::class, 'success'])->name('order.success');

// Auth Routes
Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [UserAuthController::class, 'login'])->middleware('guest');
Route::get('/register', [UserAuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [UserAuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/forgot-password', [UserAuthController::class, 'showForgotPassword'])->name('password.request')->middleware('guest');
Route::post('/forgot-password', [UserAuthController::class, 'forgotPassword'])->name('password.email')->middleware('guest');

// Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::get('/profile/orders', [OrderController::class, 'userOrders'])->name('profile.orders');
    Route::get('/profile/orders/{order}', [OrderController::class, 'show'])->name('profile.order.show');
    Route::post('/product/review', [ReviewController::class, 'store'])->name('product.review');
});
Route::get('/about', [HomeController::class, 'about']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/marketplace', [HomeController::class, 'marketplace']);
Route::get('/marketplace/{slug}', [HomeController::class, 'promotionDetail'])->name('promotion.detail');
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/certificates', [HomeController::class, 'certificates']);
Route::get('/return-bed', [HomeController::class, 'returnBed']);
Route::get('/products', [HomeController::class, 'products']);
Route::get('/product/{slug}', [HomeController::class, 'productDetail']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/terms', [HomeController::class, 'terms']);
Route::get('/privacy', [HomeController::class, 'privacy']);
Route::get('/refund', [HomeController::class, 'refund']);

// Admin Routes
Route::get('/admin', [AdminController::class, 'login']);
Route::post('/admin', [AdminController::class, 'doLogin']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin.auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

    // Category CRUD
    Route::get('/admin/categories', [CategoryController::class, 'index']);
    Route::get('/admin/categories/create', [CategoryController::class, 'create']);
    Route::post('/admin/categories', [CategoryController::class, 'store']);
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit']);
    Route::post('/admin/categories/{id}', [CategoryController::class, 'update']);
    Route::get('/admin/categories/{id}/delete', [CategoryController::class, 'destroy']);

    // Product CRUD
    Route::get('/admin/products', [ProductController::class, 'index']);
    Route::get('/admin/products/create', [ProductController::class, 'create']);
    Route::post('/admin/products', [ProductController::class, 'store']);
    Route::post('/admin/products/toggle-latest', [ProductController::class, 'toggleLatest'])->name('admin.products.toggleLatest');
    Route::post('/admin/products/toggle-bestseller', [ProductController::class, 'toggleBestseller'])->name('admin.products.toggleBestseller');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit']);
    Route::post('/admin/products/{id}', [ProductController::class, 'update']);
    Route::get('/admin/products/{id}/delete', [ProductController::class, 'destroy']);
    Route::get('/admin/products/{id}/delete-image', [ProductController::class, 'deleteMainImage'])->name('admin.products.deleteImage');
    Route::get('/admin/products/{id}/delete-gallery', [ProductController::class, 'deleteGalleryImage'])->name('admin.products.deleteGallery');



    // Testimonial CRUD
    Route::get('/admin/testimonials', [TestimonialController::class, 'index']);
    Route::get('/admin/testimonials/create', [TestimonialController::class, 'create']);
    Route::post('/admin/testimonials', [TestimonialController::class, 'store']);
    Route::get('/admin/testimonials/{id}/edit', [TestimonialController::class, 'edit']);
    Route::post('/admin/testimonials/{id}', [TestimonialController::class, 'update']);
    Route::get('/admin/testimonials/{id}/delete', [TestimonialController::class, 'destroy']);

    // Service CRUD
    Route::get('/admin/services', [ServiceController::class, 'index']);
    Route::get('/admin/services/create', [ServiceController::class, 'create']);
    Route::post('/admin/services', [ServiceController::class, 'store']);
    Route::get('/admin/services/{id}/edit', [ServiceController::class, 'edit']);
    Route::post('/admin/services/{id}', [ServiceController::class, 'update']);
    Route::get('/admin/services/{id}/delete', [ServiceController::class, 'destroy']);

    // Inquiry Routes
    Route::get('/admin/inquiries', [AdminController::class, 'inquiries']);
    Route::delete('/admin/inquiries/{id}', [AdminController::class, 'deleteInquiry']);

    // User Management Routes
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // Order Management Routes
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/admin/orders/{id}', [AdminController::class, 'orderDetail'])->name('admin.orders.show');
    Route::post('/admin/orders/{id}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.status');
    Route::delete('/admin/orders/{id}', [AdminController::class, 'deleteOrder'])->name('admin.orders.delete');

    // Payment Management Routes
    Route::get('/admin/payments', [AdminController::class, 'payments'])->name('admin.payments');

    // Settings Routes
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');

    // Coupon CRUD
    Route::get('/admin/coupons', [CouponController::class, 'index']);
    Route::get('/admin/coupons/create', [CouponController::class, 'create']);
    Route::post('/admin/coupons', [CouponController::class, 'store']);
    Route::get('/admin/coupons/{id}/edit', [CouponController::class, 'edit']);
    Route::post('/admin/coupons/{id}', [CouponController::class, 'update']);
    Route::get('/admin/coupons/{id}/delete', [CouponController::class, 'destroy']);
});

// Coupon Application Routes
Route::post('/apply-coupon', [CouponController::class, 'applyCoupon'])->name('coupon.apply');
Route::post('/remove-coupon', [CouponController::class, 'removeCoupon'])->name('coupon.remove');

Route::get('/sitemap.xml', [HomeController::class, 'sitemap']);

Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    return "Cache cleared successfully";
});
