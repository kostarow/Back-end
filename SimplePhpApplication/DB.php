<?php
/**
 * Файл конфигурации системы
 */

class DB
{
    // Хост
    public $host = 'localhost';

    // База данных
    public $bd = 'car';

    // Логин для входа в бд
    public $login = 'user';

    // Пароль
    public $pass = '123123';

    // Таблица в которой будут хранится данные
    public $table = 'car';


    /**
     *  Конструктор
     */
    function __construct()
    {
        // Подключаемся к бд
       $this->mysql_connect_and_set();

        // Если не существует таблица, то создаем ее
        if(!$this->exist_table($this->table,$this->bd))
        {
            $this->create_table($this->table);
        }
    }


    /**
     * Подключается в базе данных, если вышло возвращает true
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
        if(!mysql_select_db($this->bd))
        {
            die('Невозможно выбрать базу данных <br>'.mysql_error());
        }

        // Настройка кодировки
        mysql_query ("set character_set_client='utf8'");
        mysql_query ("set character_set_results='utf8'");
        mysql_query ("set collation_connection='utf8_general_ci'");
    }

    /**
     * Находит список таблиц в бд и проверяет существует ли таблица
     *
     * @param $sTable -таблица
     * @param $wdb - бд
     * @return bool - существует/ не существует
     */
    public function exist_table($sTable, $wdb) {

        // Список таблиц
        $Table_list = mysql_list_tables($wdb);

        $finded = false;

        // Если база '$wdb' имеется
        if ($Table_list) {

            // Перебираем список таблиц
            for ($i = 0; $i < mysql_num_rows($Table_list); $i++) {

                // Если таблица которую ищем, имеется в списке, возвращаем тру
                if ((mysql_tablename($Table_list, $i)) === $sTable) {$finded = true; }
            }
        }
        // Освобождаем память от результата запроса
        if ($Table_list) { mysql_free_result($Table_list); }

        return $finded;
    }

    /**
     * Функция создает таблицу класса
     *
     * @param $table таблица
     */
    private function create_table($table)
    {
        // Сам запрос создания таблицы
        $query = "
            CREATE TABLE ".$table.
        " (
            id INT(11) NOT NULL AUTO_INCREMENT,
            car_model VARCHAR(100),
            year INT(4) NOT NULL,
            milage INT(10) NOT NULL,
            text TEXT,
            sity VARCHAR(50),
            PRIMARY KEY (id)
        )";

        // Выполняем запрос или выводим ошибку
        $result = mysql_query($query) or die('Error! '.mysql_error());
    }


    /**
     * Добавляет данные об автомобиле в базу данных
     *
     * @param $params параметры автомобиля
     */
    public function add_car($params)
    {
        // Запрос для вставки данных в таблицу
        $query ="INSERT INTO ".$this->table." VALUES('','".$params[0]."','".
            $params[1]."','".$params[2]."','".$params[3]."','".$params[4]."') ";

        // Выполняем запрос или выводим ошибку
        $result = mysql_query($query) or die('Error! '.mysql_error());

    }

    /**
     * Возвращает список всех записей
     *
     * @return array все записи
     */
    public function return_list_car()
    {
        // Массив, в котором будут хранится все записи
        $arr = array();

        // Запрос
        $query = "SELECT * FROM ".$this->table;

        // Выполняем запрос или выводим ошибку
        $result = mysql_query($query) or die('Error! '.mysql_error());

        // Счетчик
        $k=0;

        // Перебираем записи
        while ($result_row = mysql_fetch_row(($result))){

            $a = array();

            // Перебирам поля записи
            for($i=1;$i<mysql_num_fields($result);$i++){

                // Добавляем каждое поле во временный массив
                $a[$i-1]= $result_row[$i];
            }

            // Добавляем в конец массива id
            $a['id'] = $result_row[0];

            // Добавляем запись в общий массив
            $arr[$k]=$a;

            // Увеличиваем счетчик
            $k++;
        }

        // Возвращаем список всех записей
        return $arr;
    }

    /**
     *  Удаляет данные машины из базы данных по id
     *
     * @param $id
     */
    public function delete_car($id)
    {
        $query ='DELETE FROM '.$this->table.' WHERE ID='.$id;

        $result = mysql_query($query) or die(mysql_error());
    }
}