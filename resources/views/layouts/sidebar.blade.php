<div class="hp-sidebar hp-bg-color-black-20 hp-bg-color-dark-90 border-end border-black-40 hp-border-color-dark-80">
    <div class="hp-sidebar-container">
        <div class="hp-sidebar-header-menu">
            <div class="row justify-content-between align-items-end mx-0">
                <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-visible">
                    <div class="hp-cursor-pointer">
                        <svg width="8" height="15" viewBox="0 0 8 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                                fill="#B2BEC3"></path>
                            <path
                                d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                                fill="#B2BEC3"></path>
                        </svg>
                    </div>
                </div>

                <div class="w-auto px-0">
                    <div class="hp-header-logo d-flex align-items-center">
                        <a href="index.html" class="position-relative">
                            <div class="hp-header-logo-icon position-absolute bg-black-20 hp-bg-dark-90 rounded-circle border border-black-0 hp-border-color-dark-90 d-flex align-items-center justify-content-center"
                                style="width: 18px; height: 18px; top: -5px;">
                                <svg class="hp-fill-color-dark-0" width="12" height="12" viewBox="0 0 12 12"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.709473 0L1.67247 10.8L5.99397 12L10.3267 10.7985L11.2912 0H0.710223H0.709473ZM9.19497 3.5325H4.12647L4.24722 4.88925H9.07497L8.71122 8.95575L5.99397 9.70875L3.28047 8.95575L3.09522 6.87525H4.42497L4.51947 7.93275L5.99472 8.33025L5.99772 8.3295L7.47372 7.93125L7.62672 6.21375H3.03597L2.67897 2.208H9.31422L9.19572 3.5325H9.19497Z"
                                        fill="#2D3436" />
                                </svg>
                            </div>

                            <img class="hp-logo hp-sidebar-visible hp-dark-none"
                                src="../../../app-assets/img/logo/logo-small.svg" alt="logo">
                            <img class="hp-logo hp-sidebar-visible hp-dark-block"
                                src="../../../app-assets/img/logo/logo-small-dark.svg" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-none"
                                src="../../../app-assets/img/logo/logo.svg" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-none hp-dark-block"
                                src="../../../app-assets/img/logo/logo-dark.svg" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-none"
                                src="../../../app-assets/img/logo/logo-rtl.svg" alt="logo">
                            <img class="hp-logo hp-sidebar-hidden hp-dir-block hp-dark-block"
                                src="../../../app-assets/img/logo/logo-rtl-dark.svg" alt="logo">
                        </a>

                        <a href="https://hypeople-studio.gitbook.io/yoda/change-log" target="_blank" class="d-flex">
                            <span class="hp-sidebar-hidden hp-caption fw-normal hp-text-color-primary-1">v.3.2</span>
                        </a>
                    </div>
                </div>

                <div class="w-auto px-0 hp-sidebar-collapse-button hp-sidebar-hidden">
                    <div class="hp-cursor-pointer mb-4">
                        <svg width="8" height="15" viewBox="0 0 8 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.91102 1.73796L0.868979 4.78L0 3.91102L3.91102 0L7.82204 3.91102L6.95306 4.78L3.91102 1.73796Z"
                                fill="#B2BEC3"></path>
                            <path
                                d="M3.91125 12.0433L6.95329 9.00125L7.82227 9.87023L3.91125 13.7812L0.000224113 9.87023L0.869203 9.00125L3.91125 12.0433Z"
                                fill="#B2BEC3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <ul>
                <li>
                    <div class="menu-title">Pengguna</div>

                    <ul>
                        <li>
                            <a href="{{ route('customers.index') }}">
                                <span>
                                    <i class="fa-regular fa-users"></i>
                                    <span>Data Pelanggan</span>
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <div class="menu-title">Asset / Alat Pinjaman</div>

                    <ul>
                        <li>
                            <a href="{{ route('tools.index') }}">
                                <span>
                                    <i class="fa-regular fa-toolbox"></i>
                                    <span>Data Alat</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tools.categories.index') }}">
                                <span>
                                    <i class="fa-regular fa-list"></i>
                                    <span>Kategori Alat</span>
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <div class="menu-title">Transaksi</div>
                    <ul>
                        <li>
                            <a href="{{ route('transactions.index') }}">
                                <span>
                                    <i class="fa-regular fa-receipt"></i>
                                    <span>Data Transaksi</span>
                                </span>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>

        <div class="row justify-content-between align-items-center hp-sidebar-footer mx-0 hp-bg-color-dark-90">
            <div class="divider border-black-40 hp-border-color-dark-70 hp-sidebar-hidden mt-0 px-0"></div>

            <div class="col">
                <button class="btn btn-outline-primary w-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
            </div>
        </div>

    </div>
</div>
