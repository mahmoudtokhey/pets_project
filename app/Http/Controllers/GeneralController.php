<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;


use Illuminate\Http\Request;

class GeneralController extends Controller
{
    // ++++++++++++++++++++++ changeLanguage() ++++++++++++++++++++++
    public function changeLanguage($locale)
    {
        try
        {
            if( array_key_exists($locale,config('locale.languages')) )
            {
                // create "new session" called "locale" with "value = $locale"
                Session::put('locale', $locale);
                // Set "locale" key [ in 'config/app.php' file ] with the value of "$language"
                App::setLocale($locale);
                return redirect()->back();
            }
        }
        catch (\Exception $exception)
        {
            return redirect()->back();
        }
    }
    /* +++++++++++++++++++ search() : ajax search +++++++++++++++++++ */
    public function ajax_search(Request $request)
    {
        if($request->ajax())
        {
            // "search_by_text inputField" value
            $search_by_text = $request->search_by_text;
            // +++++++++++++++ Filter 1 : search_by_text +++++++++++++++
            if( $search_by_text == "" )
            {
                $field1 = "id";
                $operator1 = ">";
                $value1 = "0";
            }
            else
            {
                $field1 = "name";
                $operator1 = "LIKE";
                $value1 = "%{$search_by_text}%";
            }
            // Get "inv_uoms" that "match" the "search value"
            $animals = Animal::where($field1,$operator1,$value1)
                          ->orderBy('id','ASC')
                          ->get();
            return view('ajax_search',['animals'=>$animals]);
        }
    }
}
