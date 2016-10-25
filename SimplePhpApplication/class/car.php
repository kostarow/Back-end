<?php
/**
 * Created by PhpStorm.
 * User: kostarh
 * Date: 22.01.14
 * Time: 11:12
 */
class Car
{
    // Таблица в которой будут хранится данные
    public $table = 'car';

    /**
     *  Конструктор
     */
    function __construct()
    {
        // Если не существует таблица, то создаем ее
        if(!BD::exist_table($this->table,connect::$bd))
        {
            $this->create_table($this->table);
        }
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