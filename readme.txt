=== Regiondo ShortCodes ===
Contributors: derhaeuptling
Donate link: https://derhaeuptling.de/
Tags: regiondo, widgets, iframe, booking
Requires at least: 5.0
Tested up to: 5.7.3
Stable tag: trunk
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Add Regiondo Widgets through Wordpress Shortcodes without the need to copy iFrames. Available Widgets: Booking, Reviews and Voucher.

== Description ==

## shortcodes
Add Regiondo Widgets through Wordpress Shortcodes without the need to copy iFrames. 
Available Widgets are: Booking Widget, Reviews Widget and Voucher Widget.


__[regiondo_booking offer=xxxxx]__
The Booking Widget must be used with the Offer ID. 
You will find the offer ID at Regiondo "Manage Offers -> My Offers" as the second line in the SKU column.
The offer ID has 5 digits


__[regiondo_review offer=xxxxx]__
Reviews will output all Regiondo reviews merged or the ones of the Offer ID´s you entered.

* [regiondo_review] => Omitting the offers attribute will give you all available reviews of the given Regiondo account. 
* [regiondo_review offer=xxxxx] => Reviews of the offer with the ID "xxxxx"
* [regiondo_review offer=xxxxx,yyyyyy,zzzzzz] => Reviews of all the offers with the IDs "xxxxx", "yyyyy" and "zzzzz".

__[regiondo_voucher]__
The Voucher Widget will check Gift Vouchers and offer checkout if a valid gift voucher code was entered.
Value Vouchers will not be accepted here, but can be entered on checkout after using the booking widget.



## setup
Configure the regiondo intetration like your regiondo domain or the cart button to use the shortcodes with ease.

## about Regiondo
[Regiondo](https://www.regiondo.de/) is a Online booking system for tour and activity providers. Easily customize your ticket shop, manage bookings, resources, and accept online payments.



== Screenshots ==

1. using Shortcodes
2. connecting Regiondo account
3. Frontend: Booking Widget, Reviews Widget and Voucher Widget


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/regiondo-widgets` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the "Regiondo" settings tab to configure the plugin
1. enter at lease your "Regiondo Domain" and you "Regiondo Vendor ID".






== Changelog ==

= 1.0.4 =
* update description

= 1.0.3 =
* add setting for reviews number per page

= 1.0.2 =
* delete deprecated plugin root file

= 1.0.1 =
* Change plugin name

= 1.0 =
* Release Version 

