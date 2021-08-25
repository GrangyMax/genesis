<?php 
function service_list_start() {
  return <<<HTML
  <div class="uslugi-row">
    <table class="table">
      <tr><th>Название услуги</th><th>Цена</th></tr>
HTML;
}
function service_row($title, $price, $price_repeat, $link) {
  $formated_price = format_price($price);
  if($price_repeat){$price_repeat = '('.$price_repeat . '&#8381' . ')';} 
  return <<<HTML

    <tr>
      <td width="85%">
        <a href="{$link}">{$title}</a>
      </td>
      <td width="15%">
        <a href="{$link}">{$formated_price} <span style="color: #8a8a8a;">{$price_repeat}</span></a>
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