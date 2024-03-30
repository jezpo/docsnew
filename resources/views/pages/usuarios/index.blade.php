@extends('layouts.default')
@section('title1','Admin U.A.T.F.')
@section('title','Admin Usuarios')
@section('Users','active')


@push('css')
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
<link href="/assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />

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
<style>
    .btn_personalizado{
        text-decoration: none;
        padding: 10px;
        color: #ffffff;
        background-color: #376bd4;
    }
</style>
 <!-- begin breadcrumb -->
 <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Principal</a></li>
    <li class="breadcrumb-item active">Usuarios</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header"><i class="fas fa-users fa-fw"></i> Usuarios <small></small></h1>
<!-- end page-header -->
<!-- begin panel -->
<div class="panel panel-inverse">
    <!-- begin panel-heading -->
    <div class="panel-heading">
        <h4 class="panel-title">Administración de Usuarios </h4>
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
        <div class="table-responsive">
            <table id="tdLista" class="table table-striped table-bordered table-td-valign-middle dt-responsive " style="width:100%">
                <thead>
                <tr>
                    <th class="text-nowrap">Nro.</th>
                    <th class="text-nowrap">C.I.</th>
                    <th class="text-nowrap">Nombres</th>
                    <th class="text-nowrap">Paterno</th>
                    <th class="text-nowrap">Materno</th>
                    <th class="text-nowrap">Username</th>
                    <th class="text-nowrap">Roles</th>
                    <th class="text-nowrap">Estado</th>
                    <th class="text-nowrap">Creado en</th>
                    <th class="text-nowrap">Acciones</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>
    <!-- end panel-body -->
</div>
<!-- end panel -->
<!-- modal -->
<div class="modal fade" id="modal-agregar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form onSubmit="return false" id="formAdd" action="{{ route('users.store') }}" method="post">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h4 class="modal-title" id="titulo"><i class="fa fa-user-plus" ></i> Nuevo Usuario </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="ci">C.I.:</label>
                        <div class="col-lg-8">
                            <div class="input-group ">
                                <input type="text" name="ci" id="ci" class="form-control" placeholder="Carnet de Identidad">
                                <button type="button" class="btn btn-primary" onclick="f_buscar()"><i class="fa fa-search-minus"></i> Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="nombres">Nombres:</label>
                        <div class="col-lg-8">
                            <div class="input-group ">
                                <input type="text" name="nombre" id="nombres" class="form-control" placeholder="Nombres" readOnly>
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="paterno">Paterno:</label>
                        <div class="col-lg-8">
                            <div class="input-group ">
                                <input type="text" name="paterno" id="paterno" class="form-control" placeholder="Apellido Paterno" readOnly>
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="materno">Materno:</label>
                        <div class="col-lg-8">
                            <div class="input-group ">
                                <input type="text" name="materno" id="materno" class="form-control " placeholder="Apellido Materno" readOnly>
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="username">Username:</label>
                        <div class="col-lg-8">
                            <div class="input-group ">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                                <div class="input-group-addon">
                                    <i class="fa fa-user-md"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="email">Email:</label>
                        <div class="col-lg-8">
                            <div class="input-group ">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="roles">Roles:</label>
                        <div class="col-lg-8">
                                <select class="multiple-select2 form-control" name="role[]" id="role" multiple="multiple" aria-placeholder="Seleccione Rol de Usuario">
                                    @if ($roles)
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="password">Password:</label>
                        <div class="col-lg-8">
                            <div class="input-group ">
                                <input type="password" name="password" class="form-control" placeholder="Password" data-toggle="password" data-placement="after">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="password_rep">Confirmar Password:</label>
                        <div class="col-lg-8">
                            <div class="input-group ">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Repetir password" data-toggle="password" data-placement="after">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar</a>
                    <a href="javascript:;" class="btn btn-primary" onclick="f_vaciar_datos()"><i class="fas fa-eraser" ></i> Limpiar</a>
                    <button type='submit' class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->
<!-- modal -->
<div class="modal fade modal-danger" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-danger">
                <h5 class="modal-title">
                <i class="fa fa-trash" aria-hidden="true"></i> Confirmar
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>
                ¿Estas seguro?
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline pull-left float-left" type="button" data-dismiss="modal" >
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                    Cancelar
                </button>
                <button class="btn btn-danger pull-left" id="confirm" type="button" >
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    Confirmar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

@endsection
@push('scripts')
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
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
<script src="/assets/js/director.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>


    function nuevo_registro(){

        $('#modal-agregar').modal('toggle');
    }

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('#confirmDelete').on('show.bs.modal', function (e) {
            var message = $(e.relatedTarget).attr('data-message');
            var title = $(e.relatedTarget).attr('data-title');
            var form = $(e.relatedTarget).closest('form');
            $(this).find('.modal-body p').text(message);
            $(this).find('.modal-title').text(title);
            $(this).find('.modal-footer #confirm').data('form', form);
        });
        $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
            $(this).data('form').submit();
        });
    });
$(document).ready( function () {
 $('#tdLista').DataTable({
        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex mr-0 mr-sm-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>',
        language: {
            "url": "/assets/plugins/datatables.net/spanish.json"
        },
        order: [[ 0, "asc" ]],
        serverSide: false,
        processing: true,
        columnDefs: [
            { orderable: false, targets: 6 },
        ],
        buttons: [
            {
                text: '<i class="fas fa-plus-circle"></i>Nuevo',
                action: function (e, dt, node, config ){
                    nuevo_registro();
                },
                className: 'btn_personalizado'
            }
        ],
        "ajax": {
            url: "{{route('adm.list.users')}}",
            type: 'POST',
            data:{ _token: '{{ csrf_token() }}'},
        },
        columns: [
                { data: 'nro' , name: 'nro'},
                { data: 'ci', name: 'ci'},
                { data: 'nombres', name: 'nombres'},
                { data: 'paterno' , name: 'paterno'},
                { data: 'materno' , name: 'materno'},
                { data: 'username' , name: 'username'},
                { data: 'roles' , name: 'roles', orderable: false,
                        render: function(data, type, row, meta) {
                            let roles='';
                            let badges=['indigo','danger','warning','primary','purple','dark','success','secondary','green','pink'];
                            let j=0;
                            for(var i=0;i<data.length;i++){
                                roles+='<span class="badge bg-'+badges[j]+'">'+data[i].name+'</span>';
                                j++;
                                if(j===10)j=0;
                            }
                            return roles;
                        }
                },
                { data: 'estado' , name: 'estado',
                    render: function(data, type, row, meta) {
                        if(data===true){
                            badges='success';
                            estado='Activo';
                        }else{
                            badges='primary';
                            estado='Inactivo';
                        }
                        return '<span class="badge bg-'+badges+'">'+estado+'</span>';
                    }
                },
                { data: 'creado' , name: 'creado'},
                { data: 'botones', "orderable": false }
        ],
        error: function(jqXHR, textStatus, errorThrown){
            $("#tdLista").DataTable().clear().draw();
        }



     });

  });
function f_buscar(){
    var ci=$('#ci').val();
    $.ajax({ 
        url: "{{route('dir.buscar.persona')}}", 
        type: 'POST', 
        data: {_token: '{{ csrf_token() }}', ci:ci}, 
        success: function(data) 
        { 
            if(data){
                document.getElementById("nombres").value=data.nombres;
                document.getElementById("paterno").value=data.paterno;
                document.getElementById("materno").value=data.materno;
                document.getElementById("ci").readOnly =true;
            }else{
                swal({
                    icon: "error",
                    title: "Error",
                    text: "No se encontro el C.I."
                });
            }
        }  
    });
}
function f_vaciar_datos(){
    document.getElementById("nombres").value='';
    document.getElementById("paterno").value='';
    document.getElementById("materno").value='';
    document.getElementById("ci").value='';
    document.getElementById("ci").readOnly =false;
}
</script>
@endpush
