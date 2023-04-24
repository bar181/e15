<?php


class BookIndexPageCest
{
    public function _before(AcceptanceTester $I)
    {

        # Running migrations before each test via the _before method
        // $I->amOnPage('/test/refresh-database');

    }

    public function showsNewBooks(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/2');
        $I->amOnPage('/books');

        # Assert there are 3 results
        $resultCount = count($I->grabMultiple('[test=new-book-link]'));
        $I->assertEquals(3, $resultCount);
    }
}