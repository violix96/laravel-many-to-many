<?php

namespace App\Http\Controllers;

use App\Models\technologies;
use App\Http\Requests\StoretechnologiesRequest;
use App\Http\Requests\UpdatetechnologiesRequest;

class TechnologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretechnologiesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(technologies $technologies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(technologies $technologies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetechnologiesRequest $request, technologies $technologies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(technologies $technologies)
    {
        //
    }
}
