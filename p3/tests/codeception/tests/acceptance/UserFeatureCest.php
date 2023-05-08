<?php

class UserFeatureCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');

    }

    // tests
    public function userLogin(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/login');

        # Interact with form elements
        $I->fillField('[test=email-input]', 'jill@harvard.edu');
        $I->fillField('[test=password-input]', 'asdfasdf');
        $I->click('[test=login-button]');

        # Assert expected results
        $I->see('Jill Harvard');
        $I->see('Logout', 'nav');
    }

    public function badUserLogin(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/login');

        # Interact with form elements
        $I->fillField('[test=email-input]', 'jill@harvard.edu');
        $I->fillField('[test=password-input]', 'ImABadPassword!');
        $I->click('[test=login-button]');

        # Assert expected results
        $I->dontsee('Jill Harvard');
    }

    public function unauthAuthViewingDifferences(AcceptanceTester $I)
    {
        # While unauth
        $I->amOnPage('/');
        $I->expect('Visitor cannot see specific elements');

        $I->amOnPage('/bars/create');
        $I->dontseeElement('[test=create-bar-button]');

        $I->amOnPage('/bars/simpsons-family');
        $I->dontseeElement('[test=show-edit-link]');

        $I->expect('Views different when user');

        # Login as Jill
        $I->amOnPage('/test/login-as/2');

        $I->amOnPage('/bars/create');
        $I->seeElement('[test=create-bar-button]');

        $I->amOnPage('/bars/simpsons-family');
        $I->seeElement('[test=show-edit-link]');


    }

    public function userCanRegister(AcceptanceTester $I)
    {
        # Act
        $name = 'Test User';
        $I->amOnPage('/register');
        $I->fillField('[test=name-input]', $name);
        $I->fillField('[test=email-input]', 'test@email.com');
        $I->fillField('[test=password-input]', 'asdfasdf');
        $I->fillField('[test=password-confirmation-input]', 'asdfasdf');
        $I->click('[test=register-button]');

        # Assert
        $I->see($name);
        $I->see('Logout', 'nav');
    }

}