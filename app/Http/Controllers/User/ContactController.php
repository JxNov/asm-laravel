<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    const VIEW_PATH = 'client.contact.';

    public function index()
    {
        return view(self::VIEW_PATH . __FUNCTION__);
    }
}
