<?php

namespace App\Http\Controllers\Ast;

use App\Http\Controllers\Controller;
use App\Models\Ast\ExcelData;
use App\Models\Ast\Person;
use App\Models\Ast\ProductType;
use App\Models\Ast\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;
use Illuminate\Support\Str;


class ExcelDataController extends Controller
{
    public function index()
    {
        $cariPeople = Person::orderBy('name','asc')->where('type', 'Cari')->get();
        $tedarikciPeople = Person::orderBy('name','asc')->where('type', 'Tedarikci')->get();

        $excelData = ExcelData::with(['person', 'productType'])->get();

        return view('ast.excel_data.index', compact('excelData', 'cariPeople', 'tedarikciPeople'));
    }

    public function showTables(Person $person)
    {
        // Belirli kişiye ait Excel tablolarını getir
        $excelData = ExcelData::orderBy('date','asc')->with(['person', 'productType'])
            ->where('person_id', $person->id)
            ->get();

        return view('ast.excel_data.table', compact('excelData', 'person'));
    }

    public function createTableForm(Person $person)
    {
        $productTypes = ProductType::all(); // Tüm ürün tiplerini getir

        return view('ast.excel_data.create', compact('person', 'productTypes'));
    }

    public function storeTable(Request $request, Person $person)
    {
        // Validasyon kurallarını tanımla
        $rules = [
            'product_type_id' => 'required|exists:product_types,id',
            'date' => 'required|date',
            'quantity' => 'required|numeric|min:0',
        ];
    
        // Validasyonu yap
        $validator = Validator::make($request->all(), $rules);
    
        // Eğer validasyon başarısız olursa hata mesajlarıyla birlikte geri dön
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Validasyon başarılı ise yeni tabloyu oluştur
        $productType = ProductType::find($request->input('product_type_id'));
    
        $excelData = new ExcelData([
            'person_id' => $person->id,
            'product_type_id' => $productType->id,
            'date' => $request->input('date'),
            'amount' => $productType->price, // amount değerini sadece ürün fiyatına eşitle
            'quantity' => $request->input('quantity'),
        ]);
    
        $excelData->save();
    
        return redirect()->route('excel-data.show-tables', $person->id)
            ->with('success', 'Yeni tablo başarıyla oluşturuldu.');
    }
    

    public function editTable(Person $person, ExcelData $table)
    {
        return view('ast.excel_data.edit', compact('person', 'table'));
    }

    public function updateTable(Request $request, Person $person, ExcelData $table)
    {
        // Formdan gelen verileri kullanarak tabloyu güncelle
        $table->update([
            'quantity' => $request->input('quantity'),
            'date' => $request->input('date'),
            'amount' => $request->input('amount'),
            // Diğer güncellenecek alanlar buraya eklenecek
        ]);

        return redirect()->route('excel-data.show-tables', $person->id)
            ->with('success', 'Tablo başarıyla güncellendi.');
    }

    public function destroyTable(Person $person, ExcelData $table)
    {
        // Tabloyu bul ve sil
        $table->delete();

        return redirect()->route('excel-data.show-tables', $person->id)
            ->with('success', 'Tablo başarıyla silindi.');
    }

    public function updatePayment(Request $request, Person $person)
    {
        // Validasyon kurallarını tanımla
        $rules = [
            'odeme' => 'required|numeric|min:0',
        ];

        // Validasyonu yap
        $validator = Validator::make($request->all(), $rules);

        // Eğer validasyon başarısız olursa hata mesajlarıyla birlikte geri dön
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validasyon başarılı ise kişinin ödeme bilgisini güncelle
        $person->odeme = $request->input('odeme');
        $person->save();

        return redirect()->back()->with('success', 'Ödeme bilgisi başarıyla güncellendi.');
    }
    //PDF Alanı
    public function downloadPdf($personId)
    {
        $person = Person::findOrFail($personId);
        $excelData = $person->excelData;
        $payments = $person->payments; // Yeni satır
    
        // Kişi adını URL uygun hale getir ve tarihi al
        $personName = Str::slug($person->name, '-');
        $date = now()->format('Y-m-d');
    
        // PDF'yi oluştur
        $pdf = PDF::loadView('ast.excel_data.pdf', compact('person', 'excelData', 'payments')); // Güncellenen satır
    
        // Dosya adını oluştur
        $fileName = "{$personName}_{$date}_excel.pdf";
    
        // İndir
        return $pdf->download($fileName);
    }
    
    //Ödeme Alanı

    public function addPayment(Request $request, Person $person)
    {
        // Validasyon kurallarını tanımla
        $rules = [
            'odeme' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ];

        // Validasyonu yap
        $validator = Validator::make($request->all(), $rules);

        // Eğer validasyon başarısız olursa hata mesajlarıyla birlikte geri dön
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Kişi var mı kontrol et, yoksa oluştur
        $existingPerson = Person::find($person->id);
        if (!$existingPerson) {
            return redirect()->back()->with('error', 'Kişi bulunamadı.');
        }

        // Kişinin ödeme bilgisini güncelle
        $existingPerson->odeme += $request->input('odeme');
        $existingPerson->save();

        // Yeni bir ödeme kaydı oluştur
        $payment = new Payment([
            'people_id' => $person->id,
            'payment_date' => $request->input('payment_date'),
            'payment_amount' => $request->input('odeme'),
        ]);
        $payment->save();

        return redirect()->back()->with('success', 'Ödeme başarıyla eklendi.');
    }

    // Ödeme Silme

    public function deletePayment(Person $person, Payment $payment)
    {
        // Ödeme tablosundan ödemeyi sil
        $payment->delete();

        // Kişinin toplam ödemesinden silinen miktarı çıkar
        $person->odeme -= $payment->payment_amount;
        $person->save();

        return redirect()->back()->with('success', 'Ödeme başarıyla silindi.');
    }

    
}

