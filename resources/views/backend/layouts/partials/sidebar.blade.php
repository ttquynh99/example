<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <!-- Danh sach loai -->
            <li class="nav-item">
                <a href="#loaiSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'admin.loai') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Loại
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'admin.loai') === 0) ? 'collapse show' : 'collapse' }}" id="loaiSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'admin.loai.index') === 0) ? 'active' : '' }}" href="{{ route('admin.loai.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách loại
                        </a>
                    </li>
                </ul>
            </li>
                <!-- Danh sach san pham -->
            <li class="nav-item">
                <a href="#spSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'admin.sanpham') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Sản phẩm
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'admin.sanpham') === 0) ? 'collapse show' : 'collapse' }}" id="spSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'admin.sanpham.index') === 0) ? 'active' : '' }}" href="{{ route('admin.sanpham.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách sản phẩm
                        </a>
                    </li>
                </ul>
            </li>
                    <!-- Danh sach xuat xu -->
            <li class="nav-item">
                <a href="#xxSubMenu" data-toggle="collapse" aria-expanded="false" class="nav-link dropdown-toggle {{ (strpos(Route::currentRouteName(), 'admin.xuatxu') === 0) ? 'active' : '' }}">
                    <span data-feather="package"></span> Xuất xứ
                </a>
                <ul class="{{ (strpos(Route::currentRouteName(), 'admin.xuatxu') === 0) ? 'collapse show' : 'collapse' }}" id="xxSubMenu">
                    <li class="nav-item">
                        <a class="nav-link {{ (strpos(Route::currentRouteName(), 'admin.xuatxu.index') === 0) ? 'active' : '' }}" href="{{ route('admin.xuatxu.index') }}/">
                            <span data-feather="list"></span>
                            Danh sách xuất xứ
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>