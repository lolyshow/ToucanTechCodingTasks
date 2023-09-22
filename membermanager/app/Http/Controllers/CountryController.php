<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('country.index')->with('countries', $countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create_form()
    {
        $countries = Country::all();
        return view('country.create')->with('countries', $countries);
    }
    public function store(Request $request)
    {
        
        $message ="";
        $validator = Validator::make($request->all(), [
            'country_name' => 'unique:countries',
        ]);
        

        // check is the country already exists
        if (Country::where('country_name', $request->name)->first()) {
            $message = 'Country already exists';
        
        } else {
            // register the country
            $country = Country::create([
                'country_name' => $request->name,
            ]);
            if ($country) {
                $message = 'Success!!! Country Addedd!';
            }
            // Country::create($input);
        }

        return redirect('/countries')->with(
            'flash_message',
            $message
        );
        // $input = $request->all();
        // $check =
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
