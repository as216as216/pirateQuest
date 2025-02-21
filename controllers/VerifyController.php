<?php

namespace pirate\controllers;

use X1\MVC\Controller;

/**
 * @controller
 * @route /verify
 */
class VerifyController extends Controller {
    /**
     * @route /
     * @return void
     */
    public function index() {
        $question = $this->httpRequest->getParam('question');
        $playerAnswer = $this->httpRequest->getParam('answer');
        if (!empty($question)) {
            switch ($question) {
                case 1:
                    $trueAnswer = '112';
                    break;
                case 2:
                    $trueAnswer = '';
                    break;
                case 3:
                    $trueAnswer = '';
                    break;
                case 4:
                    $trueAnswer = '';
                    break;
                case 5:
                    $trueAnswer = '';
                    break;
                case 6:
                    $trueAnswer = '';
                    break;
            }
        }

        $status = ($playerAnswer == $trueAnswer and !empty($trueAnswer)) ? 'true' : 'false';
        return $this->sendJson(['valid' => $status]);
    }

}