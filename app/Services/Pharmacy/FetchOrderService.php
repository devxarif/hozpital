<?php

namespace App\Services\Pharmacy;

use App\Models\Order;

class FetchOrderService
{
    public function execute(object $request)
    {
        $query = Order::query();

        if($request->has('type') && $request->filled('type') && $request->type != 'all') {
            $query->whereOrderStatus($request->type);
        }
        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike('order_id', $request->keyword);
        }
        if($request->has('payment_status') && $request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }
        if($request->has('role') && $request->filled('role')) {
            $query->whereLike('user.role', $request->role);
        }

        switch ($request->date_type) {
            case 'today':
                $query->today();
            case 'yesterday':
                $query->yesterday();
            case 'this_week':
                $query->thisWeek();
                break;
            case 'last_week':
                $query->lastWeek();
                break;
            case 'this_month':
                $query->thisMonth();
                break;
            case 'last_month':
                $query->lastMonth();
                break;
            case 'last_6_month':
                $query->last6Month();
                break;
            case 'this_year':
                $query->thisYear();
                break;
            case 'last_year':
                $query->lastYear();
                break;
            case 'custom_date':
                $request->validate([
                    'custom_date' => 'required',
                ]);

                $query->customDate($request->custom_date);
                break;
            case 'custom_range_date':
                $request->validate([
                    'custom_start_date' => 'required',
                    'custom_end_date' => 'required',
                ]);

                $query->customRangeDate($request->custom_start_date, $request->custom_end_date);
                break;
        }

        $data['orders'] = $query->with('user')->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();
        $data['filter'] = $request;

        $orders = Order::all();
        $data['pending_orders_count'] = $orders->where('order_status', 'pending')->count();
        $data['confirmed_orders_count'] = $orders->where('order_status', 'confirmed')->count();
        $data['on_the_way_orders_count'] = $orders->where('order_status', 'on_the_way')->count();
        $data['delivered_orders_count'] = $orders->where('order_status', 'delivered')->count();
        $data['cancelled_orders_count'] = $orders->where('order_status', 'cancelled')->count();
        $data['refunded_orders_count'] = $orders->where('order_status', 'refunded')->count();
        $data['total_orders_count'] = $orders->count();
        $data['filter_by_date'] = [
            ['label' => "Today". " (".now()->format('d-m-Y').")",'value' => 'today'],
            ['label' => 'Yesterday'. " (".now()->subDay()->format('d-m-Y').")",'value' => 'yesterday'],
            ['label' => 'This Week'. " (".now()->startOfWeek()->format('d-m-Y')." to ".now()->endOfWeek()->format('d-m-Y').")",'value' => 'this_week'],
            ['label' => 'Last Week'. " (".now()->subWeek()->startOfWeek()->format('d-m-Y')." to ".now()->subWeek()->endOfWeek()->format('d-m-Y').")",'value' => 'last_week'],
            ['label' => 'This Month'. " (".now()->startOfMonth()->format('d-m-Y')." to ".now()->endOfMonth()->format('d-m-Y').")",'value' => 'this_month'],
            ['label' => 'Last Month' . " (".now()->subMonth()->startOfMonth()->format('d-m-Y')." to ".now()->subMonth()->endOfMonth()->format('d-m-Y').")",'value' => 'last_month'],
            ['label' => 'Last 6 Month' . " (".now()->subMonth(6)->format('d-m-Y')." to ".now()->format('d-m-Y').")",'value' => 'last_6_month'],
            ['label' => 'This Year' . " (".now()->startOfYear()->format('d-m-Y')." to ".now()->endOfYear()->format('d-m-Y').")",'value' => 'this_year'],
            ['label' => 'Last Year' . " (".now()->subYear()->format('d-m-Y')." to ".now()->format('d-m-Y').")",'value' => 'last_year'],
            ['label' => 'Custom Date','value' => 'custom_date'],
            ['label' => 'Custom Range Date','value' => 'custom_range_date']
        ];

        return $data;
    }
}
