--TEST--
MustacheTemplate::__sleep() member function
--SKIPIF--
<?php 
if( !extension_loaded('mustache') ) die('skip ');
 ?>
--FILE--
<?php
$m = new Mustache();
$tmpl = new MustacheTemplate('{{test}}');
$r = $m->compile($tmpl);
var_dump($r);
$serial = serialize($tmpl);
var_dump($serial);
$orig = unserialize($serial);
var_dump($orig);
?>
--EXPECT--
bool(true)
string(119) "O:16:"MustacheTemplate":2:{s:8:"template";s:8:"{{test}}";s:12:"binaryString";s:33:"MU         MU         test ";}"
object(MustacheTemplate)#3 (2) {
  ["template"]=>
  string(8) "{{test}}"
  ["binaryString"]=>
  string(33) "MU         MU         test "
}