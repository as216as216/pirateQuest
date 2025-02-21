<?php

namespace pirate\controllers;

use X1\MVC\Controller;

/**
 * @author as216
 * @controller
 * @route /
 */
class IndexController extends Controller {
    public function init() {
        \X1\DI::get('layout')->setTemplate('main.twig');
    }
    /**
     * @route /
     * @return void
     */
    public function index() {
        $a = 51;
        $this->view->a = $a;
    }

    /**
     * @route /verify
     * @return void
     */
    public function verify() {
        $params = $this->httpRequest->getParams();
        $a = 5;
    }

}