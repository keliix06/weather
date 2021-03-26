## Get Your Weather
Sample Laravel app integrating with two different APIs to get weather information for a given IP address.

The app took around 90 minutes to complete.

### See it in action
It uses Laravel 8, so you get to use Sail. If you have docker installed go to the directory you've cloned this to and run `./vendor/bin/sail up`. You can then access the site at http://localhost.

### Running the tests
The app was written using TDD, and is fully tested. You can see the tests in the /tests folder. In a larger project I would have mocked out the responses from the APIs so we aren't hitting them on every test run, but for something this small that wasn't required.

To run the tests run `./vendor/bin/sail test` from the folder that you have cloned the project to, assuming you have started the instance.
