<!-- need to remove -->
<li class = "nav nav-header text-uppercase">System Information</li>
<li class = "nav-item">
    <a href = "{{ route('home') }}" class = "nav-link @yield('home')">
        <i class = "nav-icon fas fa-home"></i>
        <p>ទំព័រដើម</p>
    </a>
</li>
<li class = "nav-item">
    <a href = "{{ route('customer') }}" class = "nav-link @yield('customer')">
        <i class = "nav-icon fas fa-users"></i>
        <p>ពត៌មានអតិថិជន</p>
    </a>
</li>
<li class="nav-item @yield('food')">
    <a href = "#" class = "nav-link @yield('food.active')">
        <i class = "nav-icon fas fa-indent"></i>
        <p>
            បញ្ជីមុខម្ហូប-អាហារ
            <i class = "right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav-item nav-treeview">
        <li class = "nav-item">
            <a href = "{{ route('category') }}" class = "nav-link @yield('category')">
                <i class = "nav-icon fas fa-folder"></i>
                <p>ប្រភេទមុខម្ហូប-អាហារ</p>
            </a>
        </li>
        <li class = "nav-item">
            <a href = "{{ route('product') }}" class = "nav-link @yield('product')">
                <i class = "nav-icon fas fa-industry"></i>
                <p>មុខម្ហូប-អាហារ</p>
            </a>
       </li>
    </ul>
</li>

<li class="nav-header text-uppercase pt-3">Administrator</li>
<li class = "nav-item">
    <a href = "{{ route('home') }}" class = "nav-link ">
        <i class = "nav-icon fas fa-users"></i>
        <p>ពត៌មានបុគ្គលិក</p>
    </a>
</li>
