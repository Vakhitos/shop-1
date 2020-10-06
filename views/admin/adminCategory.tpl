<div class="updateCategory">
  <table>
    <caption>Редактирование категорий</caption>
    <thead>
      <th>№</ht>
      <!-- <th>ID</ht> -->
      <th>Название</ht>
      <th>Выбор категории</ht>
      <th>Действие</ht>
    </thead>
    <tbody>
      {foreach $rsCategories as $item name=categories}


      <tr>

        <td>{$smarty.foreach.categories.iteration}</td>

        <!-- <td>{$item['id']}</td> -->
        <td>
          <input type="edit" class="itemName_{$item['id']}" value="{$item['name']}" />
        </td>
        <td>
          <select name="" id="" class="parentId_{$item['id']}">
            <option value="0">
              Гланая категория

              {foreach $rsMainCategories as $mainItem}
            <option value="{$mainItem['id']}" {if $item['parent_id']==$mainItem['id']}selected{/if}>{$mainItem['name']}
              {/foreach}

          </select>
        </td>
        <td>
          <button class="updateCategory__btn" data-id="{$item['id']}">Сохранить</button>
        </td>

      </tr>


      {/foreach}
    </tbody>

  </table>
</div>