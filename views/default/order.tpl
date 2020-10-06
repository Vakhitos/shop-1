<section class="section">
  <hgroup>
    <h1>{$pageTitle}</h1>
  </hgroup>
  <div class="row">
    <div class="col">
      <div class="block-cart">
        <form action="/cart/saveorder/">
          <table class="block-cart__table">
            <thead class="block-cart__head">
              <td class="block-cart__col">Номер</td>
              <td class="block-cart__col">Ноименование</td>
              <td class="block-cart__col">Количество</td>
              <td class="block-cart__col">Цена за единицу</td>
              <td class="block-cart__col">Стоимость</td>
            </thead>
            {foreach $rsProducts as $item name=products}
            <tr>
              <td class="block-cart__col">{$smarty.foreach.products.iteration}</td>
              <td class="block-cart__col">
                <a href="/product/{$item['id']}/">{$item['name']}</a>
              </td>
              <td class="block-cart__col">
                <span class="itemPrice_{$item['id']}" value="{$item['price']}">{$item['cnt']}</span>
              </td>
              <td class="block-cart__col">
                <span class="itemPrice_{$item['id']}" value="{$item['price']}">{$item['price']}</span>
              </td>
              <td class="block-cart__col">
                <span class="block-cart__price itemRealPrice_{$item['id']} itemRealPrice">{$item['realPrice']}</span>
              </td>

            </tr>
            {/foreach}

          </table>
          {if isset($arUser)}
          {$buttonClass = ""}
          <h2>Данные заказчика</h2>
          {$name = $arUser['name']}
          {$phone = $arUser['phone']}
          {$adress = $arUser['adress']}
          <table class="block-cart__table">

            <tr>
              <td class="block-cart__col">Имя*</td>
              <td class="block-cart__col">
                <input type="text" name="name" id="name" class="name" value="{$name}">
              </td>
            </tr>
            <tr>
              <td class="block-cart__col">Телефон*</td>
              <td class="block-cart__col">
                <input type="text" name="phone" id="phone" class="phone" value="{$phone}">
              </td>
            </tr>
            <tr>
              <td class="block-cart__col">Адрес*</td>
              <td class="block-cart__col">
                <input type="text" name="adress" id="adress" class="adress" value="{$adress}">
              </td>
            </tr>
          </table>
          {else}
          <div class="block-registration">
            <section class="aside__section">
              <h2 class="aside__title">Авторизация</h2>
              <form action="" class="login">
                <input class="login__input login__email" type="text" name="email" placeholder="Введите Имя">
                <input class="login__input login__pwd" type="password" name="pwd" placeholder="Введите Пароль">
                <button type="submit" class="login__btn">Войти</button>
              </form>

              <h2 class="aside__title register-toggle">Регистрация</h2>
              <form class="register hide">
                <input class="register__input" type="text" name="name" value="" placeholder="Введите Имя">
                <input class="register__input" type="email" name="email" value="" placeholder="Введите Email*">
                <input class="register__input" type="phone" name="phone" value="" placeholder="Введите Телефон">
                <input class="register__input" type="password" name="pwd1" value="" placeholder="Введите Пароль*">
                <input class="register__input" type="password" name="pwd2" value="" placeholder="Повторите Пароль*">

                <button class="register__btn">Зарегистрироваться</button>
              </form>
            </section>
          </div>
          {$buttonClass = "hide"}
          {/if}
          <button  class="btnSaveOrder {$buttonClass}">Оформить заказ</button>
        </form>
      </div>
    </div>
  </div>
</section>