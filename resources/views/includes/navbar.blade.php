<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    @php

        $time = \Carbon\Carbon::now();
    @endphp
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <div class="d-flex">
        <h1 class="text-primary" @style('font-size: 20px; margin-left: 15px; letter-spacing: 2px;')>@php
            echo $time->format('d-m-Y');
        @endphp</h1>
    </div>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->


        <!-- Nav Item - User Information -->
        <div class="dropdown">
            <h1 class="text-dark" data-bs-toggle="dropdown" aria-expanded="false" @style('font-size: 20px; margin-right: 20px; cursor: pointer;')>
                {{ Auth::user()->name }}
            </h1>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
        </div>

    </ul>


</nav>
