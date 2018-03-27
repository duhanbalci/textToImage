# textToImage
Super Simple Text to Image PHP Class


## Usage

```php
<?php
include 'texttoimage.class.php'; // Include class file
header('Content-type: image/png'); // Change "Content-type" to "image/png" for show result in browser.

$a = new textToImage; // Create new textToImage class

$a->size(5); // Change font size (default:5)

$a->add('First row'); // Write something
$a->add('Second row with rgb color option',255,255,255); // you can change font color with second parameter (default (0,0,255))

$result = $a->result();

imagepng($result);
imagedestroy($result);
?>

```