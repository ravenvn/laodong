<?php

namespace App\Http\Controllers;

use App\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class HomeController extends Controller
{
    public function index()
    {
        $homepage = Page::find(1);

        return view('home.index', compact('homepage'));
    }

    public function storeSimpleContact(Request $request)
    {
        try {
            Contact::create([
                'name' => $request->name,
                'birth' => Carbon::createFromDate($request->birth, 1, 1),
                'phone' => $request->phone,
                'province_id' => $request->provinceId,
                'details' => $request->details,
            ]);
        } catch (\Exception $ex) {
            return response()->json(['status' => 'error', 'message' => $ex->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }
}
