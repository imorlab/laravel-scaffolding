<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Artesaos\SEOTools\Facades\SEOMeta;

class HomeController extends Controller
{
    use SEOToolsTrait;
    
    /**
     * Muestra la página de inicio
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        SEOMeta::setTitle(__('seo.home.title'));
        SEOMeta::setDescription(__('seo.home.description'));
        SEOMeta::setCanonical(route('home'));
        SEOMeta::setRobots('index, follow');

        // Configuración de OpenGraph
        $this->seo()->opengraph()
            ->setTitle(__('seo.home.title'))
            ->setDescription(Str::limit(strip_tags(__('seo.home.description')), 160))
            ->setUrl(route('home'))
            ->addProperty('type', 'website')
            ->addImage(asset('og-image.jpg'));
        // $this->seo()->twitter()->setSite('@TeatroCalderonM');
        
        $this->seo()->jsonLd()->setType('WebSite');

        $keywords = [
            __('seo.home.keyword_1'),
            __('seo.home.keyword_2'),
        ];

        SEOMeta::setKeywords(array_filter($keywords));

        return view('front.home');
    }
}
