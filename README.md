Detect Spider EE2 Plugin
=============
Lightweight PHP plugin for EE2 that detects a search engine crawlers using PHP.

This is my first time writing any any sort of plugin for EE. I'm not a very strong PHP guy so go easy on me :-) Please post any suggestions, changes, bugs, requests, etc to GitHub issues.


----------

Installation
------------

Download and unzip the archive. Create a folder called `detect_spider`, place the file `pi.detect_spider.php` inside the folder and upload the `detect_spider` folder to /system/expressionengine/third_party/.


Basic Usage
-------------

**Check if any crawlers**

`{exp:detect_spider}` - returns true or false
    
**Conditional check for a crawler**

    {if '{exp:detect_spider}'}
      I am a search crawler
    {if:else}
      I am a normal visitor
    {/if}
