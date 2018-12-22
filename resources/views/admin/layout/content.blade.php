@include('admin.layout.header')
@include('admin.layout.navbar')

<div class="page-wrapper">
@include('admin.layout.sidebar')
    <div class="page-content">
@yield('content')

        <footer class="footer text-center text-sm-left">&copy; 2018 Amezia <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</span></footer>
    </div>
    <!-- end page content -->
</div>
@include('admin.layout.footer')