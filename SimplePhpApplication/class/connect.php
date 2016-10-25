<?php
/**
 * Класс подключения к базе данных
 */

class Connect
{
    // Хост
    public $host = 'localhost';

    // Логин для входа в бд
    public $login = 'user';

    // Пароль
    public $pass = '123123';

    // База данных
    static $bd = 'car';

    // Таблица в которой будут хранится данные
    static $table = 'car';

    /**
     *  Конструктор класса
     */
    function __construct()
    {
        // Подключаемся к бд
        $this->mysql_connect_and_set();
    }

    /**
     * Подключается в базе данных
     *
     * @return bool
     */
    protected function mysql_connect_and_set()
    {
        // Если не подключается к mysql
        if(!mysql_connect($this->host,$this->login,$this->pass))
        {
            die('Невозможно подключиться к базе данных <br>'.mysql_error());
        }

        // Если заданной базы не существует
        if(!mysql_select_db(self::$bd))
        {
            die('Невозможно выбрать базу данных <br>'.mysql_error());
        }

        // Настройка кодировки
        mysql_query ("set character_set_client='utf8'");
        mysql_query ("set character_set_results='utf8'");
        mysql_query ("set collation_connection='utf8_general_ci'");
    }
}