# Custom Endpoints

## Simple endpoint to receive data, process it, and send a response

After installing the plugin on your marketplace, the URL of the endpoint will depend on the folder in which you stored the PHP script.

In this repo, the script are found in the `user` folder. So the URL of the custom API in `simple_POST_endpoint.php` will take this format

`https://{{your-marketplace}}.arcadier.io/user/plugins{{plugin-ID}}/simple_POST_endpoint.php`

The name of the file can be anything you choose.

To test this particular endpoint (`simple_POST_endpoint.php`), Postman can be used.

* Method: POST
* URL: `https://{{your-marketplace}}.arcadier.io/user/plugins{{plugin-ID}}/simple_POST_endpoint.php`
* Request Body:
```json
{
    "message": x
}
```
where `x`is an integer.

This endpoint simply receives an integere and multiplies it by 2.

```php
include 'callAPI.php';
	
$contentBodyJson = file_get_contents('php://input');
$content = json_decode($contentBodyJson, true);

echo $content['message']*2;
```

## Endpoint with multiple methods
The second file `simple_general_endpoint.php` does a bit more than simply receiving data. 

The API expects a required parameter `method` in the request body:

```json
{
    "method": 'GET',
    "message": x
}
```

According to the script in `simple_general_endpoint.php`, it expects one of the four methods: `GET`, `POST`, `PUT`, and `delete`.

```php
if($content['method'] == 'GET'){
        //do something with another API
}

if($content['method'] == 'POST'){
    // do something else with another API
}

if($content['method'] == 'PUT'){
    // do something else with another API
}

if($content['method'] == 'delete'){
    // do something else with another API
}
```

## URL of endpoints found in the admin folder
If any of the PHP scripts were found in the admin folder, the URL would be like this instead:

`https://{{your-marketplace}}.arcadier.io/admin/plugins{{plugin-ID}}/simple_POST_endpoint.php`
