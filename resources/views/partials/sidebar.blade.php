<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-sidebar" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                class="fas fa-user-secret me-2"></i>Luxor BnB</div>
        <div class="list-group list-group-flush my-3">

            <a href="{{ url('/admin') }}"
                class="list-group-item list-group-item-action bg-transparent second-text active"><i
                    class="fas fa-tachometer-alt me-2"></i>{{ __('Dashboard') }}</a>

            <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-regular fa-comment me-2"></i>Message</a>

            <a href="{{ url('admin/properties') }}"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    class="fas fa-chart-line me-2"></i>Properties</a>
            <a href="{{ route('admin.profile.edit') }}"
                class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-user-group me-2"></i>Customers</a>

            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                    class="fas fa-power-off me-2"></i>{{ __('Logout') }}</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
</div>