<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/anuncio-create.css') }}">
    </head>

    <div id="content" class="p-4 p-md-5 pt-5">
        <div>
            <form action="{{ route('fileUpload') }}" method="post" enctype="multipart/form-data">
                <h3 class="text-center mb-5">Subir Documentos</h3>
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

                <div class="row">
                    <div class="col-2 mb-3" id="input-file">
                        <p id="texto"><i class="fa fa-file-image"></i> Seleccionar archivo</p>
                        <input type="file" type="file" id="imagen" name="file">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <button type="submit" name="submit" class="btn  btn-primary">
                            Subir Documento
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

</div>
