<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from seantheme.com/color-admin/admin/material/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2019 21:02:15 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Sistema Odiseo | Ingreso</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="/assets/css/material/app.min.css" rel="stylesheet" />
    <!-- ================== END BASE CSS STYLE ================== -->
</head>
<body class="pace-top">
<!-- begin #page-loader -->
<div id="page-loader" class="fade show">
    <div class="material-loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
        <div class="message">Loading...</div>
    </div>
</div>
<!-- end #page-loader -->

<div class="login-cover">
    <div class="login-cover-image" style="background-image: url(/assets/img/login-bg/login-bg-19.jpg)" data-id="login-cover-image"></div>
    <div class="login-cover-bg"></div>
</div>
<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login login-v2" data-pageload-addclass="animated fadeIn">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand f-w-600">
                <span class="f-w-300">Sistema</span> Odiseo
                <small>Universidad Autonoma "Tomas Frías"</small>
            </div>
            <div class="icon">
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <!-- end brand -->
        <!-- begin login-content -->
        <div class="login-content">
            <form action="{{ route('login') }}" method="POST" class="margin-bottom-0">
                @csrf
                <div class="form-group m-b-20">
                    <input id="email" name="email" value="{{ old('email') }}" type="text" class="form-control form-control-lg" placeholder="Usuario" required autofocus />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group m-b-20">
                    <input id="password" name="password" type="password" class="form-control form-control-lg" placeholder="Contraseña" required />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="checkbox checkbox-css m-b-20">
                    <input type="checkbox" id="remember_checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label for="remember_checkbox">
                        Recordarme
                    </label>
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-blue btn-block btn-lg">Ingresar</button>
                </div>
            </form>
        </div>
        <!-- end login-content -->
    </div>
    <!-- end login -->

    <ul class="login-bg-list clearfix">
        <li class="active"><a href="javascript:;" data-click="change-bg" data-img="/assets/img/login-bg/login-bg-19.jpg" style="background-image: url(/assets/img/login-bg/login-bg-19.jpg)"></a></li>
        <!-- <li><a href="javascript:;" data-click="change-bg" data-img="/assets/img/login-bg/login-bg-16.jpg" style="background-image: url(/assets/img/login-bg/login-bg-16.jpg)"></a></li> -->
        <li><a href="javascript:;" data-click="change-bg" data-img="/assets/img/login-bg/login-bg-15.jpg" style="background-image: url(/assets/img/login-bg/login-bg-15.jpg)"></a></li>
        <!-- <li><a href="javascript:;" data-click="change-bg" data-img="/assets/img/login-bg/login-bg-14.jpg" style="background-image: url(/assets/img/login-bg/login-bg-14.jpg)"></a></li>
        <li><a href="javascript:;" data-click="change-bg" data-img="/assets/img/login-bg/login-bg-13.jpg" style="background-image: url(/assets/img/login-bg/login-bg-13.jpg)"></a></li> -->
        <li><a href="javascript:;" data-click="change-bg" data-img="/assets/img/login-bg/login-bg-12.jpg" style="background-image: url(/assets/img/login-bg/login-bg-12.jpg)"></a></li>
    </ul>
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="/assets/js/app.min.js"></script>
<script src="/assets/js/theme/material.min.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="/assets/js/demo/login-v2.demo.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
</body>
</html>
