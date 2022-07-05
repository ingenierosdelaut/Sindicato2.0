<div>
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

    <div class="container-fluid">
        <h3 class="pt-4 pb-2">Formatos</h3>

        <div class="row">
            @foreach ($documentos as $documento)
                <div class="col-sm-4">
                    <div class="card text-dark bg-light mb-3" style="max-width: 25rem; height: 10rem;">
                        <div class="card-body text-center" style="margin-top: 25px;">
                            <h5 class="card-title">{{ $documento->titulo }}</h5>
                            <button wire:click="descarga({{ $documento->id }})" type="button"
                                class="btn btn-primary"><i class="glyphicon glyphicon-download">Descargar</i></button>
                            <button wire:click="vista({{ $documento->id }})" type="button" class="btn btn-info"><i
                                    class="glyphicon glyphicon-download">Vista previa</i></button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
