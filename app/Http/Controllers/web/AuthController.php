<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;
use Illuminate\Support\Str;
use Xendit\Configuration;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    //
    var $apiInstance=null;
    public function __construct()
    {
        Configuration::setXenditKey("xnd_development_6pTNX05pnzQeMcCixB9FBGp7rv8VwcBjWUw7AKo2Aq0RaFbxN6bAi7GIqnJE9P6");
        $this->apiInstance = new InvoiceApi();
    }
    public function RegisterMahasiswa()
    {
      $pageConfigs = ['myLayout' => 'blank'];
      return view('content.authentications.auth-register-mahasiswa', [
        'pageConfigs' => $pageConfigs,

    ]);
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
        ]);

        return response()->json([
            'message' => 'success',
        ]);

    }

    public function LoginAdminView(){

    }

    public function adminLogin(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            session(['id_users' => $user->id]);
                return redirect('/dashboard');
        }else{
            return back()->with('error', 'Username atau password salah.');
         }
    }

    public  function RegisterMahasiswaStore(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'fullname' => 'required',
            'telepon' => 'required',
            'stambuk' => 'required',
            'alamat' => 'required',
            'fakultas' => 'required',
            'ProgramStudi' => 'required',
        ]);
        try {
            // DB::beginTransaction();
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'mahasiswa',
            ]);
                $userDetail = UserDetail::create([
                    'user_id' => $user->id,
                    'fullname' => $request->fullname,
                    'telepon' => $request->telepon,
                    'stambuk' => $request->stambuk,
                    'alamat' => $request->alamat,
                    'fakultas' => $request->fakultas,
                    'ProgramStudi' => $request->ProgramStudi,
                ]);
                
                    $payment_request_parameters = new CreateInvoiceRequest([
                        'external_id' => (string) Str::uuid(),
                        'description' => 'Test Invoice',
                        'amount' => 10000,
                        'invoice_duration' => 172800,
                        'currency' => 'IDR',
                        ]);
    
                    $result = $this->apiInstance->createInvoice($payment_request_parameters);
                    $payment = Payment::create([
                    'id_users' => $user->id,
                    'checkout_link' => $result['invoice_url'],
                    'external_id' => $result['external_id'],
                    'status' => $result['status'],
                    ]);
                  return response()->json([
                      "status" => "register successfully",
                      "url" => "$payment->checkout_link",
                      "id_user"=>$user->id
                  ]);
                
                // DB::commit();
                return response()->json([
                    "status" => "register successfully",
                    "url" => "$payment->checkout_link",
                    "id_user" => $user->id
                ]);
            
        }
        catch (\Xendit\XenditSdkException $e) {
            Log::error($e->getMessage());
        }
        catch (\Exception $e) {
            // DB::rollBack();
           return response()->json([
               "status" => "error",
           ]);
        }

    }

    public function RegisterDosenStore(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'fullname' => 'required',
            'telepon' => 'required',
            'stambuk' => 'required',
            'alamat' => 'required',
            'fakultas' => 'required',
            'ProgramStudi' => 'required',
        ]);
        try {
            // DB::beginTransaction();
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'dosen',
            ]);
                $userDetail = UserDetail::create([
                    'user_id' => $user->id,
                    'fullname' => $request->fullname,
                    'telepon' => $request->telepon,
                    'stambuk' => $request->stambuk,
                    'alamat' => $request->alamat,
                    'fakultas' => $request->fakultas,
                    'ProgramStudi' => $request->ProgramStudi,
                ]);
                
                    $payment_request_parameters = new CreateInvoiceRequest([
                        'external_id' => (string) Str::uuid(),
                        'description' => 'Test Invoice',
                        'amount' => 10000,
                        'invoice_duration' => 172800,
                        'currency' => 'IDR',
                        ]);
    
                    $result = $this->apiInstance->createInvoice($payment_request_parameters);
                    $payment = Payment::create([
                    'id_users' => $user->id,
                    'checkout_link' => $result['invoice_url'],
                    'external_id' => $result['external_id'],
                    'status' => $result['status'],
                    ]);
                  return response()->json([
                      "status" => "register successfully",
                      "url" => "$payment->checkout_link",
                      "id_user"=>$user->id
                  ]);
                
                // DB::commit();
                return response()->json([
                    "status" => "register successfully",
                    "url" => "$payment->checkout_link",
                    "id_user" => $user->id
                ]);
            
        }
        catch (\Xendit\XenditSdkException $e) {
            Log::error($e->getMessage());
        }
        catch (\Exception $e) {
            // DB::rollBack();
           return response()->json([
               "status" => "error",
           ]);
        }
    }
    public function RegisterDosen()
    {
      $pageConfigs = ['myLayout' => 'blank'];
      return view('content.authentications.auth-register-dosen', [
        'pageConfigs' => $pageConfigs,

    ]);
    }
    public function RegisterAlumni()
    {
      $pageConfigs = ['myLayout' => 'blank'];
      return view('content.authentications.auth-register-alumni', [
        'pageConfigs' => $pageConfigs,

    ]);
    }
    public function RegisterAlumniStore(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'fullname' => 'required',
            'telepon' => 'required',
            'stambuk' => 'required',
            'alamat' => 'required',
            'fakultas' => 'required',
            'ProgramStudi' => 'required',
        ]);
        try {
            // DB::beginTransaction();
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'mahasiswa',
            ]);
                $userDetail = UserDetail::create([
                    'user_id' => $user->id,
                    'fullname' => $request->fullname,
                    'telepon' => $request->telepon,
                    'stambuk' => $request->stambuk,
                    'alamat' => $request->alamat,
                    'fakultas' => $request->fakultas,
                    'ProgramStudi' => $request->ProgramStudi,
                ]);
                
                    $payment_request_parameters = new CreateInvoiceRequest([
                        'external_id' => (string) Str::uuid(),
                        'description' => 'Test Invoice',
                        'amount' => 10000,
                        'invoice_duration' => 172800,
                        'currency' => 'IDR',
                        ]);
    
                    $result = $this->apiInstance->createInvoice($payment_request_parameters);
                    $payment = Payment::create([
                    'id_users' => $user->id,
                    'checkout_link' => $result['invoice_url'],
                    'external_id' => $result['external_id'],
                    'status' => $result['status'],
                    ]);
                  return response()->json([
                      "status" => "register successfully",
                      "url" => "$payment->checkout_link",
                      "id_user"=>$user->id
                  ]);
                
                // DB::commit();
                return response()->json([
                    "status" => "register successfully",
                    "url" => "$payment->checkout_link",
                    "id_user" => $user->id
                ]);
            
        }
        catch (\Xendit\XenditSdkException $e) {
            Log::error($e->getMessage());
        }
        catch (\Exception $e) {
            // DB::rollBack();
           return response()->json([
               "status" => "error",
           ]);
        }
    }

    public function LoginStore(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $getPaymentStatus = Payment::where('id_users', $user->id)->first();
            if($getPaymentStatus->status == 'SETTLED' || $getPaymentStatus->status == 'PAID'){
                session(['id_users' => $user->id]);
                return redirect('/dashboard');
            }
            return redirect($getPaymentStatus->checkout_link);
        }else{
            return back()->with('error', 'Username atau password salah.');
         }
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/auth/login-cover');
    }
}
