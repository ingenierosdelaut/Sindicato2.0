<div wire:init="cargando">

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" style="color: #0c8461" class="btn btn-primary">
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
            <div class="container cont-solicitud">
                <br><br>

                @if (count((array) $requests))
                    <div class="row">
                        <div class="col text-center">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        {{-- <td scope="col">#ID</td> --}}
                                        <td scope="col">Nombre</td>
                                        <td scope="col">Estado</td>
                                        <td scope="col">Fecha en que se Solicito</td>
                                        <td scope="col">Motivo</td>
                                        <td scope="col">Acciones</td>
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
                                                <td><span class="badge badge-pill badge-success">Aceptada</span></td>
                                            @elseif ($request->estado == 2)
                                                <td><span class="badge badge-pill badge-danger">Denegada</span></td>
                                            @endif
                                            <!--Fecha-->
                                            <td>{{ $request->created_at }}</td>
                                            <!--Motivo-->
                                            @if ($request->motivo != null)
                                                <td>{{$request->motivo}}</td>
                                            @elseif ($request->estado == 0)
                                                <td>Acciones por realizar</td>
                                            @else
                                                <td>Cumplio con los requisitos</td>
                                            @endif
                                            <!--Acciones-->
                                            @if ($request->estado == 0)
                                                <td>
                                                    <button wire:click="aceptar({{ $request->id }})" type="button"
                                                        class="btn btn-sm btn-success">Aceptar</button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal" data-dismiss="modal"
                                                        data-bs-target="#exampleModal{{ $request->id }}"
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
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"
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
                                                                    <input style="color: white"
                                                                        wire:model="request.motivo"
                                                                        placeholder="Ejemplo: De denego porque..."
                                                                        type="text" class="form-control">
                                                                    @error('request.motivo')
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button wire:click="motivo({{ $request->id }})"
                                                                type="button" class="btn btn-success">Enviar</button>
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

                @endif
            </div>
        </div>
