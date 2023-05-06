<?php

class BarCreatePageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');

    }

    // tests
    public function createANewBar(AcceptanceTester $I)
    {
        # Act

        $I->amOnPage('/test/login-as/2');
        $I->amOnPage('/bars/create');


        # Interact with form elements
        $I->fillField('[test=name-input]', 'Business Testing');
        $I->fillField('[test=slug-input]', 'business-1');
        $I->fillField('[test=topic-input]', 'Business');
        $I->selectOption('[test=image1_id-dropdown]', 2);
        $I->selectOption('[test=image2_id-dropdown]', 4);
        $I->selectOption('[test=image3_id-dropdown]', 12);
        $I->fillField('[test=content1-input]', 'Business is fun');
        $I->fillField('[test=content2-input]', 'Business what I do not who I am');
        $I->fillField('[test=content3-input]', 'Go You');
        $I->checkOption('[test=share-checkbox]');

        $I->click('[test=create-bar-button]');

        # Assert expected results
        $I->see('Topic: Business');
        $I->see('Shareable');


    }

     public function showValidations(AcceptanceTester $I)
     {
         # Act

         $I->amOnPage('/test/login-as/2');
         $I->amOnPage('/bars/create');

         # Interact with form elements
         $I->fillField('[test=name-input]', 'Validation Testing');
         $I->click('[test=create-bar-button]');

         # Assert expected results
         $I->expect('a global error message');
         $I->seeElement('[test=error-global]');
         $I->expect('a generic error');
         $I->seeElement('[test=error-field-content1]');
         $I->expect('a field error for a custom label');
         $I->seeElement('[test=error-field-slug]');

     }

     public function preventsDuplicateSlugs(AcceptanceTester $I)
     {
         # Setup
         $I->amOnPage('/test/login-as/2');

         # Act
         $I->amOnPage('/bars/create');
         $I->fillField('[test=slug-input]', 'harvard');
         $I->click('[test=create-bar-button]');

         # Assert
         $I->see('The Short URL has already been taken.', '[test=error-field-slug]');
     }
}