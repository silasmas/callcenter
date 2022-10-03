<?php

namespace App\Http\Controllers;

use App\Models\clientLibelle;
use App\Http\Requests\StoreclientLibelleRequest;
use App\Http\Requests\UpdateclientLibelleRequest;

class ClientLibelleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.amdin');
    }
    public function gstatu()
    {
        
    }
    public function gscripte()
    {
        
    }
    public function guser()
    {
        return view('pages.guser');
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
     * @param  \App\Http\Requests\StoreclientLibelleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreclientLibelleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clientLibelle  $clientLibelle
     * @return \Illuminate\Http\Response
     */
    public function show(clientLibelle $clientLibelle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clientLibelle  $clientLibelle
     * @return \Illuminate\Http\Response
     */
    public function edit(clientLibelle $clientLibelle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateclientLibelleRequest  $request
     * @param  \App\Models\clientLibelle  $clientLibelle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateclientLibelleRequest $request, clientLibelle $clientLibelle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clientLibelle  $clientLibelle
     * @return \Illuminate\Http\Response
     */
    public function destroy(clientLibelle $clientLibelle)
    {
        //
    }
}
