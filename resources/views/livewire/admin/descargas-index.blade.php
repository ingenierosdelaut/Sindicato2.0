<div wire:init='cargando'>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>
    <div class="row">
        <div class="col-4 mb-2">
            <div class="input-group ">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
                <input wire:model="search" type="text" class="form-control" placeholder="Buscar">
            </div>
        </div>

        <div class="col mt-2">
            <a href="{{ route('admin.descargas.pdf') }}" type="button"
                title="Genera un documento PDF con todos las descargas realizadas por los usuarios"
                class="mr-1 float-right btn-sm btn btn-dark"><i class="fa fa-file-pdf"></i> Generar reporte</a>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            @if (count((array) $descargas))
                <table class="table table-striped">
                    <thead class="table-dark ">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($descargas as $descarga)
                            <tr>
                                <td>{{ $descarga->id }}</td>
                                <td>{{ $descarga->nombre }} {{ $descarga->apellido }}</td>
                                <td>{{ $descarga->titulo }}</td>
                                <td>{{ $descarga->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
            @endif
            </table>
        </div>
    </div>
    {{ $cargado == true ? $descargas->links() : null }}
</div>
