<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditAnnouncementController extends Controller
{
    public function index()
    {
        return view('/edit-announcement');
    }
}
