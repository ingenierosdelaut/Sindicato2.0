<div>

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
            <div class="row">
                <div class="col mb-1">
                    <div class="float-right">
                        <a href="{{ route('admin.documento-create') }}" type="button" class="btn-sm btn-success"><i
                                class="fa fa-plus-square"></i> Subir nuevo documento</a>

                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                            data-dismiss="modal" data-bs-target="#Modaldoc" data-backdrop="false"
                            data-bs-whatever="@mdo"><i class="fa fa-plus-square"></i> Subir Nuevo Documento</button>
                    </div>
                </div>
            </div>

            @if (count((array) $documentos))
                <div class="row">
                    <div class="col text-center">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <td scope="col">TITULO</td>
                                    <td scope="col">CUANDO FUE SUBIDO</td>
                                    <td scope="col">ACCIONES</td>
                                </tr>
                            </thead>
                            @foreach ($documentos as $documento)
                                <tbody>
                                    <tr>
                                        <td>{{ $documento->titulo }}</td>
                                        <td>{{ $documento->created_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-dismiss="modal" data-bs-target="#exampleModal"
                                                data-backdrop="false" data-bs-whatever="@mdo"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>

                    </div>
                    {{ $cargado == true ? $documentos->links() : null }}
                @else
                    <div class="container text-center">
                        <div class="row">
                            <div class="col mb-1">
                                <div class="jumbotron">
                                    <h2>No hay resultados por mostrar</h2>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif
        </div>
        <!--Modal-->
        <div wire:ignore.self class="modal" data-backdrop="static" id="exampleModal" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <form wire:submit="motivo">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Deseas eliminar este documento?</h5>
                            <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"
                                aria-label="Close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <h2>Titulo del documento</h2>
                                    <p style="color: black">{{ $documento->titulo }}</p>

                                    <h2>Dia en que se subio el documento</h2>
                                    <p style="color: black">{{ $documento->created_at }}</p>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button wire:click="delete({{ $documento->id }})" type="button"
                                class="btn btn-success">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div wire:ignore.self class="modal" data-backdrop="static" id="Modaldoc" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <form action="{{ route('fileUpload') }}" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Deseas eliminar este anuncio?</h5>
                            <button type="button" class="btn-sm btn-close" data-bs-dismiss="modal"
                                aria-label="Close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    @include('livewire.admin.documento-upload')

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
