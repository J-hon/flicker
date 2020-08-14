<b>Flicker</b>

Flicker is a movie catalogue system where registered customers
can purchase movies.

<b>Requirements</b>

- PHP >= 7.*
- MySQL >= 5.7
- Composer
- Internet connection

<b>Installation</b>

Open your terminal and run the following commands:

- `git clone https://github.com/J-hon/flicker.git`
- `cd flicker`
- `composer install`
- `composer dump-autoload`
- `php artisan vendor:publish --provider="KingFlamez\Rave\RaveServiceProvider"
`

<b>Steps</b>
1. Rename or copy `.env.example` file to `.env`.
2. Set up your rave sandbox account as well as your MailTrap account.
3. Input your database credentials as well as your Rave and MailTrap credentials in your `.env` file.
4. Run `php artisan migrate` and `php artisan db:seed` to migrate tables and seed respectively.
5. Copy this link `http://localhost:8000/` and paste in your browser.

Register to get started.

Admin details:  E-mail - admin@admin.com
                Password  - password

To purchase a movie, use rave test card details.
