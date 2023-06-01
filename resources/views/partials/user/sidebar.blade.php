<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('admin.product_category.index') }}">Delicoss</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('admin.product_category.index') }}">DLS</a>
    </div>
    <ul class="sidebar-menu">
        {{-- <li class="menu-header">Dashboard</li> --}}
        {{-- <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i
                    class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
            </ul>
        </li> --}}
        {{-- <li class="menu-header">Starter</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-columns"></i> <span>Layout</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
            </ul>
        </li> --}}
        
        @if (Auth::user()->user_role_id == 1)
            @include('partials.user.sidebar-admin')
        @endif

        <li class=''><a class="nav-link" href="{{ route('user.product.index') }}"><i
            class="far fa-square"></i>
        <span>Product</span></a></li>
        <li class=''><a class="nav-link" href="{{ route('user.cart.index') }}"><i
            class="far fa-square"></i>
        <span>Cart</span></a></li>

        <li class=''><a class="nav-link" href="{{ route('user.transaction.index') }}"><i
            class="far fa-square"></i>
        <span>Transaction</span></a></li>

    </ul>


</aside>
