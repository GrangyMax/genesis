<?php 
function service_list_start() {
  return <<<HTML
  <div class="uslugi-row">
    <table class="table">
      <tr><th>Название услуги</th><th colspan="2">Цена</th></tr>
HTML;
}
function service_row($title, $price, $price_repeat, $link) {
  $formated_price = format_price($price);
  $formated_price_repeat = format_price($price_repeat);
  return <<<HTML

    <tr>
      <td>
        <a href="{$link}">{$title}</a>
      </td>
      <td>
        <a href="{$link}">{$formated_price}</a>
      </td>
	  <td>
        <a href="{$link}" style="color: #8a8a8a;">{$formated_price_repeat}</a>
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