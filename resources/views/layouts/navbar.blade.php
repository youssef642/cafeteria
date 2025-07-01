<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
             <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                <li class="nav-item"><a class="nav-link" href="{{ url('/users') }}">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/orders') }}">My Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/checks') }}">Checks</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin/orders') }}">Orders_Admin</a></li>
            </ul>
        </div>
    </div>
</nav>
