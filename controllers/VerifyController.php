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
     * генерирует текст вопроса и ссылкой на видео к нему
     * @route /nextQuestion/:question
     * @return void
     */
    public function nextQuestion() {
        $question = $this->httpRequest->getParam('question');
        if (!empty($question)) {
            switch ($question) {
                case 1:
                    $questText = 'Вот мое первое задание на проверку твоей пиратской сноровки, и я посмотрю, хватит ли у тебя сил на поиски сокровищ. Ты должен ТОЧНО посчитать, сколько ступенек в твоем доме. И это число будет первой частью кода. Вторая часть кода  это количество черных меток на приглашении, внизу которого изображены ШТУРВАЛ, ЧЕРЕП, ЯКОРЬ. Соедини два этих числа и ты получишь код, который и будет ответом на это задание.';
                    break;
                case 2:
                    $questText = 'Как ты уже слышал, после крушения Морган спасся на необитаемом острове. В этом задании тебе нужно найти послание, которое Морган отправил в надежде, что нашедший послание спасет его. А как ты знаешь, все пираты, попавшие на необитаемый остов, отправляют свои послание в запечатанных бутылках. Найди бутылку в самом морском месте квартиры, и Морган на бутылке поведает тебе свой секрет. В ответ на это задание ты должен сообщить мне координаты острова, на котором Морган закопал свой клад.
                    Цифры запиши одним длинным числом без пробелов.';
                    break;
                case 3:
                    $questText = 'Если ты настоящий пират, то знаешь, что среди пиратов существует негласное соревнование «за чью поимку запросят большее вознаграждение ». Такие объявления обычно вешают в тавернах, где люди едят и всегда могут обратить внимание. Мое задание: найди у себя объявление о моем розыске, сумму за мою поимку умножь на количество якорей в бухте мертвеца и прибавь количество флагов на приглашении, внизу которого нарисованы ЯДРО, ШТУРВАЛ, ЧЕРЕП.
                    Если не получается, электронные помощники могут вам помочь';
                    break;
                case 4:
                    $questText = 'Пираты очень суеверный народ, и когда я был на африканском континенте, одна гадалка ВУДУ под страхом смерит сказала мне, что я обрету величайшую силу, когда стану обладателем заклятия. В своем видении она увидела, что заклинание это было выбито на неком предмете круглой формы темного цвета, на одной из сторон предмета изображена смерть, а на другой стороне написано само заклятие. Конечно, откуда старой гадалке из глухой деревни знать, что она описала в точности черную метку, и именно ту, которую мне вручили на корабле «Летучего голландца». Узнай заклятие и сообщи его мне, взамен я расскажу тебе, где спрятана часть карты. Ах, да, чуть не забыл, гадалка сказала, что видит этот предмет в мягком месте. К этому месту можно пройти от Викиного стола 440 см к входной двери, затем 500 см к залу и, повернувшись направо сделай 2 шага. Сам не пойму, о чем идет речь, но думаю, ты решишь это задание, ведь части карты еще у меня!';
                    break;
                case 5:
                    $questText = 'Однажды я прибыл в один из самый удаленный порт Карибского моря, в такой дальний, что язык местного населения трудно было понять. Выпив пару кружек настоящего рома, на выходе из трактира, ко мне обратился нищий старик. Он попросил у меня немного денег и, поскольку я имел при себе хороший улов и от хорошего настроения, я подал бедняге пару дублонов. Такой щедрости старик удивился и, в благодарность, стал рассказывать мне, что знает секрет, как найти сокровища Черной бороды. Он сказал, что «ключ» к сокровищам Черной Бороды, можно найти с помощью его Бортового журнала, который ведет каждый капитан судна. Тогда я не придал значения рассказам старика, но сейчас меня мучает мысль, что, возможно, он был прав! Твое задание - найти Бортовой журнал Черной бороды. Все что я знаю, он спрятан в какой- то старой библиотеке. Сообщи мне остров, на котором Черная борода закопал свой клад, и я расскажу тебе, где спрятана часть карты.';
                    break;
                case 6:
                    $questText = 'Вот ты и добрался до последнего задания. Ну что же, я постарался сделать это задание самым сложным из всех, что тебе когда-либо доводилось решать. Решишь это задание, и я отдам тебе последнюю часть карты. Вот тебе мое задание. Азбука, стр 19, стр 26, стр 110, стр 21, стр 63, стр 29, стр15, стр 75, стр 43, стр 46, стр 21, стр 37. Посмотрим, как ты решишь это задание!';
                    break;
            }
        }

        $this->view->questText = $questText;
        $this->view->questNum = $question;
    }

    /**
     * Проверка ответа
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
                    break;
                case 2:
                    $trueAnswer = '143701901635';
                    break;
                case 3:
                    $trueAnswer = '440005';
                    break;
                case 4:
                    $trueAnswer = 'банана шамана';
                    break;
                case 5:
                    $trueAnswer = 'трех слонов';
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
     * Страница с указанием что делать после правильного ответа
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
                    $clueText = 'Отлично, теперь я смогу найти сокровища Моргана, спасибо тебе, ты оказался более полезен, чем я ожидал. Часть карты находится в большой зелёной книге в спальне';
                    break;
                case 3:
                    $clueText = 'Ух, ты! Ты все правильно посчитал, а мы -то думали, ты никогда не сможешь пройти это задание. Пираты привыкли полагаться на свою силу, а не на ум. Часть карты спрятана в стиральной машинке.';
                    break;
                case 4:
                    $clueText = 'Да ты молодец! Сам черт не нашел бы эту черную метку во всем белом свете. Из тебя получается отличный пират! Ну хорошо, хорошо, не буду утомлять тебя своей бессмысленными речами, часть карты спрятана у тебя под домиком.';
                    break;
                case 5:
                    $clueText = 'Вот это да!!! С твоей помощью я стал еще богаче чем раньше! Конечно мне придется еще поискать эти сокровища на остове, но у меня просто нюх на золотишко и я быстро его найду! Ах, да, ты хочешь узнать где часть карты ? Ммм.. дай-ка  подумать, кажется, я спрятал ее в почтовом ящике.';
                    break;
                case 6:
                    $clueText = '';
                    break;
            }

            $this->view->clue = $clueText;
            $this->view->questionNumber = $question;
        }
        else
            throw new \Exception("Не переадн номер вопроса!");
    }

}