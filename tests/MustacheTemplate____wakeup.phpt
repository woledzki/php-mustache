--TEST--
MustacheTemplate::__wakeup() member function
--SKIPIF--
<?php 
if( !extension_loaded('mustache') ) die('skip ');
 ?>
--FILE--
<?php
$m = new Mustache();
$tmpl = new MustacheTemplate('{{test}}');
$r = $m->compile($tmpl);
$tmpl = unserialize(serialize($tmpl));
var_dump($tmpl);
var_dump($tmpl->__toString());
var_dump(bin2hex($tmpl->toBinary()));
var_dump($m->render($tmpl, array('test' => 'baz')));
?>
--EXPECT--
object(MustacheTemplate)#3 (2) {
  ["template"]=>
  string(8) "{{test}}"
  ["binaryString"]=>
  string(33) "MU         MU         test "
}
string(8) "{{test}}"
string(66) "4d550001000000000001000000134d550010010000050000000000007465737400"
string(3) "baz"