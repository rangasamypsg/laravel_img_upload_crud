<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Excel;
use App\Product;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{
    public function importExport()
    {
      return view('importExport');
    }
    public function downloadExcel($type)
    {
      $data = \App\Siswa::get()->toArray();
      return Excel::create('sisawReport', function($excel) use ($data) {
        $excel->sheet('mySheet', function($sheet) use ($data)
        {
          $sheet->fromArray($data);
        });
      })->download($type);
    }
    public function importExcel()
    {
      if(Input::hasFile('import_file')){
        $path = Input::file('import_file')->getRealPath();
        $data = Excel::load($path, function($reader) {
        })->get();
        if(!empty($data) && $data->count()){
          foreach ($data as $key => $value) {
            $insert[] = ['nis' => $value->nis, 'nohp' => $value->nohp, 'nik' => $value->nik, 'nisn' => $value->nisn, 'nama' => $value->nama, 'id_kelas' => $value->id_kelas, 'jenkel' => $value->jenkel, 'tempat' => $value->tempat, 'tanggallahir' => $value->tanggallahir, 'agama' => $value->agama, 'namaortu' => $value->namaortu, 'namaayah' => $value->namaayah, 'namaibu' => $value->namaibu, 'alamat' => $value->alamat, 'nomorijazah' => $value->nomorijazah, 'tahun' => $value->tahun];
          }
          if(!empty($insert)){
            DB::table('siswas')->insert($insert);
            return redirect(url('siswa'));
          }
        }
      }
      return back();
    }
}
