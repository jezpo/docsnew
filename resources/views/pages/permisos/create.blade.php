@extends('layouts.default')
@section('title1','Admin U.A.T.F.')
@section('title','Admin Permisos')
@section('Permisos','active')

@section('content')
 <!-- begin breadcrumb -->
 <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Principal</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permisos</a></li>
    <li class="breadcrumb-item active">Nuevo permiso</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header"><i class="fas fa-plus-circle fa-fw"></i> Nuevo <small></small></h1>
<!-- end page-header -->
<!-- begin panel -->
<div class="panel panel-inverse">
    <!-- begin panel-heading -->
    <div class="panel-heading">
        <h4 class="panel-title">Crear nuevo permiso</h4>
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
        <form action="{{ route('permissions.store') }}" method="POST" accept-charset="utf-8" class="mb-0 needs-validation" enctype="multipart/form-data" role="form" >
            {{ method_field('POST') }}
            <div class="card-body">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                            <label for="name" class="col-12 control-label">
                                Nombre
                            </label>
                            <div class="col-12">
                                <div class="input-group ">
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $data['name'] }}" placeholder="Nombre del Permisos">
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
                        {{--<div class="form-group has-feedback row {{ $errors->has('slug') ? ' has-error ' : '' }}">
                            <label for="slug" class="col-12 control-label">
                                Slug del Permiso
                            </label>
                            <div class="col-12">
                                <div class="input-group ">
                                    <input type="text" id="slug" name="slug" class="form-control" value="{{--{{ $data['slug'] }}" onkeypress="return numbersAndLettersOnly()" placeholder="Slug del Permiso">
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
                        </div>--}}
                        <div class="form-group has-feedback row {{ $errors->has('description') ? ' has-error ' : '' }}">
                            <label for="description" class="col-12 control-label">
                                Descripción del Permiso
                            </label>
                            <div class="col-12">
                                <div class="input-group ">
                                    <textarea id="description" name="description" class="form-control" placeholder="Descripción del permiso">{{--{{ $data['description'] }}--}}</textarea>
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
                    <div class="col-12 col-md-4">
                    <div class="form-group has-feedback row {{ $errors->has('model') ? ' has-error ' : '' }}">
                        <label for="model" class="col-12 control-label">
                            Model del Permiso
                        </label>
                        <div class="col-12">
                            <select name="model" id="model" class="select2 form-control" >
                                <option value="">Seleccionar Permiso Model</option>
                                {{--}}
                                @foreach ($data['permissionModels'] as $permissionModel)
                                    <option @if ($permissionModel == $data['model']) selected @endif value="{{ $permissionModel }}">
                                        {{ $permissionModel }}
                                    </option>
                                @endforeach
                                --}}
                            </select>
                        </div>
                        @if ($errors->has('model'))
                            <div class="col-12">
                                <span class="help-block">
                                    <strong>{{ $errors->first('model') }}</strong>
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
                                Guardar
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