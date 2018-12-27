@extends('adminlte::page')
@section('css')
    <style>
        .encabezado {
            background-color: #222D32 !important;
            color: white !important;
        }

        #tablaTasas tr:hover {
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
    <h1>Listado Impuestos/Tasas</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <button data-toggle="tooltip" title="Imprimir listado" class="btn-sm btn-warning">
                <i class="print icon big"></i>
            </button>
            <button id="nuevaTasa" data-toggle="tooltip" title="Añadir nueva tasa" class="btn-sm btn-success">
                <i class="icons big">
                    <i class="credit card icon"></i>
                    <i class="corner add icon black"></i>
                </i>
            </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="tablaTasas" class="table table-bordered table-striped">
                        <thead>
                        <tr class="encabezado">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Porcentaje</th>
                            <th>Observaciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($tasas as $tasa)
                            <tr data-id="{{$tasa->id}}">
                                <td class="sorting_1">{{$tasa->id}}</td>
                                <td class="sorting_1">{{$tasa->nombre}}</td>
                                <td class="sorting_1">{{$tasa->porcentaje}}</td>
                                <td>{{$tasa->observaciones}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr class="encabezado">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Porcentaje</th>
                            <th>Observaciones</th>
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
            <div id="modal_tasas" class="ui modal">
                <div class="header"><i class="blue user icon"></i>&nbsp;<span id="titulo">Tasa</span><i
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
                                <div class="nine wide field">
                                    <label>Nombre:</label>
                                    <input class="field" id="nombre" name="nombre" type="text" value=""
                                           placeholder="Nombre">
                                </div>
                                <div class="five wide field">
                                    <label>Porcentaje:</label>
                                    <input class="field" id="porcentaje" name="porcentaje" type="text" value=""
                                           placeholder="Porcentaje">
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
                <div class="ui one column stackable center aligned page grid">
                    <div class="column twelve wide">
                        <button id="imprimir" class="btn-sm btn-warning">
                            <i class="print icon big"></i>
                        </button>
                        <button id="editar" class="btn-sm btn-primary">
                            <i class="pencil icon big"></i>
                        </button>
                        <button id="actualizar" hidden class="btn-sm btn-success">
                            <i class="check icon big"></i>
                        </button>
                        <button id="borrar" class="btn-sm btn-danger">
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
        var tasaId;

        function abrirModal(tasa) {
            $('#id').val(tasa.id);
            $('#nombre').val(tasa.nombre);
            $('#porcentaje').val(tasa.porcentaje);
            $('#observaciones').val(tasa.observaciones);
            $('.ui.modal').modal({transition: 'vertical flip'}).modal('show');
        }

        $('#borrar').on('click', function () {

            const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success swaButton',
                cancelButtonClass: 'btn btn-danger swaButton',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: '¿Borrar Tasa?',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{url('/taxes')}}/" + tasaId,
                        method: "POST",
                        data: {
                            _method: "DELETE",
                        },
                        success: function () {
                            iziToast.success({
                                icon: 'icon-person',
                                position: "topRight",
                                message: " Tasa borrada correctamente",
                            });

                            setTimeout(() => {
                                return window.location.href = '{{route("taxes.index")}}'
                            }, 500);
                        }
                    })
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    iziToast.error({
                        icon: 'icon-person',
                        position: "topRight",
                        title: "Cancelado",
                        message: " Tasa no borrada",
                    });
                }
            })

            /**/
        })


        $('#tablaTasas tr').on('click', function () {
            tasaId = $(this).attr('data-id');

            $.ajax({
                type: "GET",
                url: "{{url('taxes')}}/" + tasaId,
                success: function (tasa) {
                    console.log(tasa)
                    abrirModal(tasa)
                }
            });
        })

        $('#actualizar').on('click', () => {

            var id = $('#id').val();
            var nombre = $('#nombre').val();
            var observaciones = $('#observaciones').val();
            var porcentaje = $('#porcentaje').val();

            $.ajax({
                url: "{{url('/taxes')}}/" + id,
                method: "POST",
                data: {
                    _method: "PATCH",
                    nombre: nombre,
                    observaciones: observaciones,
                    porcentaje: porcentaje,
                },
                success: function (e) {
                    if (e.success === 'Sin cambios') {
                        iziToast.info({
                            position: "topRight",
                            title: 'Tasa',
                            message: 'No ha realizado ningún cambio',
                        });
                    } else {
                        iziToast.success({
                            position: "topRight",
                            title: 'Tasa',
                            message: e.success,

                        });
                    }
                    return window.location.href = '{{route("taxes.index")}}'

                }, error: function (e) {
                    let errors = e.responseJSON.errors;
                    for (let i = 0; i < Object.keys(errors).length; i++) {
                        $('#' + Object.keys(errors)[i]).addClass('rojo');
                    }
                    iziToast.warning({
                        icon: 'fa fa-exclamation-triangle',
                        timeout: 1000,
                        animateInside: true,
                        position: 'topRight',
                        message: [Object.values(errors)[0][0]],
                    });
                }
            });
            modal_lectura();
        })

        $(document).ready(function () {

            let y = window.innerHeight;
            var table = $('#tablaTasas').DataTable({
                scrollY: y / 2,
                "columns": [
                    {"orderable": true, "visible": true},
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

            $('#nuevaTasa').click(() => {
                return window.location.href = '{{route("taxes.create")}}'
            })
        });
    </script>

@stop
