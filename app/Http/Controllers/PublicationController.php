<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{
    // import it touse $this->authorize(...)
    // use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::latest()->get();
        return view('publications.index', compact('publications'));
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
        // dd(Auth::id());
        $validatedFields = $request->validated();
        $this->uploadImage($request, $validatedFields);
        // dd($validatedFields);
        $validatedFields['profile_id'] = Auth::id();
        Publication::create($validatedFields);
        return to_route('publications.index')->with('success', 'Publication created successfully');;
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
    public function edit(Publication $publication, Request $request)
    {
        // if ($request->user()->cannot('update', $publication)) {
        //     abort(403);
        // }

        // $this->authorize('update', $publication);
        
        Gate::authorize('update', $publication);

        return view('publications.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        // Gate::authorize('update-pub', $publication);
        Gate::authorize('update', $publication);
        $validatedFields = $request->validated();
        $this->uploadImage($request, $validatedFields);
        // dd($validatedFields);
        $publication->fill($validatedFields)->save();
        return to_route('publications.index')->with('success', 'Publication udpated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return to_route('publications.index')->with('success', 'Publication deleted successfully');
    }

    private function uploadImage(PublicationRequest $request, &$formFields) {
        unset($formFields['image']);
        if ($request->hasFile('image')) {
        $formFields['image'] = $request->file('image')->store('publication', 'public');
    }
  }
}