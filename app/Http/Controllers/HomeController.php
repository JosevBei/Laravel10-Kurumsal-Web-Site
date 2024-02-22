<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\AboutContent;
use App\Models\ContactMessage;
use App\Models\Offer;
use App\Models\SiteView;
use App\Models\SiteSettings;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    private $adminController;

    public function __construct(AdminController $adminController)
    {
        if(SiteSettings::find(1)->maintenance_mode==1){
            return redirect()->to('site-bakimda')->send();
        }
        view()->share('categories',Category::orderBy('name','asc')->get());
        $this->adminController = $adminController;
    }
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->get();
        // Sliderları sırala ve ilk ile son slider'ları al
        $firstSlide = Slider::orderBy('id', 'asc')->first();
        $lastSlider = Slider::orderBy('id', 'desc')->first();
        $galeries = Gallery::orderBy('created_at','desc')->take(3)->get();
        $about = AboutContent::all();
        $this->increaseSiteView();

        return view('front.home',compact('products','firstSlide','lastSlider','galeries','about'));
    }

    private function increaseSiteView()
    {
        // Mevcut bir SiteView kaydını al veya oluştur
        $siteView = SiteView::firstOrNew([]);

        // view_count değerini arttır
        $siteView->increment('view_count');

        // Kaydı veritabanına kaydet
        $siteView->save();
    }
    public function submitContactForm(Request $request)
    {
        // Formdan gelen verileri al
        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');
    
        // Veritabanına kaydet (opsiyonel, genellikle e-posta üzerinden alınır)
        $contactMessage = new ContactMessage();
        $contactMessage->name = $name;
        $contactMessage->email = $email;
        $contactMessage->subject = $subject;
        $contactMessage->message = $message;
        $contactMessage->save();
    
        // Bildirim gönderme
        $this->adminController->sendNotification('contact_message', $contactMessage->id, 'Yeni bir mesajınız var.');
    
        // Başarılı bir şekilde kaydedildiğine dair bir mesaj göster
        return redirect()->route('home')->with('success', 'Mesajınız başarıyla gönderildi!');;
    }
    

    public function categoryShow($slug)
    {
        // Belirli bir kategoriyi veritabanından çekin
        $category = Category::where('slug', $slug)->firstOrFail();
        
        // Kategoriye ait ürünleri çekin (örneğin, category_id sütunu ile ilişkilendirilmiş ürünler)
        $products = $category->products()->get();
        
        // Kategori ve ürünleri ilgili view'a geçirin
        return view('front.uruns.products', compact('category', 'products'));
    }
    

    public function productDetay($category, $productSlug)
    {
        // Belirli bir kategoriyi veritabanından çekin
        $category = Category::where('slug', $category)->firstOrFail();
    
        // Ürünü veritabanından çekin
        $product = Product::where('slug', $productSlug)->firstOrFail();
    
        // Hits değerini arttır
        $product->increment('hits');
    
        // Ürünü detay sayfasına gönder
        return view('front.uruns.product_detail', compact('product', 'category'));
    }
    
    
    public function galleryView(){
        $galleries = Gallery::orderBy('created_at','desc')->get();
        return view('front.gallery.index',compact('galleries'));
    }

    public function OfferView()
    {
        return view('front.offer.index');
    }

    public function submitOffer(Request $request)
    {
        // Teklif formunu işle
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $projectDetails = $request->input('project_details');
        $estimatedPrice = $request->input('estimated_price');

        // Veritabanına kaydet
        $offer = new Offer();
        $offer->name = $name;
        $offer->email = $email;
        $offer->phone = $phone;
        $offer->project_details = $projectDetails;
        $offer->estimated_price = $estimatedPrice;
        $offer->guid = \Str::uuid(); // Laravel'ın UUID oluşturma fonksiyonunu kullanın
        $offer->save();

        // Bildirim gönder
        $this->adminController->sendNotification('offer', $offer->id, 'Yeni bir teklifiniz var.');

        // Redirect yaparken doğru değişkeni kullan
        return redirect()->route('offer.thankyou', ['guid' => $offer->guid])->with('success', 'Teklifiniz alındı! Teşekkür ederiz.');
    }

    
    public function thankyou(Request $request)
    {
        $guid = $request->route('guid');
        $offer = Offer::where('guid', $guid)->first(); // Teklifin detaylarını veritabanından al
        if (!$offer) {
            abort(404); // Teklif bulunamazsa 404 hatası gönder
        }
        return view('front.offer.thankyou', ['offer' => $offer]);
    }

    public function searchProd(Request $request)
    {
        $searchTerm = $request->input('q');
        
        // Kullanıcının geldiği sayfanın URL'sini alın
        $previousUrl = url()->previous();
        
        $products = Product::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('product_code', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('category', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->get();
        
        return view('front.uruns.search-prod', compact('products', 'searchTerm', 'previousUrl'));
    }
    
    public function cerezPolicy(){
        return view('front.cerezler');
    }

    public function aboutView(){
        $about = AboutContent::all();
        return view('front.about.index', compact('about'));
    }
    
    public function contactView(){
        return view('front.contact.index');
    }
}
