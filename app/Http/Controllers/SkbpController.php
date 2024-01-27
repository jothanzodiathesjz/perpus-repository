<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Books;
use App\Models\Keranjang;
use App\Models\ValidationCode;
use App\Models\PinjamBuku;
use App\Models\Skbp1;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Denda;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class SkbpController extends Controller
{
    //
    public function __construct() {
    }
    public static function updatePinjam()
    {
        $now = Carbon::now();
        $hasUpdates = false;
        
        $data = PinjamBuku::all();
    
        $data->each(function ($item) use ($now, &$hasUpdates) {
            $expiredDate = Carbon::createFromTimestampMs($item->expired_date + 0);
            if ($expiredDate->isPast()) {
                if($item->status === 'pinjam'){
                    $update = PinjamBuku::where('id', $item->id)->update([
                        'status' => 'expired',
                    ]);
                }
                $denda = Denda::where('id_pinjam_buku', $item->id)->first();

            if ($denda) {
                if($denda->status !== 'paid'){    
                    $denda->update([
                        'status' => 'unpaid',
                        'denda' => $expiredDate->diffInDays($now) * 500,
                    ]);
                }
            } else {
                // Create Denda if it doesn't exist
                $createDenda = Denda::create([
                    'id_pinjam_buku' => $item->id,
                    'status' => 'unpaid',
                    'denda' => $expiredDate->diffInDays($now) * 500,
                ]);
            }
            }
        });
    
    }
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
           'abstrak' => 'required|string',
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
       $query = $request->query('prodi');
       if($query){
           $data = Skbp1::where('jurusan', $query)->get();
       }
       $data = Skbp1::orderBy('created_at', 'asc')->get();
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

   function deletePustaka(Request $request)
   {
       $id = $request->route('id');
       $delete = Skbp1::where('id', $id)->delete();
       if(!$delete){
           return response()->json([
               'message' => 'Data gagal di hapus',
           ]);
       }
       return response()->json([
           'message' => 'Data berhasil di hapus',
       ]);

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
       $type = $request->query('type');
       if ($query) {
           $data = Skbp1::select('volume')
                                        ->where('jurusan', $query)
                                        ->where('type', $type)->distinct()->get();
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
                         

            return response()->json(['data' => $data]);
        }
       
   }

   function skbp1Search(Request $request)
   {
       $prodi = $request->query('prodi');
       $type = $request->query('type');
       $search = $request->query('search');
       $paginate= $request->query('paginate');
       if($prodi){
           $data = Skbp1::where('type', $type)
                                ->where('jurusan', $prodi)
                                ->where('judul', 'like', '%'.$search.'%')
                                ->paginate( 8, ['*'], 'page', $paginate)
                                ->withQueryString(['type' => $type, 'prodi' => $prodi, 'search' => $search]);
            return response()->json(['data' => $data]);
       }
       return response()->json(['data' => null]);
   }

   function jurnalContentView()
   {
       return view('content.skbp.skbp1-content');
   }

   function skripsiakuntansiView(){

       return view('content.skbp.skripsi-akuntansi');
   }
   function skripsielektroView(){

       return view('content.skbp.skripsi-elektro');
   }
   function skripsihukumView(){

       return view('content.skbp.skripsi-hukum');
   }
   function skripsiinformatikaView(){

       return view('content.skbp.skripsi-informatika');
   }
   function skripsikimiaView(){

       return view('content.skbp.skripsi-kimia');
   }
   function skripsimanajemenView(){

       return view('content.skbp.skripsi-manajemen');
   }
   function skripsimesinView(){

       return view('content.skbp.skripsi-mesin');
   }
   function skripsisipilView(){

       return view('content.skbp.skripsi-sipil');
   }

   function skbp1FormView()
   {
       return view('content.skbp.skbp1-form');
   }

   function skbp2PrintView()
   {
       return view('content.skbp.skbp2-print');
   }

   function skbp2PrintData(Request $request)
   {
       $id = $request->route('id');
       $record = Skbp1::find($id);
       if($record){
           return response()->json(['data' => [
               'record' => $record,
               'index' => $record->getKey()
           ]]);
       }
       return response()->json(['data' => null]);
   }

   function bebasPinjamView()
   {
        // updatePinjam();
        // $data = PinjamBuku::selectRaw('id_user, COUNT(*) as total_peminjaman')
        //           ->groupBy('id_user')
        //           ->get();
        // $data = PinjamBuku::all();
        // $map = $data->map(function ($item) {
        //     return [
        //         'id' => $item->id,
        //         'id_user' => $item->id_user,
        //         'total_book' => count(explode(',', $item->id_buku)),
        //     ];
        // });
        
        return view('content.skbp.bebas-pinjam');
        // return response()->json(['data' => $map]);
   }

   function dataBebasPinjam()
   {
    // $data = User::whereIn('role', ['mahasiswa', 'dosen', 'alumni'])->get();
        $data = PinjamBuku::selectRaw('id_user, GROUP_CONCAT(id) as ids, GROUP_CONCAT(id_buku) as id_bukus')
        ->groupBy('id_user')
        ->get();

        $map = $data->map(function ($item) {
            $dataUser = UserDetail::where('user_id', $item->id_user)->first();
        return [
        'id' => explode(',', $item->ids),
        'user' => [
            'name' => $dataUser->fullname,
            'prodi' => $dataUser->ProgramStudi,
            'stambuk' => $dataUser->stambuk,
        ],
        'total_book' => count(array_unique(explode(',', $item->id_bukus))),
        'id_user' => $item->id_user
        ];
        });

        return response()->json(['data' => $map]);

   }

   function bebasPinjamViewDetail(Request $request)
   {
       $id = $request->route('id');
       $update = $this->updatePinjam();
       $idUser = Auth::user()->id;
        $data = PinjamBuku::where('id_user', $id)->get();
        $data2 = $data->map(function ($item) {
            $buku = Books::whereIn('id', explode(',', $item->id_buku))
            ->select('id', 'judul','penulis','tahun_publikasi','imgfile','kategori_buku')
            ->get();
            return [
                'id' => $item->id,
                'books'=> $buku,
                'id_user'=> $item->id_user,
                'tanggal_pinjam'=> $item->tanggal_pinjam,
                'tanggal_kembali'=> $item->tanggal_kembali,
                'nama_lengkap'=> $item->nama_lengkap,
                'status'=> $item->status,
                'expired_date'=> $item->expired_date,
                'count_book'=> count($buku)
            ];
        });
        $data3 = $data->map(function ($item) {
            $denda = Denda::where('id_pinjam_buku', $item->id)
            ->where('status', 'unpaid')
            ->get();
            return [
                'denda'=> $denda->sum('denda'),
            ];
        });
        // return response()->json(['data' => $data2]);
        return view('content.skbp.bebas-pinjam-detail', [
            'data' => $data2,
            'denda' => $data3->sum('denda'),
            'id_user' => $id
        ]);
   }
   function skbp1PrintView(Request $request)
   {
       $id = $request->route('id');
       $record = UserDetail::where('user_id', $id)->first();
       return view('content.skbp.skbp1-print',[
        'nama' => $record->fullname,
        'prodi' => $record->ProgramStudi,
        'stambuk' => $record->stambuk,
        'fakultas' => $record->fakultas
       ]);
   }

   function skbp21rintData(Request $request)
   {
       $id = $request->route('id');
       $record = Skbp1::find($id);
       if($record){
           return response()->json(['data' => [
               'record' => $record,
               'index' => $record->getKey()
           ]]);
       }
       return response()->json(['data' => null]);
   }

   function skripsiContentView()
   {
       return view('content.skbp.skripsi-content');
   }

   function updatePinjamBuku(Request $request)
   {
        try {
            $id = $request->route('id');
            $status = $request->input('status');
            $update = PinjamBuku::where('id', $id)->update([
                'status' => $status,
                'tanggal_kembali' => now()->timestamp * 1000
            ]);
            if($status == 'kembali'){
                $updateDenda = Denda::where('id_pinjam_buku', $id)->update([
                    'status' => 'paid',
                ]);
            }
            $data = PinjamBuku::find($id);
            $data2 = PinjamBuku::where('id_user', $data->id_user)->get();
            $data3 = $data2->map(function ($item) {
                $denda = Denda::where('id_pinjam_buku', $item->id)
                ->where('status', 'unpaid')
                ->get();
                return [
                    'denda'=> $denda->sum('denda'),
                ];
            });
            return response()->json([
                'message' => 'Success',
                'data' => $data,
                'denda' => $data3->sum('denda')
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th->getMessage()], 400);
        }
       

   }
}
