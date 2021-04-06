<li class="nav-item">
    <a href="{{ route('tests.index') }}"
       class="nav-link {{ Request::is('tests*') ? 'active' : '' }}">
        <p>Tests</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('merchantOrders.index') }}"
       class="nav-link {{ Request::is('merchantOrders*') ? 'active' : '' }}">
        <p>Merchant Orders</p>
    </a>
</li>


