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

    public function homePageViewingDifferences(AcceptanceTester $I)
    {
        # While unauth
        $I->amOnPage('/');

        $I->expect('Visitor cannot see auth only elements');
        $I->see('Login First');
        $I->seeElement('[test=nav-login-link]');

        $I->dontsee('View Other Portfolios');
        $I->dontseeElement('[test=portfolios-index-link]');

        $I->dontsee('About my family');
        $I->dontseeElement('[test=addbar-create-link]');

        # Login as Jill - views change
        $I->expect('User can see more details');

        $I->amOnPage('/test/login-as/2');
        $I->amOnPage('/');

        $I->see('About my family');
        $I->seeElement('[test=addbar-create-link]');

        $I->see('View Other Portfolios');
        $I->seeElement('[test=portfolios-index-link]');

    }
}