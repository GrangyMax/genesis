<?php 
function service_list_start() {
  return <<<HTML
  <div class="uslugi-row">
    <table class="table">
      <tr><th>Название услуги</th><th>Первичный прием</th><th>Повторный прием</th></tr>
HTML;
}
function service_row($title, $price, $price_repeat, $link) {
  $formated_price = format_price($price);
  $formated_price_repeat = format_price($price_repeat);
  return <<<HTML

    <tr>
      <td width="80%">
        <a href="{$link}">{$title}</a>
      </td>
      <td width="10%">
        <a href="{$link}">{$formated_price}</a>
      </td>
	   <td width="10%">
        <a href="{$link}" style="color: #8a8a8a; ">{$formated_price_repeat}</a>
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