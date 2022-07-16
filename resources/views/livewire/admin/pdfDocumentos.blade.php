<html>

<head>
    <link href="{{ public_path('static/css/app.css') }}" rel="stylesheet" type="text/css">
</head>


<body>
    <header>
        <h1><span style="color: grey;">SUTUTSLRC</span></h1>
    </header>

    <main>
        <div class="createdby">
            <p>El documento fue creado por: <b> </b> el dia: </p>
        </div>

        <div class="container">
            {{-- <img src="{{ asset('static/images/sututslrc.png') }}" width="150" height="150" alt=""> --}}
            <h2>Lista de Documentos descargados</h2>
        </div>


        <table class="table table-striped">
            <thead class="table-dark" style="text-aling-center">
                <tr>
                    <td scope="col">Título </td>
                    <td scope="col">Se subio</td>
                    <td scope="col">Estado</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($documentos as $documento)
                    <tr>
                        <td>{{ $documento->titulo }}</td>
                        <td>{{ $documento->created_at }}</td>
                        @if ($documento->estado == 1)
                            <td><span class="badge badge-pill badge-success">Activo</span></td>
                        @else
                            <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                        @endif
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
