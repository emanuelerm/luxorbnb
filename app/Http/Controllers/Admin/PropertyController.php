<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Service;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        $user = Auth::user();
        return view('admin.properties.index', compact('properties', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        $service = Service::all();
        return view('admin.properties.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {
        $user = Auth::user();
        $form_data = $request->validated();
        //$form_data = $this->validated($request->all());
        $newProperty = new Property();
        $newProperty->user_id = $user->id;
        $newProperty->fill($form_data);
        $newProperty->save();
        return redirect()->route('admin.properties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {

        $services = Service::all();
        return view('admin.properties.show', compact('property', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        // if (!Auth::user()->is_admin && $property->user_id !== Auth::id()) {
        //     abort(403);
        // }
        $services = Service::all();
        return view('admin.properties.edit', compact('property', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $form_data = $request->validated();
        $property->update($form_data);
        return redirect()->route('admin.properties.show', $property->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index')->with('message', "{$property->title} è stato cancellato correttamente");
    }
}
