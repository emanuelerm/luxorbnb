<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Image;
use App\Models\Property;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();
        $properties = Property::where('user_id', $user)->paginate(3);

        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('admin.properties.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {
        $user = Auth::user();
        $form_data = $request->validated();
        $newProperty = new Property();
        $newProperty->user_id = $user->id;
        $slug = $this->getSlug($form_data['title'], 'form_data->title');
        $form_data['slug'] = $slug;

        // GET LONGITUDE AND LATITUDE
        $key = '6Zdz4adkb3YzaPURg8Zg71KMzMez217G'; // inserite la vostra chiave
        $addressApi = $form_data['address'];
        $addressUrl = Str::of($addressApi)->slug('%20');
        $url = 'https://api.tomtom.com/search/2/geocode/'.$addressUrl.'.json?storeResult=false&limit=1&extendedPostalCodesFor=Str&view=Unified&key='.$key;
        $response = Http::get($url);
        if ($response->successful()) {
            $data = $response->json();

            if (!empty($data['results'])) {
                $results = $data['results']; // Accesso all'array "results"
                $firstResult = $results[0]; // Prendi il primo elemento dell'array

                $position = $firstResult['position']; // Accesso all'oggetto "position"
                $lat = $position['lat']; // Recupera il valore "lat"
                $lon = $position['lon']; // Recupera il valore "lon"

                // Salva i dati nella tua tabella del database
                $form_data['latitude'] = $lat;
                $form_data['longitude'] = $lon;
            }
        }

        // dd($form_data);
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
                    'path' => $image_path,
                ]);
            }
        }

        return redirect()->route('admin.properties.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        $services = Service::all();
        $images = Image::where('property_id', $property->id)->get();
        // $images = $property->images;
        return view('admin.properties.show', compact('property', 'services', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
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
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $user = Auth::user();
        $form_data = $request->validated();
        // dd($form_data);
        // Aggiornare i dati della proprietà esistente invece di creare una nuova proprietà
        $property->user_id = $user->id;
        $property->fill($form_data);
        $property->save();

        if ($request->has('services')) {
            $property->services()->sync($request->services);
        } else {
            $property->services()->sync([]);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $image_path = Storage::put('uploads', $image);

                // $image_path = Str::replace('uploads', 'public/storage/uploads', $image_path);

                $property->images()->create([
                    'property_id' => $property->id,
                    'path' => $image_path,
                ]);
            }
        }

        $imagesToDelete = $request->input('images_to_delete');
        if ($imagesToDelete) {
            foreach ($imagesToDelete as $imageToDelete) {
                $jsonImage = json_decode($imageToDelete, true);

                $image = Image::findOrFail($jsonImage['id']);
                Storage::delete($jsonImage['path']);
                // Effettua le operazioni necessarie per eliminare l'immagine,
                // come eliminare il record dal database e il file fisico dell'immagine.
                $image->delete();
            }
        }

        return redirect()->route('admin.properties.show', compact('property'))->with('message', "{$property->title} è stato aggiornato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('admin.properties.index')->with('message', "{$property->title} è stato cancellato correttamente");
    }

    private function getSlug($title)
    {
        $slug = Str::of($title)->slug('-');
        $count = 1;

        // Prendi il primo post il cui slug è uguale a $slug
        // se è presente allora genero un nuovo slug aggiungendo -$count
        while (Property::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug('-')."-{$count}";
            ++$count;
        }

        return $slug;
    }

    private function getGeoCod($address)
    {
    }

    // private function getSlug($property)
    // {
    //     $slug = Str::slug($property->title);
    //     $count = 2;

    //     // Prendi il primo post il cui slug è uguale a $slug
    //     // se è presente allora genero un nuovo slug aggiungendo -$count
    //     while (static::where("slug", $slug)->exist()) {
    //         $slug = Str::slug($property->title) . "-{$count}";
    //         $count++;
    //     }

    //     $property->slug = $slug;
    // }
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         $model->getSlug();
    //     });
    // }
}
