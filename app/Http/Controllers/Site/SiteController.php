<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function __construct()
    {
        /*$this->middleware('auth')
            ->only([
                'contato',
                'categoria'
            ]);
        */
        /*
        $this->middleware('auth')
                ->except([
                    'index',
                    'contato'
                ]);
        */
        
    }

    public function index()
    {
        $teste = 123;
        return view('site.home.index',compact('teste'));
    }

    public function contato()
    {
        return view('site.contato.index');
    }

    public function categoria($id)
    {
        return "Categoria {$id}";
    }

    public function categoriaOp($id='1')
    {
        return "Categoria {$id}";
    }
}
