<section class="section">
  <hgroup>
    <h1 class="section__title">{$rsCategory['name']}</h1>
  </hgroup>

  {if $rsProducts}
  <div class="product-line">
    {foreach $rsProducts as $item}
    <div class="col">
      <!-- Карточка товара >> -->
      <article class="card-product">
        <figure class="card-product__media">
          <a href="/product/{$item['id']}/">
            <img src="/images/products/{$item['image']}" class="card-product__img" />
          </a>
        </figure>

        <div class="card-product__footer">
          <h2 class="card-product__name">
            <a href="/product/{$item['id']}/">{$item['name']}</a>
          </h2>
          <span class="card-product__price">{$item['price']}</span>
        </div>
      </article>
      <!-- << Карточка товара -->
    </div>
    {/foreach}
  </div>
  {elseif $rsChildCats}
  <div class="product-line">
    {foreach $rsChildCats as $item}
    <div class="col">
      <a href="/category/{$item['id']}/">
        <article class="card-category">
          <h2 class="card-category__name">{$item['name']}</h2>
        </article>
      </a>
    </div>
    {/foreach}
  </div>
  {else}
  <div class="warning">
    <h1>В данном разделе товары отсутствуют.</h1>
  </div>
  {/if}
  </div>

</section>