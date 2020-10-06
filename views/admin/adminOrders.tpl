<table border="1">


  <caption>Заказы</caption>
  <thead>
    <tr>
      <th>№</th>
      <th>Действие</th>
      <th>ID заказа</th>
      <th>Статус</th>
      <th>Дата заказа</th>
      <th>Дата оплаты</th>
      <th>Доп. информация</th>
      <th>Дата изминения заказа</th>
    </tr>
  </thead>
  <tbody>
    {foreach $rsOrders as $item name = orders}
    <tr>
      <td>{$smarty.foreach.orders.iteration}</td>
      <td><a href="#">Показать товар</a></td>
      <td>{$item['id']}</td>
      <td><input type="checkbox" class="itemStatus" data-id="{$item['id']}" {if $item['status']}checkbox="checkbox" {/if}> Закрыть </td>
      <td>{$item['date_created']}</td>
      <td>
        <input type="text" class="datePayment_{$item['id']}"  value="{$item['date_payment']}">
        <button type="button" class="datePaymentBtn" data-id="{$item['id']}">Сохранить</button>
      </td>
      <td>{$item['comment']}</td>
      <td>{$item['date_modification']}</td>
    </tr>

    <tr class="hiden purchasesForOrderId_{$item['id']}">
      <td colspan="8">
        {if $item['children']}
        <table border="1" cellpadding="1" cellspacing="1" width="100%">
          <tr>
            <th>№</th>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Количество</th>
          </tr>
          {foreach $item['children'] as $itemChild name = products}
          <tr>
            <td>{$smarty.foreach.orders.iteration}</td>
            <td>{$itemChild['id']}</td>
            <td><a href="/admin/products/{$itemChild['id']}/">{$itemChild['name']}</a></td>
            <td>{$itemChild['price']}</td>
            <td>{$itemChild['amount']}</td>
          </tr>
          {/foreach}
        </table>
        {/if}
      </td>
    </tr>
    {/foreach}
  </tbody>
</table>