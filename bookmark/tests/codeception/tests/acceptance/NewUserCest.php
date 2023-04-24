<?php

class NewUserCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');

    }

    // tests
   public function newUserRegister(AcceptanceTester $I)
   {
       # Act
       $I->amOnPage('/register');

       # Assert the existence of a certain element on the page
       $I->seeElement('#email');

       # Interact with form elements
       $I->fillField('[test=name-input]', 'sally');
       $I->fillField('[test=email-input]', 'sally@harvard.edu');

       $I->fillField('[test=password-input]', 'asdfasdf');
       $I->fillField('[test=password-confirm-input]', 'asdfasdf');

       $I->click('[test=register-button]');

       # Assert expected results
       $I->see('sally');

       # Assert the existence of text within a specific element on the page
       $I->see('Logout', 'nav');
   }

   public function badUserRegister(AcceptanceTester $I)
   {
       # Act
       $I->amOnPage('/register');

       # Assert the existence of a certain element on the page
       $I->seeElement('#email');

       # Interact with form elements
       $I->fillField('[test=name-input]', 'bob');
       $I->fillField('[test=email-input]', 'bobharvard.edu');

       $I->fillField('[test=password-input]', 'asdfasdf');
       $I->fillField('[test=password-confirm-input]', 'asdfasdf');

       $I->click('[test=register-button]');

       # See register means still on same page
       $I->see('Register');

   }
}