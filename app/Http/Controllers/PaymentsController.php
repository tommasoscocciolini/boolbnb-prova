<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Transaction;
use Braintree;


class PaymentsController extends Controller
{
  public function make(Request $request) {
  $payload = $request->input('payload', false);
  $nonce = $payload['nonce'];
  $status = Braintree\Transaction::sale([
                          'amount' => '10.00',
                          'paymentMethodNonce' => $nonce,
                          'options' => [
                                     'submitForSettlement' => True
                                       ]
            ]);

  return response()->json($status);
}
}
