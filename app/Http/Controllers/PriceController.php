<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\Product;
use App\Http\Controllers\PromotionsController;

class PriceController extends Controller {

    public function index() { 
        $featured = Product::where('is_featured', true)->where('is_active', true)->take(8)->get();

        $cont = new PromotionsController();
        $banner = $cont->getBanner();  
        
        return view('index', [
            'precios' => $this->getCoinsValues(),
            'fecha' => now()->format('d/m/Y H:i'),
            'featured' => $featured,
            'banner' => $banner,
        ]);
    }

    public function prices() {
        return $this->getCoinsValues();
    }

    private function getCoinsValues() {
        $precios = [];
        $assets = [ 'Oro' => 'CentenarioClosesCV.html', 'Plata' => 'PlataLibertadClosesCV.html', ];

        $client = new Client();
        $response = $client->get('https://bbv.infosel.com/bancomerindicators/indexV9.aspx');
        $html = $response->getBody()->getContents();
        $crawler = new Crawler($html);

        foreach ($assets as $nombre => $link) {
            $nodo = $crawler->filter("a[href*='$link']");
            if ($nodo->count() === 0) continue;

            $contenedor = $nodo->ancestors()->filter('div.col-sm-4');
            $compra = $contenedor->filter('div.d-flex > div.border-right .precio-c')->text(null);
            $venta = $contenedor->filter('div.d-flex > div:not(.border-right) .precio-c')->text(null);

            $precios[] = [
                'nombre' => $nombre,
                'compra' => $compra,
                'venta' => $venta,
            ];
        }

        return $precios;
    }
}

