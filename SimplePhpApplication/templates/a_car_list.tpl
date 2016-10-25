
{* Выводим шаблон таблицы *}
{if $car_list}
    <table class="table_car">

        <tr class="table_toc">
            <td>Марка машины</td>
            <td>Год выпуска</td>
            <td>Пробег</td>
            <td>Описание</td>
            <td>Город</td>
        </tr>

        {foreach from=$car_list item=car}
            <tr>
                <td>{$car[0]}</td>

                <td>{$car[1]}</td>

                <td>{$car[2]}</td>

                <td>{$car[3]}</td>

                <td>{$car[4]}</td>

                <td><a href="index.php?car_id={$car.id}"><img title="Удалить" src="img/but_del.png"/></a></td>
            </tr>
        {/foreach}
    </table>
{else}
    Записей пока не существует!
{/if}