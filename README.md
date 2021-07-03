Shariff-Mediawiki
=================

A mediawiki-extension for [Shariff](https://github.com/heiseonline/shariff), 
protecting users privacy.

Setup
-----
1. Unpack in the `extensions`-folder of your mediawiki.
2. Edit `Shariff/shariff-backend/index.php` and set the key
   `"domain":` to your domain name.
3. Add `wfLoadExtension('Shariff');` to
   `LocalSettings.php`
4. Write `{{#shariffLike:}}` wherever you want to use social-media-buttons.

Configuration
-------------
Without further configuration, the default setting shows twitter, facebook and pinterest links. To change the services, set the variable `$wgShariffServices` (make shure, it is in one line without spaces).

`$wgShariffServices = "twitter,facebook,linkedin,print,info";`

For selecting all services, use this

`$wgShariffServices = "addthis,diaspora,facebook,flattr,flipboard,linkedin,mail,pinterest,print,qzone,reddit,stumbleupon,telegram,tencent-weibo,threema,tumblr,twitter,vk,weibo,whatsapp,xing,info";`

For a list of all available services, see https://github.com/heiseonline/shariff
