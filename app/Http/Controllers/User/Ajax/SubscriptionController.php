<?php

namespace App\Http\Controllers\User\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

    //キャンセルしたものを元に戻す
    public function resume(Request $request)
    {
        $request->user()
        ->subscription('main')
        ->resume();

        return $this->status();
    }

    //プランを変更する
    public function change_plan(Request $request)
    {
        $plan = $request->plan;
        $request->user()
        ->subscription('main')
        ->swap($plan);

        return $this->status();
    }

    public function update_card(Request $request)
    {
        $payment_method = $request->payment_method;
        $request->user()
        ->updateDefaultPaymentMethod($payment_method);

        return $this->status();
    }

    public function status()
    {
        $status = 'unsubscribed';
        $user = auth()->user();
        $details = [];

        if ($user->subscribed('main')) {
            if ($user->subscription('main')->cancelled()) {
                $status = 'cancelled';
            } else {
                $status = 'subscribed';
            }

            $subscription = $user->subscriptions->first(function ($value) {
                return $value->name === 'main';
            })->only('ends_at', 'stripe_plan');

            $details = [
                'end_date' => ($subscription['ends_at']) ? $subscription['ends_at']->format('Y-m-d') : null,
                'plan' => Arr::get(config('services.stripe.plans'), $subscription['stripe_plan']),
                'card_last_four' => $user->card_last_four,
            ];
        }

        return [
            'status' => $status,
            'details' => $details,
        ];
    }
}
