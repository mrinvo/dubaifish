<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="/dashboard/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">UAE Fish</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dashboard/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>

             الرئيسية
              </p>
            </a>

          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                     الطلبات
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>الطلبات الجديدة</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>الطلبات المنتهية</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> جميع الطلبات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضافة طلب</p>
                </a>
              </li>


            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                     الاقسام
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> جميع  الاقسام</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.category.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضافة  الاقسام </p>
                </a>
              </li>


            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                     طرق التنظيف
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.cleaning.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> جميع  طرق التنظيف</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.cleaning.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضافة  طرق التنظيف</p>
                </a>
              </li>


            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                     المنتجات
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> جميع المنتجات</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.product.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضافة المنتجات</p>
                </a>
              </li>


            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                     المستخدمين
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> جميع المستخدمين</p>
                </a>
              </li>

              {{-- <li class="nav-item">
                <a href="{{ route('admin.user.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اضافة المستخدمين</p>
                </a>
              </li> --}}


            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>