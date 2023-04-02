@if (session('info'))
<div id="info">{{ Session::get("info") }}</div>
@endif
@if (session('warning'))
<div id="warning">{{ Session::get("warning") }}</div>
@endif
@if (session('error'))
<div id="error">{{ Session::get("error") }}</div>
@endif
@if (session('success'))
<div id="success">{{ Session::get("success") }}</div>
@endif

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="d-inline-block ms-3">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm font-size-22 header-item">
                        <b>TRACKING MANAGEMENT SYSTEM</b>
                    </span>
                    <span class="logo-lg font-size-22 header-item">
                        <b>TRACKING MANAGEMENT SYSTEM</b>
                    </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm font-size-22 header-item">
                        <b>TRACKING MANAGEMENT SYSTEM</b>
                    </span>
                    <span class="logo-lg font-size-22 header-item">
                        <b>TRACKING MANAGEMENT SYSTEM</b>
                    </span>
                </a>
            </div>

            <!-- <div class="d-inline-block ms-3">
                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn"><i class="mdi mdi-menu"></i></button>
            </div> -->

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-bell"></i>
                    <span class="badge bg-danger rounded-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0"> Notifications (258) </h5>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="javascript:void(0);" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title border-success rounded-circle ">
                                            <i class="mdi mdi-cart-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript:void(0);" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title border-warning rounded-circle ">
                                            <i class="mdi mdi-message"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">New Message received</h6>
                                    <div class="text-muted">
                                        <p class="mb-1">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript:void(0);" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title border-info rounded-circle ">
                                            <i class="mdi mdi-glass-cocktail"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="text-muted">
                                        <p class="mb-1">It is a long established fact that a reader will</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript:void(0);" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title border-primary rounded-circle ">
                                            <i class="mdi mdi-cart-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="text-muted">
                                        <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript:void(0);" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title border-warning rounded-circle ">
                                            <i class="mdi mdi-message"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">New Message received</h6>
                                    <div class="text-muted">
                                        <p class="mb-1">You have 87 unread messages</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">
                            View all
                        </a>
                    </div>
                </div>
            </div>


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user me-2" src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" alt="Header Avatar"> {{ auth()->user()->name }}
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('account.edit', auth()->user()->id) }}"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i> Account</a>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('settings.index') }}"><i class="mdi mdi-cog font-size-17 text-muted align-middle me-1"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); logout();"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i> Logout</a>

                    <form id="form-logout" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>