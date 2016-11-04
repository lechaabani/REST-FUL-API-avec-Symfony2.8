
Application Demo FTV
========================

This project is a [Symfony REST Full API] to create an implementation of [Managing Article] Demo.

Install
----------------------------------


```bash
git clone https://github.com/lechaabani/demo_ftv.git
```

Then:
```bash
composer install
``` 

Then cretae the data base by loading

```bash
php app/console doctrine:database:create
```

Or you find an sql file in

```bash
app/sql
```

Then generate the entity article in the data base by loading

```bash
php app/console doctrine:schema:update --force
```

You can generate an exemple of data in the base by loading

```bash
php app/console doctrine:fixtures:load
```

Then run this command to generate the erros_code.ini

```bash
php app/console app:create-error-code
```

Then run the php server

```bash
php app/console server:run
```

Then browse through the Rest API

```
http://localhost:8080/api/doc
``` 
