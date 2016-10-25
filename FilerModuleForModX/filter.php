<?php
/*
 Простой фильтр для каталога по параметрам для движка Modx
*/
 
// id селектов для фильтров
$select_id = array(7,5);
$select_data = array();
$form_title = '<h2>Фильтр по параметрам</h2>';
$form_html_begin = $form_title.'<form method="GET" id="form_filter" >';
$form_html_end = '<input type="text" name="form_send" value="1" /><input name="submit_filter" type="submit" value="Ok" id="form_filter_submit"><a href="#" class="JS_clear_filter">Сбросить</a></form>';

foreach($select_id as $id) {
    $query ='SELECT * FROM `modx_site_tmplvars` WHERE id ='.$id;
    $result = mysql_query($query);
    $select_arr = mysql_fetch_array($result);
    $select_data[$select_arr['id']] = $select_arr;
}

$tvList = getTvString($select_data);
$orderBy = 'menuindex ASC';
$display = 16;
$pages = 'pages';
$id = $modx->documentIdentifier;
$options = array(
    'api' => '1',
    'id'=>'goods',
    'parents'=>$id,
    'depth'=>'5',
    'tpl'=>'ShowProducts.Tpl',
    //'display'=>$display,
    //'paginate'=>$pages,
    'tvList'=>$tvList,
//'addWhereList'=>'c.template IN (6)',
    'orderBy'=>$orderBy,
    'tvSortType'=>'UNSIGNED',
    //'filters'=>'tv:material_id:=:5',
);
$sCatalog = $modx->runSnippet('DocLister',$options);
$sCatalog = json_decode($sCatalog,1); // Получил список всех товаров удовлетворяющих условию

// Перебираю селекты
foreach($select_data as $item => $value) {
    $allow_option = array(0);
    foreach($sCatalog as $product) {
        if(checkValueArr($allow_option,$product['tv_'.$select_data[$item]['name']])) {
            $product_tv = ($product['tv_'.$select_data[$item]['name']]=='') ? 0 : $product['tv_'.$select_data[$item]['name']];
            array_push($allow_option,$product_tv);
        }
    }
    $select_data[$item]['allow_option'] = $allow_option;
}


function checkValueArr($arr,$val) {
    foreach($arr as $item) {
        if ($item == $val) {
            return false;
        }
    }
    return true;
}

function getTvString($arr) {
    $str = '';
    $i = 0;
    $len = count($arr);
    foreach($arr as $item) {
        $i++;
        if($i == $len) {
            $str = $str.$item['name'];
        } else {
            $str = $str.$item['name'].',';
        }
    }
    return $str;
}


foreach ($select_data as $item => $value) {
    $select_html = '<div class="select_item"><div class="select_name">'.$select_data[$item]['caption'].'</div>';
    $select_html=$select_html.'<select class="select-item-class" name="ff'.$select_data[$item]['id'].'">';
    $elements = explode('||',$select_data[$item]['elements']);
    foreach($elements as $element) {
        $element_exp = explode('==',$element);
        if(!checkValueArr($select_data[$item]['allow_option'],$element_exp[1])) {
            $element_html = '<option value="'.$element_exp[1].'">'.$element_exp[0].'</option>';
            $select_html=$select_html.$element_html;
        }
    }
    $select_html=$select_html."</select></div>";
    $select_data[$item]['html_element'] = $select_html;;
}

function getFormHTml($b,$e,$arr){
    foreach($arr as $item) {
        $b=$b.$item['html_element'];
    }
    $b=$b.$e;
    return $b;
}

print getFormHTml($form_html_begin,$form_html_end,$select_data);

?>