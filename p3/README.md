# Project 3  e15
+ By: Bradley Ross
+ URL: <http://e15p3.bradross.me>

## Feature summary
This site formats user inputs into presentation slides - making them Brief and Readable. 
It is a content creation site that follows best practices of a catelog application.  We call use the term BAR (Brief and Readable) to brand our style of slides.  
Inspiration for this design is based on Instagram, the array of new GPT slide generators and my own professional/non-professional works. 
In general, a user creates a BAR by inputing text and selecting their preferred images.
Users can view portfolios (public items only) of other users

+ Visitors can search and view (public) BARs
+ Visitors can register/log in to create their own BAR
+ Users can add/update BARs in their collection including setup details (BAR name, topic, shareable flag) and contents (inputs include images)
+ Users can make a BAR shareable or private 
+ Users can soft delete their own BAR
+ Users can view a list of other users with shareable BARs
+ Users can view the portfolio of other users (only shareable items)
+ Sample BARs and users are provided 
+ use soft deletes
+ added middleware to ensure user is author for any edit/delete functionality
+ The home page features
  + Searchable public gallery
  + Users can create, view their own works (from here users can view, edit or soft delete their works)
  + Users can view list of other users with public works (from here they can seee the other user's public portfolio)
+ The create/edit BAR pages feature
  + User inputs 
  + Unique slug 
  + List of available images to use (each uses a foreign key to images table)
  + Flag for private/public
+ The viewing page features
  + Stylized output
  + Option for author to edit 

## Database summary
+ 3 tables in total (`users`, `bars`, `images`)
+ One-to-many relationship between `users` and `bars`
+ Multiple one-to-many relationship between `bars` and `images`

## Outside resources
+ [tailwind css - framework](https://tailwindcss.com/)
+ [midjourney - image creation](https://www.midjourney.com/app/)
+ [fontawesome icons](https://fontawesome.com)
+ [soft deletes](https://www.educative.io/answers/how-to-perform-soft-delete-in-laravel)


## Outside support - chatGpt Prompts
+ how to merge user with form validation before passing to class constructor (references BarController/store)
+ how to display or not display an empty array in a Laravel blade
+ is it okay to include a div within an li
+ how to pass current class and form request to an action class to update from a form input
+ default value for a drop down menu - priority is old, then saved value
+ format date using carbon (show only date not time stamp)
+ create a custom authentication middleware in laravel (user is author) 
+ laravel query using eloquent to groupBy share count (share is a field)

## Notes for instructor
+ images within this document were generated using midjourney (AI Art), prompts by Bradley Ross
+ for graduate credit


## requirements checklist
+ CRUD operations: 4 (create, read, update, soft delete)
+ Database relationships: user-bar, bar-image
+ Unique features: custom middleware, public viewing option, author only viewing option, image selection, slide-style presentation, soft delete, view other users with shareable items, view portfolio of other users
+ Laravel auth, seeded migrations, blade syntax with inheritance
+ Specific users provided as required (e.g. Jill, Jamal)
+ No Javascript used for validations
+ Testing via Codeception 


## Test Results
```
/var/www/e15/p3/tests/codeception# codecept run acceptance --steps
Codeception PHP Testing Framework v4.2.2 https://helpukrainewin.org
Powered by PHPUnit 8.5.28 #StandWithUkraine

Acceptance Tests (11) ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
BarCreatePageCest: Create a new bar
Signature: BarCreatePageCest:createANewBar
Test: tests/acceptance/BarCreatePageCest.php:createANewBar
Scenario --
 I am on page "/test/refresh-database"
 I am on page "/test/login-as/2"
 I am on page "/bars/create"
 I fill field "[test=name-input]","Business Testing"
 I fill field "[test=slug-input]","business-1"
 I fill field "[test=topic-input]","Business"
 I select option "[test=image1_id-dropdown]",2
 I select option "[test=image2_id-dropdown]",4
 I select option "[test=image3_id-dropdown]",12
 I fill field "[test=content1-input]","Business is fun"
 I fill field "[test=content2-input]","Business what I do not who I am"
 I fill field "[test=content3-input]","Go You"
 I check option "[test=share-checkbox]"
 I click "[test=create-bar-button]"
 I see "Topic: Business"
 I see "Shareable"
 PASSED 

BarCreatePageCest: Show validations
Signature: BarCreatePageCest:showValidations
Test: tests/acceptance/BarCreatePageCest.php:showValidations
Scenario --
 I am on page "/test/refresh-database"
 I am on page "/test/login-as/2"
 I am on page "/bars/create"
 I fill field "[test=name-input]","Validation Testing"
 I click "[test=create-bar-button]"
 I expect a global error message
 I see element "[test=error-global]"
 I expect a generic error
 I see element "[test=error-field-content1]"
 I expect a field error for a custom label
 I see element "[test=error-field-slug]"
 PASSED 

BarCreatePageCest: Prevents duplicate slugs
Signature: BarCreatePageCest:preventsDuplicateSlugs
Test: tests/acceptance/BarCreatePageCest.php:preventsDuplicateSlugs
Scenario --
 I am on page "/test/refresh-database"
 I am on page "/test/login-as/2"
 I am on page "/bars/create"
 I fill field "[test=slug-input]","harvard"
 I click "[test=create-bar-button]"
 I see "The Short URL has already been taken.","[test=error-field-slug]"
 PASSED 

BarEditPageCest: Edit an existing bar
Signature: BarEditPageCest:editAnExistingBar
Test: tests/acceptance/BarEditPageCest.php:editAnExistingBar
Scenario --
 I am on page "/test/refresh-database"
 I am on page "/test/login-as/1"
 I am on page "/bars/harvard/edit"
 I fill field "[test=name-input]","Business Testing"
 I fill field "[test=slug-input]","business-1"
 I fill field "[test=topic-input]","Business"
 I select option "[test=image1_id-dropdown]",2
 I select option "[test=image2_id-dropdown]",4
 I select option "[test=image3_id-dropdown]",12
 I fill field "[test=content1-input]","Business is fun"
 I fill field "[test=content2-input]","Business what I do not who I am"
 I fill field "[test=content3-input]","Go You"
 I check option "[test=share-checkbox]"
 I click "[test=edit-bar-button]"
 I see "Topic: Business"
 I see "Shareable"
 PASSED 

BarEditPageCest: Edit for author only
Signature: BarEditPageCest:editForAuthorOnly
Test: tests/acceptance/BarEditPageCest.php:editForAuthorOnly
Scenario --
 I am on page "/test/refresh-database"
 I am on page "/test/login-as/3"
 I am on page "/bars/harvard/edit"
 I expect another user cannot reach wrong edit page
 I see "403"
 PASSED 

BarEditPageCest: Show validations
Signature: BarEditPageCest:showValidations
Test: tests/acceptance/BarEditPageCest.php:showValidations
Scenario --
 I am on page "/test/refresh-database"
 I am on page "/test/login-as/1"
 I am on page "/bars/harvard/edit"
 I fill field "[test=content1-input]",""
 I fill field "[test=slug-input]","php"
 I click "[test=edit-bar-button]"
 I see "The Short URL has already been taken.","[test=error-field-slug]"
 I expect a global error message
 I see element "[test=error-global]"
 PASSED 

HomePageCest: Search function
Signature: HomePageCest:searchFunction
Test: tests/acceptance/HomePageCest.php:searchFunction
Scenario --
 I am on page "/test/refresh-database"
 I am on page "/"
 I fill field "[test=search-input]","Business "
 I click "[test=search-button]"
 I see "Pitch for Kids Books"
 I don't see "About Animals"
 PASSED 

UserFeatureCest: User login
Signature: UserFeatureCest:userLogin
Test: tests/acceptance/UserFeatureCest.php:userLogin
Scenario --
 I am on page "/test/refresh-database"
 I am on page "/login"
 I fill field "[test=email-input]","jill@harvard.edu"
 I fill field "[test=password-input]","asdfasdf"
 I click "[test=login-button]"
 I see "Jill Harvard"
 I see "Logout","nav"
 PASSED 

UserFeatureCest: Bad user login
Signature: UserFeatureCest:badUserLogin
Test: tests/acceptance/UserFeatureCest.php:badUserLogin
Scenario --
 I am on page "/test/refresh-database"
 I am on page "/login"
 I fill field "[test=email-input]","jill@harvard.edu"
 I fill field "[test=password-input]","ImABadPassword!"
 I click "[test=login-button]"
 I don't see "Jill Harvard"
 PASSED 

UserFeatureCest: Unauth auth viewing differences
Signature: UserFeatureCest:unauthAuthViewingDifferences
Test: tests/acceptance/UserFeatureCest.php:unauthAuthViewingDifferences
Scenario --
 I am on page "/test/refresh-database"
 I am on page "/"
 I see "Login First"
 I see element "[test=nav-login-link]"
 I don't see "About my family"
 I don't see element "[test=addbar-create-link]"
 I am on page "/bars/create"
 I don't see element "[test=create-bar-button]"
 I am on page "/bars/simpsons-family"
 I don't see element "[test=show-edit-link]"
 I am on page "/test/login-as/2"
 I am on page "/"
 I see "About my family"
 I see element "[test=addbar-create-link]"
 I am on page "/bars/create"
 I see element "[test=create-bar-button]"
 I am on page "/bars/simpsons-family"
 I see element "[test=show-edit-link]"
 PASSED 

UserFeatureCest: User can register
Signature: UserFeatureCest:userCanRegister
Test: tests/acceptance/UserFeatureCest.php:userCanRegister
Scenario --
 I am on page "/test/refresh-database"
 I am on page "/register"
 I fill field "[test=name-input]","Test User"
 I fill field "[test=email-input]","test@email.com"
 I fill field "[test=password-input]","asdfasdf"
 I fill field "[test=password-confirmation-input]","asdfasdf"
 I click "[test=register-button]"
 I see "Test User"
 I see "Logout","nav"
 PASSED 

-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


Time: 53.87 seconds, Memory: 18.66 MB

OK (11 tests, 28 assertions)
```