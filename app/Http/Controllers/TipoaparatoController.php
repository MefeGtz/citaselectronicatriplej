<?php

namespace App\Http\Controllers;

use App\Models\Tipoaparato;
use Illuminate\Http\Request;

/**
 * Class TipoaparatoController
 * @package App\Http\Controllers
 */
class TipoaparatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoaparatos = Tipoaparato::all();

        return view('tipoaparato.index', compact('tipoaparatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoaparato = new Tipoaparato();
        return view('tipoaparato.create', compact('tipoaparato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipoaparato::$rules);

        $tipoaparato = Tipoaparato::create($request->all());

        return redirect()->route('tipoaparato.index')
            ->with('success', 'Completado!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoaparato = Tipoaparato::find($id);

        return view('tipoaparato.show', compact('tipoaparato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoaparato = Tipoaparato::find($id);

        return view('tipoaparato.edit', compact('tipoaparato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipoaparato $tipoaparato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipoaparato $tipoaparato)
    {
        request()->validate(Tipoaparato::$rules);

        $tipoaparato->update($request->all());

        return redirect()->route('tipoaparato.index')
            ->with('success', 'Tipo de aparato actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoaparato = Tipoaparato::find($id)->delete();

        return redirect()->route('tipoaparato.index')
            ->with('success', 'Eliminado!');
    }
}
