<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Organization;
use App\Models\Plan;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function orders()
    {
        $search = request('search') ?? '';
        $organization = request('organization') ?? '';
        $payment = request('payment') ?? '';
        $plan = request('plan') ?? '';

        $orders = Order::with('organization.user', 'plan.planFeatures')
        ->where(function ($query) use ($search) {
            $query->where('order_id', 'LIKE', '%'.$search.'%')
                ->orWhere('transaction_id', 'LIKE', '%'.$search.'%');
        })
        ->when($plan, function ($query, $plan) {
            $query->where('plan_id', $plan);
        })
        ->when($payment, function ($query, $payment) {
            $query->where('payment_provider', $payment);
        })
        ->when($organization, function ($query, $organization) {
            $query->where('organization_id', $organization);
        })
        ->latest()
        ->paginate(15)
        ->withQueryString()
        ->through(fn ($order) => [
            'id' => $order->id,
            'order_id' => $search ? preg_replace('/('.$search.')/i', '<span style="background: yellow !important;">$1</span>', $order->order_id) : $order->order_id,
            'transaction_id' => $search ? preg_replace('/('.$search.')/i', '<span style="background: yellow !important;">$1</span>', $order->transaction_id) : $order->transaction_id,
            'organization_name' => $order->organization->organization_name,
            'organization_email' => $order->organization->organization_email,
            'organization_logo' => $order->organization->organization_logo,
            'organization_logo_url' => $order->organization->organization_logo_url,
            'organization_id' => $order->organization->id,
            'currency_symbol' => $order->currency_symbol,
            'amount' => $order->amount,
            'payment_provider' => $order->payment_provider,
            'plan' => $order->plan,
        ]);

        $organizations = Organization::get(['id', 'organization_name']);

        $plans = Plan::all(['id', 'name']);

        return inertia('Admin/Order/Index', [
            'organizations' => $organizations,
            'plans' => $plans,
            'orders' => $orders,
            'filters' => [
                'organization' => $organization,
                'search' => $search,
                'payment' => $payment,
                'plan' => $plan,
            ],
        ]);
    }

    public function orderDetails(Order $order)
    {
        abort_if(currentUserRole() != 'admin' && currentOrganization()->id != $order->organization_id, 404);

        $organization = $order->organization->load('country:id,name', 'user');
        $subscribed_plan = $organization->subscription->load('plan.planFeatures');
        $setting = Setting::first();

        return inertia('Admin/Order/Show', compact('subscribed_plan', 'order', 'setting', 'organization'));
    }

    public function orderPdfDownload(Order $order)
    {
        abort_if(currentUserRole() != 'admin' && currentOrganization()->id != $order->organization_id, 404);

        $data['order'] = $order;
        $data['organization'] = $data['order']->organization->load('country:id,name', 'user');
        $data['subscribed_plan'] = $data['organization']->subscription->load('plan.planFeatures');
        $data['setting'] = Setting::first();

        $pdf = Pdf::loadView('generate.order-pdf', $data);

        return $pdf->download($order->order_id.'.pdf');
    }
}
