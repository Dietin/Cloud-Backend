
# API Model-Diet!n-Api Docs


## BASE-URL
https://cloud-computing-w72cmhmh6q-et.a.run.app/api


## API-Documentation
- [Authentication and Authorization](#Authentication-and-Authorization)
    - [Register](#register)
    - [Login](#login)
    - [Logout](#logout)
- [Recipe](#recipe)
    - [Read Recipe](#read-recipe)
    - [Search Recipe](#search-recipe)
    - [Read Recipe by Id](#Read-recipebyid)
    - [Read Recipe by Category](#read-recipe-by-category)
- [Category](#category)
    - [Read Category](#read-category)
- [User](#user)
    - [Update User](#update-user)
    - [Create dataUser](#create-datauser)
    - [Read dataUser](#read-datauser)
- [Food History](#foodhistory)
    - [Create foodHistory](#create-foodhistory)
    - [Read foodHistory by date](#readfood-historybydate)
    - [Read foodHistory Grouped by Date and Time](#read-foodhistorybygrouped)
    - [Delete foodHistory by id](#delete-foodhistorybyid)
    - [Delete all foodHistory](#delete-all-foodhistory)
- [Search History](#search-history)
    - [Read searchHistory](#search-history)
    - [Create searchHistory](#create-search-history)
    - [Delete all searchHistory](#delete-all-search-history)
- [Favorite](#favorite)
    - [Read Favorite](#read-favorite)
    - [Read Favorite recipe](#read-favorite-recipe)
    - [Create Favorite](#create-favorite)
    - [Delete Favorite by Id](#delete-favoritebyid)
    - [Delete all Favorite](#delete-allfavorite)   
- [Weight Calories History](#calorie-history)
    - [Post Weight Calories History](#post-calorie-history)
    - [Read Weight Calories History](#read-calorie-history)


# API Reference

## Authentication and Authorization

### Register
- Endpoint :
    - /register
- Method :
    - POST
- Body :
```json 
{
    "name" : "string, no whistespace, alphanumeric, required",
    "email" : "string, email, required",
    "password" : "string, min:6, required",
}
```
- Response :
```json 
{
    "status": "success",
    "message": "Register Berhasil!",
    "data": {
        "email": "testing@gmail.com",
        "name": "testing",
        "updated_at": "2023-06-12T15:47:40.000000Z",
        "created_at": "2023-06-12T15:47:40.000000Z",
        "id": 21
    }
}
```

### Login
- Endpoint :
    - /login
- Method :
    - POST
- Body :
```json 
{
 "email": "testing@gmail.com",
 "password":"testing"
}
```
- Response :
```json 
{
    "message": "Authenticated",
    "data": {
        "user": {
            "id": 21,
            "name": "testing",
            "email": "testing@gmail.com",
            "email_verified_at": null,
            "created_at": "2023-06-12T15:47:40.000000Z",
            "updated_at": "2023-06-12T15:47:40.000000Z"
        },
        "token_type": "Bearer",
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI4MSIsImp0aSI6Ijk4ZmQ0MzNmYTU5NzY4MDNmNjQ0NTg5NGI5YTdiODg4ZGMyN2ZiOWViODA3NTJmNDU1ZjA5NDA2MTc2ZTRkYzE4MTNhMjBmMjljNTI5NmEyIiwiaWF0IjoxNjg2NTg0OTczLjY2NDUxOSwibmJmIjoxNjg2NTg0OTczLjY2NDUyMSwiZXhwIjoxNzE4MjA3MzczLjY1NDM1LCJzdWIiOiIyMSIsInNjb3BlcyI6W119.NKzwSiI_EMQ3axDPlDZreJ9Und4SVE4s3DDhxPM4L4qRjqt2U-vlhrUdQu18Bp5V6Jh9-6JbcX0UM4iInceo8MDS6kc4sVD9pa1eGbT1XEuXFH8_crBYZs8rMmjNVpVhUbE2TM3CF5NtxiMJ8tGq2qcKrwGNGE5qQqHhdIE20Hm7o1AQCmth0B0-qJIvRf-u-qhvCSD6blaPi_xdKa50AlBE77F2lgwONMSagcbRM2ZEzAzq78PLtZqpoaN2HdlpEgUxkJ-eV9TAfhJxFSVROd2dGXJsNcSGD4dSnMzL7hVErP4PVlKLM_m_BINK29r44ICKT7nh0XDEAEFXKDaUXeFB37HDSyrTlEy6IDs-Rszo3MgrrazIWsRRUqyiHTA3H6mnGZ1d-5RQpcVvWHgaeJojg2YpLt7Y50IJXUPtweyonDUsxxUl1yO_y0f5JUqbl4BCr9yjQQH2Wt_Fhs8glABlf7oz_xClie6MRea0Yi-BIo7v7FwYOM554eNsBOSLVoxwWoVoKclFVAZoO5nes67S38PFjYK-tWxBEm5O5a0fLi7HI0BshMkXFV_Ve3wvCXwLCUHqvCedU5x8JsVvq6Dj-Z47aOzhIcfG0DWLASyHvMxdN5ENC1yJQ-6Nn7WdKXslo2PJw8apRZyAq70Wvl7pENiepRPFFUsDMGeT_U0"
    }
}
```

### Logout
- Endpoint :
    - /logout
- Method :
    - POST
- Response :
```json 
{
    "message": "Logout Success",
    "user": {
        "id": 21,
        "name": "testing",
        "email": "testing@gmail.com",
        "email_verified_at": null,
        "created_at": "2023-06-12T15:47:40.000000Z",
        "updated_at": "2023-06-12T15:47:40.000000Z"
    }
}
```

## Recipe

### Read Recipe
- Endpoint :
    - /recipe
- Method :
    - GET
- Params :
```json 
{
    "page" : "2",
    "size" : "1",
}
```
- Response :
```json 
{
    "message": "Retrieve Recipe Success",
    "data": [
        {
            "id": 4997,
            "name": "Nancyelle's Thin and Crispy Low Carb Pizza",
            "number_servings": 8,
            "calories": 369.39,
            "carbs": 5.21,
            "fats": 27.68,
            "proteins": 23.95,
            "category": {
                "category_id": 11,
                "category_name": "Other",
                "icon": "https://storage.googleapis.com/image-food/icons/icon-11.png",
                "colour_array": "251,95,165"
            },
            "image": "https://storage.googleapis.com/image-food/images/209787_erin_m_2fdad597-4987-4319-b00d-ff28fb784486.png"
        }
    ]
}
```

### Search Recipe
- Endpoint :
    - /recipe/search
- Method :
    - POST
- Params :
```json 
{
    "q" : "peanut",
    "category" : "3",
}
```
- Response :
```json 
{
    "message": "Retrieve Recipes Success",
    "data": [
        {
            "id": 332,
            "name": "Almond Peanut Butter Chip Muffins",
            "number_servings": 12,
            "calories": 137.8,
            "carbs": 11.26,
            "fats": 8.77,
            "proteins": 4.12,
            "category": {
                "category_id": 3,
                "category_name": "Desserts",
                "icon": "https://storage.googleapis.com/image-food/icons/icon-3.png",
                "colour_array": "190,227,247"
            },
            "image": "https://storage.googleapis.com/image-food/images/281092_Trihardist_3301ce46-a122-4093-9d12-7d5e2759e741.png"
        },
    ]
}
```

### Read Recipe by Id
- Endpoint :
    - /recipe/{id}
- Method :
    - GET
- Response :
```json 
{
    "message": "Retrieve Recipe Success",
    "data": {
        "id": 1,
        "name": "Tofu Parmigiana",
        "number_servings": 4,
        "calories": 285.51,
        "carbs": 17.86,
        "fats": 16.33,
        "proteins": 17.49,
        "category": {
            "category_id": 11,
            "category_name": "Other",
            "icon": "https://storage.googleapis.com/image-food/icons/icon-11.png",
            "colour_array": "251,95,165"
        },
        "image": "https://storage.googleapis.com/image-food/images/35000_jennmrqz_1f34ea4c-0c54-4322-a12f-3a9726a51e45.png",
        "recipe_steps": [
            {
                "id": 1,
                "recipe_id": 1,
                "step_no": 1,
                "text": "In a small bowl, combine bread crumbs, 2 tablespoons Parmesan cheese, 1 teaspoon oregano, salt, and black pepper."
            },
            {
                "id": 2,
                "recipe_id": 1,
                "step_no": 2,
                "text": "Slice tofu into 1/4 inch thick slices, and place in bowl of cold water. One at a time, press tofu slices into crumb mixture, turning to coat all sides."
            },
            {
                "id": 3,
                "recipe_id": 1,
                "step_no": 3,
                "text": "Heat oil in a medium skillet over medium heat. Cook tofu slices until crisp on one side. Drizzle with a bit more olive oil, turn, and brown on the other side."
            },
            {
                "id": 4,
                "recipe_id": 1,
                "step_no": 4,
                "text": "Combine tomato sauce, basil, minced garlic, and remaining oregano. Place a thin layer of sauce in an 8 inch square baking pan. Arrange tofu slices in the pan. Spoon remaining sauce over tofu. Top with shredded mozzarella and remaining 3 tablespoons Parmesan."
            },
            {
                "id": 5,
                "recipe_id": 1,
                "step_no": 5,
                "text": "Bake at 400 degrees F (205 degrees C) for 20 minutes."
            }
        ],
        "recipe_ingredients": [
            {
                "id": 1,
                "recipe_id": 1,
                "ingredients_detail_id": 4279,
                "amount": 0.5,
                "recipe_ingredients_detail": {
                    "id": 4279,
                    "name": "Bread crumbs",
                    "recipe_ingredients_weights": [
                        {
                            "id": 1,
                            "recipe_ingredient_id": 4279,
                            "amount": 100,
                            "description": "grams",
                            "grams": 100
                        },
                        {
                            "id": 2,
                            "recipe_ingredient_id": 4279,
                            "amount": 1,
                            "description": "cup",
                            "grams": 120
                        },
                        {
                            "id": 3,
                            "recipe_ingredient_id": 4279,
                            "amount": 1,
                            "description": "oz",
                            "grams": 28.35
                        },
                        {
                            "id": 4,
                            "recipe_ingredient_id": 4279,
                            "amount": 1,
                            "description": "tbsp",
                            "grams": 7.5
                        }
                    ]
                }
            },
            {
                "id": 2,
                "recipe_id": 1,
                "ingredients_detail_id": 32,
                "amount": 5,
                "recipe_ingredients_detail": {
                    "id": 32,
                    "name": "Parmesan cheese",
                    "recipe_ingredients_weights": [
                        {
                            "id": 5,
                            "recipe_ingredient_id": 32,
                            "amount": 1,
                            "description": "cup",
                            "grams": 100
                        },
                        {
                            "id": 6,
                            "recipe_ingredient_id": 32,
                            "amount": 1,
                            "description": "oz",
                            "grams": 28.35
                        },
                        {
                            "id": 7,
                            "recipe_ingredient_id": 32,
                            "amount": 100,
                            "description": "grams",
                            "grams": 100
                        },
                        {
                            "id": 8,
                            "recipe_ingredient_id": 32,
                            "amount": 1,
                            "description": "tbsp",
                            "grams": 5
                        },
                        {
                            "id": 9,
                            "recipe_ingredient_id": 32,
                            "amount": 1,
                            "description": "tsp",
                            "grams": 2.08
                        }
                    ]
                }
            },
            {
                "id": 3,
                "recipe_id": 1,
                "ingredients_detail_id": 202,
                "amount": 2,
                "recipe_ingredients_detail": {
                    "id": 202,
                    "name": "Oregano",
                    "recipe_ingredients_weights": [
                        {
                            "id": 10,
                            "recipe_ingredient_id": 202,
                            "amount": 100,
                            "description": "grams",
                            "grams": 100
                        },
                        {
                            "id": 11,
                            "recipe_ingredient_id": 202,
                            "amount": 1,
                            "description": "tsp, leaves",
                            "grams": 1
                        },
                        {
                            "id": 12,
                            "recipe_ingredient_id": 202,
                            "amount": 1,
                            "description": "tsp, ground",
                            "grams": 1.8
                        },
                        {
                            "id": 13,
                            "recipe_ingredient_id": 202,
                            "amount": 1,
                            "description": "tbsp, leaves",
                            "grams": 3
                        },
                        {
                            "id": 14,
                            "recipe_ingredient_id": 202,
                            "amount": 1,
                            "description": "tbsp, ground",
                            "grams": 6
                        }
                    ]
                }
            },
            {
                "id": 4,
                "recipe_id": 1,
                "ingredients_detail_id": 221,
                "amount": 1,
                "recipe_ingredients_detail": {
                    "id": 221,
                    "name": "Salt",
                    "recipe_ingredients_weights": [
                        {
                            "id": 15,
                            "recipe_ingredient_id": 221,
                            "amount": 100,
                            "description": "grams",
                            "grams": 100
                        },
                        {
                            "id": 16,
                            "recipe_ingredient_id": 221,
                            "amount": 1,
                            "description": "cup",
                            "grams": 292
                        },
                        {
                            "id": 17,
                            "recipe_ingredient_id": 221,
                            "amount": 1,
                            "description": "tbsp",
                            "grams": 18
                        },
                        {
                            "id": 18,
                            "recipe_ingredient_id": 221,
                            "amount": 1,
                            "description": "tsp",
                            "grams": 6
                        },
                        {
                            "id": 19,
                            "recipe_ingredient_id": 221,
                            "amount": 1,
                            "description": "dash",
                            "grams": 0.4
                        }
                    ]
                }
            },
            {
                "id": 5,
                "recipe_id": 1,
                "ingredients_detail_id": 205,
                "amount": 1,
                "recipe_ingredients_detail": {
                    "id": 205,
                    "name": "Pepper",
                    "recipe_ingredients_weights": [
                        {
                            "id": 20,
                            "recipe_ingredient_id": 205,
                            "amount": 100,
                            "description": "grams",
                            "grams": 100
                        },
                        {
                            "id": 21,
                            "recipe_ingredient_id": 205,
                            "amount": 1,
                            "description": "tbsp",
                            "grams": 6.4
                        },
                        {
                            "id": 22,
                            "recipe_ingredient_id": 205,
                            "amount": 1,
                            "description": "tsp",
                            "grams": 2.1
                        },
                        {
                            "id": 23,
                            "recipe_ingredient_id": 205,
                            "amount": 1,
                            "description": "dash",
                            "grams": 0.1
                        },
                        {
                            "id": 24,
                            "recipe_ingredient_id": 205,
                            "amount": 1,
                            "description": "cup",
                            "grams": 102.4
                        }
                    ]
                }
            },
            {
                "id": 6,
                "recipe_id": 1,
                "ingredients_detail_id": 3646,
                "amount": 12,
                "recipe_ingredients_detail": {
                    "id": 3646,
                    "name": "Tofu",
                    "recipe_ingredients_weights": [
                        {
                            "id": 25,
                            "recipe_ingredient_id": 3646,
                            "amount": 100,
                            "description": "grams",
                            "grams": 100
                        },
                        {
                            "id": 26,
                            "recipe_ingredient_id": 3646,
                            "amount": 1,
                            "description": "slice",
                            "grams": 84
                        },
                        {
                            "id": 27,
                            "recipe_ingredient_id": 3646,
                            "amount": 1,
                            "description": "oz",
                            "grams": 28.35
                        },
                        {
                            "id": 28,
                            "recipe_ingredient_id": 3646,
                            "amount": 1,
                            "description": "lb",
                            "grams": 453.6
                        }
                    ]
                }
            },
            {
                "id": 7,
                "recipe_id": 1,
                "ingredients_detail_id": 266,
                "amount": 2,
                "recipe_ingredients_detail": {
                    "id": 266,
                    "name": "Olive oil",
                    "recipe_ingredients_weights": [
                        {
                            "id": 29,
                            "recipe_ingredient_id": 266,
                            "amount": 100,
                            "description": "grams",
                            "grams": 100
                        },
                        {
                            "id": 30,
                            "recipe_ingredient_id": 266,
                            "amount": 1,
                            "description": "tbsp",
                            "grams": 13.5
                        },
                        {
                            "id": 31,
                            "recipe_ingredient_id": 266,
                            "amount": 1,
                            "description": "cup",
                            "grams": 216
                        },
                        {
                            "id": 32,
                            "recipe_ingredient_id": 266,
                            "amount": 1,
                            "description": "tsp",
                            "grams": 4.5
                        }
                    ]
                }
            },
            {
                "id": 8,
                "recipe_id": 1,
                "ingredients_detail_id": 178,
                "amount": 0.5,
                "recipe_ingredients_detail": {
                    "id": 178,
                    "name": "Basil",
                    "recipe_ingredients_weights": [
                        {
                            "id": 33,
                            "recipe_ingredient_id": 178,
                            "amount": 100,
                            "description": "grams",
                            "grams": 100
                        },
                        {
                            "id": 34,
                            "recipe_ingredient_id": 178,
                            "amount": 1,
                            "description": "tsp, leaves",
                            "grams": 0.7
                        },
                        {
                            "id": 35,
                            "recipe_ingredient_id": 178,
                            "amount": 1,
                            "description": "tbsp, leaves",
                            "grams": 2.1
                        },
                        {
                            "id": 36,
                            "recipe_ingredient_id": 178,
                            "amount": 1,
                            "description": "tsp, ground",
                            "grams": 1.4
                        },
                        {
                            "id": 37,
                            "recipe_ingredient_id": 178,
                            "amount": 1,
                            "description": "tbsp, ground",
                            "grams": 4.5
                        }
                    ]
                }
            },
            {
                "id": 9,
                "recipe_id": 1,
                "ingredients_detail_id": 1980,
                "amount": 1,
                "recipe_ingredients_detail": {
                    "id": 1980,
                    "name": "Garlic",
                    "recipe_ingredients_weights": [
                        {
                            "id": 38,
                            "recipe_ingredient_id": 1980,
                            "amount": 100,
                            "description": "grams",
                            "grams": 100
                        },
                        {
                            "id": 39,
                            "recipe_ingredient_id": 1980,
                            "amount": 1,
                            "description": "cup",
                            "grams": 136
                        },
                        {
                            "id": 40,
                            "recipe_ingredient_id": 1980,
                            "amount": 1,
                            "description": "tsp",
                            "grams": 2.8
                        },
                        {
                            "id": 41,
                            "recipe_ingredient_id": 1980,
                            "amount": 1,
                            "description": "clove",
                            "grams": 3
                        },
                        {
                            "id": 42,
                            "recipe_ingredient_id": 1980,
                            "amount": 1,
                            "description": "cloves, minced",
                            "grams": 3
                        },
                        {
                            "id": 43,
                            "recipe_ingredient_id": 1980,
                            "amount": 1,
                            "description": "tbsp",
                            "grams": 8.5
                        }
                    ]
                }
            },
            {
                "id": 10,
                "recipe_id": 1,
                "ingredients_detail_id": 2235,
                "amount": 1,
                "recipe_ingredients_detail": {
                    "id": 2235,
                    "name": "Tomato sauce",
                    "recipe_ingredients_weights": [
                        {
                            "id": 44,
                            "recipe_ingredient_id": 2235,
                            "amount": 100,
                            "description": "grams",
                            "grams": 100
                        },
                        {
                            "id": 45,
                            "recipe_ingredient_id": 2235,
                            "amount": 1,
                            "description": "cup",
                            "grams": 245
                        },
                        {
                            "id": 46,
                            "recipe_ingredient_id": 2235,
                            "amount": 1,
                            "description": "tbsp",
                            "grams": 15.31
                        },
                        {
                            "id": 47,
                            "recipe_ingredient_id": 2235,
                            "amount": 1,
                            "description": "tsp",
                            "grams": 5.1
                        }
                    ]
                }
            },
            {
                "id": 11,
                "recipe_id": 1,
                "ingredients_detail_id": 28,
                "amount": 4,
                "recipe_ingredients_detail": {
                    "id": 28,
                    "name": "Mozzarella cheese",
                    "recipe_ingredients_weights": [
                        {
                            "id": 48,
                            "recipe_ingredient_id": 28,
                            "amount": 100,
                            "description": "grams",
                            "grams": 100
                        },
                        {
                            "id": 49,
                            "recipe_ingredient_id": 28,
                            "amount": 1,
                            "description": "oz",
                            "grams": 28.35
                        },
                        {
                            "id": 50,
                            "recipe_ingredient_id": 28,
                            "amount": 1,
                            "description": "cup, diced",
                            "grams": 132
                        },
                        {
                            "id": 51,
                            "recipe_ingredient_id": 28,
                            "amount": 1,
                            "description": "cup, shredded",
                            "grams": 112
                        }
                    ]
                }
            }
        ]
    }
}
```

### Read Recipe by Category
- Endpoint :
    - /category/getByCategory
- Method :
    - GET
- Response :
```json 
{
    "message": "Retrieve Recipe Success",
    "data": [
        {
            "id": 69,
            "name": "Blueberry, Banana, and Strawberry Smoothie",
            "number_servings": 1,
            "calories": 372.76,
            "carbs": 77.31,
            "fats": 5.26,
            "proteins": 11.05,
            "category": {
                "category_id": 6,
                "category_name": "Protein shakes",
                "icon": "https://storage.googleapis.com/image-food/icons/icon-6.png",
                "colour_array": "25,119,244"
            },
            "image": "https://storage.googleapis.com/image-food/images/933725_monika.kaliton_e8754cd0-4bcc-4ad2-a0a5-cbc6d8173b4c.jpg"
        }
    ]
}
```

## Category

### Read Category
- Endpoint :
    - /category
- Method :
    - GET
- Response :
```json 
{
    "data": [
        {
            "category_id": 1,
            "category_name": "Appetizers",
            "icon": "https://storage.googleapis.com/image-food/icons/icon-1.png",
            "colour_array": "251,171,44"
        },
        {
            "category_id": 2,
            "category_name": "Breakfast",
            "icon": "https://storage.googleapis.com/image-food/icons/icon-2.png",
            "colour_array": "148,187,41"
        }
    ]
}
```

## user

### Update User
- Endpoint :
    - /user
- Method :
    - PUT
- Request :

```json 
{
    "name": "testing",
    "email": "testing@gmail.com"
}
```
- Response :
```json 
{
    "message": "Update User Success",
    "data": {
        "id": 21,
        "name": "testing2",
        "email": "testing2@gmail.com",
        "email_verified_at": null,
        "created_at": "2023-06-12T15:47:40.000000Z",
        "updated_at": "2023-06-12T17:15:44.000000Z"
    }
}
```

### Create dataUser
- Endpoint :
    - /dataUser
- Method :
    - POST
- Request :

```json 
{
        "age": "23",
        "weight": "100",
        "height": "150",
        "gender": "1",
        "activity_level": 1.9,
        "gender": "1",
        "diet_objective": "1",
        "current_weight": "20",
}
```
- Response :
```json 
{
    "message": "Add dataUser Success",
    "data": {
        "age": "23",
        "weight": "100",
        "height": "150",
        "gender": "1",
        "bmi": 44.44444444444444,
        "user_id": 21,
        "diet_objective": "1",
        "current_weight": "20",
        "activity_level": 1.9,
        "bmr": 2036.555,
        "updated_at": "2023-06-12T17:21:33.000000Z",
        "created_at": "2023-06-12T17:21:33.000000Z",
        "dataUser_id": 15
    }
}
```

### Read dataUser
- Endpoint :
    - /dataUser
- Method :
    - GET
- Response :
```json 
{
    "message": "Retrieve all User Success",
    "data": {
        "dataUser_id": 15,
        "age": 23,
        "weight": 100,
        "height": 150,
        "bmr": 2036.56,
        "bmi": 44.4444,
        "activity_level": 1.9,
        "gender": 1,
        "idealCalories": null,
        "user_id": 21,
        "current_weight": 20,
        "diet_objective": 1,
        "created_at": "2023-06-12T17:21:33.000000Z",
        "updated_at": "2023-06-12T17:21:33.000000Z",
        "user": {
            "id": 21,
            "name": "testing2",
            "email": "testing2@gmail.com",
            "email_verified_at": null,
            "created_at": "2023-06-12T15:47:40.000000Z",
            "updated_at": "2023-06-12T17:15:44.000000Z"
        }
    }
}
```

## Food History

## Create foodHistory
- Endpoint :
    - /foodHistory
- Method :
    - POST
- Request :

```json 
{
    "recipe_id": "621",
    "calories": "5422",
    "carbs": "34",
    "fats": "12",
    "proteins": "33",
    "food_time": "4",
    "date": "2023-06-06",
}
```
- Response :
```json 
{
    "message": "Add Food History Success",
    "data": {
        "recipe_id": "621",
        "calories": "5422",
        "carbs": "34",
        "fats": "12",
        "proteins": "33",
        "food_time": "4",
        "date": "2023-06-06",
        "user_id": 21,
        "updated_at": "2023-06-12T17:27:06.000000Z",
        "created_at": "2023-06-12T17:27:06.000000Z",
        "id": 43
    }
}
```

### Read foodHistory by date
- Endpoint :
    - /foodHistory/{date}
- Method :
    - GET
- Response :
```json 
{
    "message": "Retrieve specific food history success",
    "data": [
        {
            "id": 43,
            "user_id": 21,
            "recipe_id": "621",
            "calories": 5422,
            "carbs": 34,
            "fats": 12,
            "proteins": 33,
            "food_time": 4,
            "date": "2023-06-06",
            "created_at": "2023-06-12T17:27:06.000000Z",
            "updated_at": "2023-06-12T17:27:06.000000Z"
        }
    ]
}
```

### Read foodHistory Grouped by Date and Time
- Endpoint :
    - /foodHistoryGroup/{date}
- Method :
    - GET
- Response :
```json 
{
    "message": "Retrieve calories grouped by date and food time success",
    "data": [
        {
            "food_time": 4,
            "total_calories": "10844"
        },
        {
            "food_time": 3,
            "total_calories": "5422"
        },
        {
            "food_time": 2,
            "total_calories": "54"
        },
        {
            "food_time": 1,
            "total_calories": "542"
        }
    ]
}
```

### Delete foodHistory by Id
- Endpoint :
    - /foodHistory/{id}
- Method :
    - DELETE
- Response :
```json 
{
    "message": "Delete Food History Success",
    "data": {
        "id": 2,
        "user_id": 1,
        "recipe_id": "R1",
        "calories": 54,
        "carbs": 34,
        "fats": 12,
        "proteins": 33,
        "food_time": 4,
        "date": "2023-06-06",
        "created_at": "2023-06-07T20:58:43.000000Z",
        "updated_at": "2023-06-07T20:58:43.000000Z"
    }
}
```

### Delete all foodHistory
- Endpoint :
    - /deleteAllFoodHistory
- Method :
    - DELETE
- Response :
```json 
{
    "message": "Delete all Food History Success",
    "data": 5
}
```

## Search History

### Read searchHistory
- Endpoint :
    - /searchHistory
- Method :
    - GET
- Response :
```json 
{
    "message": "Retrieve Search History Success",
    "data": [
        {
            "id": 32,
            "recipe_id": 5,
            "user_id": 21,
            "searched_at": "2023-06-12 17:35:31",
            "created_at": "2023-06-12T17:35:31.000000Z",
            "updated_at": "2023-06-12T17:35:31.000000Z",
            "recipe": {
                "id": 5,
                "name": "Fennel Pork Chops",
                "number_servings": 4,
                "calories": 206.72,
                "carbs": 6.51,
                "fats": 4.46,
                "proteins": 24.46,
                "category": {
                    "category_id": 5,
                    "category_name": "Meats",
                    "icon": "https://storage.googleapis.com/image-food/icons/icon-5.png",
                    "colour_array": "251,230,70"
                },
                "image": "https://storage.googleapis.com/image-food/images/36694_Kaleido91_73929b7b-af8f-4ad4-b084-ca7e4315bc15.png"
            }
        }
    ]
}
```

### Create searchHistory
- Endpoint :
    - /searchHistory
- Method :
    - POST
- Request :
```json 
{
    "recipe_id": "5",
}
```
- Response :
```json 
{
    "message": "Add Search History Success",
    "data": {
        "recipe_id": "5",
        "user_id": 21,
        "searched_at": "2023-06-12 17:35:31",
        "updated_at": "2023-06-12T17:35:31.000000Z",
        "created_at": "2023-06-12T17:35:31.000000Z",
        "id": 32
    }
}
```

### Delete all searchHistory
- Endpoint :
    - /deleteAllSearchHistory
- Method :
    - DELETE
- Response :
```json 
{
    "message": "Delete all Search History Success",
    "data": 0
}
```

## Favorite

### Read Favorite
- Endpoint :
    - /favorite
- Method :
    - GET
- Response :
```json 
{
    "message": "Retrieve Favorite Success",
    "data": [
        {
            "id": 24,
            "recipe_id": 23,
            "user_id": 21,
            "created_at": "2023-06-12T16:26:22.000000Z",
            "updated_at": "2023-06-12T16:26:22.000000Z",
            "recipe": {
                "id": 23,
                "name": "Cream Cheese Jalapeno Hamburgers",
                "number_servings": 8,
                "calories": 616.19,
                "carbs": 25.5,
                "fats": 45.79,
                "proteins": 25.31,
                "category": {
                    "category_id": 8,
                    "category_name": "Sandwiches",
                    "icon": "https://storage.googleapis.com/image-food/icons/icon-8.png",
                    "colour_array": "196,102,232"
                },
                "image": "https://storage.googleapis.com/image-food/images/36606_simmyras_ca95dbbd-01bd-43a7-b684-d9056d13fa63.png"
            }
        }
    ]
}
```

### Read Favorite recipe
- Endpoint :
    - /checkFavorite/{id}
- Method :
    - GET
- Response :
```json 
{
    "message": "Retrieve Favorite Success",
    "data": [
        {
            "id": 24,
            "recipe_id": 23,
            "user_id": 21,
            "created_at": "2023-06-12T16:26:22.000000Z",
            "updated_at": "2023-06-12T16:26:22.000000Z",
            "recipe": {
                "id": 23,
                "name": "Cream Cheese Jalapeno Hamburgers",
                "number_servings": 8,
                "calories": 616.19,
                "carbs": 25.5,
                "fats": 45.79,
                "proteins": 25.31,
                "category": {
                    "category_id": 8,
                    "category_name": "Sandwiches",
                    "icon": "https://storage.googleapis.com/image-food/icons/icon-8.png",
                    "colour_array": "196,102,232"
                },
                "image": "https://storage.googleapis.com/image-food/images/36606_simmyras_ca95dbbd-01bd-43a7-b684-d9056d13fa63.png"
            }
        }
    ]
}
```

### Create Favorite
- Endpoint :
    - /favorite
- Method :
    - POST
- Request :
```json 
{
    "recipe_id": "5",
}
```
- Response :
```json 
{
    "message": "Retrieve Favorite Success",
    "data": {
        "recipe_id": "5",
        "user_id": 21,
        "updated_at": "2023-06-12T18:21:23.000000Z",
        "created_at": "2023-06-12T18:21:23.000000Z",
        "id": 36
    }
}
```

### Delete Favorite by Id
- Endpoint :
    - /favorite/{id}
- Method :
    - DELETE
- Response :
```json 
{
    "message": "Delete Favorite Success",
    "data": {
        "id": 31,
        "recipe_id": 2,
        "user_id": 21,
        "created_at": "2023-06-12T17:47:51.000000Z",
        "updated_at": "2023-06-12T17:47:51.000000Z"
    }
}
```

### Delete all Favorite
- Endpoint :
    - /deleteAllFavorite
- Method :
    - DELETE
- Response :
```json 
{
    "message": "Delete all Favorite Success",
    "data": 6
}
```


## Calorie History

### Post Calorie History
- Endpoint :
    - /weightHistory
- Method :
    - POST
- Response :
```json 
{
    "message": "Input Weight History Success",
    "data": {
        "user_id": 8,
        "dataUser_id": 4,
        "date": "2023-06-15 02:11:30",
        "idealCalories": 4610.15,
        "updated_at": "2023-06-15T02:11:30.000000Z",
        "created_at": "2023-06-15T02:11:30.000000Z",
        "id": 4
    }
}
```

### Read Calorie History
- Endpoint :
    - /weightHistory/{date}
- Method :
    - GET
- Response :
```json 
{
    "message": "Get weight history success",
    "data": {
        "id": 4,
        "user_id": 8,
        "dataUser_id": 4,
        "idealCalories": 4610.15,
        "date": "2023-06-15 02:11:30",
        "created_at": "2023-06-15 02:11:30",
        "updated_at": "2023-06-15 02:11:30"
    }
}
```