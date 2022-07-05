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

    <div class="container">
        <form wire:submit.prevent="crear">
            <div class="card request mx-auto w-50 mt-3">
                <h5 class="card-header text-center">
                    Solicitud Día Económico
                </h5>
                <div class="card-body col-6 mx-auto">
                    @include('livewire.requests.formulario')
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                </div>
            </div>
        </form>
    </div>


    <div class="container">
        @if (count((array) $requests))
            <div>
                <h2>Mis solicitudes realizadas</h2>
            </div>
            <table class="table text-center">
                <thead class="table-dark">
                    <tr>
                        <td scope="col">ID</td>
                        <td scope="col">Fecha Solicitada</td>
                        <td scope="col">Dia en que se solicitó</td>
                        <td scope="col">Estado</td>
                        <td>Opciones</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($requests as $request)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $request->fecha }}</td>
                            <td>{{ $request->created_at }}</td>
                            @if ($request->estado == null)
                                <td><span class="badge badge-pill badge-warning">Pendiente</span></td>
                            @elseif ($request->estado == 1)
                                <td><span class="badge badge-pill badge-success">Acceptada</span></td>
                            @else
                                <td><span class="badge badge-pill badge-warning">Denegada</span></td>
                            @endif
                            <td>
                                <a href="{{ route('requests.delete', $request) }}" title="Eliminar Solicitud"
                                    class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
        <div>
            {{ $requests->links() }}
        </div>
    </div>

</div>
