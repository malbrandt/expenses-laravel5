<div class="content-wrapper py-3">
    <div class="container-fluid">

        <!-- Breadcrumbs -->
        {{-- @include('layouts.partials.breacrumbs') --}}

        <!-- Icon Cards -->
        {{-- @include('layouts.partials.icon-cards') --}}

        @yield('content')

        <!-- Area Chart Example -->
        {{-- @include('layouts.partials.charts') --}}

        <!-- Example Tables Card -->
        @auth
         @include('layouts.partials.datatable')
        @endauth
    </div>
    <!-- /.container-fluid -->
</div>