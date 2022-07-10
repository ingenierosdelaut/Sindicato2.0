<div wire:init="cargando">

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>



    <!-- Page Content  -->
    <div>
        <div class="row mt-2">
            {{-- <div class="alert alert-info alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Info!</strong> En caso de querer buscar for fecha, se utilizara el mismo formato que
                aparece en la tabla. Ejemplo: 2022-07-06. Tambien se puede buscar por el dia o mes.
            </div> --}}
            <div class="col-4 mb-2">
                <div class="input-group mt-2">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                    <input wire:model="search" type="text" class="form-control" placeholder="Buscar">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col mb-1">
                <div class="float-left">
                    <a href="{{ route('admin.anuncio.pdf') }}" type="button" class="btn-sm btn-dark"><i
                            class="fa fa-file-pdf"></i> Generar
                        reporte</a>
                </div>
            </div>
            <div class="col mb-1">
                <div class="float-right">
                    <a href="{{ route('admin.anuncio-create') }}" type="button" class="btn-sm btn-success"><i
                            class="fa fa-plus-square"></i> Crear nuevo anuncio</a>
                </div>
            </div>

        </div>

        @if (count((array) $anuncios))
            <div class="row">
                <div class="col text-center">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <td scope="col">Título</td>
                                <td scope="col">Especificaciones</td>
                                <td scope="col">Publicado Por</td>
                                <td scope="col">Día en que se publicó</td>
                                <td scope="col">Estado</td>
                                <td scope="col">Acciones</td>
                            </tr>
                        </thead>
                        @foreach ($anuncios as $anuncio)
                            <tbody>
                                <tr>
                                    <td>{{ $anuncio->titulo }}</td>
                                    <td>{{ $anuncio->contenido }}</td>
                                    <td>{{ $anuncio->nombre }} {{ $anuncio->apellido }}</td>
                                    <td>{{ $anuncio->created_at }}</td>
                                    @if ($anuncio->estado == 1)
                                        <td><span class="badge badge-pill badge-success">Activo</span></td>
                                    @elseif ($anuncio->estado == 0)
                                        <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                    @endif
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-dismiss="modal" title="Eliminar anuncio"
                                            data-bs-target="#exampleModalAnuncioDel" data-backdrop="false"
                                            data-bs-whatever="@mdo"><i class="fa fa-trash"></i></button>
                                        <a href="{{ route('admin.anuncio-edit', $anuncio) }}" title="Editar anuncio"
                                            type="button" class="btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                        @if ($anuncio->estado == 1)
                                            <button wire:click="disable({{ $anuncio->id }})" type="button"
                                                title="Desactivar Anuncio" class="btn btn-sm btn-warning"><i
                                                    class="fa fa-ban"></i>
                                            </button>
                                        @elseif ($anuncio->estado == 0)
                                            <button wire:click="enable({{ $anuncio->id }})" type="button"
                                                title="Activar Anuncio" class="btn-sm btn btn-success"><i
                                                    class="fa fa-check"></i></button>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                @else
                    <table class="table table-striped">
                        <thead class="table-dark" style="text-aling-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Especificaciones</th>
                                <th scope="col">Publicado Por</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <th>No hay resultados</th>
                            <th>No hay resultados</th>
                            <th>No hay resultados</th>
                            <th>No hay resultados</th>
                            <th>No hay resultados</th>
                        </tbody>
                    </table>
        @endif
        {{ $cargado == true ? $anuncios->links() : null }}
    </div>

    <div wire:ignore.self class="modal" data-backdrop="static" id="exampleModalAnuncioDel" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <form wire:submit="delete">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Deseas eliminar este anuncio?</h5>
                        <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"
                            aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <h5><b>Titulo del anuncio</b></h5>
                                <p style="color: black">{{ $anuncio->titulo }}</p>

                                <h5><b>Contenido del anuncio</b></h5>
                                <p style="color: black">{{ $anuncio->contenido }}</p>

                                <h5><b>Imagen</b></h5>
                                @if ($anuncio->url_img)
                                    <img class="img-fluid rounded"
                                        src="{{ Storage::disk('public')->url($anuncio->url_img) }}" width="350"
                                        height="350"><br>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="delete({{ $anuncio->id }})" type="button"
                            class="btn btn-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
