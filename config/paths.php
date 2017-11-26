<?php

define('DS',DIRECTORY_SEPARATOR);

define('PATH',dirname(__FILE__).DS);
define('SERVER',$_SERVER['SERVER_NAME']);
define('URI','/'.basename(PATH));
define('URL','http://'.SERVER.URI .'/');

define('base_url','http://umana.local/');

