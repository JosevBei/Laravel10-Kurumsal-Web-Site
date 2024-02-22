<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

use App\Models\SiteView;
use App\Models\Product;
use App\Models\Offer;
use App\Models\ContactMessage;
use App\Models\Category;
use App\Models\Notification;
use App\Models\User;

use App\Mail\ResetPasswordMail;


class AdminController extends Controller
{
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function sendNotification($type, $typeId, $message)
    {
        $this->notificationService->createNotification($type, $typeId, $message);
    }
    // AdminController içindeki index fonksiyonu içinde
    public function index()
    {
        $statistics = $this->getStatistics();
        $popularProductStats = $this->getPopularProductsStats(); // Bu fonksiyonun var olduğunu varsayalım
        $categoryStats = $this->getCategoryStats();
        $categories = Category::withCount('products')->orderByDesc('products_count')->limit(3)->get();
            // Bildirimleri çek
        $notifications = Notification::orderByDesc('created_at')->get();
        return view('admin.index', compact('statistics', 'popularProductStats','categoryStats','categories','notifications'));
    }

    // getPopularProductsStats fonksiyonu
    private function getPopularProductsStats()
    {
        // Burada en popüler ürün istatistiklerini çek ve döndür
        // Örneğin:
        $popularProducts = Product::orderByDesc('hits')->take(10)->get();
        $popularProductNames = $popularProducts->pluck('name')->toArray();
        $popularProductHits = $popularProducts->pluck('hits')->toArray();

        return compact('popularProductNames', 'popularProductHits');
    }

    private function getCategoryStats()
    {
        // Burada kategori istatistiklerini çek ve döndür
        // Örneğin:
        $categories = Category::all();
        $categoryData = [];
        
        foreach ($categories as $category) {
            $categoryData[] = [
                'name' => $category->name,
                'productCount' => $category->products->count(), // Bu kısmı kendi veri modeline göre uyarla
            ];
        }

        return $categoryData;
    }



    /**
     * Admin giriş formunu gösterir.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function loginShow()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials, $request->get('remember'))) {
            return redirect()->route('dashboard');
        }
        
        // Giriş başarısız ise hata mesajıyla geri dön
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    
    
    /**
     * Admin çıkış işlemini gerçekleştirir.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function testerPage()
    {
        return view('admin.tester');
    }

    private function getStatistics()
    {
        $dailyStats = SiteView::select('created_at', 'view_count')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })
            ->map(function ($views) {
                return $views->sum('view_count');
            });
    
        $popularProducts = Product::popular(10)->get();

    
    
        $viewCount = $dailyStats->sum();
        $totalProducts = Product::count();
        $totalOffers = Offer::count();
        $totalMessages = ContactMessage::count();
    
        return compact('popularProducts', 
         'viewCount', 'dailyStats', 'totalProducts', 'totalOffers', 'totalMessages');

    }
    
    public function notificateDelete(){
        Notification::truncate(); // Tüm bildirimleri sil
        return redirect()->route('dashboard')->withSuccess('Bildirimler Temizlendi!');
    }

    public function notificateView(){
        $notificates = Notification::all();
        return view('admin.notificate.index',compact('notificates'));
    }
    
    public function passwordResetShow(){
        return view('admin.passwordSys.passwordreset');
    }
    
    public function passwordReset(Request $request)
    {
        $email = $request->email;
        $find = User::query()->where('email', $email)->first();
    
        if (!$find) {
            // Kullanıcı bulunamazsa, uygun bir işlem yapabilirsin.
            // Örneğin hata mesajı gönder ve giriş sayfasına yönlendir.
            return redirect()->back()->with('error', 'Kullanıcı bulunamadı.');
        }
    
        $tokenFind = DB::table('password_resets')->where("email", $email)->first();
    
        if($tokenFind){
            $token = $tokenFind->token;
        }else{
            $token = Str::random(60);
            DB::table("password_resets")->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => now()
            ]);
        }
    
        Mail::to($find->email)->send(new ResetPasswordMail($find, $token));
    
        return redirect()->back()->with('success', 'Şifre sıfırlama bağlantısı e-posta adresinize gönderildi.');
    }
    

    public function passwordResetUser(Request $request)
    {
        $token = $request->token;
        $email = DB::table('password_resets')->where('token', $token)->value('email');
    
        return view('admin.passwordSys.resetPass', compact('token', 'email'));
    }
    

    public function passwordResetUserPost(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => [
                'required',
                'confirmed',
                'min:8', // Minimum 8 karakter
                'regex:/[A-Z]/', // En az bir büyük harf
                'regex:/[0-9]/', // En az bir rakam
            ],
        ], [
            'token.required' => 'Token alanı zorunludur.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.confirmed' => 'Şifreler uyuşmuyor.',
            'password.min' => 'Şifre en az 8 karakter uzunluğunda olmalıdır.',
            'password.regex' => 'Şifre en az bir büyük harf ve bir rakam içermelidir.',
        ]);
        
        
        
    
        $token = $request->token;
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            // Kullanıcı bulunamazsa, uygun bir işlem yapabilirsin.
            // Örneğin hata mesajı gönder ve giriş sayfasına yönlendir.
            return redirect()->route('login')->with('error', 'Kullanıcı bulunamadı.');
        }
    
        // Token'i kontrol et
        $passwordReset = DB::table('password_resets')->where('token', $token)->first();
    
        if (!$passwordReset) {
            // Token hatalıysa, uygun bir işlem yapabilirsin.
            // Örneğin hata mesajı gönder ve şifre sıfırlama sayfasına yönlendir.
            return redirect()->route('password.reset')->with('error', 'Geçersiz sıfırlama isteği.');
        }
    
        // Token'in geçerlilik süresini kontrol etmek istiyorsan burada kontrol ekle.
    
        // Şifreyi güncelle
        $user->update(['password' => bcrypt($request->password)]);
    
        // Token'i kullanıldı olarak işaretle
        DB::table('password_resets')->where('token', $token)->delete();
    
        // Kullanıcıya başarılı bir şifre sıfırlama mesajı gönder
        return redirect()->route('login')->with('success', 'Şifreniz başarıyla sıfırlandı. Yeni şifrenizle giriş yapabilirsiniz.');
    }

    public function profile(User $user){
        return view('admin.profile.index', compact('user'));
    }

    public function profilePost(Request $request, User $user){
        $request->validate([
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id, 'id'),
            ],
        ]);
    
        // Güncelleme işlemleri
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    
        return redirect()->route('profiles', $user)->with('success', 'Profil Güncellendi');
    }
    
    
    
}
