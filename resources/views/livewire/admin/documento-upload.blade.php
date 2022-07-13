<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/anuncio-create.css') }}">
    </head>

    <div>
        <div>
            <form action="{{ route('fileUpload') }}" method="post" enctype="multipart/form-data">

                @csrf
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Selecciona el documento a subir</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col justify-content-start">
                                <p id="texto"><i class="fa fa-file-image"></i> Seleccionar archivo</p>
                                <input type="file" name="file">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col justify-content-start">
                                <button type="submit" name="submit" class="btn  btn-primary">
                                    Subir Documento
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

</div>
