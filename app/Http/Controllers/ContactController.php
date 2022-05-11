<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
   
 
class ContactController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view("input-fields");
    }
    public function store(Request $request)
    {
        $request->validate([
            'moreFields.*.title' => 'required',
            'moreFields.*.description' => 'required',
        ]);
      
        foreach ($request->moreFields as $key => $value) {
            Contact::create($value);
        }
      
        return back()->with('success', 'Todos Has Been Created Successfully.');
    }
}
