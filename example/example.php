<?php

$handler = new \Shopeca\NameSplitter\Splitter;
var_dump($handler->splitName('Jiří Vít'));
var_dump($handler->splitName('MUDr. Jiří Votruba'));
var_dump($handler->splitName('Ta Duc Trunc'));
