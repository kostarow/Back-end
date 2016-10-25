<?php
/**
 * Created by PhpStorm.
 * User: kostarh
 * Date: 22.01.14
 * Time: 11:13
 */

class BD
{
    /**
     * Находит список таблиц в бд и проверяет существует ли таблица
     *
     * @param $sTable -таблица
     * @param $wdb - бд
     * @return bool - существует/ не существует
     */
    static function exist_table($sTable, $wdb) {

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
     *  Выполняет любой произвольный запрос
     *
     * @param $query запрос
     */
    static function run_query($query)
    {
        // Выполняем запрос или выводим ошибку
        $result = mysql_query($query) or die('Error! '.mysql_error());

        return $result;
    }

    /**
     * Функция подсчитывает количество столбцов
     *
     * @static
     * @param $table
     */
    public static function count_rows_table($table){

        // запрос
        $query = 'SELECT * FROM '.$table;

        //выполняем запрос
        $result = mysql_query($query);

        //возвращаем количество столбцов
        return mysql_num_fields($result);
    }

    /**
     * Проверяет существуют ли записи в таблице
     *
     * @param $table таблица
     */
    public static function table_empty($table)
    {
        // Запрос
        $query = "SELECT * FROM ".$table;

        // Выполняем запрос или выводим ошибку
        $result = mysql_query($query) or die('Error! '.mysql_error());

        // Перебираем записи
        while ($result_row = mysql_fetch_row(($result))){

            return false;

            // Перебирам поля записи
            for($i=1;$i<mysql_num_fields($result);$i++){

                // Добавляем каждое поле во временный массив
                $a[$i-1]= $result_row[$i];
            }
    }
        return true;
    }
}