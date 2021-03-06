<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Province;
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

    public function getAllProvinces()
    {
        return response()->json(['provinces' => Province::orderBy('name')->get()]);
    }
    
    public function getContacts(Request $request)
    {
        $contacts = Contact::with('province')
                    ->orderBy($request->sortField, $request->sortOrder)
                    ->skip(($request->page - 1) * $request->perPage)
                    ->take($request->perPage)
                    ->get();
        $startIndex = ($request->page - 1) * $request->perPage + 1;
        foreach ($contacts as $contact) {
            $contact->serial = $startIndex++;
        }

        return response()->json(['contacts' => $contacts, 'total' => Contact::count()]);
    }

    public function contacts()
    {
        return view('home.contacts');
    }

    public function updateNotes(Request $request)
    {
        $contact = Contact::find($request->contactId);
        $contact->update([
            'notes' => $request->notes,
        ]);

        return response()->json(['status' => 'success']);
    }
}
