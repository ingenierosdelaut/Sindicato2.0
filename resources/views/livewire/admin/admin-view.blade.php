<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('static/scss/style.scss') }}">
        <link rel="stylesheet" href="{{ asset('static/css/admin-view.css') }}">
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
                    <img class="img-fluid" src="{{ asset('static/images/sututslrc.png') }}" width="150"
                        height="150" alt="">
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
            <div class="grid" style="--bs-rows: 3; --bs-columns: 3;">
                <div class="g-start-2" style="grid-row: 2">
                    <div class="container contenedor">
                        @if (count((array) $anuncios))
                            <div class="jumbotron">
                                @if ($requests > 0)
                                    <div class="alert alert-info">
                                        <strong>¡¡Notificación!!</strong> Tienes {{ $requests }} Solicitud(es)
                                        por atender en estado pendiente
                                    </div>
                                @endif

                                <div>
                                    <a href="{{ route('admin.anuncio-create') }}"
                                        class="btn btn-sm btn-dark float-right"><i class="fa fa-circle-new"></i>
                                        Crear
                                        anuncio</a>
                                </div>
                                <br><br>
                                @foreach ($anuncios as $anuncio)
                                    <!--Anuncio-->
                                    @if ($anuncio->estado == 1)
                                        <div class="card">
                                            <div class="card-header">
                                                <b>{{ $anuncio->titulo }}</b>
                                            </div>

                                            <div class="card-body ">
                                                <div class="container">
                                                    <p>{{ $anuncio->contenido }}</p>
                                                    @if ($anuncio->url_img)
                                                        <img class="img-fluid rounded"
                                                            src="{{ Storage::disk('public')->url($anuncio->url_img) }}"
                                                            width="250" height="250"><br>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="card-footer h-10">
                                                <footer>
                                                    <a href="{{ route('admin.anuncio-edit', $anuncio) }}"><small
                                                            class="text-muted">Editar</a></small>
                                                    <a href="{{ route('admin.anuncio-delete', $anuncio) }}"><small
                                                            class="text-muted">Desactivar</a></small>
                                                    <small class="float-right text-muted muted"><b>Creado el dia
                                                            {{ $anuncio->created_at }} por
                                                            {{ $anuncio->nombre }}</b></a></small>
                                                </footer>
                                            </div>
                                        </div> <br>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <div class="jumbotron">
                                <div>
                                    <a href="{{ route('admin.anuncio-create') }}"
                                        class="btn btn-sm btn-dark float-right"><i class="fa fa-save"></i>
                                        Crear
                                        anuncio</a>
                                </div>
                                <h1>
                                    Sin anuncios por mostrar
                                </h1>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            {{ $cargado == true ? $anuncios->links() : null }}
        </div>

    </div>
