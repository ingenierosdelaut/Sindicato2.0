<div wire:init="cargando">

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>



    <!-- Page Content  -->
    <div>
        <div class="row g-2">
            <div class="col-4 mb-2">
                <div class="input-group ">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                    <input wire:model="search" type="text" class="form-control" placeholder="Buscar">
                </div>
            </div>
            <div class="col mt-2">
                <a href="{{ route('admin.solicitudes.pdf') }}" type="button"
                    title="Generar PDF de las solicitudes realizadas" class="float-right btn-sm btn btn-dark"><i
                        class="fa fa-file-pdf"></i> Generar reporte</a>
            </div>
        </div>

        @if (count((array) $requests))
            <div class="row">
                <div class="col text-center">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                {{-- <td scope="col">#ID</td> --}}
                                <th scope="col">Nombre</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha en que se Solicito</th>
                                <th scope="col">Fecha solicitada</th>
                                <th scope="col">Motivo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr>
                                    <!--ID-->
                                    {{-- <td scope="row">{{ $request->id }}</td> --}}
                                    <!--Nombre-->
                                    <td>{{ $request->nombre }} {{ $request->apellido }}</td>
                                    <!--Estado-->
                                    @if ($request->estado == 0)
                                        <td><span class="badge badge-pill badge-warning">Pendiente</span></td>
                                    @elseif ($request->estado == 1)
                                        <td><span style="background-color: #0c8461"
                                                class="badge badge-pill badge-success">Aceptada</span></td>
                                    @elseif ($request->estado == 2)
                                        <td><span class="badge badge-pill badge-danger">Denegada</span></td>
                                    @endif
                                    <!--Fecha en que se solicito-->
                                    <td>{{ $request->created_at }}</td>
                                    <!--Fecha solicitada-->
                                    <td>{{ $request->fecha }}</td>
                                    <!--Motivo-->
                                    @if ($request->motivo != null)
                                        <td>{{ $request->motivo }}</td>
                                    @elseif ($request->estado == 0)
                                        <td>Acciones por realizar</td>
                                    @else
                                        <td>Cumplio con los requisitos</td>
                                    @endif
                                    <!--Acciones-->
                                    @if ($request->estado == 0)
                                        <td>
                                            <button wire:click="aceptar({{ $request->id }})"
                                                style="background-color: #0c8461" type="button"
                                                class="btn btn-sm btn-success">Aceptar</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-dismiss="modal" data-bs-target="#exampleModal{{ $request->id }}"
                                                data-backdrop="false" data-bs-whatever="@mdo">Denegar</button>
                                        </td>
                                    @elseif ($request->estado != 0)
                                        <td>Sin acciones</td>
                                    @else
                                        <td></td>
                                    @endif

                                </tr>

                                <div wire:ignore.self class="modal" data-backdrop="static"
                                    id="exampleModal{{ $request->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog UpdatePanel">
                                        <div class="modal-content">
                                            <form wire:submit="motivo">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-center" id="exampleModalLabel">
                                                        Escribir el motivo por el cual se denego
                                                        la solicitud</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3>Solicitante:</h3>
                                                    <p style="color: black"><b>{{ $request->nombre }}
                                                            {{ $request->apellido }}</b> para el dia
                                                        <b>{{ $request->fecha }}</b>
                                                    </p>
                                                    <form>
                                                        <div class="mb-3">
                                                            <label style="color: black" for="recipient-name"
                                                                class="col-form-label">Especificaciones:</label>
                                                            <input style="color: white" wire:model="request.motivo"
                                                                placeholder="Ejemplo: De denego porque..."
                                                                type="text" class="form-control">
                                                            @error('request.motivo')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    @if ($request->motivo)
                                                    @else
                                                        <button wire:click="motivo({{ $request->id }})"
                                                            type="button" class="btn btn-success">Enviar</button>
                                                    @endif

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $cargado == true ? $requests->links() : null }}
        @endif

    </div>
</div>
