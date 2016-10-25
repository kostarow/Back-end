<?php
/**
 * Регистрация пользователя
 */
require('../conf.php');

// Если отправили форму
if(isset($_POST['submit']))
{
    // Если имя больше 5 символов и пароли одинаковые
    if(strlen($_POST['name'])>5)
    {
        // Если длинна пароля больше 5
        if(strlen($_POST['password'])>5)
        {
            // Если пароли одинаковые
            if($_POST['password'] == $_POST['password2'])
            {
                // Создаю объект пользователя
                require('../class/Login.php');
                $login = new Login();

                // Если такого имени пользователя не существует, то создаю учетную запись
                if($login->user_not_exist($_POST['name']))
                {
                    // Создаю учетную запись пользователя
                    $login->create_user($_POST['name'],$_POST['password']);
                }
                else
                {
                    die('Пользователь с таким именем уже существует <a href="register.php">Вернуться</a>');
                }

                //Перенаправляю на вход в админку
                header('location:index.php');
            }
            else
            {
                die('Пароли разные <a href="register.php">Вернуться</a>');
            }
        }
        else
        {
            die('Длинна пароля должна быть больше 5 символов <a href="register.php">Вернуться</a>');
        }

    }
    else
    {
        die('Длинна имени должна быть больше 5 символов <a href="register.php">Вернуться</a>');
    }
}
// Отображаю форму регистрации
$smarty->display($default_template.'a_index.tpl');