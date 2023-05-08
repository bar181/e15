<?php

class DeleteFeatureCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');

    }

    // tests
    public function deleteBarForAUser(AcceptanceTester $I)
    {

        # Act
        $I->amOnPage('/test/login-as/2');
        $I->amOnPage('/');

        # Visibility before (remove id=4 for Jill)
        $I->seeElement('[test=show-id-4]');
        $I->click('[test=delete-button-4]');
        $I->see('About my family');

        # Visibility after delete
        $I->click('[test=confirm-delete-button]');
        $I->dontseeElement('[test=show-id-4]');
    }
}