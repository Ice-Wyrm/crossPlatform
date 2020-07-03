# crossPlatform
Для разворачивания проекта (Только Ubuntu, с виндой сложна):
1. Установить php
2. Установить composer (https://www.ionos.com/community/hosting/php/install-and-use-php-composer-on-ubuntu-1604/)
3. Локально развернуть postgres
4. Установить себе symfony (в терминал прописать  wget https://get.symfony.com/cli/installer -O - | bash)
    (Если пишет, что не найдена команда symfony, в терминал вставить  export PATH="$HOME/.symfony/bin:$PATH")
5. В корне проекта в терминале прописать composer install
6. Почистить кэш (в терминале в корне проекта написать php bin/console cache:clear)
7. В .env заменить DATABASE_URL по образцу как там же и указано (26 строка)
8. В корне проекта в терминале написать symfony server:start

Как тестить:
В MainController.php перед каждым методом (кром __construct) есть аннотация @Route.
То что в скобках - вставлять после localhost
Пример:
- http:/localhost:8000/ownerList --> Метод ownerList
- http:/localhost:8000/factoriesOfOwner/1 --> метод factoriesOfOwner с параметром ownerId = 1
- Последний метод addFactory можно проверить в Postman (https://www.postman.com/collections/446317a43550b14dfe87)