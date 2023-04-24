<?php

class LoginPageCest
{
    /**
     * Any code you put in this method will be executed before each test
     */
    public function _before(AcceptanceTester $I)
    {
        # Running migrations before each test via the _before method
        // $I->amOnPage('/test/refresh-database');
    }

    /**
     *
     */
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/login');

        # Assert the existence of certain text on the page
        $I->see('Login');

        $I->seeElement('#email');
    }

    /**
     *
     */
    public function userCanLogIn(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/login');

        # Assert the existence of a certain element on the page
        $I->seeElement('#email');

        # Interact with form elements
        $I->fillField('[test=email-input]', 'jill@harvard.edu');
        $I->fillField('[test=password-input]', 'asdfasdf');
        $I->click('[test=login-button]');

        # Assert expected results
        $I->see('Jill Harvard');

        # Assert the existence of text within a specific element on the page
        $I->see('Logout', 'nav');
    }

    public function badUserLogIn(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/login');

        # Assert the existence of a certain element on the page
        $I->seeElement('#email');

        # Interact with form elements
        $I->fillField('[test=email-input]', 'jill@harvard.edu');
        $I->fillField('[test=password-input]', 'IamABadPassword');
        $I->click('[test=login-button]');

        # Assert expected results
        $I->see('These credentials do not match our records');
    }

    public function logout(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/2');
        $I->amOnPage('/books');

        $I->click('[test=logout-button]', 'nav');
        $I->amOnPage('/');
        $I->see('Login', 'nav');
    }
}