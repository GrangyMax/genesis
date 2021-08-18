<?php 
function service_list_start() {
  return <<<HTML
  <table>
    <tr><th>Название услуги</th><th>Цена</th></tr>
HTML;
}
function service_row($title, $price, $link) {
  $formated_price = format_price($price);
  return <<<HTML

    <a class="row" href="{$link}">
      <div class="col-lg-9">
        <li>{$title}</li>
      </div>
      <div class="col-lg-3">
        Цена:
        <i class="price-usluga-single">{$formated_price}</i>
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