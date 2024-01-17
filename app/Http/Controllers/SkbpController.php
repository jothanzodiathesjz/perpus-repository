<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Books;
use App\Models\Keranjang;
use App\Models\ValidationCode;
use App\Models\PinjamBuku;
use App\Models\Skbp1;
use Illuminate\Support\Facades\Auth;
class SkbpController extends Controller
{
    //
   public function skbp1adminView()
    {
        return view('content.skbp.skbp1-admin');
    }

    public function createSkbp1(Request $request)
    {
       $validation = $request->validate([
           'id_user' => 'required|string',
           'nama' => 'required|string',
           'stambuk' => 'required|string',
           'fakultas' => 'required|string',
           'jurusan' => 'required|string',
           'judul' => 'required|string',
           'abstrak' => 'required|string',  // Contoh aturan untuk file gambar
           'alamat' => 'nullable|string',
           'type' => 'required|string',
           'volume' => 'required|string',
           'tahun' => 'required|string'
       ]);
       try {
           // Simpan gambar sampul ke direktori public
           $fileFields = [
               'turnitin' => 'public/uploads/turnitin',
               'bab1' => 'public/uploads/bab1',
               'bab2' => 'public/uploads/bab2',
               'bab3' => 'public/uploads/bab3',
               'fulltext' => 'public/uploads/fulltext',
               'sampul' => 'public/uploads/sampul',
           ];
       
           $fileUrls = [];
       
           foreach ($fileFields as $field => $path) {
            if ($request->hasFile($field)) {
                $filePath = $request->file($field)->store($path);
                $fileUrls[$field] = Storage::url($filePath);
                $fileStatus[$field] = true; // atau false jika perlu
            }
           }
          

           $create = Skbp1::create([
               'id_user' => $request->input('id_user'),
               'nama' => $request->input('nama'),
               'stambuk' => $request->input('stambuk'),
               'fakultas' => $request->input('fakultas'),
               'jurusan' => $request->input('jurusan'),
               'judul' => $request->input('judul'),
               'abstrak' => $request->input('abstrak'),
               'turnitin' => $fileUrls['turnitin'] ?? null,
               'bab1' => isset($fileUrls['bab1']) ? json_encode(['url' => $fileUrls['bab1'], 'status' => $fileStatus['bab1']]) : null,
                'bab2' => isset($fileUrls['bab2']) ? json_encode(['url' => $fileUrls['bab2'], 'status' => $fileStatus['bab2']]) : null,
                'bab3' => isset($fileUrls['bab3']) ? json_encode(['url' => $fileUrls['bab3'], 'status' => $fileStatus['bab3']]) : null,
                'fulltext' => isset($fileUrls['fulltext']) ? json_encode(['url' => $fileUrls['fulltext'], 'status' => $fileStatus['fulltext']]) : null,
               'sampul' => $fileUrls['sampul'] ?? null,
               'alamat' => $request->input('alamat'),
               'type' => $request->input('type'),
               'volume' => $request->input('volume'),
               'show' => true,
               'tahun' => $request->input('tahun')
           ]);
           
           return response()->json([
               'message' => 'Data berhasil disimpan',
               'data' => $create
           ]);
   
       } catch (\Exception $th) {
           return response()->json(['error' => $th->getMessage()]);
       }
      
   }

   public function getSbkp1(Request $request)
   {
       $data = Skbp1::all();
       return response()->json(['data' => $data]);
   }
  

   public function skbp1detailView()
   {
        return view('content.skbp.skbp1-admin-detail');
   }

   public function skbp1detail($id)
   {
       $data = Skbp1::find($id);
       $bab1 = json_decode($data->bab1);
       $bab2 = json_decode($data->bab2);
       $bab3 = json_decode($data->bab3);
       $fulltext = json_decode($data->fulltext);
       return response()->json([
        'data' => [
            'id' => $data->id,
            'id_user' => $data->id_user,
            'nama' => $data->nama,
            'stambuk' => $data->stambuk,
            'fakultas' => $data->fakultas,
            'jurusan' => $data->jurusan,
            'judul' => $data->judul,
            'abstrak' => $data->abstrak,
            'turnitin' => $data->turnitin,
            'bab1' => $bab1,
            'bab2' => $bab2,
            'bab3' => $bab3,
            'fulltext' => $fulltext,
            'sampul' => $data->sampul,
            'alamat' => $data->alamat,
            'type' => $data->type,
            'volume' => $data->volume,
            'show' => $data->show,
            'tahun' => $data->tahun,
            'created_at' => $data->created_at,

        ],
    ]);
   }

   public function setFileShow(Request $request)
   {
       try {
           $query = $request->json('data');
           $id = $request->route('id');
   
           // Validasi input
           if (!isset($query)) {
               return response()->json([
                   'message' => 'Atribut "bab" dan "status" harus ada dan tidak boleh kosong',
                   'data' => $query['status'],
               ], 400); // Bad Request
           }
           
           $data = Skbp1::find($id);
   
           if ($data) {
               // Perbarui nilai dalam model Skbp1 berdasarkan 'bab'
               if($query['bab'] == 'bab1' ) {     
                    $bab1 = json_decode($data->bab1);  
                   $data->bab1 = json_encode(['url' => $bab1->url, 'status' => $query['status']]);
                   $data->save();
                   return response()->json([
                    'message' => 'Data berhasil diperbarui',
                    'field' => $data,
                ]);
               }else if($query['bab'] == 'bab2' ) {
                    $bab2 = json_decode($data->bab2);  
                    $data->bab2 = json_encode(['url' => $bab2->url, 'status' => $query['status']]);
                   $data->save();
                   return response()->json([
                    'message' => 'Data berhasil diperbarui',
                    'field' => $data,
                   ]);
               }else if($query['bab'] == 'bab3' ) {
                $bab3 = json_decode($data->bab3);  
                $data->bab3 = json_encode(['url' => $bab3->url, 'status' => $query['status']]);
                   $data->save();
                   return response()->json([
                    'message' => 'Data berhasil diperbarui',
                    'field' => $data,
                   ]);
               }else if($query['bab'] == 'fulltext' ) {
                $fulltext = json_decode($data->fulltext);  
                $data->fulltext = json_encode(['url' => $fulltext->url, 'status' => $query['status']]);
                   $data->save();
                   return response()->json([
                    'message' => 'Data berhasil diperbarui',
                    'field' => $data,
                   ]);
               }
   
               
           } else {
               return response()->json([
                   'message' => 'Data tidak ditemukan',
                   'data' => $id,
               ], 404);
           }
       } catch (\Throwable $th) {
           return response()->json([
               'error' => 'Terjadi kesalahan: ' . $th->getMessage(),
               'data' => $id,
           ], 500);
       }
   }

   function jurnalInformatikaView()
   {
       return view('content.skbp.skbp1-jurnal-informatika');
   }
   function jurnalSipilView()
   {
       return view('content.skbp.skbp1-jurnal-sipil');
   }
   function jurnalMesinView()
   {
       return view('content.skbp.skbp1-jurnal-mesin');
   }
   function jurnalKimiaView()
   {
       return view('content.skbp.skbp1-jurnal-kimia');
   }
   function jurnalElektroView()
   {
       return view('content.skbp.skbp1-jurnal-elektro');
   }
   function jurnalHukumView()
   {
       return view('content.skbp.skbp1-jurnal-hukum');
   }
   function jurnalAkuntansiView()
   {
       return view('content.skbp.skbp1-jurnal-akuntansi');
   }
   function jurnalManajemenView()
   {
       return view('content.skbp.skbp1-jurnal-manajemen');
   }

   function getVolumeWithJurusan(Request $request)
   {
       $query = $request->query('prodi');
       if ($query) {
           $data = Skbp1::select('volume')->where('jurusan', $query)->distinct()->get();
           return response()->json(['data' => $data]);
       }
   
       $data = Skbp1::select('volume')->distinct()->get();
       $volumes = $data->pluck('volume'); // Mengambil nilai 'volume' dari setiap objek dalam koleksi
       return response()->json(['data' => $volumes]);
   }

   public function getlistSkbp1(Request $request)
   {
        $volume = $request->query('vol');
        $type = $request->query('type');
        $paginate= $request->query('paginate');
        $prodi = $request->query('prodi');

        // Pastikan keduanya ada sebelum melakukan query
        if ($volume && $type) {
            $data = Skbp1::where('volume', $volume)
                        ->where('type', $type)
                        ->where('jurusan', $prodi)
                        ->paginate( 8, ['*'], 'page', $paginate)
                        ->withQueryString(['vol' => $volume, 'type' => $type, 'prodi' => $prodi]);
                        ; 

            return response()->json(['data' => $data]);
        } else {
            $data = Skbp1::where('type', $type)
                        ->where('jurusan', $prodi)
                        ->paginate( 8, ['*'], 'page', $paginate)
                        ->withQueryString(['type' => $type, 'prodi' => $prodi]);
                        ; 

            return response()->json(['data' => $data]);
        }
       
   }
}
