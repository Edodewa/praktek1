<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makul;
use Illuminate\Support\Facades\Auth;

class MakulController extends Controller
{
    public function indexmakul()
    {
        return view('index_makul');
    }

    public function makul_read()
        {
            $model=new Makul();
            $datai=$model->all();
            foreach($datai as $dt){
                $data[]=[
                    'kode_kelas'=>$dt->kode_kelas,
                    'nama_makul'=>$dt->nama_makul,
                    'ruangan'=>$dt->ruangan,
                    'kelas'=>$dt->kelas,
                    'sks'=>$dt->sks
                ];
            }

            if (!empty($data)){
                $success = true;
                $massage = "Data berhasil dibaca";
            }else{
                $success = false;
                $massage = "Data tidak ditemukan/kosong";
            }
            $balikan = [
                "success"=>$success,
                "massage"=>$massage,
                "data"=> @$data
            ];

            return response()->json($balikan);
        }

        public function makul_create(Request $req)
        {
            $model=new Makul();
            $model->kode_kelas=$req->kode_kelas;
            $model->nama_makul=$req->nama_makul;
            $model->ruangan=$req->ruangan;
            $model->kelas=$req->kelas;
            $model->sks=$req->sks;

            if($model->save()){
                $success=true;
                $massage="Data berhasil disimpan";
            }else{
                $success=false;
                $massage="Data gagal disimpan";
            }

            $balikan = [
                "success"=>$success,
                "massage"=>$massage,
                "data"=> @$req->all()
            ];

            return response()->json($balikan);
        }

        public function makul_update(Request $request)
        {
            $kode_kelas = $request->kode_kelas;
            $makul = Makul::find($kode_kelas);
            if (!$kode_kelas) {
                return response()->json(['message' => 'Mata Kuliah not found'], 404);
            }

            $request->validate([
                'nama_makul' => 'required',
                'ruangan' => 'required',
                'kelas' => 'required',
                'sks' => 'required',
            ]);

            $makul->update($request->all());

            return response()->json(['message' => 'Mata Kuliah updated successfully', 'makul' => $makul]);
        }

        public function makul_destroy($kode_kelas)
        {
            $makul = Makul::find($kode_kelas);
            if (!$makul) {
                return response()->json(['message' => 'Mata Kuliah not found'], 404);
            }
    
            $makul->delete();
    
            return response()->json(['message' => 'Mata Kuliah deleted successfully']);
        }

}