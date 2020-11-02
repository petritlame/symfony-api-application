# API Documentation Example
This API uses `POST` request to communicate and HTTP [response codes](https://en.wikipedia.org/wiki/List_of_HTTP_status_codes) to indenticate status and errors. All responses come in standard JSON. All requests must include a `content-type` of `application/json` and the body must be valid JSON.

## Response Codes 
### Response Codes
```
200: Success
400: Bad request
401: Unauthorized
404: Cannot be found
405: Method not allowed
422: Unprocessable Entity 
50X: Server Error
```


## Login
**You send:**  Your  login credentials.
**You get:** An `API-Token` with wich you can make further actions.

**Request:**
```json
POST /api/login HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy

{
    "username": "foo",
    "password": "1234567" 
}
```
**Successful Response:**
```json
HTTP/1.1 200 OK
Server: My RESTful API
Content-Type: application/json
Content-Length: xy

{
   "token": "e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855"
}
```
**Failed Response:**
```json
HTTP/1.1 401 Unauthorized
Server: My RESTful API
Content-Type: application/json
Content-Length: xy

{
    "code": 401,
    "message": "Invalid credentials."
}

``` 
## Register 
**You send:**  Your register credentials.
**You get:** An `User Object` with wich you can make further actions.

**Request:**
```json
POST /api/login HTTP/1.1
Accept: application/json
Content-Type: application/json
Content-Length: xy

{
    "email": "foo@gmail.com",
    "password": {
        "first": "password", 
        "second": "password"
    }
}
```
**Successful Response:**
```json
HTTP/1.1 200 OK
Server: My RESTful API
Content-Type: application/json
Content-Length: xy

{
    "email": "titilame9w5@gmail.com",
    "roles": [
        "ROLE_USER"
    ]
}
```
**Failed Response:**
```json
HTTP/1.1 200 Unauthorized
Server: My RESTful API
Content-Type: application/json
Content-Length: xy

{
    "email": [
        "This value is already used."
    ]
}
``` 