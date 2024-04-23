<?php

namespace App\Http\Controllers;

//necesitaremos trabjara con los modelos relacionados para utlizar los datos de las otras entidades

use App\Models\Aparato;
use App\Models\Marca;
use App\Models\Tipoaparato;
use Illuminate\Http\Request;

/**
 * Class AparatoController
 * @package App\Http\Controllers
 */
class AparatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aparatos = Aparato::paginate();

        return view('aparato.index', compact('aparatos'))
            ->with('i', (request()->input('page', 1) - 1) * $aparatos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aparato = new Aparato();
        //obtenemos todos los tipos de aparatos y marcas que existen en la base de datos
        $marcas=Marca::pluck('Marca','Id_marca');
        $tipoaparatos=Tipoaparato::pluck('Nombre','Id_tipoaparato');
        return view('aparato.create', compact('aparato','marcas','tipoaparatos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Aparato::$rules);

        $aparato = Aparato::create($request->all());

        return redirect()->route('aparato.index')
            ->with('success', 'Aparato Registrado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aparato = Aparato::find($id);

        return view('aparato.show', compact('aparato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aparato = Aparato::find($id);
        $marcas=Marca::pluck('Marca','Id_marca');
        $tipoaparatos=Tipoaparato::pluck('Nombre','Id_tipoaparato');
        return view('aparato.edit', compact('aparato','marcas','tipoaparatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Aparato $aparato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aparato $aparato)
    {
        request()->validate(Aparato::$rules);

        $aparato->update($request->all());

        return redirect()->route('aparato.index')
            ->with('success', 'Aparato Actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aparato = Aparato::find($id)->delete();

        return redirect()->route('aparato.index')
            ->with('success', 'Aparato deleted successfully');
    }
}
