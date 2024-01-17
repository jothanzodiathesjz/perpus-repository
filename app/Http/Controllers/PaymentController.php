<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Configuration;
use Xendit\PaymentRequest\PaymentRequestApi;
use Xendit\PaymentRequest\PaymentRequestParameters;
use App\Models\Payment;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    var $apiInstance=null;
    public function __construct()
    {
        Configuration::setXenditKey("xnd_development_6pTNX05pnzQeMcCixB9FBGp7rv8VwcBjWUw7AKo2Aq0RaFbxN6bAi7GIqnJE9P6");
        $this->apiInstance = new InvoiceApi();
    }

    public function PaymentStore(Request $request)
    {
        $for_user_id = "5f9a3fbd571a1c4068aa40cf";
        $idempotency_key = "5f9a3fbd571a1c4068aa40ce";
        $payment_request_parameters = new CreateInvoiceRequest([
          'external_id' => (string) Str::uuid(),
          'description' => 'Test Invoice',
          'amount' => 10000,
          'invoice_duration' => 172800,
          'currency' => 'IDR',
          ]);

          try {
              $result = $this->apiInstance->createInvoice($payment_request_parameters);
              $payment = Payment::create([
                'id_users' => $request->id_user,
                'checkout_link' => $result['invoice_url'],
                'external_id' => $result['external_id'],
                'status' => $result['status'],
              ]);
              return response()->json([
                  "url" => "$payment->checkout_link",
              ]);
        } catch (\Xendit\XenditSdkException $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage(),
            ]);
        }
    }

    public function notification(Request $request)
    {
      $result = $this->apiInstance->getInvoices(null,$request->external_id);
      $payment = Payment::where('external_id',$request->external_id)->first();
      
      if($payment->status === "SETTLED"){
        return response()->json([
          "status" => "sudah dibayar",
        ]);
      }
      $payment->update([
        'status' => $result[0]['status'],
      ]);
      return response()->json([
          "status" => "success",
        ]);
      

    }
}
