@extends('layouts.default')
@section('title1','Admin U.A.T.F.')
@section('title','Editar Rol')
@section('Roles','active')
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
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
    <li class="breadcrumb-item active">Editar Rol</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header"><i class="fas fa-edit fa-fw"></i> Editar <small></small></h1>
<!-- end page-header -->
<!-- begin panel -->
<div class="panel panel-inverse">
    <!-- begin panel-heading -->
    <div class="panel-heading">
        <h4 class="panel-title">Detalle Rol {{$data['name']}}</h4>
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
        <form action="{{ route('roles.update', $data['id']) }}" method="POST" accept-charset="utf-8" id="edit_permission_form" class="mb-0 needs-validation" enctype="multipart/form-data" role="form" >
            {{ method_field('PATCH') }}
            <div class="card-body">
                <input type="hidden" name="id" value="{{ $data['id'] }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                            <label for="name" class="col-12 control-label">
                                Nombre
                            </label>
                            <div class="col-12">
                                <div class="input-group ">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $data['name'] }}" placeholder="Nombre del Rol">
                                    <div class="input-group-addon">
                                        <i class="fa fa-address-card"></i>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('name'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('slug') ? ' has-error ' : '' }}">
                            <label for="slug" class="col-12 control-label">
                                Slug del Permiso
                            </label>
                            <div class="col-12">
                                <div class="input-group ">
                                    <input type="text" id="slug" name="slug" class="form-control" value="{{ $data['slug'] }}" onkeypress="return numbersAndLettersOnly()" placeholder="Slug del Rol">
                                    <div class="input-group-addon">
                                        <i class="fab fa-sellcast"></i>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('slug'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('description') ? ' has-error ' : '' }}">
                            <label for="description" class="col-12 control-label">
                                Descripción del Rol
                            </label>
                            <div class="col-12">
                                <div class="input-group ">
                                    <textarea id="description" name="description" class="form-control" placeholder="Descripción del rol">{{ $data['description'] }}</textarea>
                                    <div class="input-group-addon">
                                        <i class="fa fa-list-alt"></i>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('description'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                    @php
                        if(!$data['level']){
                            $data['level'] = 0;
                        }
                    @endphp
                    <div class="col-12 col-md-4">
                        <div class="form-group has-feedback row {{ $errors->has('level') ? ' has-error ' : '' }}">
                            <label for="level" class="col-12 control-label">
                                Nivel de Rol
                            </label>
                            <div class="col-12">
                                <input type="number" id="level" name="level" min="0" step="1" onkeypress="return event.charCode >= 48" class="form-control" value="{{ $data['level'] }}" placeholder="Nivel de Tipo Rol ">
                            </div>
                            @if ($errors->has('level'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="form-group has-feedback row {{ $errors->has('permissions') ? ' has-error ' : '' }}">
                            <label for="permissions" class="col-12 control-label">
                                Permisos de Rol
                            </label>
                            <div class="col-12">
                                <select name="permissions[]" id="permissions" class="multiple-select2 form-control" multiple="multiple">
                                    <option value="">Seleccionar Permiso</option>
                                    @foreach ($data['allPermissions'] as $permission)
                                    <option @if (in_array($permission->id, $data['rolePermissionsIds'])) selected @endif value="{{ $permission }}">
                                        {{ $permission->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('permissions'))
                                <div class="col-12">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('permissions') }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-6">
                        <span data-toggle="tooltip" title="Guardar Cambios de Permiso">
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
