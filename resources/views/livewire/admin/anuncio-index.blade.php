<div wire:init="cargando">

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" style="color: #0c8461" class="btn btn-primary"><i
                        class="fa fa-arrow"></i>
                </button>
            </div>
            <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
                <div class="user-logo">
                    <img src="{{ asset('static/images/sututslrc.png') }}" width="150" height="150"
                        alt="">
                    <h3><span style="color:#177c67">SUTUT</span><span style="color:grey">SLRC</span></h3>
                </div>
            </div>
            <ul class="list-unstyled components mb-5">
                <li>
                    <input wire:model="search" class="form-control search" placeholder="Buscar">
                    <svg xmlns="http://www.w3.org/2000/svg" class="input-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </li>
                <li class="active">
                    <a href="{{ route('admin.view') }}"><span class="fa fa-home mr-3"></span> Home</a>
                </li>
                <li>
                    <a href="{{ route('admin.usuarios') }}"><span class="fa fa-users mr-3 notif"></span>Usuarios</a>
                </li>
                <li>
                    <a href="{{ route('admin.anuncios') }}"><span class="fa fa-newspaper mr-3"></span> Anuncios</a>
                </li>
                <li>
                    <a href="{{ route('admin.solicitudes') }}"><span class="fa fa-tags mr-3"></span> Solicitudes</a>
                </li>
                <li>
                    <a href="{{ route('admin.documentos-index') }}"><span class="fa fa-file mr-3"></span>
                        Documentos</a>
                </li>
                <li>
                    <div>
                        @livewire('iniciar-sesion.logout')
                    </div>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="container cont-anuncio-index">
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
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal" data-dismiss="modal" title="Eliminar anuncio"
                                                    data-bs-target="#exampleModal" data-backdrop="false"
                                                    data-bs-whatever="@mdo"><i class="fa fa-trash"></i></button>
                                                <a href="{{ route('admin.anuncio-edit', $anuncio) }}"
                                                    title="Editar anuncio" type="button" class="btn-sm btn-info"><i
                                                        class="fa fa-edit"></i></a>
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
        </div>

        <div wire:ignore.self class="modal" data-backdrop="static" id="exampleModal" tabindex="-1"
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
                                            src="{{ Storage::disk('public')->url($anuncio->url_img) }}"
                                            width="350" height="350"><br>
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
