# Zus Coffee Backend Developer Interview Question 

This website will be able to inspect, create and edit the product and user details. This website also have API that will able another website to display the products and user details.

This website use Jetstream to handle the website's login and registration using Sanctum.

To build the API, I have install the Laravel Passport that will provides a full OAuth2 server implementation for the website.

## Run The Website


```
php artisan serve

browse to 127.0.0.1:8000
```

The user will need to input the email address and the password. 

Email: admin@gmail.com

Password: qwertyuiop

## Available Function

Web Route
1. Add User
2. View User
3. Add Product
4. View Product

API Route
1.  Login
2. Logout
3. View User List
4. View Available Product List
5. View Product Details

## How To Use API
Use POSTMAN to test API.

There is 5 API routes
- http://127.0.0.1:8000/api/login (POST)
- http://127.0.0.1:8000/api/logout (POST)
- http://127.0.0.1:8000/api/user-list (GET)
- http://127.0.0.1:8000/api/product-list (GET)
- http://127.0.0.1:8000/api/product-details/{id} (GET)

### Login Function API (POST)

In headers include
```
Content-Type:application/json
Accept:application/json
```

In body type in credentials
```
{
	"emailAddress": "admin@gmail.com",
	"password": "qwertyuiop"
}
```

The JSON will return status, message and the access token
```
{
    "status": true,
    "message": "User logged in successfully",
    "access_token": "xxxxxxxxxx...."
}
```

### Logout Function API (POST)

In headers include
```
Content-Type:application/json
Accept:application/json
Authorization:Bearer {access-token}
```

The JSON will return status and message 
```
{
    "status": true,
    "message": "User logged out successfully"
}
```

### View User List Function API (GET)

In headers include
```
Content-Type:application/json
Accept:application/json
Authorization:Bearer {access-token}
```

The JSON will return status, message and user data fetch
```
{
    "status": 1,
    "message": "User List",
    "data": [
        {
            "fullName": "User Test 1",
            "emailAddress": "test1@gmail.com",
            "phoneNumber": "0123456789"
        },
        .....
    ]
}
```

### View Available Product Function API (GET)

In headers include
```
Content-Type:application/json
Accept:application/json
Authorization:Bearer {access-token}
```

The JSON will return status, message and product data fetch
```
{
    "status": 1,
    "message": "Available Product List",
    "data": [
        {
            "id": 14,
            "name": "Hot Himalayan Salt",
            "price": "15.90"
        },
        .....
    ]
}
```

### View Product Details Function API (GET)

In headers include
```
Content-Type:application/json
Accept:application/json
Authorization:Bearer {access-token}
```

The JSON will return status, message and product data fetch
```
{
    "status": true,
    "message": "Product data found",
    "data": {
        "id": 17,
        "name": "Thunder",
        "image": "202110111259Thunder-150x150.jpg",
        "price": "15.90",
        "description": "Thunder",
        "status": "In Stock"
    }
}
```




