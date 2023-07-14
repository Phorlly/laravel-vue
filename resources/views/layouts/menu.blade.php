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
<li class = "nav-item">
    <a href = "{{ route('home') }}" class = "nav-link">
        <i class = "nav-icon fas fa-list"></i>
        <p>បញ្ជីមុខម្ហូប</p>
    </a>
</li>
<li class="nav-header text-uppercase pt-3">Administrator</li>
<li class = "nav-item">
    <a href = "{{ route('home') }}" class = "nav-link ">
        <i class = "nav-icon fas fa-users"></i>
        <p>ពត៌មានបុគ្គលិក</p>
    </a>
</li>
