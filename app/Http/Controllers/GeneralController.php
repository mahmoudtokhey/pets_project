<?php

namespace App\Http\Controllers;
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
}
