<!-- 01 -->
<!-- Кабинет Пользователя -->

<section>
  <div class="container">
    <div class="section__inner">
      <div class="user_acount">
        <div class="user_acount__header">
          <h2 class="user_acount__title">Ваш личный кабинет</h2>
        </div>
        <div class="user_acount__content">
          <table class="user_acount__table">
            <tr class="user_acount__row user_acount__email">
              <td>Логин (email)</td>
              <td>{$arUser['email']}</td>
            </tr>
            <tr class="user_acount__row">
              <td>Имя</td>
              <td>
                <input class="user_acount__input newName" type="text" name="name" value="{$arUser['displayName']}" />
              </td>
            </tr>
            <tr class="user_acount__row">
              <td>Телефон</td>
              <td>
                <input class="user_acount__input newPhone" type="phone" name="phone" value="{$arUser['phone']}" />
              </td>
            </tr>
            <tr class="user_acount__row">
              <td>Адрес</td>
              <td>
                <input class="user_acount__input newAdress" type="adress" name="adress" value="{$arUser['adress']}" />
              </td>
            </tr>
            <tr class="user_acount__row">
              <td>Новый пароль</td>
              <td>
                <input class="user_acount__input newPwd1" type="password" name="pwd1" value="" />
              </td>
            </tr>
            <tr class="user_acount__row">
              <td>Повторите пароль</td>
              <td>
                <input class="user_acount__input newPwd2" type="password" name="pwd2" value="" />
              </td>
            </tr>
            <tr class="user_acount__row">
              <td>Для подтверждения введите текущий пароль</td>
              <td>
                <input class="user_acount__input curPwd" type="password" value="" />
              </td>
            </tr>
          </table>
          <a class="user_acount__btn">Сохранить</a>
          <script></script>
        </div>
        <div class="user_acount__footer"></div>
      </div>
    </div>
  </div>
</section>


<section class="section">
  <hgroup>
    <h1 class="section__title">Ваши заказы</h1>
  </hgroup>
  <!-- Звказы текущего пользователя >> -->
  <div class="user-orders">
    {if ! $rsUserOrders}
    <div class="warning">
      <h1>У вас пока нет заказов.</h1>
    </div>
    {else}
    <table>
      <thead>
        <tr>
          <th scope="col">№</th>
          <th scope="col">Действие</th>
          <th scope="col">ID Заказа</th>
          <th scope="col">Статус</th>
          <th scope="col">Дата создания</th>
          <th scope="col">Дата оплаты</th>
          <th scope="col">Доп. информация</th>
        </tr>
      </thead>
      <tbody>
        {foreach $rsUserOrders as $item name = orders}
        <tr>
          <th scope="row">{$smarty.foreach.orders.iteration}</td>
          <td><a href="#">Показать товар заказа</a></td>
          <td>{$item['id']}</td>
          <td>{$item['status']}</td>
          <td>{$item['date_created']}</td>
          <td>{$item['date_payment']}&nbsp</td>
          <td>{$item['comment']}</td>
        </tr>
        <tr class="hideme purchasesForOrderId_{$item['id']}">
          <td colspan="7">
            {if $item['children']}
            <table border="1">
              <tr>
                <th>№</th>
                <th>ID</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
              </tr>
              {foreach $item['children'] as $itemChild name = products}
                <tr>
                  <td>{$smarty.foreach.products.iteration}</td>
                  <td>{$itemChild['id']}</td>
                  <td><a href="/products/{$itemChild['id']}/">{$itemChild['name']}</a></td>
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
    {/if}
  </div>
  <!-- << -->
</section>