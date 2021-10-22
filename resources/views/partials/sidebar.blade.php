<div class="sidebar sidebar-dark sidebar-fixed sidebar-self-hiding-xl" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#full')}}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('assets/brand/coreui.svg#signet')}}"></use>
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <li class="nav-item"><a class="nav-link active" href="index.html">
                                    <svg class="nav-icon">
                                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                                    </svg> Dashboard<span class="badge bg-info-gradient ms-auto">NEW</span>
                                </a>
                            </li>
                            
                            <li class="nav-title">Manage Customers</li>
                        
                            <li class="nav-item"><a class="nav-link" href="{{route('admin.customers.index')}}">
                                    <svg class="nav-icon">
                                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                                    </svg>Customers</a></li>

                            <li class="nav-title">Manage Menu</li>
                            <li class="nav-group"><a class="nav-link nav-group-toggle" >
                                    <svg class="nav-icon">
                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle')}}"></use>
                                    </svg> Menu</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a class="nav-link" href="{{route('admin.menu.index')}}"><span
                                                class="nav-icon"></span> Show all</a></li>
                                </ul>
                            </li>
        

                                    

                            <li class="nav-title">Components</li>
                            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                                    <svg class="nav-icon">
                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle')}}"></use>
                                    </svg> Base</a>
                                <ul class="nav-group-items">
                                    <li class="nav-item"><a class="nav-link" href="base/accordion.html"><span
                                                class="nav-icon"></span> Accordion</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/breadcrumb.html"><span
                                                class="nav-icon"></span> Breadcrumb</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/cards.html"><span
                                                class="nav-icon"></span> Cards</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/carousel.html"><span
                                                class="nav-icon"></span> Carousel</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/collapse.html"><span
                                                class="nav-icon"></span> Collapse</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/list-group.html"><span
                                                class="nav-icon"></span> List group</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/navs.html"><span
                                                class="nav-icon"></span> Navs</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/pagination.html"><span
                                                class="nav-icon"></span> Pagination</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/popovers.html"><span
                                                class="nav-icon"></span> Popovers</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/progress.html"><span
                                                class="nav-icon"></span> Progress</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/scrollspy.html"><span
                                                class="nav-icon"></span> Scrollspy</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/spinners.html"><span
                                                class="nav-icon"></span> Spinners</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/tables.html"><span
                                                class="nav-icon"></span> Tables</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/tabs.html"><span
                                                class="nav-icon"></span> Tabs</a></li>
                                    <li class="nav-item"><a class="nav-link" href="base/tooltips.html"><span
                                                class="nav-icon"></span> Tooltips</a></li>
                                </ul>
                            </li>
                            
                            <li class="nav-item mt-auto"><a class="nav-link" href="login.html" target="_top" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg class="nav-icon">
                                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                                    </svg> Logout</a>
                            </li>
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 1295px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                style="height: 525px; transform: translate3d(0px, 300px, 0px); display: block;"></div>
        </div>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>