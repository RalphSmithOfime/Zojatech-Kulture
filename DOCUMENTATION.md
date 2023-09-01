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


### Favourites<a name="favourites"></a>

Endpoint: `GET /api/v1/favourites/:id/beats`<a name="fetch-favourite-beats"></a>

This endpoint gets a user's favourites
NOTE: The ID here is the user's id (current logged in user)

Response Body:

```json

{
    "message": "favourites displayed successfully",
    "favourites": [
        {
            "id": "01h93pg84cq5pxm7ssfwprg3s3",
            "name": "Hip Hop Hop",
            "genre": "Rock",
            "imageUrl": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693415117/beatsImages/mlvswbuz0dxe6as4fiyi.png",
            "price": 200,
            "fileUrl": "https://res.cloudinary.com/diwh5hq91/video/upload/v1693415123/beatsAudios/ymij42retslc792butow.mp3"
        },
        {
            "id": "01h93pgs32zbs85r1y230nhm2f",
            "name": "Hip Hop Hop",
            "genre": "Rock",
            "imageUrl": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693415133/beatsImages/sdsodjmcatjkyew4tby4.png",
            "price": 200,
            "fileUrl": "https://res.cloudinary.com/diwh5hq91/video/upload/v1693415141/beatsAudios/ibxpr8pawjrz7m1dktuk.mp3"
        }
    ]
}
```

### Favourites<a name="favourites"></a>

Endpoint: `POST /api/v1/favourites/:id`<a name="add-favourite-beat"></a>

This endpoint adds a beat to a user's favourite collection.
NOTE: The ID here is the beat's id.

Response Body:

```json

{
    "message": "beat added to favourites"
}
```

### Favourites<a name="favourites"></a>

Endpoint: `DELETE /api/v1/favourites/:id`<a name="delete-favourite-beat"></a>

This endpoint adds a beat to a user's favourite collection.
NOTE: The ID here is the beat's id.

Response Body:

```json

{
    "message": "Beat removed from favourites."
}
```

### PRODUCERS<a name="producers"></a>

Endpoint: `GET /api/v1/producers`<a name="fetch-all-producers"></a>

Response Body:

```json

{
    "status": true,
    "message": "Producers retrieved successfully",
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": "01h95h01ehethae3nnxj08477v",
                "type": "Producer",
                "data": {
                    "id": "01h95h01e49hd2xwx3f0wpft9n",
                    "username": "Jazlyn",
                    "first_name": "O'Conner",
                    "last_name": "Kaelyn",
                    "email": "sk@gmail.com",
                    "user_type": "producer",
                    "profile_picture": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693476455/profileImages/m3zlg9thl2appacfqesa.jpg",
                    "created_at": "2023-08-31T10:07:35.000000Z",
                    "updated_at": "2023-08-31T10:07:35.000000Z",
                    "referral_code": "KULTURE-YQ1EQ",
                    "referred_by": "",
                    "no_of_referrals": 0,
                    "subscription_plan": "Free Plan",
                    "upload_limit": 9,
                    "subscription_plan_id": "01h93p9sg30q8bfvtrfhdwhms4"
                },
                "attributes": {
                    "total_revenue": 0,
                    "total_sales": 0,
                    "total_beats": 0,
                    "profile_views": 0,
                    "total_beats_sold": 0,
                    "total_downloads": 0,
                    "created_at": "2023-08-31T10:07:35.000000Z"
                },
                "liked_beats": [],
                "uploaded_beats": []
            },
            {
                "id": "01h95gzj51gmqj1r2f82v8qjzm",
                "type": "Producer",
                "data": {
                    "id": "01h95gzj4gbykagar890nypy6n",
                    "username": "Hassan",
                    "first_name": "Satterfield",
                    "last_name": "Kolby",
                    "email": "tega@gmail.com",
                    "user_type": "producer",
                    "profile_picture": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693476439/profileImages/uc1d8rkc6whyrnqjshwi.jpg",
                    "created_at": "2023-08-31T10:07:20.000000Z",
                    "updated_at": "2023-08-31T10:07:20.000000Z",
                    "referral_code": "KULTURE-FVQBT",
                    "referred_by": "",
                    "no_of_referrals": 0,
                    "subscription_plan": "Free Plan",
                    "upload_limit": 9,
                    "subscription_plan_id": "01h93p9sg30q8bfvtrfhdwhms4"
                },
                "attributes": {
                    "total_revenue": 0,
                    "total_sales": 0,
                    "total_beats": 0,
                    "profile_views": 0,
                    "total_beats_sold": 0,
                    "total_downloads": 0,
                    "created_at": "2023-08-31T10:07:20.000000Z"
                },
                "liked_beats": [],
                "uploaded_beats": []
            },
            {
                "id": "01h93pde35txtad379aeydwhxf",
                "type": "Producer",
                "data": {
                    "id": "01h93pde2qzjy8kp4qaj7bqm25",
                    "username": "Darrel",
                    "first_name": "Stanton",
                    "last_name": "Jayda",
                    "email": "ade@gmail.com",
                    "user_type": "producer",
                    "profile_picture": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693415031/profileImages/lku1lchrq8dtb9wodmgf.jpg",
                    "created_at": "2023-08-30T17:03:48.000000Z",
                    "updated_at": "2023-08-30T17:03:48.000000Z",
                    "referral_code": "KULTURE-VTKAT",
                    "referred_by": "",
                    "no_of_referrals": 0,
                    "subscription_plan": "Free Plan",
                    "upload_limit": 9,
                    "subscription_plan_id": "01h93p9sg30q8bfvtrfhdwhms4"
                },
                "attributes": {
                    "total_revenue": 0,
                    "total_sales": 0,
                    "total_beats": 2,
                    "profile_views": 3,
                    "total_beats_sold": 0,
                    "total_downloads": 0,
                    "created_at": "2023-08-30T17:03:48.000000Z"
                },
                "liked_beats": [
                    {
                        "id": "01h93pg84cq5pxm7ssfwprg3s3",
                        "name": "Hip Hop Hop",
                        "imageUrl": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693415117/beatsImages/mlvswbuz0dxe6as4fiyi.png",
                        "fileUrl": "https://res.cloudinary.com/diwh5hq91/video/upload/v1693415123/beatsAudios/ymij42retslc792butow.mp3",
                        "price": 200,
                        "genre": "Rock",
                        "duration": "00:51",
                        "size": 3028199,
                        "type": "audio/mpeg",
                        "total_sales": 0,
                        "play_count": 0,
                        "view_count": 0,
                        "like_count": 1,
                        "download_count": 0,
                        "created_at": "2023-08-30T17:05:21.000000Z",
                        "updated_at": "2023-08-31T09:47:41.000000Z",
                        "genre_id": "01h93p9y2q6mfz7q9tmphvw6rc",
                        "user_id": "01h93pde2qzjy8kp4qaj7bqm25",
                        "producer_id": "01h93pde35txtad379aeydwhxf"
                    },
                    {
                        "id": "01h93pgs32zbs85r1y230nhm2f",
                        "name": "Hip Hop Hop",
                        "imageUrl": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693415133/beatsImages/sdsodjmcatjkyew4tby4.png",
                        "fileUrl": "https://res.cloudinary.com/diwh5hq91/video/upload/v1693415141/beatsAudios/ibxpr8pawjrz7m1dktuk.mp3",
                        "price": 200,
                        "genre": "Rock",
                        "duration": "00:51",
                        "size": 3028199,
                        "type": "audio/mpeg",
                        "total_sales": 0,
                        "play_count": 0,
                        "view_count": 0,
                        "like_count": 2,
                        "download_count": 0,
                        "created_at": "2023-08-30T17:05:38.000000Z",
                        "updated_at": "2023-08-31T09:48:43.000000Z",
                        "genre_id": "01h93p9y2q6mfz7q9tmphvw6rc",
                        "user_id": "01h93pde2qzjy8kp4qaj7bqm25",
                        "producer_id": "01h93pde35txtad379aeydwhxf"
                    }
                ],
                "uploaded_beats": [
                    {
                        "id": "01h93pg84cq5pxm7ssfwprg3s3",
                        "name": "Hip Hop Hop",
                        "imageUrl": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693415117/beatsImages/mlvswbuz0dxe6as4fiyi.png",
                        "fileUrl": "https://res.cloudinary.com/diwh5hq91/video/upload/v1693415123/beatsAudios/ymij42retslc792butow.mp3",
                        "price": 200,
                        "genre": "Rock",
                        "duration": "00:51",
                        "size": 3028199,
                        "type": "audio/mpeg",
                        "total_sales": 0,
                        "play_count": 0,
                        "view_count": 0,
                        "like_count": 1,
                        "download_count": 0,
                        "created_at": "2023-08-30T17:05:21.000000Z",
                        "updated_at": "2023-08-31T09:47:41.000000Z",
                        "genre_id": "01h93p9y2q6mfz7q9tmphvw6rc",
                        "user_id": "01h93pde2qzjy8kp4qaj7bqm25",
                        "producer_id": "01h93pde35txtad379aeydwhxf"
                    },
                    {
                        "id": "01h93pgs32zbs85r1y230nhm2f",
                        "name": "Hip Hop Hop",
                        "imageUrl": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693415133/beatsImages/sdsodjmcatjkyew4tby4.png",
                        "fileUrl": "https://res.cloudinary.com/diwh5hq91/video/upload/v1693415141/beatsAudios/ibxpr8pawjrz7m1dktuk.mp3",
                        "price": 200,
                        "genre": "Rock",
                        "duration": "00:51",
                        "size": 3028199,
                        "type": "audio/mpeg",
                        "total_sales": 0,
                        "play_count": 0,
                        "view_count": 0,
                        "like_count": 2,
                        "download_count": 0,
                        "created_at": "2023-08-30T17:05:38.000000Z",
                        "updated_at": "2023-08-31T09:48:43.000000Z",
                        "genre_id": "01h93p9y2q6mfz7q9tmphvw6rc",
                        "user_id": "01h93pde2qzjy8kp4qaj7bqm25",
                        "producer_id": "01h93pde35txtad379aeydwhxf"
                    }
                ]
            }
        ]
    }
}
```


### PRODUCERS<a name="producers"></a>

Endpoint: `POST /api/v1/producers/:id`<a name="fetch-producer-by-id"></a>

NOTE: The ID here is the user's id (current logged in user)

Response Body:

```json

{
    "status": true,
    "message": "Producer retrieved successfully",
    "data": {
        "data": {
            "id": "01h96bc8hqxk4xvm23fzg7hsna",
            "type": "Producer",
            "data": {
                "id": "01h96bc8h6h2870rmt21esvnzn",
                "username": "Ansley",
                "first_name": "Thompson",
                "last_name": "Anahi",
                "email": "olu@gmail.com",
                "user_type": "producer",
                "profile_picture": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693504122/profileImages/hynqfyjmkfhq3dwamsha.jpg",
                "created_at": "2023-08-31T17:48:39.000000Z",
                "updated_at": "2023-08-31T17:48:39.000000Z"
            },
            "attributes": {
                "total_revenue": 0,
                "total_sales": 0,
                "total_beats": 2,
                "profile_views": 1,
                "total_beats_sold": 0,
                "total_downloads": null,
                "created_at": "2023-08-31T17:48:39.000000Z"
            },
            "beats_liked_by_artistes": [
                {
                    "id": "01h96btn5abm6x013f57vf9nb1",
                    "name": "Hip Hop Hop",
                    "imageUrl": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693504588/beatsImages/qctpkudxm8bpr4pfzrto.png",
                    "fileUrl": "https://res.cloudinary.com/diwh5hq91/video/upload/v1693504594/beatsAudios/phum0itoej7iwxkpb354.mp3",
                    "price": 200,
                    "genre": "Rock",
                    "duration": "00:51",
                    "size": 3028199,
                    "type": "audio/mpeg",
                    "total_sales": 0,
                    "play_count": 0,
                    "view_count": 1,
                    "like_count": 2,
                    "download_count": 0,
                    "created_at": "2023-08-31T17:56:31.000000Z",
                    "updated_at": "2023-08-31T18:59:21.000000Z",
                    "genre_id": "01h96bm9fc4avtp7k4f6b0r3eq",
                    "user_id": "01h96bc8h6h2870rmt21esvnzn",
                    "producer_id": "01h96bc8hqxk4xvm23fzg7hsna"
                }
            ],
            "uploaded_beats": [
                {
                    "id": "01h96bsxj2mb2kmdkaemrax7xn",
                    "name": "Hip Hop Hop",
                    "imageUrl": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693504564/beatsImages/ewzaiqbh1pjer6epg3qn.png",
                    "fileUrl": "https://res.cloudinary.com/diwh5hq91/video/upload/v1693504570/beatsAudios/gbhdoh1lvuqbd9rfzstg.mp3",
                    "price": 200,
                    "genre": "Rock",
                    "duration": "00:51",
                    "size": 3028199,
                    "type": "audio/mpeg",
                    "total_sales": 0,
                    "play_count": 0,
                    "view_count": 0,
                    "like_count": 0,
                    "download_count": 0,
                    "created_at": "2023-08-31T17:56:06.000000Z",
                    "updated_at": "2023-08-31T17:56:06.000000Z",
                    "genre_id": "01h96bm9fc4avtp7k4f6b0r3eq",
                    "user_id": "01h96bc8h6h2870rmt21esvnzn",
                    "producer_id": "01h96bc8hqxk4xvm23fzg7hsna"
                },
                {
                    "id": "01h96btn5abm6x013f57vf9nb1",
                    "name": "Hip Hop Hop",
                    "imageUrl": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693504588/beatsImages/qctpkudxm8bpr4pfzrto.png",
                    "fileUrl": "https://res.cloudinary.com/diwh5hq91/video/upload/v1693504594/beatsAudios/phum0itoej7iwxkpb354.mp3",
                    "price": 200,
                    "genre": "Rock",
                    "duration": "00:51",
                    "size": 3028199,
                    "type": "audio/mpeg",
                    "total_sales": 0,
                    "play_count": 0,
                    "view_count": 1,
                    "like_count": 2,
                    "download_count": 0,
                    "created_at": "2023-08-31T17:56:31.000000Z",
                    "updated_at": "2023-08-31T18:59:21.000000Z",
                    "genre_id": "01h96bm9fc4avtp7k4f6b0r3eq",
                    "user_id": "01h96bc8h6h2870rmt21esvnzn",
                    "producer_id": "01h96bc8hqxk4xvm23fzg7hsna"
                }
            ]
        }
    }
}
```

### ARTISTES<a name="artistes"></a>

Endpoint: `GET /api/v1/artistes`<a name="fetch-all-artistes"></a>

Response Body:

```json

{
    "status": true,
    "message": "Artistes retrieved successfully",
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": "01h96bb7fmxqzsxs7havhnkt3x",
                "type": "Artiste",
                "data": {
                    "id": "01h96bb7f2n7vbqsmacr7r4z32",
                    "username": "Reba",
                    "first_name": "White",
                    "last_name": "Deondre",
                    "email": "ade@gmail.com",
                    "user_type": "artiste",
                    "profile_picture": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693504088/profileImages/xhgnsf59iz1c1yc0wecn.jpg",
                    "created_at": "2023-08-31T17:48:05.000000Z",
                    "updated_at": "2023-08-31T17:48:05.000000Z"
                },
                "attributes": {
                    "total_beats_purchased": 0,
                    "profile_views": 0,
                    "total_amount_spent": 0,
                    "created_at": "2023-08-31T17:48:05.000000Z"
                },
                "purchased_beats": [],
                "favourite_beats": []
            },
            {
                "id": "01h96b5kp2at77hcap12ebv7bn",
                "type": "Artiste",
                "data": {
                    "id": "01h96b5knaekrh58mn5f8ny5jz",
                    "username": "Rocio",
                    "first_name": "Daugherty",
                    "last_name": "Florence",
                    "email": "idan@gmail.com",
                    "user_type": "artiste",
                    "profile_picture": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693503904/profileImages/jlkpgor0rxrrzwelilp7.jpg",
                    "created_at": "2023-08-31T17:45:01.000000Z",
                    "updated_at": "2023-08-31T17:45:01.000000Z"
                },
                "attributes": {
                    "total_beats_purchased": 0,
                    "profile_views": 0,
                    "total_amount_spent": 0,
                    "created_at": "2023-08-31T17:45:01.000000Z"
                },
                "purchased_beats": [],
                "favourite_beats": [
                    {
                        "fileUrl": "https://res.cloudinary.com/diwh5hq91/video/upload/v1693504594/beatsAudios/phum0itoej7iwxkpb354.mp3",
                        "imageUrl": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693504588/beatsImages/qctpkudxm8bpr4pfzrto.png",
                        "genre": "Rock",
                        "name": "Hip Hop Hop",
                        "price": 200,
                        "id": "01h96btn5abm6x013f57vf9nb1",
                        "pivot": {
                            "artiste_id": "01h96b5kp2at77hcap12ebv7bn",
                            "beat_id": "01h96btn5abm6x013f57vf9nb1",
                            "created_at": "2023-08-31T18:59:21.000000Z",
                            "updated_at": "2023-08-31T18:59:21.000000Z"
                        }
                    }
                ]
            }
        ]
    }
}
```

### ARTISTES<a name="artistes"></a>

Endpoint: `GET /api/v1/artistes/:id`<a name="fetch-all-artistes"></a>

NOTE: The ID here is the user's id (current logged in user)

Response Body:

```json

{
    "status": true,
    "message": "Artiste retrieved successfully",
    "data": {
        "id": "01h96b5kp2at77hcap12ebv7bn",
        "type": "Artiste",
        "data": {
            "id": "01h96b5knaekrh58mn5f8ny5jz",
            "username": "Rocio",
            "first_name": "Daugherty",
            "last_name": "Florence",
            "email": "idan@gmail.com",
            "user_type": "artiste",
            "profile_picture": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693503904/profileImages/jlkpgor0rxrrzwelilp7.jpg",
            "created_at": "2023-08-31T17:45:01.000000Z",
            "updated_at": "2023-08-31T17:45:01.000000Z"
        },
        "attributes": {
            "total_beats_purchased": 0,
            "profile_views": 1,
            "total_amount_spent": 0,
            "created_at": "2023-08-31T17:45:01.000000Z"
        },
        "purchased_beats": [],
        "favourite_beats": [
            {
                "fileUrl": "https://res.cloudinary.com/diwh5hq91/video/upload/v1693504594/beatsAudios/phum0itoej7iwxkpb354.mp3",
                "imageUrl": "https://res.cloudinary.com/diwh5hq91/image/upload/v1693504588/beatsImages/qctpkudxm8bpr4pfzrto.png",
                "genre": "Rock",
                "name": "Hip Hop Hop",
                "price": 200,
                "id": "01h96btn5abm6x013f57vf9nb1",
                "pivot": {
                    "artiste_id": "01h96b5kp2at77hcap12ebv7bn",
                    "beat_id": "01h96btn5abm6x013f57vf9nb1",
                    "created_at": "2023-08-31T18:59:21.000000Z",
                    "updated_at": "2023-08-31T18:59:21.000000Z"
                }
            }
        ]
    }
}