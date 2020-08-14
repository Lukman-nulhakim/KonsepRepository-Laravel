<?php

namespace App\Http\Controllers\Repo;

use App\Home;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class HomeRepository{
    public function store($request){
        $result = ['status' => false, 'message' => ''];
        $validator = Validator::make($request->all(),
            [
                'title' => 'required|max:50',
                'banner' => 'required|file'
            ]
        )->validate();
        
        $home = new Home;
        $home = $request->all();
        $home['banner'] = $request->file('banner')->store('assets/home', 'public');

        $data = Home::create($home);
        $request->session()->flash('pesan', "Data berhasil disimpan");
        return $data;
    }

    public function updateHome($request, $id){ // ini tidak ngebinding karna menggunakan findOrFail
        $validator = Validator::make($request->all(),
            [
                'title' => 'required|max:50',
                'banner' => 'required|file'
            ]
        )->validate();

        $dataId = Home::findOrFail($id);
        $data = $request->all();

        if ($request->banner) {
            Storage::delete('public/'.$dataId->banner);
            $data['banner'] = $request->file('banner')->store('assets/home', 'public');
        }

        $dataId->update($data);

        $request->session()->flash('edit', "Data Berhasil di Edit");
        return $dataId;
    }

    public function hapusHome($request, $id){
        $home = Home::findOrFail($id);
        Storage::delete('public/'.$home->banner);
        $home->delete();
        return $home;
    }
}

?> 