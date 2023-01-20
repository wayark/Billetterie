<?php
const BD_HOST = 'localhost';
const BD_PORT = 8889;
const BD_DBNAME = 'waticket';
const BD_USER = 'root';
const BD_PWD = 'root';
const GOOGLE_API_TOKEN = 'AIzaSyC87bEs-lrBLIUbatB3rebtVbp2eBbgdqw';

const PATH_AUTOLOAD = './config/autoload.php';

define('PATH_CONTROLLERS', './controller/c_');
define('PATH_MODELS', './model/');
define('PATH_VIEWS', './view/v_');
define('PATH_ASSETS', './asset/');
define('PATH_APPLICATION', './application/');
define('PATH_PRESENTER', PATH_MODELS . 'presenter/');

define('PATH_DAO', PATH_MODELS . 'database/dao/');
define('PATH_DTO', PATH_MODELS . 'database/dto/');

define('PATH_CSS', PATH_ASSETS . 'css/');
define('PATH_MEDIA', PATH_CSS . 'media/media');
define('PATH_IMAGES', PATH_ASSETS . 'image/');
define('PATH_SCRIPTS', PATH_ASSETS . 'javascript/');
