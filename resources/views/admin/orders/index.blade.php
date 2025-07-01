@extends('layouts.app')

@section('title', 'All Orders')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center">All Orders</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Date</th>
                <th>Status</th>
                <th>Products</th>
                <th>Total</th>
                <th>Change Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $index => $order)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    {{-- اسم المستخدم --}}
                    <td>
                        @if($order->user)
                            {{ $order->user->name }}<br>
                            <small>{{ $order->user->email }}</small>
                        @else
                            <span class="text-danger">[User Deleted]</span>
                        @endif
                    </td>

                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    <td><strong>{{ ucfirst($order->status) }}</strong></td>

                    {{-- المنتجات داخل الطلب --}}
                    <td class="text-start">
                        <ul class="list-unstyled">
                           @forelse($order->items as $item)
    <li class="mb-2 d-flex align-items-center">
        @if($item->product && $item->product->image)
            <img src="{{ asset('images/' . $item->product->image) }}" alt="Product Image" width="50" height="50" class="me-2 rounded border">

        @else
            <div class="me-2 text-muted" style="width: 50px; height: 50px; background-color: #eee; display: inline-block;"></div>
        @endif

        <div>
            {{ $item->product?->name ?? 'Unknown Product' }} × {{ $item->quantity }}
        </div>
    </li>
@empty
    <li class="text-muted">No items</li>
@endforelse

                        </ul>
                    </td>

                    <td>{{ $order->total }} EGP</td>

                    {{-- تغيير الحالة --}}
                    <td>
                        <form method="POST" action="{{ route('admin.orders.updateStatus', $order->id) }}">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
