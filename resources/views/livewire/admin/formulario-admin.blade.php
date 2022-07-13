<div class="container">

    <form class="form">
        <div class="row g-2">
            <div class="col">
                <label style="color: black" for="">Nombre</label>
                <input class="form-control" type="text" style="color: black" wire:model="usuario.nombre"
                    placeholder="Nombre">
                @error('usuario.nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Apellido</label>
                <input class="form-control" style="color: black" wire:model="usuario.apellido" placeholder="Apellido"
                    type="text">
                @error('usuario.apellido')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="row mt-1">
            <div class="col-6">
                <label style="color: black" for="">Correo</label>
                <input class="form-control" style="color: black" wire:model="usuario.email"
                    placeholder="Ejemplo@hotmail.com" type="text" placeholder="Correo: ejemplo@hotmail.com">
                @error('usuario.email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row g-2 mt-1">
            <div class="col">
                <label style="color: black" for="">Departamento</label>
                <select style="color: black" class="relieve-options" wire:model="usuario.departamento"
                    name="departamento">
                    <option>Departamento</option>
                    <option value="Tecnologias de la Información">Tecnologias de la infomación</option>
                    <option value="Operaciones Comerciales">Operaciones comerciales internacionales</option>
                    <option value="Mecatrónica">Mecatrónica</option>
                    <option value="Desarrollo de negocios">Desarrollo de Negocios</option>
                    <option value="Procesos Alimentarios">Procesos Alimentarios</option>
                    <option value="Mantenimiento Industrial">Mantenimiento Industrial</option>
                </select>
                @error('usuario.departamento')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Puesto</label>
                <select style="color: black" class="relieve-options" wire:model="usuario.puesto" name="puesto"
                    aria-placeholder="Elegir">
                    <option>Puesto</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Docente">Docente</option>
                </select>
                @error('usuario.puesto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col">
                <label style="color: black" for="">Telefono</label>
                <input class="form-control" style="color: black" wire:model="usuario.telefono" type="text"
                    placeholder="Teléfono, Ejemplo: 6531506589">
                @error('usuario.telefono')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label style="color: black" for="">CURP</label>
                <input class="form-control" wire:model="usuario.curp" type="text"
                    style="color: black; text-transform:uppercase;" placeholder=" CURP, Ejemplo: MAAA991217HSRRML06">
                @error('usuario.curp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">RFC</label>
                <input class="form-control" wire:model="usuario.rfc" type="text"
                    style="color: black; text-transform:uppercase;" placeholder="RFC, Ejemplo: MAAA991217HSRRML06">
                @error('usuario.rfc')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row g-3 mt-1">
            <div class="col">
                <label style="color: black" for="">Clave de Elector</label>
                <input class="form-control" wire:model="usuario.ine" type="text"
                    style="color: black; text-transform:uppercase;" placeholder="Clave de Elector">
                @error('usuario.ine')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Fecha de ingreso</label>
                <input class="form-control" style="color: black" wire:model="usuario.fecha_ingreso" type="date"
                    class="textbox-n" onblur="(this.type='text')" onfocus="(this.type='date')"
                    placeholder=" Fecha de Ingreso Ejemplo: 05/05/2020" id="date">
                @error('usuario.fecha_ingreso')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label style="color: black" for="">Fecha de afiliación</label>
                <input class="form-control" style="color: black" wire:model="usuario.fecha_afiliacion" type="date"
                    placeholder="Fecha de Afiliación, Ejemplo: 20/05/2020" class="textbox-n"
                    onfocus="(this.type='date')" onblur="(this.type='text')">
                @error('usuario.fecha_afiliacion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mt-1 g-2">
            <div class="col">
                <label style="color: black" for="">Contraseña</label>
                <input wire:model="password" class="form-control" type="password" placeholder="Contraseña">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label style="color: black" for="">Confirmar Contraseña</label>
                <input wire:model="confirm_password" class="form-control" type="password"
                    placeholder="Confirmar Contraseña">
                @error('confirm_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </form>



</div>
