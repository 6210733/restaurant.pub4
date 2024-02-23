<?php

namespace Controller;

use Base\Controller;


class AccueilController extends Controller {
    public function index() {
        include("views/accueil.view.php");
    }

    
}