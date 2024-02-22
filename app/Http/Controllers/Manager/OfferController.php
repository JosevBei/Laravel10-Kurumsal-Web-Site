<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index(){
        $offers = Offer::orderBy('created_at','desc')->get();
        return view('admin.offer.index', compact('offers'));
    }
}
