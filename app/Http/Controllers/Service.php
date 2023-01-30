<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Service extends PagesItemsController
{
    public function getall()
    {
        $page = $this->getPage('service'); 
        return view('Service', ['pageIatems' => $page]);
    }
}
