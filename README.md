# Gate Zen API

Gate ZEN is an online Shop2Go solution, pre-made with ready to go products, available for everyone to start selling within minutes.
By taking away the hassle of creating your own store and finding products to sell, you simply select which product category you want to start selling, and pick one of the belonging product and design category templates. And within minutes you will have your own store with real products, ready to be sold, paid and shipped.

## To Install

- enter git init in your cmd or terminal
- enter git remote add origin http://gitlab.abovestratus.com/gate-zen/gate-zen-api.git
- enter git pull origin branch-name
- Run composer install on your cmd or terminal
- Copy .env.example file to .env on the root folder.
- You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
- Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
- By default, the username is root and you can leave the password field empty. (This is for Xampp)
- By default, the username is root and password is also root. (This is for Lamp)
- Run php artisan key:generate
- Run php artisan sentry:publish --dsn=https://examplePublicKey@o0.ingest.sentry.io/0
- Run php artisan migrate
- Run php artisan serve

## VS Code Extensions

- PHP Intelephense by Ben Mewburn
- GitLens — Git supercharged by Git Kraken
- PHP Namespace Resolver by Mehedi Hassan

## Reference
- Sentry documentation website: https://docs.sentry.io/platforms/php/guides/laravel/ 