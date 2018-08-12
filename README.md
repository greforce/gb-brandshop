# gb-brandshop

Основные задачи:

- анализ нынешнего движка
- приведение его в соответствие с принципами MVC (версия на PHP)
- переделка проекта с движка PHP на Node.js

адрес сайта на сервере: brandshop.mtxweb.site

## Структура проекта

### Базовый Layout:
- сверху Лого / строка поиска / корзина в хедере / кнопка логин/логаут/регистрация
- главный раздел (меняется в зависимости от открываемой страницы)
- снизу Лого с описанием / подробное меню
- футер со ссылками на соц-сети

в базовом layout по идее нужен:
- контролер строки поиска???
- контролер корзины в хедере??? - это 99% контролер, думаю
- контролер кнопки логина??? - это тоже контролер, думаю
или это не контролеры, а просто компоненты?
все же контролеры думаю - так как у них будет свой вью точно, какие-то действия, и работа с базой
или компоненты??? :)

кроме того, на всех страницах, кроме домашней под хедером будет компонент Breadcrumbs
а на домашней вместо него компонент Slider

### СТРАНИЦЫ

1. **Домашняя (/)**

Компонент слайдера, по клику идем на каталог (передаем какие-то параметры в GET? чтобы передать их в контролер каталога?)
каталог у меня называется пока что страницы product

Featured Items - компонент выводит список featured (подтягивает из БД)
по клику - открывается карточка товара (пока что product/show/{n})

то-есть это обрабатывает тот же контроллер что и каталог? только вместо action index работает action show ?

Maylike also - компонент выводит список Maylike (все аналогично Featured, только параметр поиска другой)

Статический блок рекламы

Блок отзывов и рядом блок запроса (контролер?)

2. **Каталог и страница покупки единичного товара (product/index и product/show{n})**

это как раз контроллер
index дает общий View - где можно выбирать и смотреть все товары, фильтровать и тд
show дает View только одного товара - где его можно купить

3. **Checkout**

Тут контролер checkout. в принципе у него только дефолтный action
index - где все и происходит
можно зарегистрироваться
можно SignIn сделать прямо отсюда (вместо верхней кнопки)
на него попадаем из корзин (там есть ссылка на CHECKOUT)

4. **Shoppingcart**

тут контролер основной корзины (данные идентичны как и корзина в хедере, но она отражает в странице)
тоже в принципе только дефолтный action
тут можно удалять товары
можно очистить корзину
