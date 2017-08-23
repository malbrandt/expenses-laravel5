# expenses-laravel5
Simple app for expenses management made in Laravel 5.4

## Configuration, installation & running the server

Please visit [the Wiki page](https://github.com/mar469/expenses-laravel5/wiki/Installation-&-Running-the-server) for instruction how to these things.

## Available Routes

Hover over link to see its address (route with variable). `CTRL + click` opens link in new tab.
`{user}` stands for User id in the database (*users.id*). `{expense}`, Expense id, etc.

* Login page <img src="https://github.com/mar469/expenses-laravel5/blob/vanilla-ui/_screenshots_/login-page.png" width="50"/>
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
