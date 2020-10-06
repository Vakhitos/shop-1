<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{$templateWebPath}/css/style.css" />
  <title>{$pageTitle}</title>
</head>

<body>
  <header class="header">
    <div class="header-top">
      <div class="container">
        <div class="header-top__inner">
          <a href="/" class="logo">Магазин</a>
          <a href="/cart/" class="goToBasket">
            <svg class="goToBasket__icon">
              <use xlink:href="/images/sprite.svg#cart"></use>
            </svg>
            <span class="goToBasket__counter" id="cartCntItems">
              {if $cartCntItems > 0}{$cartCntItems}{else}0{/if}
            </span>
          </a>
        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <div class="header-bottom__inner">

        </div>
      </div>
    </div>
  </header>

  <div class="wrapper">
    <div class="container">
      <div class="wrapper__inner">

        {include file='aside.tpl'}

        <main class="work-area">