# HE Twitch Bot : On stream donations

## What is it ?
This bot is a PHP script checking the HiveEngine network. When a transaction to the selected account is detected, it triggers an animation on the webpage. The animation is accompanied by a sound and also prints the donation's sender, amount and memo/message. This bot can be used with any programmable to show a webpage with transparent background, like StreamLabsOBS or XSplit.

## Team

Original idea : [@itharagaian](https://peakd.com/@itharagaian)
Developer : [@bambukah](https://peakd.com/@bambukah)

## How to install the script ?

### Requirements

- PHP 7.2+ with CLI
- php-zip, php-xml & php-curl packages

### Installation
- Clone this repository :  `git clone https://github.com/fkosmala/he-twitch`
- Go to directory : `cd he-twitch`
- Install [Composer](https://getcomposer.org/) and run : `php composer.phar update`

### Configuration
This PHP script is based on Slim 4 Framework. The configuration for your webserver is available on [Slim 4 WebServer documentation](http://www.slimframework.com/docs/v4/start/web-servers.html).

### Edit the config file
Edit the `config.json` file to edit your account and token to follow.

### Edit animation & sound
You can also change the `anim.webm` animation or the `coin.mp3` sound.

### Add view to your streaming software
Add a browser source into your stream software like OBS, StreamLabs OBS or XSplit. Follow this [tutorial](https://plsoid.medium.com/how-to-add-browser-source-in-obs-streamlabs-obs-twitch-studio-xsplit-50a698080497) if you do not know how to manage Browser sources. If you have some display issues, set the height & the width at 2000 or adapt to your screen configuration.

## Help us :)
If you want to help, you can donate to @itharagaian and/or @bambukah with HIVE or any HIVE Token.

## To Do

- Add HIVE (not only HE tokens)
- Create a hosted service
