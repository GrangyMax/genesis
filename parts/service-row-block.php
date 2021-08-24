<?php 
function service_list_start() {
  return <<<HTML
  <table>
    <tr><th>Название услуги</th><th>Цена</th></tr>
HTML;
}
function service_row($title, $price, $price_repeat, $link) {
  $formated_price = format_price($price);
  return <<<HTML

    <a class="row" href="{$link}">
      <div class="col-lg-9">
        <li>{$title}</li>
      </div>
      <div class="col-lg-3">
        Первичный прием:
        <i class="price-usluga-single">{$formated_price}</i>
      </div>
	  <div class="col-lg-3">
        Повторный прием:
        <i class="price-usluga-single">{$price_repeat}</i>
      </div>
    </a>

HTML;
}
function service_list_end() {
  return <<<HTML
  </table>
HTML;
}
?>