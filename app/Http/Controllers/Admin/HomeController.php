<?php

namespace App\Http\Controllers\Admin;

use App\Home;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Repo\HomeRepository;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    protected $repo;

    public function __construct(){ // ini mengInstansiasi
        $this->repo = new HomeRepository();
    }

    public function index(){
        $homes = Home::all();
        return view('pages.admin.home.index', compact('homes'));
    }

    public function create(){
        return view('pages.admin.home.create');
    }

    public function store(Request $request){
        $this->repo->store($request);

        return redirect()->route('home.index');
    }

    public function edit(Request $request, $id){ // ini tidak ngebinding karna menggunakan findOrFail
        $homes = Home::findOrFail($id);
        return view('pages.admin.home.edit', compact('homes'));
    }

    public function update(Request $request, $id){
        $this->repo->updateHome($request, $id);
        return redirect()->route('home.index');
    }

    public function destroy(Request $request, $id){
        $this->repo->hapusHome($request, $id);
        return redirect()->route('home.index');
    }
}

