@extends('layouts.default')
@section('title1', 'Admin U.A.T.F.')
@section('title', 'Admin Roles')
@section('Roles', 'active')
@push('css')
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="/assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />

    <!-- ================== END PAGE LEVEL STYLE ================== -->
@endpush

@section('content')
    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Principal</a></li>
        <li class="breadcrumb-item active">Roles</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><i class="fas fa-sitemap fa-fw"></i> Roles <small></small></h1>
    <!-- end page-header -->
    <!-- begin panel -->
    <div class="panel panel-inverse">

        <!-- end panel-heading -->
        <div class="panel-heading border-bottom">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                        class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                        class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                        class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">
                Lista de Roles
            </h4>
            <div class="pull-right">
                <div class="input-group-prepend pull-right">
                    <a href="{{ route('roles.create') }}" class="btn btn-success ">
                        <i class="fas fa-plus-circle"></i> Nuevo Rol
                    </a>
                </div>
            </div>
        </div>
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
                            <th class="text-nowrap">Descripción</th>
                            <th class="text-nowrap">Creado en</th>
                            <th class="text-nowrap">Actualizado en</th>
                            <th class="text-nowrap">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>{{ $role->created_at }}</td>
                            <td>{{ $role->updated_at }}</td>
                            <td>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end panel-body -->
        </div>
        <!-- end panel -->

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
                        <p>¿Estás seguro?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline pull-left float-left" type="button" data-dismiss="modal">
                            <i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar
                        </button>
                        <button class="btn btn-danger pull-left" id="confirm" type="button">
                            <i class="fa fa-trash" aria-hidden="true"></i> Confirmar
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
        <script src="/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
        <script src="/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
        <script src="/assets/plugins/jszip/dist/jszip.min.js"></script>
        <script src="/assets/plugins/moment/min/moment.min.js"></script>
        <script src="/assets/plugins/moment/locale/es-us.js"></script>
        <script src="/assets/plugins/switchery/switchery.min.js"></script>
        <!-- ================== END PAGE LEVEL JS ================== -->

        <script>
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
                    buttons: [{
                            extend: 'copy',
                            text: 'Copiar',
                            className: 'btn-sm'
                        },
                        {
                            extend: 'excel',
                            className: 'btn-sm'
                        },
                        {
                            extend: 'pdf',
                            className: 'btn-sm'
                        },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            className: 'btn-sm'
                        }
                    ],
                    "ajax": {
                        url: '{{ route('roles.index') }}'',
                        type: 'GET',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'guard_name',
                            name: 'guard_name'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'updated_at',
                            name: 'updated_at'
                        },
                        {
                            data: 'botones',
                            orderable: false
                        }
                    ],
                    error: function(jqXHR, textStatus, errorThrown) {
                        $("#tdLista").DataTable().clear().draw();
                    }
                });
            });
        </script>
    @endpush
