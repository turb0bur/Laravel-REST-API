<?php

namespace App\Policies;

use App\Traits\AdminAction;
use App\User;
use App\Transaction;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization, AdminAction;

    /**
     * Determine whether the user can view the transaction.
     *
     * @param \App\User        $user
     * @param \App\Transaction $transaction
     * @return boolean
     */
    public function view(User $user, Transaction $transaction)
    {
        return $user->id === $transaction->buyer->id || $user->id === $transaction->product->seller->id;
    }
}
