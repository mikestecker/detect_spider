Detect Spider EE2 Plugin
=============
Lightweight PHP plugin for EE2 that detects a search engine crawlers using PHP.

This is my first time writing any any sort of plugin for EE. I'm not a very strong PHP guy so go easy on me :-) Please post any suggestions, changes, bugs, requests, etc to GitHub issues.


----------


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
