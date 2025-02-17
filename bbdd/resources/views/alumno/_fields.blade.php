<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $alumno->nombre ?? "") }}">
</div>

<div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos', $alumno->apellidos) }}">
</div>

<div class="form-group">
    <label for="edad">Edad</label>
    <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad', $alumno->edad) }}">
</div>

<div class="form-group">
    <label for="direccion">Direccion</label>
    <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $alumno->direccion) }}">
</div>

<div class="form-group">
    <label for="nacimiento">Fecha de nacimiento</label>
    <input type="date" name="nacimiento" id="nacimiento" class="form-control" value="{{ old('nacimiento', $alumno->birth_date) }}">
</div>

<div class="form-group">
    @isset($alumno->image)
        <img class="img-thumbnail img-fluid" src="{{ asset('storage/' . $alumno->image) }}" height="100px">
    @endisset
</div>

<div class="form-group">
    <label for="image">Imagen</label>
    <input type="file" name="image" id="image" class="form-control" value="{{ old('image', $alumno->image) }}">
</div>

<div class="row justify-content-between">
    <a href="{{ route('alumno.index') }}" class="btn btn-secondary mt-3 mb-3">Volver al listado</a>
    <button id="submitBtn" type="submit" class="btn btn-success mt-3 mb-3">{{ $modo }} alumno</button>
</div>