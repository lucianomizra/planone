<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
   <title>Configuración de Conexión a Base de Datos</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <style type="text/css">
      .frmConfig {
         width:410px;
         font-family: verdana;
         font-size:8pt;
      }
      .frmConfig label {
         line-height: 20px;
         display:inline-block;
         width:130px;
         text-align:right;
      }
      .frmConfig .textbox {
         width:250px;
      }
      .frmConfig fieldset div {
         margin-bottom:5px;
         vertical-align: middle;
      }
      .app-title {
         font-family: Arial;
         font-size:14pt;
         font-weight:bold;
         margin-bottom:10px;
         padding-bottom:5px;
         border-bottom:2px silver solid;
      }
      .result-msg {
         font-family: Arial;
         font-size:10pt;
         margin-top:10px;
         color:blue;
      }
   </style>
</head>
<body>
   <div class="app-title">Root del Proyecto: <?php echo $_root; ?></div>
   <form class="frmConfig" action="./db_config.php?do=saveConfig" method="POST">
      <fieldset>
         <legend>Conexi&oacute;n a Base de Datos</legend>
         <div>
            <label>Nombre o IP de Host:</label>
            <input type="text" id="db_host" class="textbox" name="cnn[DB_HOST]" value="<?php echo $config->DB_HOST; ?>">
         </div>
         <div>
            <label>Puerto de servicio:</label>
            <input type="text" id="db_host" class="textbox" name="cnn[DB_PORT]" value="<?php echo $config->DB_PORT; ?>">
         </div>
         <div>
            <label>Nombre del usuario:</label>
            <input type="text" id="db_username" class="textbox" name="cnn[DB_USERNAME]" value="<?php echo $config->DB_USERNAME; ?>">
         </div>
         <div>
            <label>Contrase&ntilde;a:</label>
            <input type="text" id="db_password" class="textbox" name="cnn[DB_PASSWORD]" value="<?php echo $config->DB_PASSWORD; ?>">
         </div>
         <div>
            <label>Base de datos:</label>
            <input type="text" id="db_database" class="textbox" name="cnn[DB_DATABASE]" value="<?php echo $config->DB_DATABASE; ?>">
         </div>
      </fieldset>
      <div style="margin-top:10px;">
         <button id="btnSave">Guardar</button>
      </div>
      <div class="result-msg">
         <?php echo $result; ?>
      </div>
   </form>
</body>
</html>