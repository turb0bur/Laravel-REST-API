<?php

namespace App\Http\Controllers\Transaction;

use App\Transaction;
use App\Http\Controllers\ApiController;

class TransactionSellerController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only('index');
        $this->middleware('can:view,transaction')->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
        $seller = $transaction->product->seller;

        return $this->showOne($seller);
    }
}
