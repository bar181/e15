<?php

class HomePageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');

    }

    // tests
    public function searchFunction(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/');

        # Interact with form elements
        $I->fillField('[test=search-input]', 'Business ');
        $I->click('[test=search-button]');

        # Assert expected results
        $I->see('Pitch for Kids Books');
        $I->dontsee('About Animals');
    }
}