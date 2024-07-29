<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    const VIEW_PATH = 'admin.';

    public function index()
    {
        return view(self::VIEW_PATH . __FUNCTION__);
    }
}
