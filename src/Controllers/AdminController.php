<?php

namespace Gmlo\CMS\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('CMSAuthenticate');
    }

    public function home()
    {
        return view('CMS::home');
    }
}