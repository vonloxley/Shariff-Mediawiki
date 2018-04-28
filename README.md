Shariff-Mediawiki
=================

A mediawiki-extension for [Shariff](https://github.com/heiseonline/shariff), 
protecting users privacy.

Setup
-----
1. Unpack in the `extensions`-folder of your mediawiki.
2. Edit `Shariff/shariff-backend/shariff.json` and set the key
   `"domain":` to your domain name.
3. Add `require_once("$IP/extensions/Shariff/Shariff.php");` to
   `LocalSettings.php`
4. Copy or link the `fonts` folder to your web-root.
5. Write `{{#shariffLike:}}` wherever you want to use social-media-buttons.

