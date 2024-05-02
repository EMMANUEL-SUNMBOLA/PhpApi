# CaveApi
- In this project I'll be trying to create an `CRUD-API` with vanilla `PHP` 
- To both strenthen my knowledge in `PHP` and to understand how `Routes` work in `LARAVEL`
### Navigating 
- All the styles are kept in the `/styles` folder mostly `SCSS`

- The logic handling the `ROUTES` and `RESPONSES` are found in `./control.php`

- `Disclaimer` : The data in `data/data.json` was gotten from `https://jsonplaceholder.typicode.com/`
- `Disclaimer` : The data in `data/dogfacts.json` was gotten from `https://jsonplaceholder.typicode.com/`

- The `ROUTE` handler now accepts an extra parameter to know the number of data to return
- API now sends returns data
- Added a 404 page for invalid routes
- `receiver.php` will receive and handle `POST` requests
- `receiver.php` returns a response to the clinet(the browser that sent the post)
- `POST` Requests now works when `JSON` data is sent 

- We use `php://input` instead of `$_POST` to fetch the data sent because `$_POST` checks for data sent from `forms` or with header `Content-Type: application/x-www-form-urlencoded` or `multipart/form-data`
while `php://input` checks for any `POST` data regardless of it's `content-type`
- A `.env` file is used to store sensitive data
- To use a `.env` file in `PHP` first create a file named `.env`
- Add the credentials you want to keep hidden like `API_KEY=1234`
- Make sure you add `.env` to your `.gitignore` file
- Then run 
```
composer require vlucas/phpdotenv
```
- Require the library
```
    require_once __DIR__ . "/vendor/autoload.php"
```
- For more info about `vlucas/phpdotenv` read their [documentation]("https://github.com/vlucas/phpdotenv/blob/master/README.md?)
- For a better example of `phpdot` usage checkout [walternomas]("https://github.dev/walternomas/send_email_with_php")

- CaveKey (API key) validation now in place to stop any nupermitted `POST` request

### MVC complete
* It retuns data when a `GET` request is sent
* Accepts data when `POST` request is sent and with validation
* It's an `API`
