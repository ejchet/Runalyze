# [Runalyze v2.0](http://runalyze.de)

[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/Runalyze/Runalyze?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Build Status](https://travis-ci.org/Runalyze/Runalyze.svg?branch=master)](https://travis-ci.org/Runalyze/Runalyze)


Runalyze is a web application for analyzing your training - more detailed than any other sports diary.  
Runalyze is mainly developed by [laufhannes](https://github.com/laufhannes) and [mipapo](https://github.com/mipapo).

## Git usage

Up to now, we don't have any script for migrating the database automatically.
You have to apply recent changes by hand from the respective update files in `inc/install/`.

#### For v2.0 (and for respective pre-releases since 2015/01/17):
There were some big changes in our table structure.
Activity data is now split over three tables (training, trackdata, route) to improve performance.
We recommend creating a backup before refactoring your data.

To refactor your data, you first have to apply all changes from `update-v1.5-to-v2.0alpha.sql`.
Afterwards you can copy your data with the script `refactor-db.php`.
Change the settings within the file and run it via cli or browser.

Release details for v2.0alpha on [runalyze.de](http://runalyze.de/allgemein/runalyze-v2-0alpha/).

## License
* TODO - we're currently seeking for the right license to choose

## Changelog
* new versions, multi-lingual
 * v2.0, hopefully coming soon
* old versions, only in german
 * [v1.5](http://runalyze.de/allgemein/runalyze-v1-5/), 01.01.2014: Bugfixes, genauere VDOT-Formel
 * [v1.4](http://runalyze.de/allgemein/runalyze-v1-4-fix-fuer-sicherheitsproblem/), 23.08.2013: Bugfix für Sicherheitsrisiko
 * [v1.3](http://runalyze.de/allgemein/runalyze-v1-3/), 29.07.2013: Neue Importer, mehr Trainingsdaten, VDOT-Korrektur für Höhenmeter, ...
 * [v1.2](http://runalyze.de/allgemein/runalyze-v1-2/), 13.11.2012: Diagramme speichern, Öffentliche Trainingsliste
 * [v1.1](http://runalyze.de/allgemein/runalyze-v1-1/), 19.07.2012: Erste Online-Version
 * [v1.0](http://runalyze.de/allgemein/runalyze-v1-0/), 20.01.2012: Erste öffentliche Version

## Installation
* download [zip-file](https://github.com/Runalyze/Runalyze/archive/master.zip) and extract
* open `../runalyze/install.php` in your browser
* follow the instructions

More details: <http://runalyze.de/installation/> (only in german)

## Update
* delete all contents of `/runalyze/` except for `/config.php/`
* download new zip-file and extract it
* open `../runalyze/update.php` in your browser
* follow the instructions

## Credits
* Icons
	* [Font Awesome](http://fontawesome.io/) by Dave Gandy
	* [Forecast Font](http://forecastfont.iconvau.lt/) by Ali Sisk
* Elevation data from Shuttle Radar Topography Mission
	* [SRTM tiles](http://dwtkns.com/srtm/) grabbed via Derek Watkins
	* [SRTM files](http://srtm.csi.cgiar.org/) by International  Centre for Tropical  Agriculture (CIAT)
	* [SRTMGeoTIFFReader](http://www.osola.org.uk/elevations/index.htm) by Bob Osola
* [jQuery](http://jquery.org/) by jQuery Foundation, Inc.
    * [Bootstrap Tooltip](http://twitter.github.com/bootstrap/javascript.html#tooltips) by Twitter, Inc.
    * [Flot](http://www.flotcharts.org/) by IOLA and Ole Laursen
    * [Leaflet](http://leafletjs.com/) by Vladimir Agafonkin
    * [FineUploader](https://github.com/Widen/fine-uploader) by Widen Enterprises, Inc.
    * [Tablesorter](http://tablesorter.com/docs/) by Christian Bach
    * [Datepicker](http://www.eyecon.ro/) by Stefan Petre
    * [Chosen](http://getharvest.com/) by Patrick Filler for Harvest
* Miscellaneaous
    * [phpFastCache](https://github.com/khoaofgod/phpfastcache) by Khoa Bui
    * [Garmin Communicator](http://developer.garmin.com/web-device/garmin-communicator-plugin/) by Garmin Ltd.
    * [Weather data](http://openweathermap.org) from OpenWeatherMap Inc.
