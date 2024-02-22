<?php

use Illuminate\Support\Facades\Route;
//Front-End
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
//Back-End
use App\Http\Controllers\Manager\CategoryController;
use App\Http\Controllers\Manager\ProductController;
use App\Http\Controllers\Manager\GaleryController;
use App\Http\Controllers\Manager\SliderController;
use App\Http\Controllers\Manager\AboutcontentController;
use App\Http\Controllers\Manager\OfferController;
use App\Http\Controllers\Manager\ContactMessageController;
use App\Http\Controllers\Manager\CatalogController;
use App\Http\Controllers\Manager\SiteSettingsController;
//AST
use App\Http\Controllers\Ast\ProductTypeController;
use App\Http\Controllers\Ast\PersonController;
use App\Http\Controllers\Ast\ExcelDataController;
use Stichoza\GoogleTranslate\GoogleTranslate;

Route::post('/change-language', [HomeController::class, 'changeLanguage'])->name('change.language');

//Bakım Routeu
Route::get('site-bakimda',function(){
    return view('front.bakim');
});
//AnaSayfa
Route::get('/', [HomeController::class, 'index'])->name('home');
//İletişim
Route::post('/submit-contact-form', [HomeController::class, 'submitContactForm'])->name('submitContactForm');
//Ürünler sayfası
Route::get('/categories/{slug}', [HomeController::class, 'categoryShow'])->name('category.show');
Route::get('/product/{category}/{slug}', [HomeController::class, 'productDetay'])->name('product.show');
//Galeri
Route::get('/gallery', [HomeController::class, 'galleryView'])->name('gallery.show');
//Teklif Al
Route::get('/offer', [HomeController::class, 'OfferView'])->name('offer.view');
Route::post('/submit-offer', [HomeController::class, 'submitOffer'])->name('submit.offer');
Route::get('/thankyou/{guid?}', [HomeController::class, 'thankyou'])->name('offer.thankyou');
//Hakkımızda
Route::get('/about', [HomeController::class, 'aboutView'])->name('about.index');
//İletişim
Route::get('/contact', [HomeController::class, 'contactView'])->name('contact.home');
//Ürün Ara
Route::get('/search', [HomeController::class, 'searchProd'])->name('search');
//Çerezler
Route::get('/cookies-policy', [HomeController::class, 'cerezPolicy'])->name('cerez');


// Admin
Route::group(['middleware' => ['auth', 'isAdmin'],'prefix' => 'admin'], function(){

    Route::get('/', [  AdminController::class, 'index'])->name('dashboard');
    //Kategori Yönetimi
    Route::resource('categories', CategoryController::class);
    //Ürün Yönetimi
    Route::resource('products', ProductController::class);
    //Galeri Yönetimi
    Route::resource('galeries', GaleryController::class);
    //Slider Yönetimi
    Route::get('/slider',[SliderController::class, 'index'])->name('slider.view');
    Route::get('/slider/{slider}/edit',[SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/slider/update/{slider}',[SliderController::class, 'update'])->name('slider.update');
    //Hakkımızda Yönetimi
    Route::get('/about',[AboutcontentController::class, 'index'])->name('about.view');
    Route::get('/about/{about}/edit',[AboutcontentController::class, 'edit'])->name('about.edit');
    Route::put('/about/update/{about}',[AboutcontentController::class, 'update'])->name('about.update');
    //Teklif Yönetimi
    Route::get('/offer',[OfferController::class, 'index'])->name('offer.view.admin');
    //İletişim Formu Yönetimi
    Route::get('/message',[ContactMessageController::class, 'index'])->name('message.view');
    //Katalog Yönetimi
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/catalog/{catalog}/edit', [CatalogController::class, 'edit'])->name('catalog.edit');
    Route::put('/catalog/update/{catalog}', [CatalogController::class, 'update'])->name('catalog.update');
    //Bildirimleri Temizle
    Route::delete('notification/clear', [AdminController::class, 'notificateDelete'])->name('notific.clear');

    //AST
    //Ürün İşlemleri
    Route::resource('product-types', ProductTypeController::class);
    //Kişi İşlemleri
    Route::resource('people', PersonController::class);
    //Excel Tablosu Kişileri Görüntüle
    Route::get('/excel-data', [ExcelDataController::class, 'index'])->name('excel-data.index');
    //Kişiye Ait Tablo Verilerini Görüntüle
    Route::get('excel-data/show-tables/{person}', [ExcelDataController::class, 'showTables'])
    ->name('excel-data.show-tables');
    // Yeni tablo oluşturma formunu gösterme
    Route::get('excel-data/{person}/create-table', [ExcelDataController::class, 'createTableForm'])
    ->name('excel-data.create-table');
    // Yeni tabloyu veritabanına kaydetme
    Route::post('excel-data/{person}/store-table', [ExcelDataController::class, 'storeTable'])
    ->name('excel-data.store-table');
     // Tablo Düzenleme
    Route::get('/excel-data/{person}/edit/{table}', [ExcelDataController::class, 'editTable'])
    ->name('excel-data.edit-table');
    Route::put('/excel-data/{person}/tables/{table}', [ExcelDataController::class, 'updateTable'])->name('excel-data.update-table');
    // Tablo Silme
    Route::delete('/excel-data/{person}/tables/{table}', [ExcelDataController::class, 'destroyTable'])->name('excel-data.destroy-table');
    // Tablo Yapılan Ödeme
    Route::put('/excel-data/update-payment/{person}', [ExcelDataController::class, 'updatePayment'])->name('excel-data.update-payment');
    // Tablo PDF İndir
    Route::get('/excel-data/download-pdf/{personId}', [ExcelDataController::class,'downloadPdf'])->name('excel-data.download-pdf');
    // Tablo Ödeme
    Route::post('/excel-data/add-payment/{person}', [ExcelDataController::class, 'addPayment'])->name('excel-data.add-payment');
    // Tablo Ödeme Silme
    Route::delete('/excel-data/{person}/delete-payment/{payment}', [ExcelDataController::class, 'deletePayment'])
    ->name('excel-data.delete-payment');

    // Site Ayarları
    Route::get('site-settings', [SiteSettingsController::class, 'index'])->name('site-settings.index');
    Route::put('site-settings/update', [SiteSettingsController::class, 'update'])->name('site-settings.update');
    // Bildiirmleri Gör
    Route::get('/notificates', [AdminController::class, 'notificateView'])->name('admin.notif');
    // Profilim
    Route::get('/profile/{user}', [AdminController::class, 'profile'])->name('profiles');
    Route::put('/profile/{user}/update', [AdminController::class, 'profilePost'])->name('profile.update');

});
//Giriş Rotaları
Route::get('/login', [AdminController::class, 'loginShow'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('login.post');
//Çıkış Rotaları
Route::post('/logout', [AdminController::class, 'logout'])->name('logout.post');
//Şifre Sıfırlama Sayfası
Route::get('/reset-password', [AdminController::class, 'passwordResetShow'])->name('password.reset');
Route::post('/reset-password', [AdminController::class, 'passwordReset']);
//Şifre Sıfırlama İşlemleri
Route::get('/reset-password/{token}', [AdminController::class, 'passwordResetUser'])->name('passwordResetToken');
Route::post('/reset-password/{token}/post', [AdminController::class, 'passwordResetUserPost'])->name('passwordResetUserPost');



