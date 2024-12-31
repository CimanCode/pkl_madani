<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function hello(){
        return view('admins.dashboard');
    }

    public function banner(){
        $banner = Banner::query()->get();
        $data = [
            'banner' => $banner
        ];
        return view('admins.banner', $data);
    }

    public function addbanner(){
        return view('admins.addbanner');
    }

    public function prosesAddBanner(Request $request){
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        $imagePath = null;
        if($request->hasFile('foto')){
            $imagePath = $request->file('foto')->store('image','public');
        }

        $data['foto'] = $imagePath;

        Banner::query()->create($data);
        Alert::success('Data Berhasil Ditambahkan');
        return redirect()->route('banner');
    }

    public function deleteBanner(Request $request){
        $deleted = Banner::query()->where('id', $request->id)->delete();
        if(!$deleted){
            Alert::error('Oops', "Data Gagal Dihapus");
        }
        Alert::success('Data Berhasil Dihapus');
        return redirect()->back();
    }

    public function update(Request $request){
        $banner = Banner::query()->where('id', $request->id)->first();
        if(!$banner){
            Alert::error('Oops!', 'Data Tidak Ditemukan');
            return redirect()->back();
        }
        $data = [
            'data' => $banner
        ];
        return view('admins.updateBanner', $data);
    }

    public function prosesUpdateBanner(Request $request, $id){
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        $imagePath = null;
        if($request->hasFile('foto')){
            $imagePath = $request->file('foto')->store('image','public');
        }

        $data['foto'] = $imagePath;

        Banner::query()->where('id', $id)->update($data);
        Alert::success('Data Berhasil Diupdate');
        return redirect()->route('banner');
    }
}
