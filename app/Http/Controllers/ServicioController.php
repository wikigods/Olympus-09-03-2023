<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['servicios'] = Servicio::paginate(5);
        return view('servicio.index4', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $servicio = new Servicio();

        $empleados = Empleado::pluck('Nombres', 'CI');

        return view('servicio.create', compact('servicio', 'empleados',));

        return view('servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'Cod' => 'required|string|unique:servicios,Cod|max:15',
            'Descripcion' => 'required|string|unique:servicios,Descripcion|max:50',
            'Costo' => 'required|string|max:50',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);

        // $datosServicio=request()->all();
        $datosServicio = request()->except('_token');

        if ($request->hasFile('Foto')) {
        }
        Servicio::insert($datosServicio);

        // return response()->json($datosServicio);
        return redirect('servicio')->with('mensaje', 'Servicio agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        $empleados = Empleado::pluck('Nombres', 'CI');

        return view('servicio.edit', compact('servicio', 'empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'Cod' => 'required|string|max:15',
            'Descripcion' => 'required|string|max:50',
            'Costo' => 'required|string|max:50',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La foto es requerida',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosServicio = request()->except(['_token', '_method']);

        Servicio::find($id)->update($datosServicio);

        // Servicio::where('id', '=', $id)->update($datosServicio);
        // $servicio = Servicio::findOrFail($id);

        // return view('servicio.edit', compact('servicio') );
        return redirect('servicio')->with('mensaje', 'Servicio Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Servicio::destroy($id);
        return redirect('servicio')->with('mensaje', 'Servicio Borrado');
    }
}
