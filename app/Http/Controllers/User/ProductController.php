<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const VIEW_PATH = 'client.products.';

    public function index()
    {
        return view(self::VIEW_PATH . __FUNCTION__);
    }

    public function show($id)
    {
        return view(self::VIEW_PATH . __FUNCTION__);
    }

    public function cart()
    {
        return view(self::VIEW_PATH . 'purchase.' . __FUNCTION__);
    }

    public function checkout()
    {
        return view(self::VIEW_PATH . 'purchase.' . __FUNCTION__);
    }
}
