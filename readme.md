Name Splitter library
=====================

Name Splitter is a small library to split full name into surname and first name(s). 

Database
--------

Library uses a first names database provided by Czech Ministry of the Interior. 
You can easily modify or completely replace the database file.

Current source: http://www.mvcr.cz/clanek/cetnost-jmen-a-prijmeni-722752.aspx

Database file contains a simple PHP array returned after inclusion.


How to use
----------

```php
require 'NameSplitter.php';
$splitter = new \Shopeca\NameSplitter\Splitter;
var_dump($splitter->splitName('Ta Duc Trunc'));
// prints array(2) { ["firstName"]=> string(6) "Ta Duc" ["surname"]=> string(5) "Trunc" }
```
