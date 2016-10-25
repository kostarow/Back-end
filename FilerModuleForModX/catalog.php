<?php

/**
  Вывод каталога в зависимости от фильтрации
*/

$filter = '';
$params = array();
$select_data = array();
if(isset($_GET['form_send'])) {

    foreach($_GET as $key => $val) {
        if(substr($key,0,2) == 'ff'){
            $params[$key] = array('current'=>$val);
        }
    }

    foreach($params as $key => $id) {
        $query ='SELECT * FROM `modx_site_tmplvars` WHERE id ='.substr($key,2);
        $result = mysql_query($query);
        $select_arr = mysql_fetch_array($result);

        $elements = explode('||',$select_arr['elements']);
        foreach($elements as $element) {
            $element_exp = explode('==',$element);
            if ($element_exp[1] == $params[$key]['current'] ) {
                $params[$key]['name_ru'] = $element_exp[0];
            }
        }

        $params[$key]['name'] = $select_arr['name'];
    }
    //print_r($params);
    // формируем фильтр
    $filter = 'AND(';
    foreach($params as $item) {
        if($item['current'] != 0) {
            $str = 'tv:'.$item['name'].':eq:'.$item['current'].';';
            $filter = $filter.$str;
        }
    }
    $filter = $filter.')';
    //print $filter;
}

$orderBy = 'menuindex ASC';
$display = 16;
$pages = 'pages';
$id = $modx->documentIdentifier;
$options = array(
    'id'=>'goods',
    'parents'=>$id,
    'depth'=>'5',
    'tpl'=>'ShowProducts.Tpl',
    'display'=>$display,
    'paginate'=>$pages,
    'tvList'=>'price,Black',
//'addWhereList'=>'c.template IN (6)',
    'orderBy'=>$orderBy,
    'tvSortType'=>'UNSIGNED',
    //'filters'=>'tv:material_id:=:5',
);

if($filter != '') {
    $options['filters'] = $filter;
}

$sCatalog = $modx->runSnippet('DocLister',$options);
if($sCatalog == '') {
    $sCatalog = '<h2>Товаров не найдено...</h2>';
}
$sOut = '
<div class="tpl-product-list-v-23" id="shop2-products">
	' . $sCatalog .	'
</div>
	<div style="clear:both"></div>
	<div class="pagin submenu">[+goods.pages+]</div>
';

return $sOut;
?>