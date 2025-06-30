@extends('./layouts/app')
@section('title', 'My Orders')
<style>
    .main-header {
      background-color: #0d0d0e;
      color: white;
      padding: 12px 0;
    }
    .nav-link {
      color: white !important;
      padding: 8px 16px;
      border-radius: 4px;
      text-decoration: none;
    }
    .nav-link.active {
      background-color: rgba(255,255,255,0.2);
    }
    .user-avatar {
      width: 35px;
      height: 35px;
      background-color: #ddd;
      color: #666;
    }
    .date-filter-section {
      background-color: #f8f9fa;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    .expand-btn {
      background: none;
      border: none;
      font-size: 16px;
      width: 30px;
      height: 30px;
    }
    .status-processing { color: #fd7e14; font-weight: 500; }
    .status-delivery { color: #0d6efd; font-weight: 500; }
    .status-done { color: #198754; font-weight: 500; }
  </style>
  @section('content')

  <!-- Content -->
  <div class="container my-4">
    <h1 class="mb-4">My Orders</h1>

    <!-- Filters -->
    <form method="GET" action="{{ route('orders.index') }}">
      <div class="row g-3 align-items-end">
        <div class="col-md-3">
          <label class="form-label small">Date from</label>
          <input type="date" name="from" value="{{ request('from') }}" class="form-control form-control-sm">
        </div>
        <div class="col-md-3">
          <label class="form-label small">Date to</label>
          <input type="date" name="to" value="{{ request('to') }}" class="form-control form-control-sm">
        </div>
        <div class="col-md-3">
          <button class="btn btn-primary btn-sm mt-2">
            <i class="fas fa-search me-1"></i>Filter
          </button>
        </div>
      </div>
    </form>
    

    <!-- Orders Table -->
    <div class="card">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>Order Date</th>
              <th>Status</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td>
                <button class="expand-btn me-2" data-bs-toggle="collapse" data-bs-target="#details-{{ $order->id }}">
                  <i class="fas fa-plus"></i>
                </button>
                {{ $order->created_at }}
              </td>
              <td>
                <span class="status-{{ strtolower($order->status) }}">{{ $order->status }}</span>
              </td>
              <td><strong>{{ $order->total }} EGP</strong></td>
              <td>
                @if($order->status == 'processing')
                  <form action="{{ route('orders.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?')">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-outline-danger btn-sm">
                      <i class="fas fa-times me-1"></i>Cancel
                    </button>
                  </form>
                @endif
              </td>
            </tr>
            <tr class="collapse" id="details-{{ $order->id }}">
              <td colspan="4" class="p-0">
                <div class="bg-light p-3 border-top">
                  <h6 class="mb-3">Ordered Items:</h6>
</form>

              </td>
            </tr>
            <tr class="collapse" id="details-{{ $order->id }}">
              <td colspan="4" class="p-0">
                <div class="bg-light p-3 border-top">
                  <h6 class="mb-3">Ordered Items:</h6>
                  <div class="row g-3">
                    @foreach ($order->order_product as $item)
                    <div class="col-md-4 col-sm-6">
                      <div class="d-flex align-items-center">
                        <div class="me-3">
                          <i class="fas fa-mug-hot text-primary"></i>
                        </div>
                        <div>
                          <div class="fw-bold">{{ $item->product->name }}</div>
                          <small class="text-muted">
                            Qty: {{ $item->quantity }} × {{ $item->product->price }} = {{ $item->quantity * $item->product->price }} EGP
                          </small>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <hr class="my-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Total:</span>
                    <span class="fw-bold text-success fs-5">{{ $order->total }} EGP</span>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @endsection
