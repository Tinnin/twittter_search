# twittter_search
API to search for last 50 tweets with hashtag "#London" with filter:safe

API route "api/tweets"

Demo call through app root with pagination

Uses thu/john twitter API which also takes care of the error handling for the Twitter calls

Need to add Twitter credentials to .env:
TWITTER_CONSUMER_KEY=
TWITTER_CONSUMER_SECRET=
TWITTER_ACCESS_TOKEN=
TWITTER_ACCESS_TOKEN_SECRET=

Single integration test to test API call success, structure and caching
