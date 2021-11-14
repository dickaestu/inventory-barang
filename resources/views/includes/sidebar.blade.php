<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
                class="logo-name">Inventory</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ request()->is('/') ? "active" : "" }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{ request()->is('order-list*') || request()->is('product-list*') ? "active" : "" }}">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="box"></i><span>Warehouse</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is('order-list*') ? "active" : "" }}"><a class="nav-link" href="{{ route('order-list.index') }}">Order List</a></li>
                        <li class="{{ request()->is('product-list*') ? "active" : "" }}"><a class="nav-link" href="{{ route('product-list.index') }}">Product List</a></li>
                    </ul>
                </li>
                <li class="{{ request()->is('product-category*') ? "active" : "" }}">
                    <a class="nav-link" href="{{ route('product-category.index') }}"><i data-feather="list"></i>
                        <span>Product Category</span>
                    </a>
                </li>
                @if (Auth::user()->roles == "Admin")
                <li class="{{ request()->is('movement-request*') ? "active" : "" }}">
                    <a class="nav-link" href="{{ route('movement-request.index') }}"><i data-feather="mail"></i>
                        <span>Movement Request</span>
                    </a>
                </li>
                @endif
            </ul>
        </aside>
    </div>