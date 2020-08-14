<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Repo\ContactRepository;

class ContactController extends Controller
{
    protected $repo;

    public function __construct(){
        $this->repo = new ContactRepository();
    }

    public function index(){
        return view('pages.admin.contact.index');
    }

    public function indexFormContact($id = null)
    {
        return view('form-test');
    }

    // public function create()
    // {
        
    // }

    public function storeFormContact(Request $request, $id = null) // ini untuk mendeklarasikan kalo si id itu kosong dan di isi nilai null
    {
        $storeFormContact = $this->repo->storeFormContact($request,$id);
        if (!$storeFormContact['status']) {
            return response()->json('Create or update error: ' . json_encode($storeFormContact['message']));
        }
        // return response()->json('Create or update succes: ' . json_encode($storeFormContact['message'])); // ini untuk mengubah data array menjadi json
        return redirect('/contact')->with('pesan', "Success mengirim pesan");
    }

    public function show(Contact $contact)
    {
        //
    }

    public function edit(Contact $contact)
    {
        //
    }


    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        //
    }
}
