<html>
<head>
    <title>Автомобили - редактирование</title>
    <link type="text/css" rel="stylesheet" href="../css/c.css"/>
</head>
<body>

<div class="container">

{if !$user}
    <a href="register.php">Создать пользователя</a>

    <form id="form_add_car"  method="post">

        <input name="car_model" placeholder="Марка машины" required/><br>

        <input name="year" placeholder="Год выпуска" required maxlength="4"/><br>

        <input name="milage" placeholder="Пробег (км)" required/><br>

        <textarea rows="5" name="text" placeholder="Описание"  required/></textarea><br>

        <input name="city" placeholder="Город" required/><br>

        <input name="add_car" type="submit" value="Добавить"/>

    </form>

    {include file='../templates/a_car_list.tpl'}

{else}

    {include file='../templates/login.tpl'}

{/if}


</div>

</body>
</html>