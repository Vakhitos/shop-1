<section class="section">
    <div class="row">
        {foreach $rsProduct as $rsProduc}
        <div class="col">
            <article class="product-view">
                <div class="product-view__content">
                    <div class="product-view__media">
                        <figure>
                            <img src="/images/products/{$rsProduc['image']}" class="product-view__img" />
                            <div class="product-view__footer">
                                <span class="product-view__price">Стоимость: {$rsProduc['price']} rub</span>
                                <a  data-id="{$rsProduc['id']}" 
                                href="#" class="product-view__link removeCart removeCart_{$rsProduc['id']} {if ! $itemInCart} hide {/if}">Удалить из Карзины</a>
                                <a  data-id="{$rsProduc['id']}" href="#" class="product-view__link addCart addCart_{$rsProduc['id']} {if $itemInCart} hide {/if}">Положить в Карзину</a>
                            </div>
                        </figure>
                    </div>
                    <div class="product-view__info">
                        <hgroup>
                            <h1 class="product-view__name">{$rsProduc['name']}</h1>
                        </hgroup>
                        <p class="product-view__desc">{$rsProduc['description']}</p>
                    </div>
                </div>
            </article>
        </div>
        {/foreach}
    </div>
</section>

