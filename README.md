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
- Private message / Notifications

## Working in progress

- Seperating project to two branchs ( Js / non-Js versions )
- ~~User profiles and user control panel~~ :DONE
- ~~Like and Dislike logic~~ :DONE

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
- Bon appetite!

## User Role\Permissions
> Edit `users -> role_id` in database to set the authority.
- 1 : Admin
- 4 : Standart
- 6 : Banned 

## Thanks (◕‿◕)
- <a href="https://github.com/furkanmeraloglu" target="_blank">@furkanmeraloglu</a>
- <a href="https://asklagbox.com/" target="_blank">@lagbox</a>
- <a href="https://github.com/semihkeskindev" target="_blank">@semihkeskin</a>
- <a href="https://github.com/ayberkcal" target="_blank">@ayberkcal</a>


## License

pupiLog is licensed under the [MIT license](https://opensource.org/licenses/MIT).
