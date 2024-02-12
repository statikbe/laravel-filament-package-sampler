<?php

namespace App\Http\Controllers;

use App\Models\TranslatablePage;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Response;

class TranslatablePageController extends Controller
{
    public function index(TranslatablePage $page){
        if (! $page->isPublished()) {
            abort(Response::HTTP_NOT_FOUND);
        }

        SEOTools::setTitle($page->getSEOTitle());
        SEOTools::setDescription($page->getSEODescription());
        SEOTools::jsonLd()->addImage($page->getSEOImageUrl());
        SEOTools::opengraph()->addImage($page->getSEOImageUrl());

        return view('translatable-pages.index', [
            'page' => $page
        ]);
    }
}
