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

    <div class="container mt-3">
        <form wire:submit.prevent="editpwd">
            <div class="card">
                <h5 class="card-header text-center">
                    Información del usuario
                </h5>
                <h5 class="container">En este apartado podras visualizar tus datos personales, y solo podras modificar tu contraseña en caso de ser necesario. Si tu información esta incorrecta comunicate con el administrador de la página.</h5>
                <div class="card-body ">
                    @include('livewire.admin.formulario-pwd')
                </div>
                <div class="card-footer text-center">
                    <button type="submit" style="background-color: #0c8461" class="btn btn-success btn-sm">Guardar</button>
                </div>
            </div>
        </form>
    </div>

</div>
