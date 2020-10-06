
{* WorkArea *}

<section class="section">
  <hgroup class="section__head">
    <h1 class="section__title">Последнее поступление</h1>
  </hgroup>

  <div class="product-line">
    {foreach $rsProducts as $product}
    <div class="col">
      <!-- Карточка товара >> -->
      <article class="card-product">
        <figure class="card-product__media">
          <a href="product/{$product['id']}/">
            <img
              src="/images/products/{$product['image']}"
              class="card-product__img"
            />
          </a>
        </figure>

        <div class="card-product__footer">
          <h2 class="card-product__name">
            <a href="product/{$product['id']}/">{$product['name']}</a>
          </h2>
          <span class="card-product__price">{$product['price']}</span>
        </div>
      </article>
      <!-- << Карточка товара -->
    </div>
    {/foreach}
  </div>
  
</section>
