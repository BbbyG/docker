# docker
1. Изграждане и стартиране на контейнерите.
Използваме git clone, за да клонира репозиторията с файловете. След това местим текущата ни директория към клонираната. В новата директория изграждаме и стартираме всички услуги с Docker Compose.
git clone https://github.com/bbbyg/docker.git
cd docker
docker compose up --build
2. Структура на проекта
docker/
  -DB/
     -registerDB.sql
  -PHP/
     -Dockerfile
     -register.php
   -docker-compose.yml
   -README.md
3. Работа на компонентите
PHP сървърът работи с образ, базиран на php:8.1-apache, отговаря на HTTP заявки на порт 8080 и зарежда PHP скриптове от директорията /var/www/html.
MySQL базата данни използва официален образ mysql:8.0, инициализира се без парола и създава БД registerDB и данните се съхраняват в Docker volume.
4. Комуникации между услугите
Те комуникират чрез Docker мрежа, създавана от Compose. Сървърът се свързва към базата чрез името на услугата db: new PDO("mysql:host=db;dbname=registerDB", "root", "password");
В docker-compose.yml, услугите са дефинирани така, че се свързват по име:
services:
  backend:
    depends_on:
      - db
