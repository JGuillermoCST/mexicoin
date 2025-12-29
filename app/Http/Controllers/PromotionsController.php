<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use App\Models\Banner;

class PromotionsController extends Controller
{

    public function index()
    {
        // Fetch the authenticated user
        $user = auth()->user();
        $banner = Banner::first();
        return view('admin.promos',compact('user', 'banner'));
    }

    public function getBanner()
    {
        $banner = Banner::first();
        return $banner;
    }

    public function updateBanner(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if($request->hasFile("image")){

            $imagen = $request->file("image");                        
            $nombreimagen = $imagen->getClientOriginalName();
            $nombreimagen = 'banner_main_'.$nombreimagen;
            $ruta = public_path("assets/banners/promos/");   
            //$ruta = "/home3/josegui5/public_html/mexicoin/public/assets/banners/promos/";            
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            //$this->setEnvironmentValue('APP_PROMO_BANNER', $nombreimagen);
            
            // Update the banner in the database
            $banner = Banner::first();
            $banner->image = $nombreimagen;
            $banner->save();
        }

        // Update the promotional banner URL in the environment file
        //$this->setEnvironmentValue('APP_PROMO_BANNER', $request->input('banner_url'));

        return redirect()->route('admin-promos')->with('success', 'Promotional banner updated successfully.');
    }
}
