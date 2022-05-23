<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

use Illuminate\Http\Request;

class BackendBaseController extends Controller
{
    protected function __DataToView($viewPath){
        view()->composer($viewPath ,function ($view){
            $view->with('route',$this->route);
            $view->with('panel',$this->panel);
//            $view->with('view',$this->view);


        });
        return $viewPath;
    }
}
