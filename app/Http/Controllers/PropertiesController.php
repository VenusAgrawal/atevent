<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\Events;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;


use Browser;
use PhpParser\Builder\Property;

class PropertiesController extends Controller
{
    // homepage (all properties)
    public function index()
    {
        $properties = Properties::all();
        return view('homepage', ['properties' => $properties]);
    }

    // description (single property)
    public function show($id)
    {
        $properties = Properties::find($id);

        if (Browser::isDesktop()) {
            return view('descriptiondesk', ['property' => $properties]);
        } else {
            return view('descriptionmobi', ['property' => $properties]);
        }
    }

    // upload file function
    public function upload_file()
    {
        return view('upload-file');
    }

    public function upload_file_submit(Request $request)
    {
        // Validate the file
        $request->validate([
            'myFile' => 'required|mimes:jpg,png'
        ]);

        // Rename the file
        // $fileName = time() . '.' . $request->myFile->extension();
        $fileName = $request->myFile->getClientOriginalName();

        // Save the public path 
        $publicPath = public_path('assets/propertypics/');

        // Save the file in the public/uploads folder
        $request->myFile->move($publicPath, $fileName);
    }


    // category pages
    public function get_data_categories($event)
    {
        $properties = Properties::join("events", "properties.id", "=", "events.properties_id")
            ->where("events.event_name", "=", "$event")
            ->get();

        $event_name = Events::where("events.event_name", "=", "$event")
            ->get()[0];

        return view('category', ['properties' => $properties], ['event_name' => $event_name]);
    }


    // new property
    public function create()
    {
        return view('provider.register-property');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:30',
            'description' => 'required',
            'size' => 'required|integer',
            'price' => 'required|numeric|min:2|max:100',
            'nopersons' => 'required|integer',
            'houseno' => 'required|max:5',
            'street' => 'required',
            'postcode' => 'required|integer|max:4',
            'locality' => 'required|max:30',
            'coverphoto' => 'required|max:30',
        ]);

        $result = new Properties;
        $result->title = $request->name;
        $result->description = $request->description;
        $result->size = $request->size;
        $result->price = $request->price;
        $result->nopersons = $request->nopersons;
        $result->houseno = $request->houseno;
        $result->street = $request->street;
        $result->postcode = $request->postcode;
        $result->locality = $request->locality;
        $result->coverphoto = $request->coverphoto;
        $result->provider_id = Auth::guard('provider')->user()->id;
        $result->save();

        if ($result)
            return redirect('provider.dashboard')->with('success', 'Successfully inserted');
        else
            return redirect('provider.dashboard')->with('failed', 'Problem with insertion. Please try again.');
    }


    // update property
    public function edit($id)
    {
        $properties = Properties::where('id', $id)->first();
        return view('update-property', ['properties' => $properties]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:30',
            'description' => 'required',
            'size' => 'required|integer',
            'price' => 'required|numeric|min:2|max:100',
            'nopersons' => 'required|integer',
            'houseno' => 'required|max:5',
            'street' => 'required',
            'postcode' => 'required|integer|max:4',
            'locality' => 'required|max:30',
            'coverphoto' => 'required|max:30',
        ]);

        $result = Properties::where('id', $id)->first();
        $result->title = $request->name;
        $result->description = $request->description;
        $result->size = $request->size;
        $result->price = $request->price;
        $result->nopersons = $request->nopersons;
        $result->houseno = $request->houseno;
        $result->street = $request->street;
        $result->postcode = $request->postcode;
        $result->locality = $request->locality;
        $result->coverphoto = $request->coverphoto;
        $result->save();

        if ($result)
            return redirect('provider.dashboard')->with('success', 'Successfully updated');
        else
            return redirect('provider.dashboard')->with('failed', 'Problem with update. Try again.');
    }


    // delete property
    public function destroy($id)
    {
        Events::where('property_id',$id)->delete();
        Transaction:where('property_id',$id)->delete();
        $result = Properties::destroy($id);

        
        if ($result)
            return redirect('provider.dashboard')->with('success', 'Successfully deleted');
        else
            return redirect('provider.dashboard')->with('failed', 'Problem with deletion. Try again.');
    }


















}
