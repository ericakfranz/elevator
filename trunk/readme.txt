=== Elevator ===
Contributors: ericakfranz
Tags: scrolltotop, backtotop, navigation, music
Requires at least: 4.7
Tested up to: 7.1.0
Stable tag: 1.1.0
License: MIT
License URI: https://opensource.org/licenses/MIT

Elevator is a streamlined little WordPress plugin with only one purpose; to soothingly transport your visitors back to the top of the page!

== Description ==
Based on the brilliant script [Elevator.js](https://github.com/tholman/elevator.js). How can you resist the familiar notes and smooth ride we've all come to expect on a quality elevator ride?

Just activate and enjoy! The default music is Lounge Jazz. To preview all 26 tracks and change the default, go to Settings > Elevator. A ding always plays when your visitor reaches the top.

**Please note:** to keep the plugin small, the music files are in OGG format only. Browsers that cannot play OGG will still scroll to the top, but without sound. This includes Internet Explorer and Opera Mini, which do not support OGG at all, and Safari older than 14.1. Safari 14.1 to 18.3 (desktop) and Safari on iOS 17.4 to 18.3 have only partial OGG support, so some music may not play there.

**Try the [demo](https://fatpony.me/)** - at the bottom of the page select the 'Back to Top' link.

**Watch it in action**

https://www.youtube.com/watch?v=dZbC1CTxV4U

**Use it with your theme's own Back to Top link**
Already have a Back to Top link? Go to Settings > Elevator > Back to Top Link to turn off Elevator's link, or enter a CSS selector (such as `.back-to-top`) to add the music and smooth scroll to the link you already have.

**Customize Elevator**
You can also customize the appearance of Elevator with CSS. Need help? See the [Elevator Style Guide](https://fatpony.me/plugins/elevator/#style-guide).

**Credits**

Elevator by [Erica Franz](https://fatpony.me/). Plugin page: [fatpony.me/plugins/elevator](https://fatpony.me/plugins/elevator).

Elevator.js created by [Tim Holman](https://tholman.com/).

Plugin repo banner background by [Luigi Anzivino](https://www.flickr.com/photos/ilmungo/27091536), licensed Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International.

== Music Credits ==
All music is Creative Commons licensed. Thank you to: [1000 Handz](https://freemusicarchive.org/music/1000-handz/), [Aldous Ichnite](https://freemusicarchive.org/music/aldous-ichnite/), [Alex Morgan](https://freemusicarchive.org/music/alex-morgan/), [Andrew Walton](https://freemusicarchive.org/music/Andrew_Walton/), [AurosonMusic](https://freemusicarchive.org/music/aurosonmusic/), [Charlie and Todd](https://freemusicarchive.org/music/Charlie_and_Todd/), [Gagmesharkoff](https://freemusicarchive.org/music/gagmesharkoff/), [Jesus Ángel Morato](https://freemusicarchive.org/music/jesus-morato/), [Karen](https://freemusicarchive.org/music/Karen/), [Kevin MacLeod](https://freemusicarchive.org/music/Kevin_MacLeod/), [Lite Saturation](https://litesaturation.com/), [Lobo Loco](https://freemusicarchive.org/music/Lobo_Loco/), [Lopkerjo](https://freemusicarchive.org/music/john-lopker/), [Lundstroem](https://freemusicarchive.org/music/lundstroem/), [Monroeville Music Center](https://freemusicarchive.org/music/Monroeville_Music_Center/), PulseBox, [Shane Ivers](https://freemusicarchive.org/music/shane-ivers/), [Soularflair](https://soularflair.net/), [VADE](https://www.youtube.com/@iamvade), [Waveloom](https://freemusicarchive.org/music/waveloom/), and [wekont](https://soundcloud.com/wekont).

== Installation ==
1. Install Elevator either through your WordPress Plugins screen or by uploading the files to your server.
2. Activate Elevator.
3. Enjoy the elevator ride!

== Frequently Asked Questions ==

= No 'Back to Top' Button =

Elevator relies on the `wp_footer()` hook. If your theme doesn't include this tag somewhere (it is most commonly found in the footer.php template file, just before the closing body tag), then Elevator cannot work its magic. Check your theme first if Elevator's 'Back to Top' button isn't appearing on the page after you've activated the plugin.

= Audio not playing =

The music starts when a visitor clicks the link, which browsers generally allow. If there is no sound, the cause is usually one of these:

* The device or browser tab is muted, or the browser's site settings block sound for your site.
* The browser cannot play OGG audio (see the note in the Description).

The scroll to top still works without sound.

= My theme already has a Back to Top link =

Go to Settings > Elevator > Back to Top Link. You can either uncheck "Add the Back to Top link to the bottom of every page", or enter the CSS selector of your theme's link (for example `.back-to-top` or `#scroll-top`) in "Use my own link". Elevator will then play the music and scroll to the top when that link is clicked. If your theme's link has its own scrolling script, you may also need to turn that off in the theme.

= Can developers change this in code? =

Yes. Use these filters, which override the settings:

* `elevator_output_button` - return `false` to stop Elevator adding its link.
* `elevator_button_selector` - return a CSS selector for the element Elevator should attach to.

Example: `add_filter( 'elevator_output_button', '__return_false' );`

= 'Back to Top' Button Not Working =

If your 'Back to Top' button is loading, but the Elevator seems to be broken and stuck in the basement, check for JavaScript errors in your browser's console. You can use Google Chrome's Dev Tools for this. If you're unfamiliar with checking for JavaScript errors in your browser, I suggest you check out Julie Pagano's [JavaScript Debugging for Beginners](http://juliepagano.com/blog/2014/05/18/javascript-debugging-for-beginners/#developer-tools) article.

If your site is generating a JavaScript error, it's possible for it to conflict with Elevator and I suggest you resolve the JavaScript error before proceeding with any other troubleshooting.

== Upgrade Notice ==

= 1.1.0 =
IMPORTANT: The default music has changed to "Lounge Jazz". The original elevator music has been removed. You can now choose your music, and use your theme's own Back to Top link, at Settings > Elevator.

== Changelog ==

= 1.1.0 =
* **IMPORTANT: The default music is now "Lounge Jazz" by AurosonMusic.** The original elevator music has been removed from the plugin.
* New: Settings > Elevator page with 26 tracks to choose from, each with a preview button.
* Music files are OGG only, to keep the plugin small. Browsers that cannot play OGG will scroll without sound.
* New: Back to Top Link tab in Settings > Elevator. Turn off Elevator's own link, or attach it to an existing link with a CSS selector.
* New: `elevator_output_button` and `elevator_button_selector` filters.
* Credits added for all music artists.
* Now requires WordPress 4.7 or newer.

= 1.0.5.5 =
* Version bump, compatible with WordPress 7.1.0

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
