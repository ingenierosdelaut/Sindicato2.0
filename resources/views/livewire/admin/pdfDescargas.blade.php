<html>

<head>
    <link href="{{ public_path('static/css/app.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <header>
        <img class="img-fluid" src='static/images/sututslrc.png' width="150" height="150"
            alt="">
        <h1><span style="color: black;">Sindicato Único de Trabajadores de la Universidad Tecnológica de SLRC</span></h1>
    </header>

    <main>
        <div class="createdby">
            <p>El documento fue creado por: <b> </b> el dia: </p>
        </div>

        <div class="container">
            <h2>Reporte de Descargas realizadas por los usuarios</h2>
        </div>

        <table class="table text-center table-striped">
            <thead class="table-dark">
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Documento</td>
                    <td>Fecha</td>
                    <td>Estado</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($descargas as $descarga)
                    <tr>
                        <td>{{ $descarga->id }}</td>
                        <td>{{ $descarga->nombre }} {{ $descarga->apellido }}</td>
                        <td>{{ $descarga->titulo }}</td>
                        <td>{{ $descarga->created_at }}</td>
                        @if ($descarga->estado == 0)
                            <td>Inactivo</td>
                        @else($descarga->estado == 1)
                            <td>Activo</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>

    <footer>

    </footer>
</body>

</html>
