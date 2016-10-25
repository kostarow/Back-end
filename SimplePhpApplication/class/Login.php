<?php
/**
 * Класс пользователя
 */

class Login
{

    // Если 1 то таблица не пустая
    public $table_empty = 1;

    // Логин
    protected $table = 'login';

    /**
     *  Конструктор
     */
    public function __construct()
    {
        // Если не существет таблицы в базе данных
        if(!BD::exist_table($this->table,connect::$bd))
        {
            // то создаем ее
            $this->creat_table($this->table);
        }
        // Проверяем существуют ли записи в таблице
        if (BD::table_empty($this->table))
        {
            $this->table_empty = 0;
        }
    }

    /**
     *  Создает таблицу
     *
     * @param $table название таблицы
     */
    public function creat_table($table)
    {
        $query = "CREATE TABLE ".$table.
        "(
              id INT(11) NOT NULL AUTO_INCREMENT,
                user VARCHAR(100),
                password VARCHAR(150),
                PRIMARY KEY (id)

        )";

        // Выполняем запрос
        BD::run_query($query);
    }

    /**
     * Создает нового пользователя для админки
     *
     * @param $name имя
     * @param $pass пароль
     */
    public function create_user($name,$pass)
    {
        $query = 'INSERT INTO '.$this->table. ' VALUES("","'.$name.'","'.md5($pass).'")';
        BD::run_query($query);
    }


    /**
     * Проверяю существует ли такой пользователь
     *
     * @param $name имя пользователя
     */
    public function user_not_exist($name)
    {
        $return = 'true';

        $query ='SELECT * FROM '.$this->table.' WHERE user="'.$name.'"';

        $result = BD::run_query($query);

        while ($result_row = mysql_fetch_row($result)){

            $return= false;
        }

        return $return;
    }
}