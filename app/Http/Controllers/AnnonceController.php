<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Immobilier;
use Illuminate\Support\Facades\DB;
use App\Models\ImmobilierNotYetAccepted;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("utilisateur.publish");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        // Validate the uploaded files
        $request->validate([
            'region' => 'required', // Region is required
            'type' => 'required', // Type is required
            'title' => 'required',
            'price' => 'required',
            'surface' => 'required', // Surface is required
            'description' => 'required', // Description is required
            'primary_image' => 'required|image', // Primary image is required and must be an image
            'images.*' => 'required|image', // Images must be images of type jpeg, png, or jpg
        ]);
        

        

        $climatisation = $request->has('climatisation') ? 1 : 0;
        $garage = $request->has('garage') ? 1 : 0;
        $cuisine_equipé = $request->has('cuisine_equipé') ? 1 : 0;
        $chauffage_central = $request->has('chauffage_central') ? 1 : 0;
        $wifi = $request->has('wifi') ? 1 : 0;
        $tv = $request->has('tv') ? 1 : 0;

        $id = null; 

        if($request->hasFile("primary_image")) {
            $image = $request->file('primary_image');

            // Generate a unique filename for the image
            $filename = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
        
            // Store the image in the public/immobiliers folder with the generated filename
            $image->storeAs('public/immobiliers', $filename);
        
            // Save file information to the database, associating it with the immobilier record
            $id = Immobilier::insertGetId([
                "title" => $request->title,
                "price" => $request->price,
                "TYPE" => $request->type,
                'ville' => $request->region,
                "Description" => $request->description,
                "Surface" => $request->surface,
                'image' => 'immobiliers/' . $filename,
                'ID_UTILISATEUR' => Auth::guard('reservateur')->id(),
                'Climatisation' => $climatisation, // Insert the value of the checkbox
                'Garage' => $garage, // Insert the value of the checkbox
                'CuisineEquipé' => $cuisine_equipé, // Insert the value of the checkbox
                'hauffageCentral' => $chauffage_central, // Insert the value of the checkbox
                'Wifi' => $wifi, // Insert the value of the checkbox
                'TV' => $tv, // Insert the value of the checkbox
            ]);
        }


// Handle file upload
if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        // Generate a unique filename for the image
        $filename = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();

        // Store the image in the public/immobiliers folder
        $image->storeAs('public/immobiliers', $filename);

        // Save file information to the database, associating it with the immobilier record
        Image::create([
            'file_name' => 'immobiliers/'.$filename,
            "ID_IMMOBILIER" => $id
            // Add more columns as needed
        ]);
    }
}
    ImmobilierNotYetAccepted::create([
        "ID_IMMOBILIER" => $id,
        "ID_UTILISATEUR" => Auth::guard('reservateur')->id()
    ]);

    return 1;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
