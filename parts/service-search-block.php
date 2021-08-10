<?php 
function service_list_start() {
  return <<<HTML
  <div class="uslugi-row">
    <table class="table">
      <tr><th>Название услуги</th><th>Цена</th></tr>
HTML;
}
function service_row($title, $price, $link) {
  $formated_price = format_price($price);
  return <<<HTML

    <tr>
      <td>
        <a href="{$link}">{$title}</a>
      </td>
      <td>
        <a href="{$link}">{$formated_price}</a>
      </td>
    </tr>

HTML;
}
function service_list_end() {
  return <<<HTML
    </table>
  </div>
HTML;
}
?>