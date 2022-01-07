<h1 align="center"><strong>pupiLog - new age a laravel based blog</strong></h1>

pupiLog is a next generation blog software written via using Laravel-Framework. AlpineJS 3, TailwindCSS is used in the frontend and backend things are working with PHP 8 + Laravel 8. It is based on CRUD (Create Read Update Delete) logic. Since it is the first project of mine developed using Laravel, I decided to name it pupiLog = pupil(intern) + blog. 

## Features

- Register / Login / Administration
- Captcha and Mnemonic
- Categories Section
- Iplogger for every logged session
- Plain search with word based / Search in categories 
- Posts / Comments / Subcomments
- Likeable Posts and Comments
- Edit-Add-Delete Posts / Comments / Subcomments
- Posts and comments can be set to published or unpublished 
- Mostly Responsive Design
- Generate your database and fake datas via migration and seed

## Working in progress

- Seperating project to two branchs ( Js / non-Js versions )
- User profiles and user control panel
- ~~Like and Dislike logic~~

## Installation Instructions

- Run on terminal: `git clone https://github.com/zorbey-qcow2/pupiLog.git`
- Rename `.env.example` config file to `.env` and set-up your database.
- Install composer packages:  `composer install`
- Run necessary npm commands: `npm install & npm run dev`
- Run the migrations: `php artisan migrate`
- If you need fake-data then run: `php artisan db:seed`
- Symlink storage file: `php artisan storage:link`
- Generate a new application key: `php artisan key:generate`
- And its ready: `php artisan serve`
- For get admin account, change `is_admin` column to `true` in your users database.
- Bon appetite!

## User Role\Permissions
> Edit `users -> role_id` to set the authority.
- 1 : Admin
- 2 : Moderator
- 3 : Author
- 4 : Standart
- 5 : Restricted
- 6 : Banned 

Thanks to <a href="https://github.com/furkanmeraloglu" target="_blank">@furkanmeraloglu</a> who always supports me (◕‿◕)

## License

pupiLog is licensed under the [MIT license](https://opensource.org/licenses/MIT).
