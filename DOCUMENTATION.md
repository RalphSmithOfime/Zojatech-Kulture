# Kulture App API Documentation

Welcome to the documentation for the Kulture App API. This document provides information about the available routes, endpoints, and functionality of the API.

## Authentication

Before using the API, you need to authenticate. Here are the authentication routes:

### Register

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
