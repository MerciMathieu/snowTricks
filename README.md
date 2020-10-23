[![Codacy Badge](https://api.codacy.com/project/badge/Grade/6592912eec394be8b2ff5c7626cec46a)](https://app.codacy.com/gh/MerciMathieu/snowTricks?utm_source=github.com&utm_medium=referral&utm_content=MerciMathieu/snowTricks&utm_campaign=Badge_Grade)
[![Maintainability](https://api.codeclimate.com/v1/badges/7b6de2c7dfc83599fa2c/maintainability)](https://codeclimate.com/github/MerciMathieu/snowTricks/maintainability)

# snowTricks
Communautary website to share each other snowboard tricks

## Requirements
*   composer
*   php 7.2 or higher
*   postgres sql
*   symfony (tool to use with symfony5; replaces "php bin/console" command

## Install
    mkdir snowtricks
    cd snowtricks
### Git clone
    git clone https://github.com/MerciMathieu/snowTricks.git ./

### Composer install
    composer install

### Database
#### Enter your connection's informations
*   Enter your informations in the **/.env**  file  
Following lines will have to be replaced with your own informations:  
    

    DATABASE_URL=
    MAILER_URL=

#### Create the database
    symfony console doctrine:database:create

#### Inject tables with migration
    symfony console doctrine:migrations:migrate
will create the tables and fields

## Usage

### Load initial tricks (fixtures) 
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
