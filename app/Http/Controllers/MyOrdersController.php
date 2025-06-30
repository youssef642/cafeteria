<?php

namespace App\Http\Controllers;
use App\Models\Order;


use Illuminate\Http\Request;

class MyOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index(Request $request)
    {
        $query = Order::with('order_product.product');

        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        $orders = $query->orderByDesc('created_at')->get();

        return view('orders.my_orders', compact('orders'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function cancel(Order $order)
    {
        // if ($order->user_id !== auth()->id() || $order->status !== 'processing') {
        //     abort(403); // Unauthorized
        // }

        $order->status = 'cancelled';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order cancelled successfully.');
    }
}
