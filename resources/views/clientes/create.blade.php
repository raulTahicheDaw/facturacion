@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Nuevo Cliente</h1>
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
                            <div class="two wide field">
                                <label>CIF/NIF:</label>
                                <input id="identificacion_fiscal" name="identificacion_fiscal" type="text"
                                       value="{{ old('identificacion_fiscal') }}" maxlength="20"
                                       placeholder="CIF/NIF">
                            </div>
                            <div class="five wide field">
                                <label>Nombre (*):</label>
                                <input required class="field" id="nombre" name="nombre" type="text"
                                       value="{{old('nombre')}}"
                                       placeholder="Nombre" maxlength="50">
                            </div>
                            <div class="five wide field">
                                <label>Nombre comercial:</label>
                                <input class="field" id="nombre_comercial" name="nombre_comercial" type="text"
                                       value="{{old('nombre_comercial')}}"
                                       placeholder="Nombre comercial" maxlength="50">
                            </div>
                            <div class="five wide field">
                                <label>Contacto</label>
                                <input id="contacto" name="contacto" type="text" value="{{old('contacto')}}"
                                       placeholder="Persona de contacto">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Dirección (*):</label>
                                <input required id="direccion" name="direccion" type="text" value="{{old('direccion')}}"
                                       placeholder="Dirección" maxlength="150">
                            </div>
                            <div class="three wide field">
                                <label>Municipio:</label>
                                <input id="municipio" name="municipio" type="text" value="{{old('municipio')}}"
                                       placeholder="Municipio" maxlength="50">
                            </div>
                            <div class="three wide field">
                                <label>C.P.:</label>
                                <input id="cp" name="cp" type="text" value="{{old('codigo_postal')}}" maxlength="10"
                                       placeholder="Código postal">
                            </div>
                            <div class="three wide field">
                                <label>Provincia:</label>
                                <input id="provincia" name="provincia" type="text" value="{{old('provincia')}}"
                                       placeholder="Provincia" maxlength="50">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="two wide field">
                                <label>Teléfono:</label>
                                <input id="telefono" name="telefono" type="text" value="{{old('telefono')}}"
                                       placeholder="Teléfono" maxlength="50">
                            </div>
                            <div class="two wide field">
                                <label>Móvil:</label>
                                <input id="movil" name="movil" type="text" value="{{old('movil')}}" maxlength="50"
                                       placeholder="Móvil">
                            </div>
                            <div class="two wide field">
                                <label>Fax:</label>
                                <input id="fax" name="fax" type="text" value="{{old('fax')}}" maxlength="50"
                                       placeholder="Fax">
                            </div>
                            <div class="six wide field">
                                <label>E-mail:</label>
                                <input id="email" name="email" type="email" value="{{old('email')}}" maxlength="50"
                                       placeholder="E-mail">
                            </div>
                            <div class="six wide field">
                                <label>Web:</label>
                                <input id="web" name="web" type="text" value="{{old('web')}}" maxlength="50"
                                       placeholder="Web">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Banco:</label>
                                <input id="banco" name="banco" type="text" value="{{old('banco')}}" maxlength="50"
                                       placeholder="Banco">
                            </div>
                            <div class="eight wide field">
                                <label>IBAN:</label>
                                <input id="iban" name="iban" type="text" value="{{old('cuenta_bancaria')}}"
                                       maxlength="50" placeholder="IBAN">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label>Observaciones:</label>
                                <textarea id="observaciones" name="observaciones"
                                          rows="5"
                                          {{old('observaciones')}}
                                          maxlength="1000"
                                          placeholder="Observaciones"
                                          style="resize: none;"></textarea>
                            </div>
                        </div>
                        <div class="ui one column stackable center aligned page grid">
                            <div class="column twelve wide">
                                <button data-toggle="tooltip" title="Borrar todos los campos" id="reset"
                                        class="btn-sm btn-primary">
                                    Limpiar <i class="undo icon big"></i>
                                </button>
                                <button data-toggle="tooltip" title="Guardar cliente" id="guardar"
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
                var cif = $("#identificacion_fiscal").val();
                var nombre = $("#nombre").val();
                var nombre_comercial = $("#nombre_comercial").val();
                var contacto = $("#contacto").val();
                var direccion = $("#direccion").val();
                var municipio = $("#municipio").val();
                var cp = $("#cp").val();
                var provincia = $("#provincia").val();
                var telefono = $("#telefono").val();
                var movil = $("#movil").val();
                var fax = $("#fax").val();
                var iban = $("#iban").val();
                var banco = $("#banco").val();
                var email = $("#email").val();
                var web = $("#web").val();
                var observaciones = $("#observaciones").val();
                $.ajax({
                    url: "{{route('clients.store')}}",
                    method: "post",
                    data: {
                        id: id,
                        identificacion_fiscal: cif,
                        nombre: nombre,
                        nombre_comercial: nombre_comercial,
                        contacto: contacto,
                        direccion: direccion,
                        municipio: municipio,
                        codigo_postal: cp,
                        provincia: provincia,
                        telefono: telefono,
                        movil: movil,
                        fax: fax,
                        cuenta_bancaria: iban,
                        banco: banco,
                        email: email,
                        web: web,
                        observaciones: observaciones,
                    },
                    success: function (datos) {
                        iziToast.success({
                            icon: 'fa fa-check',
                            position: 'topRight',
                            animateInside: true,
                            message: datos.success,
                        });
                        setTimeout(() => {
                            return window.location.href = '{{route("clients.index")}}'
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
                $("#identificacion_fiscal").val("");
                $("#nombre").val("");
                $("#nombre_comercial").val("");
                $("#contacto").val("");
                $("#direccion").val("");
                $("#municipio").val("");
                $("#cp").val("");
                $("#provincia").val("");
                $("#telefono").val("");
                $("#movil").val("");
                $("#fax").val("");
                $("#iban").val("");
                $("#banco").val("");
                $("#email").val("");
                $("#web").val("");
                $("#observaciones").val("");
            })
        });

    </script>
@stop
