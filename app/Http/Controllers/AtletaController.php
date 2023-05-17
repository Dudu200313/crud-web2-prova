<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Atleta;
use Illuminate\Http\Request;

class AtletaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::find(Auth::user()->id)
        ->myAtleta()
        ->create([
           'nome' => $request -> nome,
           'modalidade' => $request -> modalidade,
           'idade' => $request -> idade,
           'altura' => $request -> altura,
           'peso' => $request -> peso
        ]);
        return redirect (route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atleta  $atleta
     * @return \Illuminate\Http\Response
     */
    public function show(Atleta $atleta)
    {
        //
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atleta  $atleta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $atleta = Atleta::findOrFail($id);
        $atleta -> update([
            'nome' => $request -> nome,
            'modalidade' => $request -> modalidade,
            'idade' => $request -> idade,
            'altura' => $request-> altura,
            'peso' => $request-> peso
        ]);

        return redirect (route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atleta  $atleta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atleta = Atleta::findOrFail($id);
        $atleta-> delete();

        return redirect (route('dashboard'));
    }
}
