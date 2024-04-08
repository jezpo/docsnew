@extends('layouts.default')
@section('title1', 'Admin U.A.T.F.')
@section('title', 'Nuevo Rol')
@section('Roles', 'active')
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
    <link href="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
    <link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
    <link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
    <link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->
@endpush
@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Principal</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
        <li class="breadcrumb-item active">Nuevo rol</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><i class="fas fa-plus-circle fa-fw"></i> Nuevo <small></small></h1>
    <!-- end page-header -->
    <!-- begin panel -->
    <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">
            <h4 class="panel-title">Crear nuevo rol</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                        class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                        class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                        class="fa fa-times"></i></a>
            </div>
        </div>
        <!-- end panel-heading -->
        <!-- begin panel-body -->
        <div class="panel-body">
            <form action="{{ route('roles.store') }}" method="POST" accept-charset="utf-8" id="edit_permission_form"
                class="mb-0 needs-validation" enctype="multipart/form-data" role="form">
                {{ method_field('POST') }}
                @csrf <!-- Generar token CSRF -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name" class="control-label">Nombre</label>
                                <select id="name" name="name" class="form-control">
                                    <option value="super admin">Super Admin</option>
                                    <option value="white">White</option>
                                    <option value="reader">Reader</option>
                                </select>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-lg btn-block" value="save" name="action">
                                <i class="fa fa-save" aria-hidden="true"></i> Guardar
                            </button>
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
