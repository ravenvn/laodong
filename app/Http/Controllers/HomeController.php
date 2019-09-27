<?php

namespace App\Http\Controllers;

use App\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function storeSimpleContact(Request $request)
    {
        try {
            Contact::create([
                'name' => $request->name,
                'birth' => Carbon::createFromDate($request->birth, 1, 1),
                'phone' => $request->phone,
            ]);
        } catch (\Exception $ex) {
            return response()->json(['status' => 'error', 'message' => $ex->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }
}
