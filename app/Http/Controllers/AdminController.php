<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('pages.admin.dashboard', ['categories' => $categories]);
    }
}
