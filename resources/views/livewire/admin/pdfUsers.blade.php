<html>

<head>
    <link href="{{ public_path('static/css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        {{-- <h1><span style="color:#177c67">SUTUT</span><span style="color:grey">SLRC</span></h1> --}}
        <h1><span style="color: grey;">SUTUTSLRC</span></h1>

    </header>

    <main>
        <div class="createdby">
            {{-- <img class="img-fluid" src="{{ asset('static/images/sututslrc.png') }}" width="150" height="150"
            alt=""> --}}
            <p>El documento fue creado por: <b> </b> el dia: </p>
        </div>

        <div class="container">
            <h2>Reporte de usuarios registrados</h2>
        </div>

        <table class="table text-center table-striped">
            <thead class="table-dark">
                <tr>
                    <td scope="col"><b>Nombre</b></td>
                    <td scope="col"><b>Apellido</b></td>
                    <td scope="col"><b>Correo</b></td>
                    <td scope="col"><b>Departamento</b></td>
                    <td scope="col"><b>Puesto</b></td>
                    <td scope="col"><b>Curp</b></td>
                    <td scope="col"><b>RFC</b></td>
                    <td scope="col"><b>Clave de Elector</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td scope="row">{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->departamento }}</td>
                        <td>{{ $usuario->puesto }}</td>
                        <td>{{ $usuario->curp }}</td>
                        <td>{{ $usuario->rfc }}</td>
                        <td>{{ $usuario->ine }}</td>
                        {{-- @if ($usuario->estado == 1)
                            <td><span class="badge badge-pill badge-success">Activo</span></td>
                        @elseif ($usuario->estado == 0)
                            <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                        @endif --}}

                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        <h3>sindicato.sututslrc.org</h3>
    </footer>
</body>

</html>
