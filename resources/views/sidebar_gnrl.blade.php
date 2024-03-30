
<li class="has-sub @yield('Users')">
    <a href="">
	<i class="material-icons  ">groups</i>
        <span>
           Usuarios
        </span>
    </a>
</li>

<li class="has-sub @yield('Roles')">
    <a href="">
	<i class="material-icons  ">group</i>
        <span>
            Roles
        </span>
    </a>
</li>

<li class="has-sub @yield('Permisos')">
    <a href="">
	<i class="material-icons  ">admin_panel_settings</i>
        <span>
            Permisos
        </span>
    </a>
</li>




<!-- MENU MODULO INFORMACION -->
<li class="has-sub @yield('sub:info')">
    <a >
        <b class="caret"></b>
        <i class=" fa fa-info-circle"></i>
        <span>
           Información
        </span>
    </a>
    <ul class="sub-menu">

        <li class="has-sub expand" style="display: block;">
            <a href="javascript:;">
                <b class="caret"></b>
                Administrador
            </a>
            <ul class="sub-menu">
                <li class="has-sub"><a href="">Difusion de Informacion</a></li>
                <li class="has-sub"><a href="">Manuales</a></li>
                <li class="has-sub"><a href="">Procedimientos</a></li>
                <li class="has-sub"><a href="">Reglamentos</a></li>
                <li class="has-sub"><a href="">Diccionario de datos</a></li>
            </ul>
        </li>

        <li class="has-sub expand">
            <a href="javascript:;">
                <b class="caret"></b>
                Publicaciones
            </a>
            <ul class="sub-menu">
                <li class="has-sub"><a href="">Difusion de Informacion</a></li>
                <li class="has-sub"><a href="">Manuales</a></li>
                <li class="has-sub"><a href="">Procedimientos</a></li>
                <li class="has-sub"><a href="">Reglamentos</a></li>
                <li class="has-sub"><a href="">Diccionario de datos</a></li>
            </ul>
        </li>
    </ul>
</li>

<!-- MENU MODULO CAJAS -->
<li class="has-sub @yield('sub:Cajas')">
    <a >
        <b class="caret"></b>
        <i class=" fa fa-coins"></i>
        <span>
           Cajas
        </span>
    </a>
    <ul class="sub-menu">
        <li class="has-sub @yield('sub:Cajas')">
            <a href="javascript:;">
                <b class="caret"></b>
                Operaciones
            </a>
            <ul class="sub-menu">
                <li class="has-sub @yield('Cajas-1')"><a href="">Confirmaciones</a></li>
                <li class="has-sub @yield('Cajas-3')"><a href="">Matricula Digital</a></li>
            </ul>
        </li>
    </ul>
</li>

