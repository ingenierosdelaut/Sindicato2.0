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
            <h2>Lista de Anuncios</h2>
        </div>


        <table class="table table-striped">
            <thead class="table-dark" style="text-aling-center">
                <tr>
                    <td scope="col">#</td>
                    <td scope="col">Título</td>
                    <td scope="col">Especificaciones</td>
                    <td scope="col">Publicado Por</td>
                    <td scope='col'>Se Publicó El Día</td>
                </tr>
            </thead>
            @foreach ($anuncios as $anuncio)
                <tbody>

                    <tr>
                        <td scope="row">{{ $anuncio->id }}</td>
                        <td>{{ $anuncio->titulo }}</td>
                        <td>{{ $anuncio->contenido }}</td>
                        <td>{{ $anuncio->nombre }} {{ $anuncio->apellido }}</td>
                        <td>{{ $anuncio->created_at }}</td>
                    </tr>

                </tbody>
            @endforeach
        </table>
    </main>

    <footer>
        <h3>sindicato.sututslrc.org</h3>
    </footer>
</body>

</html>
