<aside class="aside">

  <div class="aside__block">
    <h3 class="aside__title">Категории</h3>
    <nav>
      <ul class="menu-categories">
        {foreach $rsCategories as $item}
        <li class="menu-categories__item">
          <a href="/?controller=category&id={$item['id']}/" class="menu-categories__link">{$item['name']}</a>
          {if isset($item['children'])}
          <ul class="menu-children">
            {foreach $item['children'] as $itemChild}
            <li class="menu-children__item">
              <a href="/?controller=category&id={$itemChild['id']}/" class="menu-children__link">{$itemChild['name']}</a>
            </li>
            {/foreach}
          </ul>
          {/if}
        </li>
        {/foreach}
      </ul>
    </nav>
  </div>

  <div class="aside__block">
    {if isset($arUser)}
    <section class="aside__section block-user">
      <h2 class="aside__title">Кабинет пользователя</h2>
      <div class="user">
        <a href="/user/" class="user__link user__privat">{$arUser['displayName']}</a>
        <a href="/user/logout/" class="user__link user__logout">Выход</a>
      </div>
    </section>
    {else}

    <section class="aside__section block-user hide">
      <h2 class="aside__title">Кабинет пользователя</h2>
      <div class="user">
        <a href="/user/" class="user__link user__privat"></a>
        <a href="/user/logout/" class="user__link user__logout">Выход</a>
      </div>
    </section>

    {if ! isset($hideLoginBox)}
    <div class="block-registration">
      <section class="aside__section">
        <h2 class="aside__title">Авторизация</h2>

        <form action="" class="login">
          <!-- AJAX форма авторизации -->
          <input class="login__input login__email" type="text" name="email" value="" placeholder="Введите Имя">
          <input class="login__input login__pwd" type="password" name="pwd" value="" placeholder="Введите Пароль">
          <button class="login__btn">Войти</button>
        </form>

        <h2 class="aside__title link-toggle">Регистрация</h2>

        <form class="registration-form hide">
          <!-- AJAX форма регистрации -->
          <input class="registration-form__input" type="text" name="name" value="" placeholder="Введите Имя">
          <input class="registration-form__input" type="email" name="email" value="" placeholder="Введите Email*">
          <input class="registration-form__input" type="phone" name="phone" value="" placeholder="Введите Телефон">
          <input class="registration-form__input" type="text" name="adress" value="" placeholder="Введите адрес">
          <input class="registration-form__input" type="password" name="pwd1" value="" placeholder="Введите Пароль*">
          <input class="registration-form__input" type="password" name="pwd2" value="" placeholder="Повторите Пароль*">
          <button class="registration-form__btn">Зарегистрироваться</button>
        </form>

      </section>
    </div>
    {/if}
    {/if}</div>
</aside>