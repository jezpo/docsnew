@extends('layouts.default')
@section('title1','Admin U.A.T.F.')
@section('title','Editar Uusario')
@section('Users','active')
@push('css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" />
<link href="/assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<link href="/assets/plugins/@danielfarrell/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="/assets/plugins/tag-it/css/jquery.tagit.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
<link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
<link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
<link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->
@endpush
@section('content')
 <!-- begin breadcrumb -->
 <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Principal</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/users') }}">Usuarios</a></li>
    <li class="breadcrumb-item active">Editar Usuario</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header"><i class="fas fa-users fa-fw"></i> Editar <small></small></h1>
<!-- end page-header -->
<!-- begin panel -->
<div class="panel panel-inverse">
    <!-- begin panel-heading -->
    <div class="panel-heading">
        <h4 class="panel-title">Detalle Usuario {{$user->username}}</h4>
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
	        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <!-- end panel-heading -->
    <!-- begin panel-body -->
    <div class="panel-body">
        @include('mensajes.flash-messages')
        <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="utf-8" >
            {{ method_field('PUT') }}
            <div class="card-body">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-8 offset-xl-2">
                        <div class="form-group has-feedback row {{ $errors->has('ci') ? ' has-error ' : '' }}">
                            <label for="ci" class="col-3 control-label">
                                C.I.
                            </label>
                            <div class="col-9">
                                <div class="input-group ">
                                    <input type="text" id="ci" name="ci" class="form-control" value="{{ $user->ci }}" placeholder="Carnet de Identidad">
                                    <div class="input-group-addon">
                                        <i class="fa fa-id-card"></i>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('ci'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ci') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('nombres') ? ' has-error ' : '' }}">
                            <label for="nombres" class="col-3 control-label">
                                Nombre
                            </label>
                            <div class="col-9">
                                <div class="input-group ">
                                    <input type="text" id="nombres" name="nombres" class="form-control" value="{{ $user->nombres }}" placeholder="Nombres">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('nombres'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombres') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('paterno') ? ' has-error ' : '' }}">
                            <label for="paterno" class="col-3 control-label">
                                Paterno
                            </label>
                            <div class="col-9">
                                <div class="input-group ">
                                    <input type="text" id="paterno" name="paterno" class="form-control" value="{{ $user->paterno }}" placeholder="Apellido Paterno">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('paterno'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paterno') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('materno') ? ' has-error ' : '' }}">
                            <label for="materno" class="col-3 control-label">
                                Materno
                            </label>
                            <div class="col-9">
                                <div class="input-group ">
                                    <input type="text" id="materno" name="materno" class="form-control" value="{{ $user->materno }}" placeholder="Apellido Materno">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('materno'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('materno') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('username') ? ' has-error ' : '' }}">
                            <label for="username" class="col-3 control-label">
                                Username
                            </label>
                            <div class="col-9">
                                <div class="input-group ">
                                    <input type="text" id="username" name="username" class="form-control" value="{{ $user->username }}" placeholder="Username">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user-md"></i>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('username'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('email') ? ' has-error ' : '' }}">
                            <label for="email" class="col-3 control-label">
                                Email
                            </label>
                            <div class="col-9">
                                <div class="input-group ">
                                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Correo electronico">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('role') ? ' has-error ' : '' }}">
                            <label for="role" class="col-3 control-label">
                                Roles
                            </label>
                            <div class="col-9">
                                <select class="multiple-select2 form-control" name="role[]" id="role" multiple="multiple" aria-placeholder="Seleccione Rol de Usuario">
                                    @if ($roles)
                                        @foreach($roles as $role)
                                            @php
                                                $ban=0;
                                            @endphp
                                            @foreach($currentRole as $myrole)
                                                @if($myrole->id == $role->id)
                                                @php
                                                    $ban=1; break;
                                                @endphp
                                                @endif
                                            @endforeach
                                            <option value="{{ $role->id }}" {{ $ban == 1 ? 'selected="selected"' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            @if ($errors->has('role'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('password') ? ' has-error ' : '' }}">
                            <label for="password" class="col-3 control-label">
                                Contraseña
                            </label>
                            <div class="col-9">
                                <input type="password" id="password" name="password" class="form-control"  placeholder="Contraseña" data-toggle="password" data-placement="after">
                            </div>
                            @if ($errors->has('password'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('password_confirmation') ? ' has-error ' : '' }}">
                            <label for="password_confirmation" class="col-3 control-label">
                                Confirmar Contraseña
                            </label>
                            <div class="col-9">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"  placeholder="Confirmar Contraseña" data-toggle="password" data-placement="after">
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row ">
                            <label for="estado" class="col-3 control-label">
                                Estado
                            </label>
                            <div class="col-9">
                                <select name="estado" id="estado" class="form-control">
                                    <option value="1" {{ $user->activated == 1 ? 'selected="selected"' : '' }}>ACTIVO</option>
                                    <option value="0" {{ $user->activated == 0 ? 'selected="selected"' : '' }}>INACTIVO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6 offset-xl-4">
                        <span data-toggle="tooltip" title="Guardar Cambios de Usuario">
                            <button type="submit" class="btn btn-success btn-lg btn-block" value="save" name="action">
                            <i class="fa fa-save" aria-hidden="true"></i>
                                Actualizar
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- end panel-body -->
</div>
<!-- end panel -->
@endsection
@push('scripts')
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="/assets/plugins/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets/plugins/moment/min/moment.min.js"></script>
<script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<script src="/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="/assets/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
<script src="/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="/assets/plugins/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js"></script>
<script src="/assets/plugins/@danielfarrell/bootstrap-combobox/js/bootstrap-combobox.js"></script>
<script src="/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/assets/plugins/tag-it/js/tag-it.min.js"></script>
<script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="/assets/plugins/bootstrap-show-password/dist/bootstrap-show-password.js"></script>
<script src="/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
<script src="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
<script src="/assets/plugins/clipboard/dist/clipboard.min.js"></script>
<script src="/assets/js/demo/form-plugins.demo.js"></script>

@endpush
