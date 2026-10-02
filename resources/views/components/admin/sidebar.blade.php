<!-- Sidebar Desktop -->
<nav class="col-md-2 d-none d-md-block sidebar p-3">
    @include('components.admin.sidebar-content')
</nav>

<!-- Sidebar Mobile (Offcanvas) -->
<div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="sidebarMobile">
    <div class="offcanvas-header bg-dark text-white">
        <h5 class="offcanvas-title">Admin SIAKAD</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-0 sidebar">
        @include('components.admin.sidebar-content')
    </div>
</div>
