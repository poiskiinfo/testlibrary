1 Поправить под свой хостинг configuration.php
2 добавить следующие к ващему проекту в гугл

Google Sheets API
Google Drive API (хз неиспользуется но в документации писалось что без него небудет работать)
Поулчить json ключь гугла для работы.
Для начала вам надо прочитать эту статю
https://codd-wd.ru/instrukciya-po-polucheniyu-klyucha-servisnogo-akkaunta-google-dlya-raboty-s-sheets-api/#p1

Также создать таблицу в гугл таблицах хотябы поумолчанию с Лист1 и добавить пользователя ключа полученного выше к редактированию таблиц у него там gmail появился и вы его тупо добавляете как редактора гугл таблиц и тем самы даете разрешение php библиотеке

3 вставить ващ json googletable/ и поправить имя на ваше имя ключа  в файле googletable/index.php
  пример 44 строка  $googleAccountKeyFilePath = __DIR__ . '/ваше имя файла.json';
  и сохранить изменения
4 Подобавлять пользователей в корне вашего сайта в зайдя через браузер на index.php данного проекта и поудалять нескольких
5 Для запуска ссылки по крону вам надо указать урл http:/вассайт.зона/путь до googletable/index.php?cron=код который вы в конфиг файл прописали
если у вас этот архив в корне распакован то  http:/вассайт.зона/googletable/index.php?cron=код который вы в конфиг файл прописали
 в гугл появится запись и так далее будет добавляться в конец (обычно раз в день в начале  в 1час ночи или как хотите запускаете и смотрите что произошло за вчерашний день) так как тз небыло указано за какой промежуток времени было выводить информацию а тупо просто вывести вот и все дату запуска парсера минус 1 день и вуаля статистика получается.

 Да учтите что крон запускать лучше не чаше 1н раз за 100 сек как в документауии указано

В данном архиве была задейсвована чужая библиотека гугла апи тоже с гитхаба взятая и помещена она в папку googletable/
в ней также лежит исходник данной либы и установленная через compozer

Остальные библиотеки были разработаны мной и я ток часть урезанную версию вам оставил, для работы с msqli, другие удалил из за ненадобности.
Обыно пользуюсь не относительными путями, а все пути идут через библиотеку которая от корня установки идет прописывается в начале пути чтоб проще было разрабатывать и некопаться по 1000 раз в путях к файлам.

Да скрипт был проверен на версии php 5.5 x64 apache-2.4-x64 на локальной машине openserver
Да я знаком и с выше версиями php но гугл библиотека на 7 ругается чутка и пришлось ее понизить для нормальной установки через композер


Время потраченное на это все
по дням

06.02.2020 с 12:00 - 21.00 1-2 пункты
07.02.2020 с 12:00 - 14.00 3 пункт чутка поработал потом основной работой занялся и мне было не до вашего проекта тестового
08.02.2020 с 12:00 - 13.00 3 продолжил чутка
09.02.2020 с 12:00 - 14.00 3 доделал проект и учтите в выходные дня я люблю отдыхать а не работать!!!!! Ведь отдохнувший и сытый программист гораздо больше може зделать чем голодный и уставший, а то отвлекаться и ждать время перекуса не особо хочется.
Повезло что документация норм была на английском расписана иначе пришлось бы повозиться с кодом хз скоко времени

Все файлы должны быть в кодировке utf-8 без бом сохранениы это очень важно!!!


Также время потрачено на создание видео и заливку на гитхаб проекта.