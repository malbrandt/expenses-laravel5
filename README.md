# expenses-laravel5

Simple app for expenses management made in Laravel 5.4.

[**Skip to available routes & screenshot**](https://github.com/mar469/expenses-laravel5#available-routes-and-screenshots)

## Prerequites

### node.js packages

You need to have `NodeJS` (http://nodejs.org) installed. If you already have NodeJS installed, follow the instructions below. Open terminal in main folder and install npm packages with command:

    > npm install

Update the packages with command:

    > npm update

### composer packages

You need to install `composer` (https://getcomposer.org/). Update package dependencies running the following commands in console:

    > composer install
    > composer update

## Configuration

There are several configuration options in this package listed below.

### Application secure key

First you need to generate secure key by running in terminal (at the project root folder) following command:

    > php artisan key:generate

### Database connection

Rename file `.env.example` (which is in the root folder) to `.env`, open it and change database connection parameters:

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=expenses
	DB_USERNAME=root
	DB_PASSWORD=root

### Accounts
You can edit accounts credentials in file `config/accounts.php`. You can login to them with buttons on `/login` page (for testing purposes). 
You can provide following elements:

* `name` - user name
* `email` - user email, used to log in (must be in correct format),
* `password` - user password, used to log in (will be encrypted in database),
* `roles` - **array** of roles, i.e. `['user', 'admin']`, that will be assigned to the account after its creation.

Example item can look like this:

    'user' => [
        'name' => 'User',
        'email' => 'email@domain.com',
        'password' => 'secret',
        'roles' => ['user']
    ],

To add accounts to the database you need to run following command in console:

    > php artisan migrate
    > php artisan db:seed --class=UsersTableSeeder

If you're having problem you might need to rollback database migrations (this will erase all the data stored in) with the command:

    > php artisan migrate:reset

### Navigation bars
You can edit navigation links in file `config/navbars.php`. Currently they are supported **role based links on top and side**. Each item can contain `route, text, icon, links` elements. With `links` element you can provide array of items for the **second level menu on the side** i.e:

    'admin' => [                    // role name
        'side' => [                 // side or top?
            [
                'name' => 'Roles',
                'route' => '#',
                'icon' => 'fa-user-md', // font-awesome icon
                'links' => [        // array of second level links
                    ['name' => 'View roles', 'route' => '/roles', 'icon' => 'fa-list'],
                ]
            ],
            [
                'name' => 'Users',
                'route' => 'users',
                'icon' => 'fa-users',
                'links' => [
                    ['name' => 'Create user', 'route' => '/users/create', 'icon' => 'fa-plus'],
                    ['name' => 'View users', 'route' => '/users', 'icon' => 'fa-list'],
                ]
            ],
        ],
        'top' => [], // same syntax as in side array
    ],

### Seeding the database

You can seed the database with auto-generated items (currently there is supported generation of: `users, expenses, payments`). `Expenses` and `payments` records will be randomly associated with each other and with users accounts.

If you want to change the count of generated items you can do this by editing the file `config/database.php`, at the end there is proper code to do this:

    'seeding_count' => [
        'users' => 3,      // UsersTableSeeder
        'expenses' => 30,  // ExpensesTableSeeder
        'payments' => 100  // PaymentsTableSeeder
    ],

You can also change the default table names but this is not recommended since is was not tested yet. You can do this be editing the same file and changing following lines (and the end of file):

    'payments' => 'payments',
    'expenses' => 'expenses'

To seed the database you can type in following command:

    > php artisan migrate --seed

### Adding roles with permissions
 
This project uses the `Spatie Larvel Permission` library (https://github.com/spatie/laravel-permission).
To add some new roles and associated permissions, edit the file `config/roles.php`. There is currently 16 permissions in following naming convention:
    Permissions naming convention:

    "{Model}{Action}{Owner}"

    {Model} - name of the model class {Expense|Payment}
    {Action} - name of action {Get|Store|Update|Delete}
    {Owner} - the owner of model {Own|All}

    In example, if we got permission named ExpenseUpdateAll, we can update
    expenses owned by anyone, but with permission named ExpenseUpdateOwn,
    we can update the expense only when we are owning it (user.id must
    be equal to expense.user_id).

To specify some role with its permissions you should do this as below:

    'admin' => [
        // Expense related permissions:
        ['name' => 'ExpenseGetAll', 'guard_name' => 'web'],
        ['name' => 'ExpenseStoreAll', 'guard_name' => 'web'],
        // ... rest of permissions
    ],

## Running the server

To run the server open terminal in root folder and type following command:

    > php artisan serve

Now you should be able to visit the site at: http://localhost:8000.

## Available Routes and Screenshots

Hover over link to see its address (route with variable). `CTRL + click` opens link in new tab.
`{user}` stands for User id in the database (*users.id*). `{expense}`, Expense id, etc.

* Login page <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/login-page.png" width="50"/>
* Homepage <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/user-homepage.png" width="50"/>
* Admin (also inherits all permissions from user role)
	* admin menu <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/admin-menu.png" width="50"/>
	* localhost:8000/[users](http://localhost:8000/users)
    		* [create new user](http://localhost:8000/users/create) <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/admin-users-create.png" width="50"/>
		* [view all users](http://localhost:8000/users) <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/admin-users-show-all.png" width="50"/>
 		* [view/manage user](http://localhost:8000/users/{user})
		* [edit user/manage roles](http://localhost:8000/users/{user}/edit) <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/admin-users-edit.png" width="50"/>
		* [view user payments](http://localhost:8000/payments/user/{user})
        * [view `rejected` user's payments](http://localhost:8000/payments/user/{user}/rejected)
		* [view `pending` user's payments](http://localhost:8000/payments/user/{user}/pending)
		* [view `accepted` user's payments](http://localhost:8000/payments/user/{user}/accepted)
		* [view every user expenses](http://localhost:8000/expenses/user/{user})
		
	* localhost:8000/[roles](http://localhost:8000/roles)
		* [view all roles](http://localhost:8000/roles) <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/admin-roles-all.png" width="50"/>
		* [view role details](http://localhost:8000/roles/{role}) <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/admin-roles-view.png" width="50"/>
	* localhost:8000/[expenses](http://localhost:8000/expenses) *main route inherits from user (view own expenses)*
	* localhost:8000/[payments](http://localhost:8000/payments) *main route inherits from user (view own payments)*
		* [view/moderate all `pending` payments](http://localhost:8000/payments/status/pending)
		* [view/moderate all `accepted` payments](http://localhost:8000/payments/status/accepted)
		* [view/moderate all `rejected` payments](http://localhost:8000/payments/status/rejected)
* User
	* user menu <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/user-menu.png" width="50"/>
	* localhost:8000/[expenses](http://localhost:8000/expenses) 
		* [view all expenses](http://localhost:8000/expenses) <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/user-expenses-all.png" width="50"/>
		* [create new expense](http://localhost:8000/expenses/create)
		* [edit/remove expense](http://localhost:8000/expenses/{expense}/edit) ***only** when it doesn't have any associated accepted/rejected payments to it*
		* [view expense details and associated payments](http://localhost:8000/expenses/{expense})
	* localhost:8000/[payments](http://localhost:8000/payments)
		* [view all payments](http://localhost:8000/payments) <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/user-payments-all.png" width="50"/>
		* [create new payment](http://localhost:8000/expense/{expense}/add-payment) *associated to expense*
		* [view payment details](http://localhost:8000/payments/{payment})
		* [edit/delete payment](http://localhost:8000/payments/{payment}/edit) ***only** when associated expense doesn't have any accepted/rejected payments to it*
		* [view `accepted` own payments](http://localhost:8000/payments/status/accepted) <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/user-payments-accepted.png" width="50"/>
		* [view `pending` own payments](http://localhost:8000/payments/status/accepted) <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/user-payments-pending.png" width="50"/>
		* [view `rejected` own payments](http://localhost:8000/payments/status/accepted) <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/user-payments-rejected.png" width="50"/>
* etc.
