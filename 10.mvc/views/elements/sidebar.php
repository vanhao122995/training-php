<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Tables -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= BASE_PATH . 'index.php?controller=product&action=index' ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý sản phẩm</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= BASE_PATH . 'index.php?controller=category_product&action=index' ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý danh mục</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= BASE_PATH . 'index.php?controller=order&action=index' ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý đơn hàng</span></a>
    </li>
    
</ul>