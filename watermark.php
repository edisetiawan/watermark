<?php

$main_img = "ruangprogrammer-images.jpg"; // main big photo / picture
$watermark_img = "watermark.gif"; // use GIF or PNG, JPEG has no tranparency support
$padding = 200; // distance to border in pixels for watermark image
$opacity = 100; // image opacity for transparent watermark

$watermark = imagecreatefromgif($watermark_img); // create watermark
$image = imagecreatefromjpeg($main_img); // create main graphic

if(!$image || !$watermark) die("Error: main image or watermark could not be loaded!");

$watermark_size = getimagesize($watermark_img);
$watermark_width = $watermark_size[0];
$watermark_height = $watermark_size[1];

$image_size = getimagesize($main_img);
$dest_x = $image_size[0] - $watermark_width - $padding;
$dest_y = $image_size[1] - $watermark_height - $padding;

// copy watermark on main image
imagecopymerge($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $opacity);

// print image to screen
header("content-type: image/jpeg");
imagejpeg($image);
imagedestroy($image);
imagedestroy($watermark);


