# Elevator WordPress Plugin

A scroll-to-top solution that musically soothes your visitors while smoothly scrolling them to the top of their screen. Complete with a 'Ting!' once you arrive at your destination.

Based on the brilliant script [Elevator.js](https://github.com/tholman/elevator.js). How can you resist the familiar notes and smooth ride we've all come to expect on a quality elevator ride?

**[Try the demo](https://fatpony.me/)** - at the bottom of the page select the 'Back to Top' link.

## Video

[![Elevator plugin demo video](https://img.youtube.com/vi/dZbC1CTxV4U/hqdefault.jpg)](https://www.youtube.com/watch?v=dZbC1CTxV4U)

## Installation

1. Install Elevator either through your WordPress Plugins screen or by uploading the files to the `/wp-content/plugins/` directory via FTP.
2. Activate Elevator.
3. Enjoy the elevator ride! To preview the music and change the default, go to **Settings > Elevator**.

## Choose your music

Go to **Settings > Elevator** to pick from 26 tracks and preview each one. The ding always plays at the top. The default music is "Lounge Jazz" by AurosonMusic.

Music files are OGG only to keep the plugin small. Browsers that cannot play OGG still scroll to the top, but without sound. This includes Internet Explorer and Opera Mini, which do not support OGG at all, and Safari older than 14.1. Safari 14.1 to 18.3 (desktop) and Safari on iOS 17.4 to 18.3 have only partial OGG support, so some music may not play there.

## Use with your theme's Back to Top link

Go to **Settings > Elevator > Back to Top Link** to uncheck Elevator's own link, or enter a CSS selector (such as `.back-to-top`) in **Use my own link** to add the music and smooth scroll to a link you already have. If your theme's link has its own scrolling script, you may also need to turn that off in the theme.

Developers can use these filters, which override the settings:

- `elevator_output_button` - return `false` to stop Elevator adding its link.
- `elevator_button_selector` - return a CSS selector for the element Elevator should attach to.

```php
add_filter( 'elevator_output_button', '__return_false' );
```

## Customization

You can customize the appearance of Elevator with CSS. Need help? See the [Elevator Style Guide](https://fatpony.me/plugins/elevator/#style-guide).

## Support

Please [open an issue](https://github.com/ericakfranz/elevator/issues/new) for support.

## Contributing

Please contribute using [GitHub Flow](https://guides.github.com/introduction/flow/). Create a branch, add commits, and [open a pull request](https://github.com/ericakfranz/elevator/compare/).

## Credits

- Elevator by [Erica Franz](https://fatpony.me/) ([plugin page](https://fatpony.me/plugins/elevator)).
- Based on [Elevator.js](https://github.com/tholman/elevator.js) by [Tim Holman](https://tholman.com/).
- Plugin repo banner background by [Luigi Anzivino](https://www.flickr.com/photos/ilmungo/27091536), licensed Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International.
- All music is Creative Commons licensed. Thank you to: 1000 Handz, Aldous Ichnite, Alex Morgan, Andrew Walton, AurosonMusic, Charlie and Todd, Gagmesharkoff, Jesus Ángel Morato, Karen, Kevin MacLeod, Lite Saturation, Lobo Loco, Lopkerjo, Lundstroem, Monroeville Music Center, PulseBox, Shane Ivers, Soularflair, VADE, Waveloom and wekont. Full links are in `readme.txt`.

## Changelog

##### 1.1.0
- **The default music is now "Lounge Jazz" by AurosonMusic; the original music is removed.**
- New Settings > Elevator page with 26 previewable tracks.
- New Back to Top Link tab: turn off Elevator's own link, or attach it to an existing link with a CSS selector.
- New `elevator_output_button` and `elevator_button_selector` filters.
- Requires WordPress 4.7+.

##### 1.0.5.5
- Version bump, compatible with WordPress 7.1.0

##### 1.0.5.4
- Version bump, compatible with WordPress 6.0.1

##### 1.0.5.3
- Version bump, compatible with WordPress 4.8.1

##### 1.0.5.2
- Version bump, compatible with WordPress 4.5

##### 1.0.5.1
- Version bump, compatible with WordPress 4.4

##### 1.0.5
- Fix elevator-music.ogg audio issue at start

##### 1.0.4
- Replace .MP3 files with .OGG to resolve occasional issue of music not playing in Chrome and Chromium browsers.

##### 1.0.3
- Fix version number for dependencies

##### 1.0.2
- Version bump, compatible with WordPress 4.3

##### 1.0.1
- Remove curly quotes in FAQ

##### 1.0.0
- Initial Release
