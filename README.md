# expenses-laravel5
Simple app for expenses management made in Laravel 5.4

## Configuration, installation & running the server

Please visit [the Wiki page](https://github.com/mar469/expenses-laravel5/wiki/Installation-&-Running-the-server) for instruction how to these things.

## Available Routes

Hover over link to see its address (route with variable). `CTRL + click` opens link in new tab.
`{user}` stands for User id in the database (*users.id*). `{expense}`, Expense id, etc.

* Admin (also inherits all permissions from user role)
	* localhost:8000/[users](http://localhost:8000/users)
    	* [create new user](http://localhost:8000/users/create)
		* [view all users](http://localhost:8000/users)
		* [view/manage  user](http://localhost:8000/users/{user})
		* [edit user/manage roles](http://localhost:8000/users/{user}/edit)
		* [view user payments](http://localhost:8000/payments/user/{user})
        * [view `rejected` user's payments](http://localhost:8000/payments/user/{user}/rejected)
		* [view `pending` user's payments](http://localhost:8000/payments/user/{user}/pending)
		* [view `accepted` user's payments](http://localhost:8000/payments/user/{user}/accepted)
		* [view every user expenses](http://localhost:8000/expenses/user/{user})
		
	* localhost:8000/[roles](http://localhost:8000/roles)
		* [view all roles](http://localhost:8000/roles)
		* [view role details](http://localhost:8000/roles/{role})
	* localhost:8000/[expenses](http://localhost:8000/expenses) *main route inherits from user (view own expenses)*
	* localhost:8000/[payments](http://localhost:8000/payments) *main route inherits from user (view own payments)*
		* [view/moderate all `pending` payments](http://localhost:8000/payments/status/pending)
		* [view/moderate all `accepted` payments](http://localhost:8000/payments/status/accepted)
		* [view/moderate all `rejected` payments](http://localhost:8000/payments/status/rejected)
* User
	* localhost:8000/[expenses](http://localhost:8000/expenses)
		* [view all expenses](http://localhost:8000/expenses)
		* [create new expense](http://localhost:8000/expenses/create)
		* [edit/remove expense](http://localhost:8000/expenses/{expense}/edit) ***only** when it doesn't have any associated accepted/rejected payments to it*
		* [view expense details and associated payments](http://localhost:8000/expenses/{expense})
	* localhost:8000/[payments](http://localhost:8000/payments)
		* [view all payments](http://localhost:8000/payments)
		* [create new payment](http://localhost:8000/expense/{expense}/add-payment) *associated to expense*
		* [view payment details](http://localhost:8000/payments/{payment})
		* [edit/delete payment](http://localhost:8000/payments/{payment}/edit) ***only** when associated expense doesn't have any accepted/rejected payments to it*
		* [view `accepted` own payments](http://localhost:8000/payments/status/accepted)
		* [view `pending` own payments](http://localhost:8000/payments/status/accepted)
		* [view `rejected` own payments](http://localhost:8000/payments/status/accepted)
* etc.
