# Zus Coffee Backend Developer Interview Question 

This website will be able to inspect, create and edit the product and user details. This website also has an API that will able another website to display the products and user details.

This website uses Jetstream to handle the website's login and registration using Sanctum.

To build the API, I have installed the Laravel Passport to provide a full OAuth2 server implementation for the website.

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
1. Login
![Login](https://user-images.githubusercontent.com/28057667/136832144-a860fa3d-af26-4576-b072-8d6dc751bf41.png)
2. Logout
![Logout](https://user-images.githubusercontent.com/28057667/136833578-6753fb8b-301e-4297-995d-5e8ed391338d.png)
3. Add User
![Add User](https://user-images.githubusercontent.com/28057667/136833580-8ab1e1b7-7bad-4ed0-b1d1-fd2fa7903df6.png)
4. View User
![View User](https://user-images.githubusercontent.com/28057667/136833587-285fd45c-1164-40cb-984c-650a1f87c30d.png)
5. Edit User
![Edit User](https://user-images.githubusercontent.com/28057667/136833589-8be5db9f-42bc-4e0e-8cf3-9b12cd1e17b3.png)
6. Add Product
![Add Product](https://user-images.githubusercontent.com/28057667/136833592-37d1f71e-4332-4bcc-968e-6f09f368b8e8.png)
7. View Product
![View Product](https://user-images.githubusercontent.com/28057667/136833594-9f74ecd0-521f-4bed-8055-6f49328c6fa3.png)
8. Edit Product
![Edit Product](https://user-images.githubusercontent.com/28057667/136833598-07807274-7375-4098-b088-f021dbbc3f97.png)

API Route
1.  Login
![Login](https://user-images.githubusercontent.com/28057667/136833600-c60ea19a-e23b-4fe5-94b2-1fcbea6ee0b4.png)
2. Logout
![Logout](https://user-images.githubusercontent.com/28057667/136833601-a28a792d-2461-4082-986e-7452f6d1103c.png)
3. View User List
![View User List](https://user-images.githubusercontent.com/28057667/136833606-b91f011e-6ff2-4805-a667-3400637349c1.png)
4. View Available Product List
![View Available Product List](https://user-images.githubusercontent.com/28057667/136833608-9a8a6cd3-c012-42a4-934f-878688d276b7.png)
5. View Product Details
![View Product Details](https://user-images.githubusercontent.com/28057667/136833572-9e9a0797-2aa9-4af4-8f76-37f74c24f11e.png)

## How To Use API
Use POSTMAN to test API.

There is 5 API routes
- http://127.0.0.1:8000/api/login (POST)
- http://127.0.0.1:8000/api/logout (POST)
- http://127.0.0.1:8000/api/user-list (GET)
- http://127.0.0.1:8000/api/product-list (GET)
- http://127.0.0.1:8000/api/product-details/{id} (GET)

### Login Function API (POST)

URL 
```
http://127.0.0.1:8000/api/login
```

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
URL 
```
http://127.0.0.1:8000/api/logout
```

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
URL 
```
http://127.0.0.1:8000/api/user-list
```

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
URL 
```
http://127.0.0.1:8000/api/product-list
```

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
URL 
```
http://127.0.0.1:8000/api/product-details/{id}
```

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




