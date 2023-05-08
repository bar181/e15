<?php

class PortfolioFeatureCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/test/refresh-database');

    }

    // tests
    public function canSeeValidPortfolios(AcceptanceTester $I)
    {

        # Act
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/portfolios');

        # See public portfolios
        $I->seeElement('[test=portfolio-2-link]');

        $I->expect('Cannot see users with only private portfolios');
        $I->dontseeElement('[test=portfolio-4-link]');

    }

    public function canSeeASpecificPortfolio(AcceptanceTester $I)
    {

        # Act
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/portfolios');
        $I->click('[test=portfolio-2-link]');

        # Portfolio Views
        $I->expect('Cannot see other user BARs');
        $I->dontseeElement('[test=bar-1-link]');

        $I->expect('Private BAR is hidden');
        $I->dontseeElement('[test=bar-4-link]');

        $I->expect('Public BAR is available to click');
        $I->seeElement('[test=bar-3-link]');
        $I->click('[test=bar-3-link]');
        $I->expect('About Animals');

    }
}