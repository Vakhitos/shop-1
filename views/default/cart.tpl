<section class="section">
    <hgroup>
        <h1>Карзина</h1>
    </hgroup>
    <div class="row">
        <div class="col">
            {if ! $rsProducts}
            <div class="warning">
                <h1>Ваша карзина пуста.</h1>
            </div>
            {else}

            <div class="block-cart">
                <h1 class="block-cart__title">Вашы заказы:</h1>
                <form action="/cart/order/" method="POST">
                <table class="block-cart__table">
                    <tr class="block-cart__head">
                        <td class="block-cart__col">Номер</td>
                        <td class="block-cart__col">Ноименование</td>
                        <td class="block-cart__col">Количество</td>
                        <td class="block-cart__col">Цена за единицу</td>
                        <td class="block-cart__col">Цена</td>
                        <td class="block-cart__col">Действия</td>
                    </tr>
                    {foreach $rsProducts as $item name=products}
                    <tr>
                        <td class="block-cart__col">{$smarty.foreach.products.iteration}</td>
                        <td class="block-cart__col">
                            <a href="/product/{$item['id']}/">{$item['name']}</a>
                        </td>
                        <td class="block-cart__col">
                            <input type="text" data-id="{$item['id']}" name="itemCnt_{$item['id']}" class="itemCnt itemCnt_{$item['id']}" value="1">
                        </td>
                        <td class="block-cart__col">
                            <span class="itemPrice_{$item['id']}" value="{$item['price']}">{$item['price']}</span>
                        </td>
                        <td class="block-cart__col">
                            <span class="block-cart__price itemRealPrice_{$item['id']} itemRealPrice">{$item['price']}</span>
                        </td>
                        <td class="block-cart__col">
                            <a data-id="{$item['id']}" href="#" class="product-view__link removeCart removeCart_{$item['id']}">Удалить</a>
                            <a data-id="{$item['id']}" href="#" class="product-view__link addCart addCart_{$item['id']} hide">Востановить</a>
                        </td>

                    </tr>
                    {/foreach}

                </table>

                <button class="block-cart__btn" type="submit">Оформить заказ</button>
            </form>

                
            </div>

            {/if}
        </div>

    </div>
</section>