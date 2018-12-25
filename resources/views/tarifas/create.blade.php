@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Nueva Tarifa</h1>
@stop

@section ('css')
    <style>
        .rojo {
            border: 1px solid red !important;
        }

        button.btn-sm {
            margin: 25px !important;
        }
    </style>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ui form">
                        <div class="fields">
                            <input id="id" type="hidden" value="">
                            <div class="eight wide field">
                                <label>Nombre:</label>
                                <input id="nombre" name="nombre" type="text"
                                       value="{{ old('nombre') }}"
                                       placeholder="Nombre de la Categoría">
                            </div>
                            <div class="eight wide field">
                                <label>Precio:</label>
                                <input id="precio" name="precio" type="text"
                                       value="{{ old('precio') }}"
                                       placeholder="Precio por hora de la tarifa">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label>Descripción:</label>
                                <textarea id="descripcion" name="descripcion"
                                          rows="15"
                                          {{old('descripcion')}}
                                          maxlength="1000"
                                          placeholder="Descripción de la Tarifa  "
                                          style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="ui one column stackable center aligned page grid">
                            <div class="column twelve wide">
                                <button data-toggle="tooltip" title="Borrar todos los campos" id="reset"
                                        class="btn-sm btn-primary">
                                    Limpiar <i class="undo icon big"></i>
                                </button>
                                <button data-toggle="tooltip" title="Guardar tarifa" id="guardar"
                                        class="btn-sm btn-success">
                                    Guardar <i class="check icon big"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function () {
            $("#guardar").click(function (e) {
                e.preventDefault();
                $('input').removeClass('rojo');
                var id = $("#id").val();
                var nombre = $("#nombre").val();
                var precio = $("#precio").val();
                var descripcion = $("#descripcion").val();

                $.ajax({
                    url: "{{route('rates.store')}}",
                    method: "post",
                    data: {
                        id: id,
                        nombre: nombre,
                        precio_hora: precio,
                        descripcion: descripcion,
                    },
                    success: function (datos) {
                        iziToast.success({
                            icon: 'fa fa-check',
                            position: 'topRight',
                            animateInside: true,
                            message: datos.success,
                        });
                        setTimeout(() => {
                            return window.location.href = '{{route("rates.index")}}'
                        }, 500);

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
            });

            $("#reset").click(function (e) {
                e.preventDefault();
                $('input').removeClass('rojo');
                $("#id").val("");
                $("#nombre").val("");
                $("#precio").val("");
                $("#decripcion").val("");
            })
        });
    </script>
@stop
