<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
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
        return view('publications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {
        $validatedFields = $request->validated();
        $this->uploadImage($request, $validatedFields);
        // dd($validatedFields);
        Publication::create($validatedFields);
        to_route('publications.index');
        // dd($request->input(), $request->file('image'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        //
    }

    private function uploadImage(PublicationRequest $request, &$formFields) {
        unset($formFields['image']);
        if ($request->hasFile('image')) {
        $formFields['image'] = $request->file('image')->store('publication', 'public');
    }
  }
}