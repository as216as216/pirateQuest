<?php

namespace pirate\controllers;

use X1\MVC\Controller;

/**
 * @controller
 * @route /verify
 */
class VerifyController extends Controller {
    public function init() {
        \X1\DI::get('layout')->setTemplate('main.twig');
    }

    /**
     * @route /nextQuestion/:question
     * @return void
     */
    public function nextQuestion() {
        $question = $this->httpRequest->getParam('question');
        if (!empty($question)) {
            switch ($question) {
                case 1:
                    $questText = 'Вот мое первое задание на проверку твоей пиратской сноровки, и я посмотрю, хватит ли у тебя сил на поиски сокровищ. Ты должен ТОЧНО посчитать, сколько ступенек в твоем доме. И это число будет первой частью кода. Вторая часть кода  это количество черных меток на приглашении, внизу которого изображены ШТУРВАЛ, ЧЕРЕП, ЯКОРЬ. Соедини два этих числа и ты получишь код, который и будет ответом на это задание.';
                    $clueText = '';
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

        $this->view->questText = $questText;
        $this->view->questNum = $question;
    }

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
                    $trueAnswer = '111';
                    $clueText = '';
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

        $success = ($playerAnswer == $trueAnswer and !empty($trueAnswer)) ? 'true' : 'false';
        return $this->sendJson(['success' => $success]);
    }

    /**
     * @route /goodAnswer/:question
     * @return void
     * @throws \Exception
     */
    public function goodAnswer() {
        $question = $this->httpRequest->getParam('question');

        if (!empty($question)) {
            switch ($question) {
                case 1:
                    $clueText = 'Молодцы! Вы справились с первым заданием! Чтобы получить первую часть карты, Вика, позвони моему помощнику Гиббсу по номеру, +7-921-509-81-38. Он скажет где она спрятана.';
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

            $this->view->clue = $clueText;
            $this->view->questionNumber = $question;
        }
        else
            throw new \Exception("Не переадн номер вопроса!");
    }

}