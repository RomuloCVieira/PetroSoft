<?php

declare(strict_types=1);

namespace Hackthon\Database;

use PDO;
use stdClass;

class MysqlPDO extends PDO
{
    public $dns;
    public $username;
    public $passwd;
    public $options;
    public function __construct(stdClass $config)
    {
        $dns = sprintf('mysql:host=%s;dbname=%s',$config->host,$config->database);
        $username = $config->user;
        $passwd = $config->pass;
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
       
        parent::__construct($dns,$username,$passwd,$options);

        $this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // $this->exec("set names utf8");
    }
}