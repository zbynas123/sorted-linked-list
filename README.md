# Sorted Linked List

The application will create a sortedLinkedList based on the parameters you send, you can send parameters of int and string type to the input, all parameters must be at the beginning of the array. The application receives the values in the array using the rest api endpoint.

## Requirements
- docker
- docker-compose

## Run application
```
docker-compose up --build -d
docker-compose exec php composer install
```

Now your application is running on localhost on port 8080.
``http://localhost:8080``

## Example
Send an array of values you want to sort and link to the endpoint api/insert/value and the application will return the correct result.

### Request:
```
curl --location --request POST 'http://localhost:8080/api/insert/value' \
--header 'Content-Type: application/json' \
--data-raw '{
    "values": [3, 4, 1, 19, 10, 2, 8]
}'
```

### Response:
```
{
    "list": "1 2 3 4 8 10 19"
}
```

