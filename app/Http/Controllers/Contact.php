<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Contact extends PagesItemsController
{
    public function getall()
    {
        $page = $this->getPage('contact'); 
        return view('Contact', ['pageIatems' => $page]);
    }
}
