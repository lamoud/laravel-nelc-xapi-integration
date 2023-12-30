<?php

namespace Lamoud\LaravelNelcXapiIntegration\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Lamoud\LaravelNelcXapiIntegration\XapiIntegration;

class LamoudNelcXapiController extends Controller
{

    public function __construct()
    {
    }

    public function getIndex(Request $request)
    {

        return view('lamoud-nelc-xapi::index');
    }

    public function postIndex(Request $request)
    {

        $xapi = new XapiIntegration();

        $response = $xapi->Registered(
            '123456789', // Student National ID
            'betalamoud@gmail.com', // Student Email
            '123', // Course Id OR url Or slug
            'New Course',
            'New Course description',
            'MR Hassan', // instructor Name
            'mrhassan@mail.com',  // instructor Email
        );

        return redirect()->back()->with('success', $response);
    }

}