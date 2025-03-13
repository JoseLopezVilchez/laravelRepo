<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre', ($alumno->nombre ?? "")) }}">
</div>

<div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ old('apellidos', ($alumno->apellidos ?? "")) }}">
</div>

<div class="form-group">
    <label for="edad">Edad</label>
    <input type="number" class="form-control" name="edad" id="edad" value="{{ old('edad', ($alumno->edad ?? "")) }}">
</div>

<div class="form-group">
    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" name="direccion" id="direccion" value="{{ old('direccion', ($alumno->direccion ?? "")) }}">
</div>

<div class="form-group">
    <label for="fechaNac">Fecha de nacimiento</label>
    <input type="date" class="form-control" name="fechaNac" id="fechaNac" value="{{ old('fechaNac', ($alumno->birth_date ?? "")) }}">
</div>

<div class="form-group">
    @isset($alumno->image)
        <img class="img-thumbnail img-fluid" src="{{ asset('storage/' . $alumno->image) }}" height="100px">
    @endisset
</div>

<div class="form-group">
    <label for="image">Foto del alumno</label>
    <input type="file" class="form-control" name="image" id="image">
</div>

<div class="row justify-content-between">
    <a href="{{ route('alumno.index') }}" class="btn btn-secondary col-sm-2 mt-3 mb-3">Volver al listado</a>
    <button id="submitBtn" type="submit" class="btn btn-success col-sm-2 mt-3 mb-3">{{ $modo }} alumno</button>
</div>