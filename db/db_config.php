<?php
$_root = str_replace('\\', '/', preg_replace('/(.*[\/\x5C]src[\/\x5C]).*/', '$1', $_SERVER['SCRIPT_FILENAME']));

if ($_GET['do'] == 'saveConfig') {
   $x = (object) $_POST['cnn'];
   file_put_contents('db.config', str_rot13(base64_encode(serialize($x))));
   $result = 'Configuraci&oacute;n de conexi&oacute;n guardada!';
   $_GET['do'] = 'configForm';
};

if ($_GET['do'] == 'configForm') {
   if (file_exists('db.config')) {
      $config = unserialize(base64_decode(str_rot13(file_get_contents('db.config'))));
   }
   
   require('./db_config_c.php');
};
?>