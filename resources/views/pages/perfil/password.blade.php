@extends('layouts.default')
@section('title1','Odiseo U.A.T.F.')
@section('title','Perfil')

@push('css')
<style>
        .thumb{
             height: 200px;
             border: 1px solid #000;
             margin: 10px 5px 0 0;
        }
        #img{
            text-align:center;
        }
    </style>
@endpush

@section('content')

<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header"><i class="fas fa-address-book fa-fw"></i> Perfil <small></small></h1>
<!-- end page-header -->
<!-- begin panel -->
<div class="row">
        <!-- begin col-4 -->
    <div class="col-md-4">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
            <h4 class="panel-title">Perfil</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                
            </div>
            <div class="panel-body">
                 <div class="profile_img" id="img">
                    <div id="crop-avatar">
                        <output id="list">
                            <center>
                                @if(count($fotos)>0)
                                <img class="thumb img-responsive avatar-view" id="preview" src="data:image/jpeg;base64,{{base64_encode(stream_get_contents($fotos[0]->r_foto))}}" title="foto de perfil">
                                @else
                                <img class="thumb img-responsive avatar-view" id="preview" src="/assets/img/user/user.png" title="foto de perfil">
                                @endif
                            </center>
                        </output>
                    </div>
                </div>
                <div class="form-group">
                    <form  action="{{ route('photo.update') }}" onSubmit="return false"  class="EnviarFoto"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label >Abrir Archivo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile"  name="fotoperfil" accept="image/jpg,image/jpeg">
                                <label class="custom-file-label" >Elija archivo</label>
                            </div>
                            <div class="input-group-append">
                                <input type="submit" value="ENVIAR" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-4 -->
    <!-- begin col-8 -->
    <div class="col-md-8">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
            <div class="panel-heading">
                <h4 class="panel-title">Cambiar Password</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Ups!</strong> Existen algunos problemas en los campos.<br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form class="form-horizontal" action="{{route('editar.password')}}" method="post">
                @csrf
                    <div class="row"> 
                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <div class="form-group row m-b-15">
                                <label class="col-md-3 control-label">Contraseña Actual</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control"  placeholder="Contraseña Actual" name="password_anterior"  value="{{ old('password_anterior') }}" required/>
                                </div>

                            </div>
                            <div class=" form-group row m-b-15">
                                <label class="col-md-3 control-label">Nueva Contraseña</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" placeholder="Nueva Contraseña"  name="nuevo_password" value="{{ old('nuevo_password') }}" required/>
                                </div>
                            </div>
                            <div class="form-group row m-b-15" >
                                <label class="col-md-3 control-label">Verificar Contraseña</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" placeholder="Verificar Contraseña" name="respetir_password" value="{{ old('respetir_password') }}" required/>
                                </div>
                            </div>
                            <div class="form-group row m-b-15 align-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-success">Cambiar Contraseña</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-8 -->

</div>
<!-- end panel -->


@endsection
@push('scripts')
<script src="/assets/js/director.js"></script>
<script>
        function readImage (input) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#preview').attr('src', e.target.result); // Renderizamos la imagen
              }
              reader.readAsDataURL(input.files[0]);
            }
          }
        
        $(".custom-file-input").change(function () {
            readImage(this);
            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        });
    </script>
@endpush
