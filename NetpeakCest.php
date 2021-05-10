<?php

 class NetpeakCest
{

    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function tryToTest(AcceptanceTester $I)
{
		$I->wantToTest('Get a job in Netpeak');
		//1. Перейти по ссылке на главную страницу сайта Netpeak. (https://netpeak.ua/).
		$I->amOnPage('/');
        $I->seeInTitle('Раскрутка сайта, продвижение сайтов: Netpeak Украина — performance-маркетинг для бизнеса');
		
		
		//2. Перейдите на страницу "Работа в Netpeak", нажав на кнопку "Карьера"
		$I->click('Карьера');
		$I->switchToNextTab(1);
		$I->waitForText('Я хочу работать в Netpeak', 10);
		
		//3. Перейти на страницу заполнения анкеты, нажав кнопку - "Я хочу работать в Netpeak".
		$I->click('Я хочу работать в Netpeak');
		
		//4. Загрузить файл с недопустимым форматом в блоке "Резюме", например png, и проверить что на странице появилось сообщение, 
		//о том что формат изображения неверный.
		$I->waitForElement('input[name=up_file]', 30);
		$I->attachFile('input[name=up_file]', 'testpng.png');
		$I->waitForText('Ошибка: данные файла не были переданы.', 10);
		
		//5. Заполнить случайными данными блок "3. Личные данные".
		$I->fillField('#inputName','Васий');
		$I->fillField('#inputLastname','Пупкин');
		$I->fillField('#inputEmail','pupkin@gm.ua');
		$I->fillField('#inputPhone','+380661112233');
		$I->selectOption('by', '1982');
		$I->selectOption('bm', 'ноября');
		$I->selectOption('bd', '7');
		
		//6. Нажать на кнопку отправить резюме.
		$I->click('Отправить анкету');
		
		//7. Проверить что сообщение на текущей странице - "Все поля являются обязательными для заполнения" - подсветилось красным цветом.
		$I->wait(3);
		$I->see('Все поля являются обязательными для заполнения','.has-error');
		
		//8. Перейти на страницу "Курсы" нажав соответствующую кнопку в меню и убедиться что открылась нужная страница.
		$I->click('Курсы');
		$I->seeInTitle('Образовательный Центр Netpeak: курсы по SEO, PPC, PHP в Одессе');
}

}