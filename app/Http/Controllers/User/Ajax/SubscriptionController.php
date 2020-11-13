<?php

namespace App\Http\Controllers\User\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //課金を実行
    public function subscribe(Request $request)
    {
        $user = $request->user();

        if (!$user->subscribed('main')) {
            $payment_method = $request->payment_method;
            $plan = $request->plan;
            $user->newSubscription('main', $plan)->create($payment_method);
            $user->load('subscriptions');
        }

        return $this->status();
    }

    //課金をキャンセル
    public function cancel(Request $request)
    {
        $request->user()
        ->subscription('main')
        ->cancel();

        return $this->status();
    }
}
