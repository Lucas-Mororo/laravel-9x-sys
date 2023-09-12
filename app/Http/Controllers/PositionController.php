<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('positions.positions', [ 'positions' => Position::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.positions-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'position' => ['required', 'string', 'max:225'],
        ], [
            'position.required' => 'O campo posição é obrigatório.',
            'position.string' => 'O campo posição deve ser uma string.',
            'position.max' => 'O campo posição deve ter no máximo :max caracteres.',
        ]);

        $user = Position::create([ 'name' => $request->position]);

        return Redirect::route('positions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        return view('positions.positions-edit', [ 'position' => $position ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        // dd($request->position);
        $request->validate([
            'position' => ['required', 'string', 'max:50'],
        ], [
            'position.required' => 'O campo Cargo é obrigatório.',
            'position.string' => 'O campo Cargo deve ser uma string.',
            'position.max' => 'O campo Cargo deve ter no máximo :max caracteres.',
        ]);

        // Atualize o registro no banco de dados com os novos dados do formulário
        $position->update([ 'name' => $request->input('position') ]);

        // Redirecione de v olta para a página de edição com uma mensagem de sucesso
        return Redirect::route('positions.index', ['position' => $position])
            ->with('tipo', 'success')
            ->with('mensagem', 'Cargo atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        // dd($position);

        $position->delete();

        return Redirect::route('positions.index')->with('success', 'Posição excluída com sucesso.');
        // return Redirect::to('/');
    }
}
