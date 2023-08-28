# Kulture App API Documentation

Welcome to the documentation for the Kulture App API. This document provides information about the available routes, endpoints, and functionality of the API.

## Authentication

Before using the API, you need to authenticate. Here are the authentication routes:

### REGISTER

Endpoint: `POST /api/v1/register`

Register a new user. Requires providing a unique email and password.

Request Body:

```json
{
  "username": "required | unique",
  "first_name": " required | unique",
  "last_name": " required | unique",
  "email": "reequired | unique",
  "profile_profile": "required| mimes:jpeg,png,jpg,gif,svg|max:2048",
  "password": "required| min:8",
  "confirm_password": "required| min:8",
  "user_type": "requried|in:producer,artiste"
}
```

Response Body:

```json
{
    "status": true,
    "message": "User created successfully",
    "data": {
        "user": {
            "id": "01h8cba0b0bdf7c28yr245c8vy",
            "type": "users",
            "attributes": {
                "username": "@Christy_Fisher99",
                "first_name": "Dina",
                "last_name": "Asia",
                "email": "produc@gmail.com",
                "profile_picture": "https://res.cloudinary.com/dvn1eznus/image/upload/v1692631628/profileImages/bdompoxhgoqbgsc0g3z4.jpg",
                "user_type": "producer",
                "created_at": "2023-08-21T15:27:10.000000Z",
                "updated_at": "2023-08-21T15:27:10.000000Z"
            }
        }
    }
}
```

### LOGIN

Endpoint: `POST /api/v1/signin`

Request Body:

```json
{
  "email": "reequired | unique",
  "password": "required| min:8",
}
```
Response Body

```json
{
    "status": true,
    "message": "User logged in successfully",
    "data": {
        "token": "token",
        "user": {
            "id": "01h8cbbpmnxent1cys6wbtrc6y",
            "type": "users",
            "attributes": {
                "username": "@okeeey",
                "first_name": "Felipe",
                "last_name": "Alysson",
                "email": "abisoye@gmail.com",
                "profile_picture": "https://res.cloudinary.com/dvn1eznus/image/upload/v1692631684/profileImages/acqn3droaneqmfecb5gk.jpg",
                "user_type": "producer",
                "created_at": "2023-08-21T15:28:05.000000Z",
                "updated_at": "2023-08-21T15:28:05.000000Z"
            }
        }
    }
}
```
### TRENDING

Endpoint: `GET /api/v1/trending/beats`

Response Body:

```json
{
    "status": true,
    "message": "Trending beats retrieved successfully",
    "data": [
        {
            "id": "01h8em8rgtf8r0dt9s8wg13fdx",
            "attributes": {
                "name": "haptic",
                "price": 582,
                "genre": "Afro Pop",
                "image_url": "https://res.cloudinary.com/dvn1eznus/image/upload/v1692708124/beatsImages/htgyamojwfpe3xevpoxo.jpg",
                "file_url": "https://res.cloudinary.com/dvn1eznus/video/upload/v1692708134/beatsAudios/norrmwqnbb8h1zieypag.mp3",
                "duration": "00:51",
                "size": 1635056,
                "type": "audio/mpeg",
                "user_id": "01h8e8nycg52axpj85ty4jcrr1",
                "total_sales": 0,
                "plays": 0,
                "views": 0,
                "likes": 0,
                "downloads": 0
            },
            "producer": {
                "id": "01h8e8nz80gapv1ck2ts0zysr7",
                "user_id": "01h8e8nycg52axpj85ty4jcrr1",
                "total_revenue": 0,
                "total_sales": 0,
                "total_beats": 22,
                "profile_views": 9,
                "total_beats_sold": 0,
                "created_at": "2023-08-22T09:19:45.000000Z",
                "updated_at": "2023-08-22T14:04:10.000000Z"
            }
        }
    ]
}
```


Endpoint: `GET /api/v1/trending/producers`

Response Body:

```json

{
    "status": true,
    "message": "Trending producers retrieved successfully",
    "data": {
        "data": [
            {
                "id": "01h875k9xznv3qzt5pbzte4h2k",
                "user_id": "01h875k9wyqa89jwxfa9w9b3az",
                "total_revenue": 0,
                "total_sales": 0,
                "total_beats": 0,
                "profile_views": 0,
                "total_beats_sold": 0,
                "created_at": "2023-08-19T15:11:11.000000Z",
                "updated_at": "2023-08-19T15:11:11.000000Z",
                "user": {
                    "id": "01h875k9wyqa89jwxfa9w9b3az",
                    "username": "@Ryan",
                    "first_name": "Armstrong",
                    "last_name": "Anjali",
                    "email": "lucas@gmail.com",
                    "user_type": "producer",
                    "profile_picture": "C:\\xampp\\tmp\\php1C4E.tmp",
                    "created_at": "2023-08-19T15:11:11.000000Z",
                    "updated_at": "2023-08-19T15:11:11.000000Z"
                }
            }
        ]
    }
}
```