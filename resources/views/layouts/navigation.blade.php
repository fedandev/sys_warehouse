<!-- BEGIN Left Aside -->
<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="{{ secure_asset('img/logo.png')  }}" alt="SysWareHouse" aria-roledescription="logo">
            <span class="page-logo-text mr-1">SysWareHouse</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <!-- BEGIN PRIMARY NAVIGATION -->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="info-card">
            <img src="{{ secure_asset('img/demo/avatars/avatar-m.png')  }}" class="profile-image rounded-circle" alt="{{ auth()->user()->name }}">
            <div class="info-card-text">
                <a href="#" class="d-flex align-items-center text-white">
                    <span class="text-truncate text-truncate-sm d-inline-block">
                        {{ auth()->user()->name }}
                    </span>
                </a>
                <span class="d-inline-block text-truncate text-truncate-sm">{{ auth()->user()->email }}</span>
            </div>
            <img src=" {{ secure_asset('img/card-backgrounds/cover-4-lg.png')  }}" class="cover" alt="cover">
            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fal fa-angle-down"></i>
            </a>
        </div>
        <ul id="js-nav-menu" class="nav-menu">
            <li>
                <a href="/" title="Inicio" data-filter-tags="inicio">
                    <i class="fal fa-info-circle"></i>
                    <span class="nav-link-text" data-i18n="nav.inicio">Inicio</span>
                </a>
                
            </li>
            <li>
                <a href="#" title="Configuración" data-filter-tags="configuracion">
                    <i class="fal fa-cog"></i>
                    <span class="nav-link-text" data-i18n="nav.configuracion">Configuración</span>
                </a>
                <ul>
                    <li>
                        <a href="/ajustes" title="Ajustes" data-filter-tags="ajustes">
                            <span class="nav-link-text" data-i18n="nav.ajustes">Ajustes</span>
                        </a>
                    </li>    
                    <li>
                        <a href="/menus" title="Menus" data-filter-tags="menus">
                            <span class="nav-link-text" data-i18n="nav.menus">Menus</span>
                        </a>
                    </li>
                    <li>
                        <a href="/users" title="Usuarios" data-filter-tags="usuarios">
                            <span class="nav-link-text" data-i18n="nav.usuarios">Usuarios</span>
                        </a>
                    </li>
                    
                </ul>
            </li>
        </ul>
    </nav>
    <!-- END PRIMARY NAVIGATION -->
   
</aside>
<!-- END Left Aside -->
