@extends('adminlte::page')
@section('css')
    <style>
        .encabezado {
            background-color: #222D32 !important;
            color: white !important;
        }

        #tablaClientes tr:hover {
            cursor: pointer !important;
            background-color: #3C8DBC !important;
            color: white;
        }

        .modal {
            margin: 60px auto !important;
        }

    </style>
@stop
@section('title', 'AdminLTE')

@section('content_header')
    <h1>Listado Clientes</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <span title="Campos a mostar" data-toggle="tooltip">
            <button class="btn-sm btn-primary" data-toggle="collapse" href="#collapseCampos">
                <i class="eye icon big"></i>
            </button>
            </span>
            <button data-toggle="tooltip" title="Imprimir listado" class="btn-sm btn-warning">
                <i class="print icon big"></i>
            </button>
            <button id="nuevoCliente" data-toggle="tooltip" title="Añadir nuevo cliente" class="btn-sm btn-success">
                <i class="icons big">
                    <i class="user icon "></i>
                    <i class="corner add icon black"></i>
                </i>
            </button>
            <div class="collapse" id="collapseCampos">
                <table>
                    <tr>
                        <td><input class="camposToggle" type="checkbox" data-column='0' checked>&nbsp; Nombre &nbsp;
                        </td>
                        <td><input class="camposToggle" type="checkbox" data-column='2' checked>&nbsp; Teléfono &nbsp;
                        </td>
                        <td><input class="camposToggle" type="checkbox" data-column='6'>&nbsp; Dirección &nbsp;</td>
                    </tr>
                    <tr>
                        <td><input class="camposToggle" type="checkbox" data-column='1'>&nbsp; Nombre Comercial &nbsp;
                        </td>

                        <td><input class="camposToggle" type="checkbox" data-column='3' checked>&nbsp; Móvil &nbsp;</td>

                        <td><input class="camposToggle" type="checkbox" data-column='7'>&nbsp; Población &nbsp;</td>

                    </tr>
                    <tr>
                        <td><input class="camposToggle" type="checkbox" data-column='8' checked>&nbsp; Contacto &nbsp;
                        </td>
                        <td><input class="camposToggle" type="checkbox" data-column='4'>&nbsp; Fax &nbsp;</td>

                        <td><input class="camposToggle" type="checkbox" data-column='5' checked>&nbsp; Email &nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="tablaClientes" class="table table-bordered table-striped">
                        <thead>
                        <tr class="encabezado">
                            <th>Nombre</th>
                            <th>Nombre Comercial</th>
                            <th>Teléfono</th>
                            <th>Móvil</th>
                            <th>Fax</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Población</th>
                            <th>Persona contacto</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($clientes as $cliente)
                            <tr data-id="{{$cliente->id}}">
                                <td class="sorting_1">{{$cliente->nombre}}</td>
                                <td class="sorting_1">{{$cliente->nombre_comercial}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <td>{{$cliente->fax}}</td>
                                <td>{{$cliente->movil}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <td>{{$cliente->poblacion}}</td>
                                <td>{{$cliente->contacto}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr class="encabezado">
                            <th>Nombre</th>
                            <th>Nombre Comercial</th>
                            <th>Teléfono</th>
                            <th>Móvil</th>
                            <th>Fax</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Población</th>
                            <th>Persona contacto</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->

    <!-- Modal -->
    <div id="modal">
        <div class="container">
            <div id="modal_cliente" class="ui modal">
                <div class="header"><i class="blue user icon"></i>&nbsp;<span id="titulo">Clientes</span><i
                        class="close icon"></i>
                </div>

                <div class="scrolling content">
                    <div class="ui segment">
                        <div id="clientes_tab" class="ui top attached tabular menu">
                            <a class="item active" data-tab="contacto">Datos de contacto</a>
                            <a class="item" data-tab="extendidos">Otros</a>
                        </div>
                        <div class="ui active tab" data-tab="contacto">
                            <div class="ui form">
                                <div class="fields">
                                    <input id="id" type="hidden" value="">
                                    <div class="seven wide field">
                                        <label>Nombre:</label>
                                        <input class="field" id="nombre" name="nombre" type="text" value=""
                                               placeholder="Nombre">
                                    </div>
                                    <div class="six wide field">
                                        <label>Contacto</label>
                                        <input id="contacto" name="contacto" type="text" value=""
                                               placeholder="Persona de contacto">
                                    </div>
                                    <div class="three wide field">
                                        <label>CIF/NIF:</label>
                                        <input id="identificacion_fiscal" name="identificacion_fiscal" type="text"
                                               value=""
                                               placeholder="CIF/NIF">
                                    </div>
                                </div>
                                <div class="fields">
                                    <div class="eight wide field">
                                        <label>Dirección:</label>
                                        <input id="direccion" name="direccion" type="text" value=""
                                               placeholder="Dirección">
                                    </div>
                                    <div class="four wide field">
                                        <label>Municipio:</label>
                                        <input id="municipio" name="municipio" type="text" value=""
                                               placeholder="Municipio">
                                    </div>
                                    <div class="two wide field">
                                        <label>C.P.:</label>
                                        <input id="cp" name="cp" type="text" value="" placeholder="Código postal">
                                    </div>
                                    <div class="four wide field">
                                        <label>Provincia:</label>
                                        <input id="provincia" name="provincia" type="text" value=""
                                               placeholder="Provincia">
                                    </div>
                                </div>
                                <div class="fields">
                                    <div class="six wide field">
                                        <label class="error">Teléfono:</label>
                                        <input id="telefono" name="telefono" type="text" value=""
                                               placeholder="Teléfono">
                                    </div>
                                    <div class="six wide field">
                                        <label class="error">Móvil:</label>
                                        <input id="movil" name="movil" type="text" value="" placeholder="Móvil">
                                    </div>
                                    <div class="six wide field">
                                        <label>Fax:</label>
                                        <input id="fax" name="fax" type="text" value="" placeholder="Fax">
                                    </div>
                                </div>
                                <div class="fields">
                                    <div class="eight wide field">
                                        <label>E-mail:</label>
                                        <input id="email" name="email" type="email" value="" placeholder="E-mail">
                                    </div>
                                    <div class="eight wide field">
                                        <label>Web:</label>
                                        <input id="web" name="web" type="text" value="" placeholder="Web">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui tab" data-tab="extendidos">
                            <div class="ui form">
                                <div>

                                    <div class="fields">
                                        <div class="sixteen wide field">
                                            <label>Banco:</label>
                                            <input id="banco" name="banco" type="text" value="" placeholder="Banco">
                                        </div>
                                        <div class="sixteen wide field">
                                            <label>IBAN:</label>
                                            <input id="iban" name="iban" type="text" value="" placeholder="IBAN">
                                        </div>
                                    </div>
                                    <div class="fields">
                                        <div class="eight wide field">
                                            <label>Fecha creación:</label>
                                            <input id="created_at" name="created_at" type="text" value="">
                                        </div>
                                        <div class="eight wide field">
                                            <label>Fecha última modificacion:</label>
                                            <input id="updated_at" name="updated_at" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="fields">
                                        <div class="sixteen wide field">
                                            <label>Observaciones:</label>
                                            <textarea id="observaciones" name="observaciones"
                                                      placeholder="Observaciones"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui one column stackable center aligned page grid">
                        <div class="column twelve wide">
                            <button class="btn-sm btn-warning">
                                <i class="print icon big"></i>
                            </button>
                            <button class="btn-sm btn-primary">
                                <i class="pencil icon big"></i>
                            </button>
                            <button class="btn-sm btn-success">
                                <i class="check icon big"></i>
                            </button>
                            <button class="btn-sm btn-danger">
                                <i class="trash icon big"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
@stop
@section('js')
    <script>

        $("#clientes_tab .item").tab();

        function abrirModal(cliente) {
            $('#nombre').val(cliente.nombre);
            $('#contacto').val(cliente.contacto);
            $('#identificacion_fiscal').val(cliente.identificacion_fiscal);
            $('#direccion').val(cliente.direccion);
            $('#municipio').val(cliente.municipio);
            $('#cp').val(cliente.codigo_postal);
            $('#provincia').val(cliente.provincia);
            $('#telefono').val(cliente.telefono);
            $('#movil').val(cliente.movil);
            $('#fax').val(cliente.fax);
            $('#email').val(cliente.email);
            $('#web').val(cliente.web);
            $('#banco').val(cliente.banco);
            $('#iban').val(cliente.cuenta_bancaria);
            $('#observaciones').val(cliente.observaciones);
            $('#created_at').val(cliente.created_at);
            $('#updated_at').val(cliente.updated_at);

            $('.ui.modal').modal({transition: 'vertical flip'}).modal('show');
        }


        $('#tablaClientes tr').on('click', function () {
            clienteId = $(this).attr('data-id');

            $.ajax({
                type: "GET",
                url: "{{url('clients')}}/" + clienteId,
                success: function (cliente) {
                    abrirModal(cliente)
                }
            });
        })

        $(document).ready(function () {

            let y = window.innerHeight;
            var table = $('#tablaClientes').DataTable({
                scrollY: y / 2,
                "columns": [
                    {"orderable": true, "visible": true},
                    {"orderable": true, "visible": false},
                    {"orderable": false, "visible": true},
                    {"orderable": false, "visible": true},
                    {"orderable": false, "visible": false},
                    {"orderable": false, "visible": true},
                    {"orderable": false, "visible": false},
                    {"orderable": false, "visible": false},
                    {"orderable": false, "visible": true},
                ],
                "language": language
            });

            $('input.camposToggle').on('change', function (e) {
                e.preventDefault();
                // Get the column API object
                var column = table.column($(this).attr('data-column'));
                // Toggle the visibility
                column.visible(!column.visible());
            });

            $('#nuevoCliente').click(()=>{
                return window.location.href = '{{route("clients.create")}}'
            })

        });
    </script>

@stop
