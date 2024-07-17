<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Main-->
    <div class="d-flex flex-column justify-content-between h-100 hover-scroll-overlay-y my-2 d-flex flex-column"
        id="kt_app_sidebar_main" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px">
        <!--begin::Sidebar menu-->
        <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false"
            class="flex-column-fluid menu menu-sub-indention menu-column menu-rounded menu-active-bg mb-7">
            <!--begin:Menu item-->
            <div class="menu-item here show">
                <!--begin:Menu link-->
                <a class="menu-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-element-11 fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                    <span class="menu-title">Dasbor</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            <div>
                <ul>
                    <li class="separatorSideBar theme-light-show">
                        <div class="w-auto h-auto px-3 fw-medium fs-4 menu-title" style="background-color: #F5F7F8">
                            Manajemen</div>
                    </li>
                    <li class="separatorSideBar theme-dark-show">
                        <div class="w-auto h-auto px-3 fw-medium fs-4 menu-title" style="background-color: #000000">
                            Manajemen</div>
                    </li>
                </ul>
            </div>
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'Copywriter')
                <!--begin:Menu item-->
                <div class="menu-item here show">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Request::is('admin/article*') ? 'active' : '' }}"
                        href="{{ route('article.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-some-files fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Artikel</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'Penjual')
                <!--begin:Menu item-->
                <div class="menu-item here show">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Request::is('admin/catalog*') ? 'active' : '' }}"
                        href="{{ route('catalog.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-some-files fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Katalog</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item here show">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Request::is('admin/gallery*') ? 'active' : '' }}"
                        href="{{ route('gallery.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-some-files fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Galeri</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            {{-- <!--begin:Menu item-->
            <div class="menu-item here show">
                <!--begin:Menu link-->
                <a class="menu-link {{ Request::is('admin/category') ? 'active' : '' }}"
                    href="{{ route('category.index') }}">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-some-files fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                    <span class="menu-title">Kategori</span>
                </a>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item--> --}}
            @if (Auth::user()->role == 'admin')
                <!--begin:Menu item-->
                <div class="menu-item here show">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Request::is('admin/user*') ? 'active' : '' }}"
                        href="{{ route('user.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-some-files fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Pengguna</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
            @if (Auth::user()->role == 'admin')
                <div>
                    <ul>
                        <li class="separatorSideBar theme-light-show">
                            <div class="w-auto h-auto px-3 fw-medium fs-4 menu-title" style="background-color: #F5F7F8">
                                Pengaturan
                            </div>
                        </li>
                        <li class="separatorSideBar theme-dark-show">
                            <div class="w-auto h-auto px-3 fw-medium fs-4 menu-title" style="background-color: #000000">
                                Pengaturan
                            </div>
                        </li>
                    </ul>
                </div>
                <!--begin:Menu item-->
                <div class="menu-item here show">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Request::is('admin/profile/1/edit') ? 'active' : '' }}"
                        href="{{ route('profile.edit', 1) }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-rescue fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">Profil Dekranasda</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            @endif
        </div>
        <!--end::Sidebar menu-->
    </div>
    <!--end::Main-->
</div>
