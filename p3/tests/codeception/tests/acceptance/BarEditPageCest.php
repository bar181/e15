<?php

class BarEditPageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');

    }

    // tests
    public function editAnExistingBar(AcceptanceTester $I)
    {
        # Act

        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/bars/harvard/edit');

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

        $I->click('[test=edit-bar-button]');

        # Assert expected results
        $I->see('Topic: Business');
        $I->see('Shareable');
    }

     public function editForAuthorOnly(AcceptanceTester $I)
     {
         # Act

         $I->amOnPage('/test/login-as/3');
         $I->amOnPage('/bars/harvard/edit');

         $I->expect('another user cannot reach wrong edit page');
         $I->see('403');

     }

     public function showValidations(AcceptanceTester $I)
     {
         # Act

         $I->amOnPage('/test/login-as/1');
         $I->amOnPage('/bars/harvard/edit');

         $I->fillField('[test=content1-input]', '');
         $I->fillField('[test=slug-input]', 'php');
         $I->click('[test=edit-bar-button]');

         # Assert
         $I->see('The Short URL has already been taken.', '[test=error-field-slug]');
         $I->expect('a global error message');
         $I->seeElement('[test=error-global]');

     }

}