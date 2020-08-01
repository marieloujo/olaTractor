<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tracteur;
use Illuminate\Support\Facades\Session;

use Larinfo;

class TracteurRessourceController extends Controller
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
        echo "okkkkkkkkkkkkkkk";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         return "ok";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    

        dump("hdddhj").die();

        $type = $request->type;
        $marque = $request->marque;
        $modele = $request->modele;
        
        //Tracteur::where('id', $id)->update(['type'=>$type, 'marque'=>$marque, 'modele'=>$modele]);
        

        Session::flash('success', 'Tracteur modifié avec succès !');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //Tracteurs::findOrFail($id)->delete();
        Tracteur::findOrFail($id)->delete();

        Session::flash('success', 'Tracteur supprimé avec succès !');
        return redirect()->back();
    }
}
