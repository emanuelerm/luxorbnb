<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Service;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
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
        // $images = Image::all();
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

    $newProperty = new Property();
    $newProperty->user_id = $user->id;
    $newProperty->fill($form_data);
    $newProperty->save();

    if ($request->has('services')) {
        $newProperty->services()->sync($request->services);
    }
    // dd($request);
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $image_path = Storage::put('uploads', $image);
            // dd($image_path);

            // $image_path = Str::replace('uploads', 'public/storage/uploads', $image_path);

            $newProperty->images()->create([
                'property_id' => $newProperty->id,
                'path' => $image_path
            ]);
        }
    }

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
        $images = Image::where('property_id', $property->id)->get();
        // $images = $property->images;
        return view('admin.properties.show', compact('property', 'services','images'));
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
    $user = Auth::user();
    $form_data = $request->validated();

    // Aggiornare i dati della proprietà esistente invece di creare una nuova proprietà
    $property->user_id = $user->id;
    $property->fill($form_data);
    $property->save();

    if ($request->has('services')) {
        $property->services()->sync($request->services);
    }

    return redirect()->route('admin.properties.index')->with('message', "{$property->title} è stato aggiornato correttamente");
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
