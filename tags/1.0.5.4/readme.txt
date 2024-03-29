=== Elevator ===
Contributors: ericakfranz
Tags: scrolltotop,backtotop,navigation,music
Requires at least: 3.5
Tested up to: 6.0.1
Stable tag: 1.0.5.4
License: MIT
License URI: http://opensource.org/licenses/MIT

Elevator is a streamlined little WordPress plugin with only one purpose; to soothingly transport your visitors back to the top of the page!

== Description ==
Based on the brilliant script [Elevator.js](https://github.com/tholman/elevator.js). How can you resist the familiar notes and smooth ride we've all come to expect on a quality elevator ride?

Just activate and enjoy!

[demo](https://www.writingofriding.com/) - at the bottom of the page select 'Back to Top' link.

**Customize Elevator**
You can also customize the appearance of Elevator with CSS. Need help? See the [Elevator Style Guide](https://fatpony.me/plugins/elevator/style-guide/).


Elevator.js created by [Tim Holman](http://tholman.com/).
Audio (sourced from [BenSound](http://www.bensound.com/)) is Creative Commons.
Plugin Repo Banner Image, Background (sourced from [Luigi Anzivino](https://www.flickr.com/photos/ilmungo/27091536)) is Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International.

== Installation ==
1. Install Elevator either through your WordPress Plugins screen or by uploading the files to your server.
2. Activate Elevator.
3. Enjoy the elevator ride!

== Frequently Asked Questions ==

= No 'Back to Top' Button =

Elevator uses the wp_footer(); tag to hook into. If your theme doesn't include this tag somewhere (it's most commonly found in the footer.php template file, just before the closing tag), then Elevator can't work it's magic. Check your theme first if Elevator's 'Back to Top' button isn't appearing on the page after you've activated the plugin.

= Audio not playing =

Some browsers now mute all sounds by default. You may need to adjust your browser's settings to allow the audio to play, or take another action on the page first before using the Back to Top link.

As of 2020, this will most often affect visitors using Firefox (all platforms) and Chrome (Android being most common). You should still expect the scroll to top functionality to work even in the absence of sound.

I'm working on a solution to this issue in a future update.

= 'Back to Top' Button Not Working =

If your 'Back to Top' button is loading, but the Elevator seems to be broken and stuck in the basement, check for JavaScript errors in your browser's console. You can use Google Chrome's Dev Tools for this. If you're unfamiliar with checking for JavaScript errors in your browser, I suggest you check out Julie Pagano's [JavaScript Debugging for Beginners](http://juliepagano.com/blog/2014/05/18/javascript-debugging-for-beginners/#developer-tools) article.

If your site is generating a JavaScript error, it's possible for it to conflict with Elevator and I suggest you resolve the JavaScript error before proceeding with any other troubleshooting.

== Changelog ==

= 1.0.5.4 =
* Version bump, compatible with WordPress 6.0.1

= 1.0.5.3 =
* Version bump, compatible with WordPress 4.8.1

= 1.0.5.2 =
* Version bump, compatible with WordPress 4.5

= 1.0.5.1 =
* Version bump, compatible with WordPress 4.4

= 1.0.5 =
* Fix elevator-music.ogg audio issue at start

= 1.0.4 =
* Replace .MP3 files with .OGG to resolve occasional issue of music not playing in Chrome and Chromium browsers.

= 1.0.3 =
* Fix version number for dependencies

= 1.0.2 =
* Version bump, compatible with WordPress 4.3

= 1.0.1 =
* Remove curly quotes in FAQ

= 1.0.0 =
* Initial Release
