<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/
Route::get('newuser', function()
{
    return View::make('partials.newuser');
});

Route::post('newuser', function()
{
    /**
     *  post_index processes the sign up form on the home page and saves new user's credentials into the database
     */
 
        // Get the input fields from the form into an array
        $new_user = array(
            'name'      => Input::get('name'),
            'username'  => Input::get('username'),
            'password'  => Input::get('password')
        );
   
        // Create the array of validation rules
        $rules = array(
            'name'      =>  'required|min:3|max:255',
            'username'  =>  'required|min:3|max:128|alpha_dash|unique:users',
            'password'  =>  'required|min:3|max:128'
        );
    
        // Make the validator
        $validation = Validator::make($new_user, $rules);
        if ( $validation -> fails() )
        {   
            return Redirect::to('newuser')
                    ->with_errors($validation)
                    ->with_input();
        }
       
        // create new user and redirect to the login page with a success message
        $user = new User($new_user);
        $user->save();
        return Redirect::to('login') -> with('success_message', true);
});

Route::get('login', function()
{
    return View::make('partials.login');
});

Route::post('login', function()
{
    /**
     *  post_login processes the login page form and loggs the user in if the credentials match the ones in the database
     */
    $remember = Input::get('remember');
    $credentials = array(
        'username' => Input::get('username'), 
        'password' => Input::get('password'),
        'remember' => !empty($remember) ? $remember : null
    );
    
    if (Auth::attempt( $credentials ))
    {
        return Redirect::to('expenses');
    }else{
        return Redirect::to('login')
        -> with_input() 
        -> with('login_errors', true);
    }
});

Route::get('logout', function()
    {
        Auth::logout();
        return Redirect::to_action('login') -> with('logout_message', true);
    });

Route::get('/', function()
{
    return View::make('home.index');
});


Route::get('expenses', array('before' => 'auth', function(){
    $expenses = Auth::user()->expenses;    
    return View::make('expenses.show')->with('expenses', $expenses);
}));

Route::get('expenses/new', array('before' => 'auth', function(){
    $types = Auth::user()->types;
    $vendors = Auth::user()->vendors;
    return View::make('expenses.new')->with('vendors', $vendors)->with('types', $types);
}));

Route::post('expenses', array('before' => 'auth', function(){
    $input = Input::all();
    $expense = new Expense;

    $expense->user_id = Auth::user()->id;
    $expense->name = $input['name'];
    $expense->amount = $input['amount'];
    $expense->sum = Expense::sum('amount');
    
    $expense->vendor_id = $input['vendor'];
    $expense->save();
    $types = Input::get('types');
    if ($types) {
        foreach ($types as $type) {
            $expense->types()->attach($type);        
        }
    }

    $expenses = Expense::all();

    return View::make('expenses.show')->with('expenses', $expenses)->with('sum', $sum);
}));



Route::get('vendors', array('before' => 'auth', function(){
    $vendors = Auth::user()->vendors()->order_by('name', 'asc')->get();
    return View::make('vendors.show')->with('vendors', $vendors);
}));

Route::post('vendors', array('before' => 'auth', function(){
    $input = Input::all();
    $vendor = new Vendor;
    $vendor->name = $input['name'];
    $vendor->user_id = Auth::user()->id;
    $vendor->save();
    if (!Request::ajax()){
        return Redirect::to('vendors');
    } else {
        //Response::json($vendor->id);
    }
   
}));

Route::get('types', array('before' => 'auth', function(){
    $types = Auth::user()->types()->order_by('name', 'asc')->get();

    return View::make('types.show')->with('types', $types);
}));

Route::post('types', array('before' => 'auth', function(){

    $input = Input::all();
    $type = new Type;
    $type->name = $input['name'];
    $type->user_id = Auth::user()->id;
    $type->save();

    if (!Request::ajax()){
        return Redirect::to('types');
    }
    
}));



/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});