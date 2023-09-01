# Kulture App API Documentation

Welcome to the documentation for the Kulture App API. This document provides information about the available routes, endpoints, and functionality of the API.

## Table of Contents

- [Authentication](#authentication)
  - [REGISTER](#register)
  - [LOGIN](#login)
- [User](#users)

  - [Fetch user by ID](#fetch-user-by-id)

- [TRENDING](#trending)

  - [Trending Beats](#trending-beats)
  - [Trending Producers](#trending-producers)
  - [Trending Genres](#trending-genres)

- [Beats](#beats)

  - [Fetch Beat by ID](#fetch-beat-by-id)
  - [Upload Beat](#upload-beat)
  - [Fetch All Beats](#fetch-all-beats)

- - [Genres](#genres)
  - [View all Genres](#fetch-all-genres)

## Authentication<a name="authentication"></a>

Before using the API, you need to authenticate. Here are the authentication routes:

### REGISTER<a name="register"></a>

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
  "user_type": "requried|in:producer,artiste",
  "referred_by": "nullable | string"
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

### LOGIN<a name="login"></a>

Endpoint: `POST /api/v1/signin`

Request Body:

```json
{
  "email": "reequired | unique",
  "password": "required| min:8"
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

### USERS<a name="users"></a>

Endpoint: `GET /api/v1/users/:id`<a name="fetch-user-by-id"></a>

Response Body:

```json
{
  "status": true,
  "message": "User retrieved succcessfully",
  "data": {
    "id": "01h91tyhwrpn05h44bs28ay87w",
    "type": "users",
    "attributes": {
      "username": "skay1",
      "first_name": "Nayeli",
      "last_name": "Benjamin",
      "email": "user1@mail.com",
      "profile_picture": "",
      "upload_limit": 10,
      "referral_code": "KULTURE-RXJGN",
      "referred_by": "01h91sx6kqhxt4ydg6xm0m1w6z",
      "no_of_referrals": 0,
      "subscription_plan": "Referral Plan",
      "user_type": "producer",
      "created_at": "2023-08-29T23:44:35.000000Z",
      "updated_at": "2023-08-29T23:44:35.000000Z"
    },
    "referred_by": "01h91sx6kqhxt4ydg6xm0m1w6z",
    "referrals": [
      {
        "referral_code": "KULTURE-QIAFV",
        "created_at": "2023-08-30T01:14:24.000000Z",
        "updated_at": "2023-08-30T01:14:24.000000Z",
        "referred_by": "01h91tyhwrpn05h44bs28ay87w",
        "user_id": "01h92030kt66k3ct1sn0qzzynj"
      }
    ],
    "subscription": {
      "id": "01h91s8cqcktqdsxzkp193bxd7",
      "plan": "Referral Plan",
      "price": 0,
      "upload_limit": 10,
      "subscribers": 1,
      "created_at": "2023-08-29T23:15:00.000000Z",
      "updated_at": "2023-08-30T01:14:24.000000Z"
    }
  }
}
```

### TRENDING<a name="trending"></a>

Endpoint: `GET /api/v1/trending/beats`<a name="trending-beats"></a>

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

Endpoint: `GET /api/v1/trending/producers`<a name="trending-producers"></a>

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

Endpoint: `GET /api/v1/trending/genres`<a name="trending-genres"></a>

Response Body:

```json
{
  "status": true,
  "message": "Trending Genres retrieved successfully",
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": "01h8eft6ewbdjkfpynanngtdyg",
        "attributes": {
          "name": "Afro Drill",
          "total_beats": 11,
          "total_plays": 0,
          "total_downloads": 0,
          "total_uploads": 11
        }
         "beats": [
                    {
                        "id": "01h8ent4d73w9dceqefjgrfdww",
                        "name": "cross-platform",
                        "imageUrl": "http://placeimg.com/640/480",
                        "fileUrl": "https://bria.net",
                        "price": 772,
                        "genre": "Afro Drill",
                        "duration": "00:51",
                        "size": 0,
                        "type": "mp3",
                        "total_sales": 0,
                        "play_count": 0,
                        "view_count": 0,
                        "like_count": 0,
                        "download_count": 0,
                        "created_at": "2023-08-22T13:09:13.000000Z",
                        "updated_at": "2023-08-22T13:09:13.000000Z",
                        "genre_id": "01h8eft6ewbdjkfpynanngtdyg",
                        "user_id": "01h8e8nycg52axpj85ty4jcrr1",
                        "producer_id": "01h8e8nz80gapv1ck2ts0zysr7"
                    },
                    {
                        "id": "01h8entp0dked217hrscx1p54z",
                        "name": "primary",
                        "imageUrl": "http://placeimg.com/640/480",
                        "fileUrl": "https://boyd.net",
                        "price": 535,
                        "genre": "Afro Drill",
                        "duration": "00:51",
                        "size": 0,
                        "type": "mp3",
                        "total_sales": 0,
                        "play_count": 0,
                        "view_count": 0,
                        "like_count": 0,
                        "download_count": 0,
                        "created_at": "2023-08-22T13:09:31.000000Z",
                        "updated_at": "2023-08-22T13:09:31.000000Z",
                        "genre_id": "01h8eft6ewbdjkfpynanngtdyg",
                        "user_id": "01h8e8nycg52axpj85ty4jcrr1",
                        "producer_id": "01h8e8nz80gapv1ck2ts0zysr7"
                    },

         ]
      }
    ]
  }
}
```

### Beats<a name="beats"></a>

Endpoint: `GET /api/v1/beats/:id`<a name="fetch-beat-by-id"></a>

Response Body:

```json
{
  "status": true,
  "message": "Beat retrieved successfully",
  "data": {
    "id": "01h8en156xvr9mdg58km3mteae",
    "attributes": {
      "name": "virtual",
      "price": 567,
      "genre": "Afro Pop",
      "image_url": "http://placeimg.com/640/480",
      "file_url": "https://kailyn.org",
      "duration": "00:51",
      "size": 0,
      "type": "mp3",
      "user_id": "01h8e8nycg52axpj85ty4jcrr1",
      "total_sales": 0,
      "plays": 0,
      "views": 13,
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
}
```

### Beats<a name="beats"></a>

Endpoint: `GET /api/v1/beats`<a name="fetch-all-beats"></a>

Response Body:

```json
{
    {
    "status": true,
    "message": "Beats retrieved successfully",
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": "01h8p58ngca2t1phv5rn6xa2hc",
                "attributes": {
                    "name": "Amapiano ft Afro Trap",
                    "price": 200,
                    "genre": "Afro Pop",
                    "image_url": "https://res.cloudinary.com/dvn1eznus/image/upload/v1692960836/beatsImages/mdhivlpi4t7ugid2agv1.jpg",
                    "file_url": "https://res.cloudinary.com/dvn1eznus/video/upload/v1692960838/beatsAudios/peyyvm8umq2zvedukujl.mp3",
                    "duration": "00:51",
                    "size": 3869410,
                    "type": "audio/mpeg",
                    "user_id": "01h8hyjymbn3dswfge3mhhnq7q",
                    "total_sales": 0,
                    "plays": 0,
                    "views": 1,
                    "likes": 0,
                    "downloads": 0
                },
                "producer": {
                    "id": "01h8hyjymz7t4fhwgqngemyvc6",
                    "user_id": "01h8hyjymbn3dswfge3mhhnq7q",
                    "total_revenue": 0,
                    "total_sales": 0,
                    "total_beats": 1,
                    "profile_views": 0,
                    "total_beats_sold": 0,
                    "created_at": "2023-08-23T19:40:18.000000Z",
                    "updated_at": "2023-08-25T10:53:59.000000Z"
                }
            },
            {
                "id": "01h8eq1aaxvhqwnpfne03qvw01",
                "attributes": {
                    "name": "auxiliary",
                    "price": 388,
                    "genre": "Hip-Hop/Rap",
                    "image_url": "http://placeimg.com/640/480",
                    "file_url": "http://marisol.info",
                    "duration": "00:51",
                    "size": 0,
                    "type": "mp3",
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
            },

        ]
    }
}
}
```

### Beats<a name="beats"></a>

Endpoint: `GET /api/v1/beats`<a name="upload-beat></a>

Request Body:

```json
{
  "name": "required|string",
  "price": "requied| int",
  "genre": "required|string",
  "image": "required|file|mimes:jpeg,png,jpg,gif,svg|max:2048",
  "audio": "required|mimes:mpga,wav,mp3,octet-stream"
}
```

Response Body:

```json
{
  "status": true,
  "message": "Beat uploaded successfully",
  "data": {
    "id": "01h92y5dx2vvptmqcvxq9r85qh",
    "attributes": {
      "name": "cross-platform",
      "price": "1000",
      "genre": "Hip-Hop/Rap",
      "image_url": "https://res.cloudinary.com/dvn1eznus/image/upload/v1693389590/beatsImages/kypeui0luzeyiaskqpgj.jpg",
      "file_url": "https://res.cloudinary.com/dvn1eznus/video/upload/v1693389599/beatsAudios/gc5lu713jhlnwgfkpbjf.mp3",
      "duration": "00:51",
      "size": 4521548,
      "type": "audio/mpeg",
      "user_id": "01h92xyf59081d7f7105q3y98z",
      "total_sales": null,
      "plays": null,
      "views": null,
      "likes": null,
      "downloads": null
    },
    "producer": {
      "id": "01h92xyfzx93s119mgctr4heqg",
      "user_id": "01h92xyf59081d7f7105q3y98z",
      "total_revenue": 0,
      "total_sales": 0,
      "total_beats": 1,
      "profile_views": 0,
      "total_beats_sold": 0,
      "created_at": "2023-08-30T09:56:13.000000Z",
      "updated_at": "2023-08-30T10:00:01.000000Z"
    }
  }
}
```

### Genres<a name="genres"></a>

Endpoint: `GET /api/v1/genre`<a name="fetch-all-genres"></a>

Response Body:

```json
{

    "status": true,
    "message": "Genres retrieved successfully",
    "data": [
        {
            "id": "01h8eft6ewbdjkfpynanngtdyg",
            "attributes": {
                "name": "Afro Drill",
                "total_beats": 11,
                "total_plays": 0,
                "total_downloads": 0,
                "total_uploads": 11
            },
            "beats": [
                {
                    "id": "01h8ent4d73w9dceqefjgrfdww",
                    "name": "cross-platform",
                    "imageUrl": "http://placeimg.com/640/480",
                    "fileUrl": "https://bria.net",
                    "price": 772,
                    "genre": "Afro Drill",
                    "duration": "00:51",
                    "size": 0,
                    "type": "mp3",
                    "total_sales": 0,
                    "play_count": 0,
                    "view_count": 0,
                    "like_count": 0,
                    "download_count": 0,
                    "created_at": "2023-08-22T13:09:13.000000Z",
                    "updated_at": "2023-08-22T13:09:13.000000Z",
                    "genre_id": "01h8eft6ewbdjkfpynanngtdyg",
                    "user_id": "01h8e8nycg52axpj85ty4jcrr1",
                    "producer_id": "01h8e8nz80gapv1ck2ts0zysr7"
                },
            ]

        }
    ]
}

```
