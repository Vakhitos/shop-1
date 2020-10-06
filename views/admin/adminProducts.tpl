<section class="section">
  <h2 class="section__title">Добавить товар</h2>
  <form class="selectNewProduct">
    <div class="input-block">
      <small>Название</small>
      <input type="edit" class="newItemName" value="">
    </div>
    <div class="input-block">
      <small>Цена</small>
      <input type="edit" class="newItemPrice" value="">
    </div>
    <div class="input-block">
      <small>Категория</small>
      <select class="newItemCatId">
        <option value="0">Выберете категорию
          {foreach $rsCategories as $itemCat}
        <option value="{$itemCat['id']}">{$itemCat['name']}
          {/foreach}
      </select>
    </div>
    <div class="input-block">
      <small>Описание</small>
      <textarea type="text" class="newItemDesc"></textarea>
    </div>
    <button class="addProductBtn">Сохранить</button>
  </form>
</section>

<!-- Вывод товаров для редактирования -->

<div class="updateProduct">
  <table>
    <caption>Редактирование товаров</caption>
    <thead>
      <th>№</th>
      <th>ID</th>
      <th>Название</th>
      <th>Цена</th>
      <th>Категория</th>
      <th>Описание</th>
      <th>Удалить</th>
      <th>Изображение</th>

      <th>Сохранить</th>
    </thead>

    <tbody>
      {foreach $rsProducts as $item name=products}
      <tr>
        <td>{$smarty.foreach.products.iteration}</td>
        <td>{$item['id']}</td>
        <td><input type="edit"  class="itemName_{$item['id']}" value="{$item['name']}"></td>
        <td><input type="edit"  class="itemPrice_{$item['id']}" value="{$item['price']}"></td>
        <td>
          <select name="" class="itemCatId_{$item['id']}">
            <option value="0">Главная категория
            {foreach $rsCategories as $itemCat}
            <option value="{$itemCat['id']}" {if $item['category_id']==$itemCat['id']} selected {/if}>{$itemCat['name']} </option> {/foreach} </select> </td> <td>
              <textarea class="itemDesc_{$item['id']}">{$item['description']}</textarea>
        </td>
        <td>
          <input type="checkbox" class="itemStatus_{$item['id']}" {if $item['status']==0} checked="checked" {/if}"> </td> <td>
          {if $item['image']}
          <img src="/images/products/{$item['image']}">
          {/if}
          <form action="/admin/upload/" method="POST" enctype="multipart/form-data">
            <input type="file" name="filename"> <br>
            <input type="hidden" name="itemId" value="{$item['id']}"> <br>
            <button type="submit">Загрузить</button>
          </form>
        </td>
        <td>
          <button type="button" class="updateProductBtn" data-id="{$item['id']}">Сохранить</button>
        </td>
      </tr>
      {/foreach}
    </tbody>
  </table>
</div>