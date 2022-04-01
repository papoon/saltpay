<?php
/*
 Title: Hello World Example
 Tagline: Let's say hello!
 Tags: basic
 Requires: PHP >= 5.4
 Description: Basic hello world example to get started with Restler 5.
 Example 1: GET say/hello returns "Hello world!"
 Example 2: GET say/hello?to=R.Arul%20Kumaran returns "Hello R.Arul Kumaran!"
 Example 3: GET say/hi?to=restler3.1 returns "Hi restler3.1!"
 Content: > **Note:-** If you have used Restler 2 before, you will wonder why
 the generated routes are lesser with Restler 5.
 Look at [Routes](../_006_routing/readme.html) example to understand.
 */
require_once '../../../restler.php';
use Luracast\Restler\Restler;

$r = new Restler();
$r->addAPIClass('Say');
$r->handle();

