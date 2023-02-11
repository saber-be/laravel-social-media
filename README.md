## Social media challenge 

## Setup project
- Clone project repository
- Navigate to project root directory
- Run: `. vendor/bin/sail up -d`
- Run: `. vendor/bin/sail migrate`
- Run: `. vendor/bin/sail db:seed`
- go to http://localhost

## Run tests

```
~/project-root: . vendor/bin/sail test
```

# Updateds of challange 2

I pushed PostController and FollowerController and related interfaces, repositories, routes to the existing code.

You can check the project as admin user.
the UI part is not implemented just created some basic blades to list users, posts and create/edit post.

I implemented dependency injection/inversion in PostController and FollowerController.

tried to apply single responsiblity and open/closed principlese in new codes. but did not updated the existing codes related to user profile.


# Send Request As Android or iPhone:
The response will take effect Based on the User-Agent.
if user agent match with Android or iPhone the response will be jason otherwise response will be view.
also android and iPhone devices can have different responses.

add 'Android' or 'iPhone' keywords to the request's user-agent.
example:

```
User-Agent: Mozilla/5.0 iPhone(Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0
User-Agent: Mozilla/5.0 Android(Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0
```

I implemented some Responders that will produce the response based on the device.
you can see the list of them at configs/Responders.

Also created Some repository class and listed them in: configs.repositories

All requests handeled by SocialNetwork Object. 
I injected an Entity Repository and a Responder object to SocialNetwork object based on the user's device. 








