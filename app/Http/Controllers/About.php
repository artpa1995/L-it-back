<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class About extends PagesItemsController
{
    public function getall()
    {
        $page = $this->getPage('about'); 
        return view('About', ['pageIatems' => $page]);
    }
}
