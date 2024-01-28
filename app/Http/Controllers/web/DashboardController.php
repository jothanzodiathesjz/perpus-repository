<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\pages\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Books;
use App\Models\Keranjang;
use App\Models\ValidationCode;
use App\Models\PinjamBuku;
use App\Models\Skbp1;
use App\Models\Denda;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\ProfileImg;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function __construct() {
    }
   public static function generateRandomString($length = 7) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, strlen($characters) - 1)];
        }
    
        return $randomString;
    }

    public static function updatePinjam()
{
    $now = Carbon::now();
    $hasUpdates = false;
    
    $data = PinjamBuku::where('status', 'pinjam')->get();

    $data->each(function ($item) use ($now, &$hasUpdates) {
        $expiredDate = Carbon::createFromTimestampMs(strtotime($item->expired_date + 0));
        if ($expiredDate->isPast()) {
            $update = PinjamBuku::where('id', $item->id)->update([
                'status' => 'expired',
            ]);
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

    return $data;
}
    //
    public function BooksView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.books.books2');
    }
    public function BooksHukum()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.books.books2');
    }

    public function BookStore(Request $request)
    {
        try{
            $validation = $request->validate([
                'judul' => 'required',
                'penulis' => 'required',
                'tahun_publikasi' => 'required',
                'kategori_buku' => 'required',
                'isbn' => 'required',
                'ketersediaan' => 'required',
                'imgfile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan jenis file yang diizinkan dan batasan ukuran
            ]);
        
            // Simpan gambar ke direktori public
            $imagePath = $request->file('imgfile')->store('public/uploads');
        
            // Ambil URL lengkap untuk file yang disimpan
            $imageUrl = Storage::url($imagePath);
            $create = Books::create([
                'judul' => $request->input('judul'),
                'penulis' => $request->input('penulis'),
                'tahun_publikasi' => $request->input('tahun_publikasi'),
                'kategori_buku' => $request->input('kategori_buku'),
                'isbn' => $request->input('isbn'),
                'ketersediaan' => $request->input('ketersediaan'),
                'imgfile' => $imageUrl,
                'deskripsi' => $request->input('deskripsi'),
            ]);
    
            return response()->json(['image_url' => $imageUrl, 'create' => $create]);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }
    public function updateBook(Request $request, $id)
    {
        try {
            $validation = $request->validate([
                'judul' => 'required',
                'penulis' => 'required',
                'tahun_publikasi' => 'required',
                'kategori_buku' => 'required',
                'isbn' => 'required',
                'ketersediaan' => 'required' // Sesuaikan dengan jenis file yang diizinkan dan batasan ukuran
            ]);

            // Cek apakah buku dengan ID tersebut ada
            $book = Books::find($id);

            if (!$book) {
                return response()->json(['error' => 'Buku tidak ditemukan'], 404);
            }

            // Update data buku
            $book->judul = $request->input('judul');
            $book->penulis = $request->input('penulis');
            $book->tahun_publikasi = $request->input('tahun_publikasi');
            $book->kategori_buku = $request->input('kategori_buku');
            $book->isbn = $request->input('isbn');
            $book->ketersediaan = $request->input('ketersediaan');
            $book->deskripsi = $request->input('deskripsi');

            // Jika ada file gambar yang diunggah, simpan gambar baru
            if ($request->hasFile('imgfile')) {
                // Hapus gambar lama
                Storage::delete($book->imgfile);

                // Simpan gambar baru
                $imagePath = $request->file('imgfile')->store('public/uploads');
                $imageUrl = Storage::url($imagePath);
                $book->imgfile = $imageUrl;
            }else{
                $book->imgfile = $book->imgfile;
            }

            // Simpan perubahan
            $book->save();

            return response()->json(['message' => 'Buku berhasil diupdate', 'book' => $request->all()]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function getDataBuku(Request $request)
    {
        $paginate = $request->query('page');
        $search = $request->query('search');
        $category = $request->query('category');
        $entries = $request->query('entries');
        if($category){
            $data = Books::where('kategori_buku', $category)->paginate($entries ? $entries : 8, ['*'], 'page', $paginate)->withQueryString(['category' => $category]);
            return response()->json(['data' => $data]);
        }
        $data = Books::where('judul', 'like', '%' . $search . '%')->orderBy('judul', 'asc')->paginate(8, ['*'], 'page', $paginate);
        return response()->json(['data' => $data]);
    }

    public function getDataBukuAdmin(Request $request)
    {
        
        $data = Books::all();
        return response()->json(['data' => $data]);
    }

    public function deleteBook(Request $request)
    {
        $id = $request->route('id');
        $delete = Books::where('id', $id)->delete();
        return response()->json(['message' => 'success']);
    }
    public function cartStore(Request $request)
    {
        try{
            $validation = $request->validate([
                'id_buku' => 'required',
                'user_id' => 'required',
            ]);
            $create = Keranjang::create([
                'id_buku' => $request->input('id_buku'),
                'user_id' => $request->input('user_id'),
            ]);
            if($create){
                $data = Books::where('id', $request->input('id_buku'))->first();
                return response()->json(['data' => $data]);
            }
        } catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function getDataKeranjangById(Request $request)
    {
       try {
        $id = $request->route('id');
        $cart = Keranjang::where('user_id', $id)->get();
        if($cart->isEmpty()){
            return response()->json(['data' => $cart]);
        }else{
            $dataBuku = [];
            foreach ($cart as $item) {
                $id_buku = $item->id_buku;
                $buku = Books::find($id_buku);
                if(!$buku) continue;
                $dataBuku[] = [
                    'id' => $buku->id ,
                    'judul' => $buku->judul,
                    'penulis' => $buku->penulis,
                    'tahun_publikasi' => $buku->tahun_publikasi,
                    'kategori_buku' => $buku->kategori_buku,
                    'isbn' => $buku->isbn,
                    'ketersediaan' => $buku->ketersediaan,
                    'imgfile' => $buku->imgfile,
                    'cart_id' => $item->id
                ];
            }

            return response()->json(['data' => $dataBuku, 'count' => count($dataBuku)]);
        }
       } catch (\Throwable $th) {
        //throw $th;
        return response()->json(['error' => $th->getMessage()]);
       }

    }

    public function deleteItemCart(Request $request)
    {
        $id = $request->route('id');
        $delete = Keranjang::where('id', $id)->delete();
        return response()->json(['message' => 'success']);
    }

    public function searchBooks(Request $request)
    {
        $search = $request->query('search');
        $data = Books::where('judul', 'like', '%' . $search . '%')->get();
        return response()->json(['data' => $data]);
    }

    public function getBooksCategory()
    {
        $data = Books::select('kategori_buku')->distinct()->get();
        return response()->json(['data' => $data]);
    }

    public function checkoutView()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('content.checkout.checkout2');
    }

    public function CreateValidationCode(Request $request)
    {
        try{
            $validation_code = $this->generateRandomString();
            $create = ValidationCode::create([
                'code' => $validation_code,
                'status_code'=> 'true'
            ]);
            return response()->json(['code' => $create->code]);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
     }

     public function CreatePeminjaman(Request $request)
     {
        try {
            $validation = $request->validate([
                'id_buku' => 'required|array',
                'id_user' => 'required',
                'tanggal_pinjam'=> 'required',
                'tanggal_kembali'=> 'required',
                'nama_lengkap'=> 'required',
                'validation_code'=> 'required',
            ]);

            $id_buku = implode(',', $request->input('id_buku'));

            $check_validation = ValidationCode::where('code', $request->input('validation_code'))->first();
            if($check_validation->status_code == 'false' || $check_validation == null){
                return response()->json(['error' => 'Validation code not found'], 400);
            }
            $create_pinjam = PinjamBuku::create([
                'id_buku' => $id_buku,
                'id_user' => $request->input('id_user'),
                'tanggal_pinjam'=> $request->input('tanggal_pinjam'),
                'tanggal_kembali'=> $request->input('tanggal_kembali'),
                'nama_lengkap'=> $request->input('nama_lengkap'),
                'status'=> 'pinjam',
                'expired_date'=> $request->input('tanggal_kembali'),
            ]);
            foreach ($request->input('id_buku') as $item) {
                $update_buku = Keranjang::where('user_id', $request->input('id_user'))->where('id_buku', $item)->delete();
            }

            $update_validation = ValidationCode::where('code', $request->input('validation_code'))->update(['status_code'=> 'false']);

            return response()->json(['message' => 'successfully',
            'data' => explode(',', $create_pinjam->id_buku)
        ]);
        
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th->getMessage()], 400);
        }
       
     }

     public function DaftarPinjamView()
     {
        $update = $this->updatePinjam();
        $idUser = Auth::user()->id;
        $data = PinjamBuku::where('id_user', $idUser)->get();
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
            return view('content.pinjam.daftarpinjam', [
                'data' => $data2,
                'denda' => $data3->sum('denda')
            ]);
     }

     public function getDataPinjamByUser(Request $request )
     {
        $update = $this->updatePinjam();
        $data = PinjamBuku::where('id_user', $request->route('id'))->get();
        $data2 = $data->map(function ($item) {
            $buku = Books::whereIn('id', explode(',', $item->id_buku))
            ->select('id', 'judul','penulis','tahun_publikasi','imgfile','kategori_buku')
            ->get();
            return [
                'books'=> $buku,
                'id_user'=> $item->id_user,
                'tanggal_pinjam'=> $item->tanggal_pinjam,
                'tanggal_kembali'=> $item->tanggal_kembali,
                'nama_lengkap'=> $item->nama_lengkap,
                'status'=> $item->status,
                'expired_date'=> $item->expired_date
            ];
        });
        return response()->json(['data' => $data2]);
     }

     function profileView()
     {
        return view('content.users.profile');
     }
    
     function getProfileDetails(Request $request)
     {
        $data = UserDetail::where('user_id', $request->route('id'))->first();
        $profilePicture = ProfileImg::where('id_user', $request->route('id'))->first();
        return response()->json([
            'data' => $data,
            'profilePicture' => $profilePicture ? $profilePicture : null
        ]);
     }

     function changesProfileDetails(Request $request)
     {
        $validate = $request->validate([
            'fullname' => 'required',
            'telepon' => 'required',
            'stambuk' => 'required',
            'alamat' => 'required',
            'fakultas' => 'required',
            'ProgramStudi' => 'required',
        ]);
        $data = UserDetail::where('user_id', $request->route('id'))->update([
            'fullname' => $request->input('fullname'),
            'ProgramStudi' => $request->input('ProgramStudi'),
            'fakultas' => $request->input('fakultas'),
            'telepon' => $request->input('telepon'),
            'alamat' => $request->input('alamat'),
            'stambuk' => $request->input('stambuk'),
        ]);

        $data2 = UserDetail::where('user_id', $request->route('id'))->first();
        return response()->json(['data' => $data2]);
     }

    

    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            'password' => 'required',
            'newpassword' => 'required',
        ]);
        $user = User::find($request->route('id'));
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        if (!Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 400);
        }
        $user->password = Hash::make($request->input('newpassword'));
        $user->save();

        return response()->json(['message' => 'Password updated successfully']);
    }

    public function updateProfilePicture(Request $request)
    {
        
        $imgfile = $request->file('imgfile');
        $id = $request->route('id');
        $find = ProfileImg::where('id_user', $id)->first();
        if($find){
            $oldImagePath = str_replace('storage', 'public', $find->img);
            if (Storage::exists($oldImagePath)) {
                // Delete the old image file
                Storage::delete($oldImagePath);
            }
            $saveimg = $request->file('imgfile')->store('public/uploads/profile');
            
            $imageUrl = Storage::url($saveimg);
            $update = ProfileImg::where('id_user', $id)->update([
                'img' => $imageUrl
            ]);
            return response()->json([
                'message' => 'success',
                'data' => $imageUrl
            ]);
        }else{
            $saveimg = $request->file('imgfile')->store('public/uploads/profile');
            $imageUrl = Storage::url($saveimg);
            $create = ProfileImg::create([
                'id_user' => $id,
                'img' => $imageUrl
            ]);
            return response()->json([
                'message' => 'success',
                'data' => $imageUrl
            ]);
        }
        
    }

    public function getProfilePicture(Request $request)
    {
        $id = $request->route('id');
        $find= ProfileImg::where('id_user', $id)->get();
        if($find->isEmpty()){
            return response()->json(['data' => null]);
        }
        return response()->json(['data' => $find]);
    }

    function validationCodeView()
    {
        return view('content.skbp.verification-code');
    }

  
}
