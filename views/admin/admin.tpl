<section class="section">
<h2 class="section__title">Добавить категорию</h2>
  <form class="blockNewCategory">
    <div class="input-block">
      <small>Имя категории</small>
      <input type="text" name="newCategoryName" class="blockNewCategory__input newCategoryName" value=""> <br>
    </div>
    <div class="input-block">
      <small>Подкатегория</small>
      <select name="generalCatId" class="blockNewCategory__select">
        <option value="0">Главная категория
          {foreach $rsCategories as $item}
        <option value="{$item['id']}">{$item['name']}
          {/foreach}
        </option>
      </select>
    </div>
    <button type="button" class="newCategoryBtn blockNewCategory__btn">Добавить</button>
  </form>

</section>