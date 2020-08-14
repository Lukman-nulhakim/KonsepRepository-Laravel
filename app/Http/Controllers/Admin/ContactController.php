<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\Http\Controllers\Repo\ContactRepository;

class ContactController extends Controller
{
    protected $repo;

    public function __construct(){
        $this->repo = new ContactRepository();
    }

    public function index(){
        $contacts = Contact::all();
        return view('pages.admin.contact.index', compact('contacts'));
    }

    public function show(Contact $contact){ // ini ngebinding
        return view('pages.admin.contact.show', compact('contact'));
    }

    public function update(Request $request, $id = null) // ini untuk mendeklarasikan kalo si id itu kosong dan di isi nilai null
    {
        $storeFormContact = $this->repo->storeFormContact($request,$id);
        if (!$storeFormContact['status']) {
            return response()->json('Create or update error: ' . json_encode($storeFormContact['message']));
        }
        // return response()->json('Create or update succes: ' . json_encode($storeFormContact['message'])); // ini untuk mengubah data array menjadi json
        return redirect('/admin/contact');
    }

    public function destroy(Request $request, $id){
        $this->repo->hapusContact($request, $id);
        return redirect('/admin/contact');
    }
}
