@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Nuevo Cliente</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <form action="">
                        <div class="ui form">
                            <div class="fields">
                                <input id="id" type="hidden" value="">
                                <div class="three wide field">
                                    <label>CIF/NIF:</label>
                                    <input id="identificacion_fiscal" name="identificacion_fiscal" type="text"
                                           value=""
                                           placeholder="CIF/NIF">
                                </div>
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
                            </div>
                            <div class="fields">
                                <div class="eight wide field">
                                    <label>Dirección:</label>
                                    <input id="direccion" name="direccion" type="text" value=""
                                           placeholder="Dirección">
                                </div>
                                <div class="three wide field">
                                    <label>Municipio:</label>
                                    <input id="municipio" name="municipio" type="text" value=""
                                           placeholder="Municipio">
                                </div>
                                <div class="three wide field">
                                    <label>C.P.:</label>
                                    <input id="cp" name="cp" type="text" value="" placeholder="Código postal">
                                </div>
                                <div class="three wide field">
                                    <label>Provincia:</label>
                                    <input id="provincia" name="provincia" type="text" value=""
                                           placeholder="Provincia">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="two wide field">
                                    <label class="error">Teléfono:</label>
                                    <input id="telefono" name="telefono" type="text" value=""
                                           placeholder="Teléfono">
                                </div>
                                <div class="two wide field">
                                    <label class="error">Móvil:</label>
                                    <input id="movil" name="movil" type="text" value="" placeholder="Móvil">
                                </div>
                                <div class="two wide field">
                                    <label>Fax:</label>
                                    <input id="fax" name="fax" type="text" value="" placeholder="Fax">
                                </div>
                                <div class="six wide field">
                                    <label>E-mail:</label>
                                    <input id="email" name="email" type="email" value="" placeholder="E-mail">
                                </div>
                                <div class="six wide field">
                                    <label>Web:</label>
                                    <input id="web" name="web" type="text" value="" placeholder="Web">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="eight wide field">
                                    <label>Banco:</label>
                                    <input id="banco" name="banco" type="text" value="" placeholder="Banco">
                                </div>
                                <div class="eight wide field">
                                    <label>IBAN:</label>
                                    <input id="iban" name="iban" type="text" value="" placeholder="IBAN">
                                </div>
                            </div>
                            <div class="fields">
                                <div class="sixteen wide field">
                                    <label>Observaciones:</label>
                                    <textarea id="observaciones" name="observaciones"
                                              rows="5"
                                              placeholder="Observaciones"
                                              style="resize: none;"></textarea>
                                </div>
                            </div>
                            <button class="ui right floated button" type="submit"> Guardar</button>
                            <button class="ui right floated button" type="reset"> Limpiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    </div>
@stop
