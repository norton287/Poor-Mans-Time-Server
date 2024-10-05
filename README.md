# Poor-Mans-Time-Server
Down and dirty alternative to an NTP Time Server.  Returns a JSON object with the servers time in UNIX format based on the servers current system time.

## How it works 
- Grabs the current system time and returns it to the client in UNIX system time.
- Micropython example of how to query the end point and then covert it from UNIX Epoch to something that can be used to set the SBC RTC.

## This is a working example that should be expanded and improved to work for you
```
https://time.spindlecrank.com
```
- Put the endpoint behind something like a Cloudflare tunnel to help protect it.  Do not expose it directly to the Internet....ever.
- You can query the sample endpoint to view the JSON returned for your reference.
- The Micropython is as is and needs to be modified accordingly to suit your systems implementation of it.

## Why this is necessary 
- Some home rolled implementations of the ntptime library do not allow you to set a time server to sync with and this is actually faster.

## PRs to improve this are welcome as always.
- This is just an example and shouldn't be used in a production environment.
- This does rely on the system endpoints time being correct.  Also, in your clients code do the necessary TZ offset adjustment if they are in different time zones.

## Enjoy and see what else you can do with this
