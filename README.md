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


# Send Request As Android or iPhone:

add 'Android' or 'iPhone' keywords to the request's user-agent.
example:

```
User-Agent: Mozilla/5.0 iPhone(Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0
User-Agent: Mozilla/5.0 Android(Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0
```