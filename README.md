# Calendar API

API built with php Lumen microframework to be used for Android Application Calendar Tracker - link https://github.com/mjj0404/calendar_tracker_android

All the GET methods requires a valid Google OAuth id token to be sent along with the request as a bearer token, otherwise will return 405 error.

Middleware Authentication verifies id token with Google Server to verify valid OAuth id token as id token expires in 60 minutes.

See [link](https://developers.google.com/identity/protocols/oauth2) for more detail 

User data kept in 3rd party private server:
user email | name of the event added by user | the date of the event
