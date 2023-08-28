# PHP Hotwire

PHP application development with Hotwire features.

## What is Hotwire

Hotwire (HTML OVER THE WIRE) is an alternative approach to building modern web applications without using much JavaScript by sending HTML instead of JSON over the wire. 

## Turbo

The heart of Hotwire is Turbo.

Turbo uses complementary techniques to dramatically reduce the amount of custom JavaScript that most web applications will need to write:

* Turbo Drive accelerates links and form submissions by negating the need for full page reloads.
* Turbo Frames decompose pages into independent contexts, which scope navigation and can be lazily loaded.
* Turbo Streams deliver page changes over WebSocket or in response to form submissions using just HTML and a set of CRUD-like actions.
* Turbo Native lets your majestic monolith form the center of your native iOS and Android apps, with seamless transitions between web and native sections.

It's all done by sending HTML over the wire. And for those instances when that's not enough, we will be reaching for the other side of Hotwire, and finish the job with [Stimulus](https://github.com/hotwired/stimulus).

Read more on [turbo.hotwired.dev](https://turbo.hotwired.dev).
