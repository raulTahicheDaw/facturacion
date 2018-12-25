@extends('adminlte::page')
@section('css')
    <style>
        .encabezado {
            background-color: #222D32 !important;
            color: white !important;
        }

        #tablaCategorias tr:hover {
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
    <h1>Listado Categorías</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <button data-toggle="tooltip" title="Imprimir listado" class="btn-sm btn-warning">
                <i class="print icon big"></i>
            </button>
            <button id="nuevaCategoria" data-toggle="tooltip" title="Añadir nueva categoría" class="btn-sm btn-success">
                <i class="icons big">
                    <i class="thumbtack icon"></i>
                    <i class="corner add icon black"></i>
                </i>
            </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="tablaCategorias" class="table table-bordered table-striped">
                        <thead>
                        <tr class="encabezado">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($categoriasServicios as $categoria)
                            <tr data-id="{{$categoria->id}}">
                                <td class="sorting_1">{{$categoria->id}}</td>
                                <td class="sorting_1">{{$categoria->nombre}}</td>
                                <td>{{$categoria->descripcion}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr class="encabezado">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
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
            <div id="modal_categoria" class="ui modal">
                <div class="header"><i class="blue user icon"></i>&nbsp;<span id="titulo">Categorías</span><i
                        class="close icon"></i>
                </div>

                <div class="scrolling content">
                    <div class="ui segment">
                        <div class="ui form">
                            <div class="fields">
                                <div class="two wide field">
                                    <label>ID</label>
                                    <input class="field" type="text" id="id" value="">
                                </div>
                                <div class="fourteen wide field">
                                    <label>Nombre:</label>
                                    <input class="field" id="nombre" name="nombre" type="text" value=""
                                           placeholder="Nombre">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="sixteen wide field">
                                    <label>Descripción:</label>
                                    <textarea id="descripcion" name="descripcion"
                                              placeholder="Descripción"></textarea>
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
        function abrirModal(categoria) {
            $('#id').val(categoria.id);
            $('#nombre').val(categoria.nombre);
            $('#descripcion').val(categoria.descripcion);
            $('.ui.modal').modal({transition: 'vertical flip'}).modal('show');
        }


        $('#tablaCategorias tr').on('click', function () {
            categoriaId = $(this).attr('data-id');

            $.ajax({
                type: "GET",
                url: "{{url('service-categories')}}/" + categoriaId,
                success: function (categoria) {
                    console.log(categoria)
                    abrirModal(categoria)
                }
            });
        })

        $(document).ready(function () {

            $('.ui.form input').prop('readonly', true);

            let y = window.innerHeight;
            var table = $('#tablaCategorias').DataTable({
                scrollY: y / 2,
                "columns": [
                    {"orderable": true, "visible": true},
                    {"orderable": true, "visible": true},
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

            $('#nuevaCategoria').click(()=>{
                return window.location.href = '{{route("service-categories.create")}}'
            })
        });
    </script>

@stop
