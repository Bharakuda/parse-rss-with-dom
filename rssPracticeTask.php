<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$URL = 'http://www.jutarnji.hr/rss/vijesti/';

// retrieving RSS feed
$dom = new DOMDocument('1.0');
$dom->loadXML(file_get_contents($URL));

$entries = $dom->getElementsByTagName('entry');
?>
<?php foreach ($entries as $entry) :?>
    <h2><?php echo $entry->getElementsByTagName('title')[0]->nodeValue ?></h2>

    <p><?php echo $entry->getElementsByTagName('content')[0]->nodeValue ?></p>

    <p><span class='updated'>Updated: <?php echo $entry->getElementsByTagName('updated')[0]->nodeValue?></span> |
        <span class='published'>Published: <?php echo $entry->getElementsByTagName('published')[0]->nodeValue?></span>
        by <?php echo $entry->getElementsByTagName('author')[0]->getElementsByTagName('name')[0]->nodeValue?>
    </p>

    <p>Kategorija: <?php echo $entry->getElementsByTagName('category')[0]->getAttribute('term') ?></p>
<?php endforeach; ?>