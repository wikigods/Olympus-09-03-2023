

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif

<div
    class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg col-8"
>

<center>
    <h1 style="color: black">{{ $modo }} Cliente</h1>
</center>

<br>
<br>

 <div class="form-group">
        <label for="CI"> Cédula </label>
        <input
        placeholder="Cédula"
            type="text"       
            class="form-control"
            name="CI"
            value="{{ isset($cliente->CI)?$cliente->CI:old('CI')  }}"
            id="CI"
        />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>


    <div class="form-group">
        <label for="Nombres"> Nombre </label>
        <input
        placeholder="Ej:Carlos"
            type="text"
            class="form-control"
            name="Nombres"
            value="{{ isset($cliente->Nombres)?$cliente->Nombres:old('Nombres')  }}"
            id="Nombres"
        />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="Apellidos"> Apellido </label>
        <input
        placeholder="Ej:López"
            type="text"
            class="form-control"
            name="Apellidos"
            value="{{ isset($cliente->Apellidos)?$cliente->Apellidos:old('Apellidos') }}"
            id="Apellidos"
        />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="Correo"> Correo </label>
        <input
        placeholder="ejemplo@gmail.com"
            type="email"
            class="form-control"
            name="Correo"
            value="{{ isset($cliente->Correo)?$cliente->Correo:old('Correo') }}"
            id="Correo"
        />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="Telefono"> Telefono </label>
        <input
        placeholder="Ej:04121234567"
            type="number"
            class="form-control"
            name="Telefono"
            value="{{ isset($cliente->Telefono)?$cliente->Telefono:old('Telefono') }}"
            id="Telefono"
        />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <a style="width: 40px; height:40px ;"class="btn btn-primary" href="{{ url('cliente/') }}">
         <i class="fa-solid fa-rotate-left" style="position: absolute; margin-left: -7px; margin-top: 5px"></i>
    </a>

    <i class="fa-regular fa-circle-check" style="position: absolute; margin-left: 12px; margin-top: 12px"></i>
    <input style="width: 40px; height:40px " class="btn btn-success" type="submit" value="" />
    <br />
</div>
