<?php

namespace Lamoud\LaravelNelcXapiIntegration\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class LamoudNelcXapiController extends Controller
{

    public function __construct()
    {
    }

    public function getIndex(Request $request)
    {

        return view('lamoud-nelc-xapi::index');
    }

}