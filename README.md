# Create a subscription for a User using Braintree

- This repo creates an api for a user to subscribe to a plan using Braintree.

### Installation

- Clone and `composer install`
- Create a new database called `test_braintree`. Fill in your local db credentials.
- run the tests

### Tests
- Test are mocked using `MocksBraintree` and using it inside the test as `->setupMockHandler()`. You may choose to remove this to test real(sandbox) transactions. This mock is created so not to hit the braintree server but returns needed properties as per test needed.

- run using `./vendor/bin/phpunit`