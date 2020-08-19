<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function view($slug){
        $page = Page::bySlug($slug);

        if ($page->slug == 'about'){
            $template = 'page.about';
        }else{
            $template = 'page.single';
        }

        return view($template, ['page' => $page]);
    }
}
