<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function read()
    {
        $model=new Mahasiswa();
   
      if($datax=$model->all()) {
        $success=false;
        $message= "Database Error";
    }
        foreach($datax as $dt) {
            $data[]=[
                'nim'=>$dt->nim,
                'nama'=>$dt->nama,
                'umur'=>$dt->umur,
                'alamat'=>$dt->alamat,
                'kota'=>$dt->kota,
                'kelas'=>$dt->kelas,
                'jurusan'=>$dt->jurusan
            ];
        }
        if (!empty($data)) {
            $success = true;
            $message = "Data berhasil dibaca";
        } else
            {
                $success=false;
                $message = "Data tidak ditemukan/kosong";
            }
        $balikan = [
            "success"=>$success,
            "message"=>$message,
            "data"=>@$data

        ];
        return response() -> json($balikan);
    }
    
    public function create(Request $req)
    {
        $model=new Mahasiswa();
        $model->nim=$req->nim;
        $model->nama=$req->nama;
        $model->umur=$req->umur;
        $model->alamat=$req->alamat;
        $model->kota=$req->kota;
        $model->kelas=$req->kelas;
        $model->jurusan=$req->jurusan;
        if($model->save()) {
                $success=true;
                $message="Data berhasil disimpan";
        } else 
        {
               $success=false;
               $message="Data gagal disimpan"; 
        }

        $balikan = [
            "success"=>$success,
            "message"=>$message,
            "data"=>@$req->all()
        ];
        return response()->json($balikan);
    }

    public function update(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $request->validate([
            'nama' => 'required',
            'umur' => 'required|integer',
            'alamat' => 'required',
            'kota' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa->update($request->all());

        return response()->json(['message' => 'Mahasiswa updated successfully', 'mahasiswa' => $mahasiswa]);
    }

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $mahasiswa->delete();

        return response()->json(['message' => 'Mahasiswa deleted successfully']);
    }
}