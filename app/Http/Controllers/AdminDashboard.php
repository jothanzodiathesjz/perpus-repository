<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Books;
use App\Models\Keranjang;
use App\Models\ValidationCode;
use App\Models\PinjamBuku;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Controller
{
    //
    public function BookListView(){
        return view('content.books.books-management');
    }
}
