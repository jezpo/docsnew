@extends('layouts.default')
@section('title1', 'Admin U.A.T.F.')
@section('title', 'Admin Usuarios')
@section('Users', 'active')

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
    <link href="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />
    <link href="/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
    <link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
    <link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
    <link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->
@endpush

@section('content')
    <style>
        .btn_personalizado {
            text-decoration: none;
            padding: 10px;
            color: #ffffff;
            background-color: #376bd4;
        }
    </style>
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Principal</a></li>
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
            @include('mensajes.flash-messages')
            <div class="table-responsive">
                <table id="tdLista" class="table table-striped table-bordered table-td-valign-middle dt-responsive"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Nro.</th>
                            <th class="text-nowrap">Nombre</th>
                            <th class="text-nowrap">Correo</th>
                            <th class="text-nowrap">Roles</th>
                            <th class="text-nowrap">Estado</th>
                            <th class="text-nowrap">Creado en</th>
                            <th class="text-nowrap">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>
                                    @foreach ($user->roles as $role)
                                        {{ $role->name }}<br>
                                    @endforeach
                                </td>
                                <td>{{ $user->estado }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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
                        <h4 class="modal-title"><i class="fa fa-user-plus"></i> Nuevo Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- Contenido del formulario (sin cambios) -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fa fa-times-circle"></i> Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="f_vaciar_datos()"><i
                                class="fas fa-eraser"></i> Limpiar</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end modal -->
    <!-- modal -->
    <div class="modal fade modal-danger" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel"
        aria-hidden="true" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header alert-danger">
                    <h5 class="modal-title">
                        <i class="fa fa-trash" aria-hidden="true"></i> Confirmar
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>
                        ¿Estas seguro?
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline pull-left float-left" type="button" data-dismiss="modal">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        Cancelar
                    </button>
                    <button class="btn btn-danger pull-left" id="confirm" type="button">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Confirmar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->


@push('scripts')
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tdLista').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json" // Traducción al español
                }
            });
        });
    </script>
    <!-- ================== END PAGE LEVEL JS ================== -->
@endpush


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
    function nuevo_registro() {
        $('#modal-agregar').modal('toggle');
    }

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $('#confirmDelete').on('show.bs.modal', function(e) {
            var message = $(e.relatedTarget).attr('data-message');
            var title = $(e.relatedTarget).attr('data-title');
            var form = $(e.relatedTarget).closest('form');
            $(this).find('.modal-body p').text(message);
            $(this).find('.modal-title').text(title);
            $(this).find('.modal-footer #confirm').data('form', form);
        });
        $('#confirmDelete').find('.modal-footer #confirm').on('click', function() {
            $(this).data('form').submit();
        });
    });

    $(document).ready(function() {
        $('#tdLista').DataTable({
            dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex mr-0 mr-sm-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>>',
            language: {
                "url": "/assets/plugins/datatables.net/spanish.json"
            },
            order: [
                [0, "asc"]
            ],
            serverSide: false,
            processing: true,
            columnDefs: [{
                orderable: false,
                targets: 6
            }, ],
            buttons: [{
                text: '<i class="fas fa-plus-circle"></i>Nuevo',
                action: function(e, dt, node, config) {
                    nuevo_registro();
                },
                className: 'btn_personalizado'
            }],
            columns: [{
                    data: 'nro',
                    name: 'nro'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'password',
                    name: 'password'
                },
                
                {
                    data: 'roles',
                    name: 'roles',
                    orderable: false,
                    render: function(data, type, row, meta) {
                        let roles = '';
                        let badges = ['indigo', 'danger', 'warning', 'primary', 'purple',
                            'dark', 'success', 'secondary', 'green', 'pink'
                        ];
                        let j = 0;
                        for (var i = 0; i < data.length; i++) {
                            roles += '<span class="badge bg-' + badges[j] + '">' + data[i]
                                .name + '</span>';
                            j++;
                            if (j === 10) j = 0;
                        }
                        return roles;
                    }
                },
                {
                    data: 'estado',
                    name: 'estado',
                    render: function(data, type, row, meta) {
                        if (data === true) {
                            badges = 'success';
                            estado = 'Activo';
                        } else {
                            badges = 'primary';
                            estado = 'Inactivo';
                        }
                        return '<span class="badge bg-' + badges + '">' + estado + '</span>';
                    }
                },
                {
                    data: 'creado',
                    name: 'creado'
                },
                {
                    data: 'botones',
                    "orderable": false
                }
            ],
            error: function(jqXHR, textStatus, errorThrown) {
                $("#tdLista").DataTable().clear().draw();
            }
        });
    });

    function f_buscar() {
        var ci = $('#name').val();
        $.ajax({
            url: "",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                name: name
            },
            success: function(data) {
                if (data) {
                    document.getElementById("name").value = data.name;
                    document.getElementById("email").value = data.email;
                    
                } else {
                    swal({
                        icon: "error",
                        title: "Error",
                        text: "No se encontró el C.I."
                    });
                }
            }
        });
    }

    function f_vaciar_datos() {
        document.getElementById("name").value = '';
        document.getElementById("email").value = '';
    }
</script>
<!-- ================== END PAGE LEVEL JS ================== -->
@endpush
