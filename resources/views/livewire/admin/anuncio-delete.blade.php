<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/style.css') }}">
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
            <div class="mx-auto text-center card" style="width: 45rem;">
                <div class="card-header">
                    <h1>¿Quieres eliminar este anuncio?</h2>
                </div>
                <div class="card-body">
                    <h2 for="">Titulo:</h2>
                    <p style="color: black">{{ $anuncio->titulo }}</p>
                        <h2 for="">Contenido:</h2>
                        <p style="color: black">{{ $anuncio->contenido }}</p>
                        <p>Imagen que subio con el anuncio:</p>
                        <img class="img-fluid" width="350" height="350"
                            src="{{ Storage::disk('public')->url($anuncio->url_img != null ? $anuncio->url_img : 'images/anuncios/anuncio.jpg') }}"
                            class="card-img-top" alt="">
                </div>
                <div class="card-footer">
                    <button wire:click="delete" type="button" style="background-color: #0c8461" class="float-right btn btn-info btn-sm">Confirmar</button>
                    <a href="{{ route('admin.anuncios') }}" class="float-left btn btn-danger btn-sm">Cancelar</a>
                </div>
            </div>
        </div>
    </div>

</div>
