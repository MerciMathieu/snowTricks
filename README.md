# snowTricks
Communautary website to share each other snowboard tricks. Enjoy !

## Requirements
*  composer
*  php 7.2 or higher
*  postgres sql
*  symfony (tool to use with symfony5; replace "php bin/console" instruction

## Installation
    mkdir snowtricks
    cd snowtricks
### Git clone
    git clone https://github.com/MerciMathieu/snowTricks.git ./

### Composer install
    composer install

### Database
#### Enter your connection's informations
*  Enter your informations in the **/.env**  file  
Following lines will have to be replaced with your own informations:  
    

    DATABASE_URL=
AND

    MAILER_URL=

#### Create the database
    symfony console doctrine:database:create

#### Inject tables with migration
    symfony console doctrine:migrations:migrate
will create the tables and fields

## Usage

### Load data tricks 
    symfony console doctrine:fixtures:load  

### Start using the website
start symfony web server  
    
    symfony serve -d

start database container  

    docker-compose create  

then, start db with

    docker-compose start  

and stop it, when you stop to work on it, with

    docker-compose stop

#### Create an account

and start adding **your own tricks !**

**Enjoy !** 
