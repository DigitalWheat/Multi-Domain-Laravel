# Multi-Domain Laravel App
An example of multi-domain/subdomain app in Laravel.
A project allows your users to create their shops (or websites) under your subdomain, like **acme.example.com**

![laravel-multi-domain](https://user-images.githubusercontent.com/10295466/40539905-e452f7d6-601e-11e8-81a3-3f7200055ffa.png)

## What's included?

- User login and registration
- Application control panel
- Sub-domains routes
- Custom helper functions to work with subdomains
- Database migrations
- etc.

**Please note:** This is a demo project, and a lot of features aren't included, such as billing, user management, etc. The main purpose of this project is to show how to work with wildcard domains/subdomains in Laravel Framework.

## Learn more
Read more about this project here: [https://maxkostinevich.com/blog/multi-domain-laravel](https://maxkostinevich.com/blog/multi-domain-laravel)

## Deployment
It is supposed that the project is hosted using Laravel Forge and deployed using Envoyer.io

Commands to be added after installing composer dependencies:
```
cd {{release}}

composer update

npm install
npm run production

php artisan view:clear
php artisan cache:clear
php artisan vendor:publish
php artisan migrate --force

php artisan db:seed --force

php artisan config:cache
```

### Notes
#### Setting up .env file
Let's assume the app will be running on the **app.example.com** domain, so your users will be able to create their shops on your sub-domains, like **acme.example.com**.
In this case, your **.env** file may looks as follow:
```
APP_URL=http://app.example.com
APP_DOMAIN=app.example.com

SESSION_DOMAIN='.example.com'

ADMIN_FIRST_NAME=John
ADMIN_LAST_NAME=Doe
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=my_secure_password
```

#### Development on local environment
It is recommended to use tunneling service like [ngrok.com](https://ngrok.com), when developing on your local machine. In this case your **.env** file may looks as follow:

```
APP_URL=http://app.yourapp.ngrok.io
APP_DOMAIN=yourapp.ngrok.io

SESSION_DOMAIN='.yourapp.ngrok.io'

ADMIN_FIRST_NAME=John
ADMIN_LAST_NAME=Doe
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=secure_pa55word
```

#### Available NPM commands
```
npm run watch
npm run dev
npm run production
```

## Changelog
```
v1.0.0 - May 25, 2018
** Initial release **
```

## Credits
- [Max Kostinevich](https://maxkostinevich.com)

## [MIT License](https://opensource.org/licenses/MIT)
(c) 2018  [DigitalWheat](https://digitalwheat.com) - All rights reserved.

## About
At [DigitalWheat](https://digitalwheat.com) we create modern web-applications for small and medium-sized business. 

**Have a project in mind? [Let's talk!](https://digitalwheat.com/get-quote)**