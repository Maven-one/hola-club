<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-file-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.auditLog.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('outlet_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-shopping-cart nav-icon">

                        </i>
                        {{ trans('cruds.outletManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('outlet_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.outlets.index") }}" class="nav-link {{ request()->is('admin/outlets') || request()->is('admin/outlets/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-shopping-basket nav-icon">

                                    </i>
                                    {{ trans('cruds.outlet.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('training_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.trainings.index") }}" class="nav-link {{ request()->is('admin/trainings') || request()->is('admin/trainings/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.training.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('asset_verification_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.asset-verifications.index") }}" class="nav-link {{ request()->is('admin/asset-verifications') || request()->is('admin/asset-verifications/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.assetVerification.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('audit_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.audits.index") }}" class="nav-link {{ request()->is('admin/audits') || request()->is('admin/audits/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.audit.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('field_ops_request_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.field-ops-requests.index") }}" class="nav-link {{ request()->is('admin/field-ops-requests') || request()->is('admin/field-ops-requests/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.fieldOpsRequest.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('schedule_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-calendar-alt nav-icon">

                        </i>
                        {{ trans('cruds.scheduleManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('call_cycle_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.call-cycles.index") }}" class="nav-link {{ request()->is('admin/call-cycles') || request()->is('admin/call-cycles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.callCycle.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('misc_item_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.miscItemManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('why_laggard_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.why-laggards.index") }}" class="nav-link {{ request()->is('admin/why-laggards') || request()->is('admin/why-laggards/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-bug nav-icon">

                                    </i>
                                    {{ trans('cruds.whyLaggard.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('training_module_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.training-modules.index") }}" class="nav-link {{ request()->is('admin/training-modules') || request()->is('admin/training-modules/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user-graduate nav-icon">

                                    </i>
                                    {{ trans('cruds.trainingModule.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                    <i class="nav-icon fa-fw fas fa-calendar">

                    </i>
                    {{ trans('global.systemCalendar') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>