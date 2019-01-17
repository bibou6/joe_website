# Symfony 4.2.* website template to start up

In this project you will find all the basics and some exemples in order to start a symfony web project!

## Configured bundles

- [FOSUserBundle](https://symfony.com/doc/current/bundles/FOSUserBundle/index.html)
- [EasyAdminBundle](https://symfony.com/doc/master/bundles/EasyAdminBundle/index.html)
- [WebPack Encore](https://symfony.com/doc/4.0/frontend/encore/installation.html)
- [VichUploaderBundle](https://symfony.com/doc/master/bundles/EasyAdminBundle/integration/vichuploaderbundle.html)
- [LiipImagineBundle](https://symfony.com/doc/2.0/bundles/LiipImagineBundle/introduction.html)

## How to install

1. Copy the project into a repository
2. You will need to install [Npm](https://www.npmjs.com/get-npm) command
3. You will need to install [Yarn](https://yarnpkg.com/lang/fr/docs/install/#windows-stable) command
4. Then execute de following commands into the root folder of your project

```bash
//Install all the Bundles into the vendor/ folder
composer install

//Create the database
//Mine in named 'template' if you want to change it, edit .env file at project root
//line: DATABASE_URL=mysql://root:@127.0.0.1:3306/template change template to whatever pleases you
//then
php bin/console doctrine:database:create

// Create the tables
php bin/console doctrine:schema:update -f

// install yarn
yarn install

// Load assets
yarn run encore dev

// Clear cache
php bin/console cache:clear

// Launch server
php bin/console server:run 8000

```

Enjoy your [website](http://localhost:8000)