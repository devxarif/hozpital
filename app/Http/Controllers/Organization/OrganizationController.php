<?php

namespace App\Http\Controllers\Organization;

use App\Models\Plan;
use App\Models\Order;
use App\Models\Organization;
use App\Http\Controllers\Controller;

class OrganizationController extends Controller
{
    public function switchOrganization($id)
    {
        auth()->user()->update([
            'current_organization_id' => $id,
        ]);

        session()->flash('success', 'Organization Switched');
        return back();
    }

    public function createOrganization()
    {
        return inertia('Organization/Createnew/Index');
    }

    public function deleteOrganization()
    {
        $current_organization = currentOrganization();
        $user = auth()->user();
        $companies = Organization::where('user_id', auth()->id())
        ->where('id', '!=', $current_organization->id)
        ->pluck('id')
        ->toArray();

        if (count($companies) && $companies[0]) {
            $current_organization->delete();
            $user->update(['current_organization_id' => $companies[0]]);

            session()->flash('success', 'Organization deleted successfully');
            return redirect()->route('dashboard');
        }else{
            $user->update([
                'current_organization_id' => null,
                'is_opening_setup_complete' => 0,
                'opening_setup_steps' => 1
            ]);

            return redirect()->intended('/account/setup');
        }
    }

    public function billing(){
        $currently_subscribed = currentOrganization()->subscription->load('plan');
        $plans = Plan::with('planFeatures')->get();

        $search = request('search') ?? '';
        $payment = request('payment') ?? '';
        $plan = request('plan') ?? '';

        $orders = Order::whereOrganizationId(currentOrganization()->id)
            ->with('plan.planFeatures')
            ->where(function ($query) use ($search) {
                $query->where('order_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('transaction_id', 'LIKE', '%' . $search . '%');
            })
            ->when($plan, function ($query, $plan) {
                $query->where('plan_id', $plan);
            })
            ->when($payment, function ($query, $payment) {
                $query->where('payment_provider', $payment);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($order) => [
                'id' => $order->id,
                'order_id' => $search ? preg_replace('/(' . $search . ')/i', "<b class='bg-warning'>$1</b>", $order->order_id) : $order->order_id,
                'transaction_id' => $search ? preg_replace('/(' . $search . ')/i', "<b class='bg-warning'>$1</b>", $order->transaction_id) : $order->transaction_id,
                'currency_symbol' => $order->currency_symbol,
                'amount' => $order->amount,
                'payment_provider' => $order->payment_provider,
                'plan' => $order->plan,
            ]);

        return inertia('Organization/Billing', [
            'orders' => $orders,
            'plans' => $plans,
            'filters' => [
                'search' => $search,
                'payment' => $payment,
                'plan' => $plan,
            ],
            'plans' => $plans,
            'currently_subscribed' => $currently_subscribed,
        ]);
    }
}
