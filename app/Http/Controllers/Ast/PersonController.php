<?php

namespace App\Http\Controllers\Ast;

use App\Http\Controllers\Controller;
use App\Models\Ast\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();
        return view('ast.people.index', compact('people'));
    }

    public function create()
    {
        return view('ast.people.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:Cari,Tedarikci,Diger',
        ]);

        Person::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('people.index')->with('success', 'Kişi başarıyla eklendi.');
    }

    public function edit(Person $person)
    {
        return view('ast.people.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:Cari,Tedarikci,Diger',
        ]);

        $person->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('people.index')->with('success', 'Kişi başarıyla güncellendi.');
    }

    public function destroy(Person $person)
    {
        // Eğer kişiye ait Excel verileri varsa, bunları sil
        if ($person->excelData()->exists()) {
            $person->excelData()->delete();
        }
        if($person->payments()->exists()){
            $person->payments()->delete();
        }
    
        // Kişiyi sil
        $person->delete();
    
        return redirect()->route('people.index')->with('success', 'Kişi başarıyla silindi.');
    }
    

    
    
}
