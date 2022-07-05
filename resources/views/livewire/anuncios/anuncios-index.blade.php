<div>

    <head>

        <link rel="stylesheet" href="{{ asset('static/css/admin-view.css') }}">
    </head>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('anuncios.index') }}">
            <img src="{{ asset('static/images/sututslrc.png') }}" width="50" height="50" alt="logo">
        </a>
        <h6 style="margin: 5px" href="{{ route('anuncios.index') }}"><span style="color:#177c67">SUTUT</span><span
                style="color:grey">SLRC</span></h6>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{ route('requests.create') }}">Solicitud</a>
                <a class="nav-item nav-link" href="{{ route('documentos.index') }}">Documentos</a>
                <div style="margin-left: 975px;">
                    @livewire('iniciar-sesion.logout')
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <div class="grid" style="--bs-rows: 3; --bs-columns: 3;">
            <div class="g-start-2" style="grid-row: 2">
                <div class="container contenedor">

                    @if (count((array) $anuncios))

                        <div class="jumbotron">
                            @foreach ($anuncios as $anuncio)
                                <!--Anuncio-->
                                <div class="card">
                                    <div class="card-header"><b>{{ $anuncio->titulo }}</b>
                                    </div>

                                    <div class="card-body ">
                                        <div class="container">
                                            <p>{{ $anuncio->contenido }}</p>
                                            @if ($anuncio->url_img)
                                                <img class="img-fluid rounded" src="{{ Storage::disk('public')->url($anuncio->url_img) }}"
                                                    width="350" height="350"><br>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-footer h-10">
                                        <footer>
                                            <small class="float-right text-muted muted"><b>Creado el dia
                                                    {{ $anuncio->created_at }} por
                                                    {{ $anuncio->nombre }}</b></a></small>
                                        </footer>
                                    </div>
                                </div><br>
                            @endforeach
                        </div>
                    @else
                        <div class="jumbotron">
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
