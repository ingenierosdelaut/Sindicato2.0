<div>

    <head>
        <link rel="stylesheet" href="{{ asset('static/css/inputs.css') }}">
    </head>

    <div>
        <form wire:submit.prevent="editarAdmin">
            <div class="card">
                <div class="card-header">
                    <h3>Editar información</h3>
                </div>
                <div class="card-body">
                    @include('livewire.admin.formulario-admin')
                </div>
                <div class="card-footer">
                    <button type="submit" style="background-color: #177c67" class="float-right btn btn-success">Guardar</button>
                    <a class="btn btn-dark" href="{{route('admin.anuncios')}}">Regresar</a>
                </div>
            </div>
        </form>
    </div>
</div>
