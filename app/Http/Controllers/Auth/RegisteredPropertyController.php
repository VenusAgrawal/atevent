<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredPropertyController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register-property');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function show (Request $request)
        {
            return view ('register-property');     
        }
    public function add (Request $request)
    {
        $request->validate([
            /*'price' => 'required|numeric',
            'area' => 'required| numeric',
            'house_no' => 'required', 
            'street_name' => 'required', 
            'city' => 'required',
            'postal_code' => 'required|numeric',*/
            
        ]);
                $property =  Property::create([
                'price' => $request->price,
                'area' => $request->area,
                'description' => $request->description,
                'house_no' => $request->house_no,
                'street_name' => $request->street_name,
                'postal_code' => $request->postal_code,
                'city' => $request->city,
                'country' => $request->country, 
                'provider_id' => 1, 
               
                ]);
            event(new Registered($property));

            Auth::login($property);

            return redirect(RouteServiceProvider::HOME);
    }
    public function edit($id)
    {
        $property = Property::find($id);
        return view('update-property', ['property'=>$property]);
    }
   
    public function update(Request $request, $id)
    {
        $property= Property::find($id);
        $property->area = $request->area;
        $property->price = $request->price;
        $property->description = $request->description;
        $property->house_no = $request->house_no;
        $property->street_name = $request->street_name;
        $property->city = $request->city;
        $property->postal_code = $request->postal_code;
        $property->save();
        if ($property)
            return redirect('login')->with('message', 'Succefully updated the property');
         else
            return 'error'; 
    }
   
}




   
    