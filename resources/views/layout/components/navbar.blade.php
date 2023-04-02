<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li class="{{ $page == 'dashboard' ? 'mm-active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <!-- <span class="badge rounded-pill bg-primary float-end">2</span> -->
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ $page == 'devices' ? 'mm-active' : '' }}">
                    <a href="{{ route('devices.index') }}" class="waves-effect">
                        <i class="mdi mdi-watch-variant"></i>
                        <span>Devices</span>
                    </a>
                </li>

                <li class="{{ $page == 'messages' ? 'mm-active' : '' }}">
                    <a href="{{ route('messages.index') }}" class="waves-effect">
                        <i class="mdi mdi-android-messages"></i>
                        <span>Message Logs</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>