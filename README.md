## About Responder
Most of the time we need the same output structure for all REST FULL API responses.

In this package, based on the rules of the link below (jsend), you can send your response in a standard way
https://github.com/omniti-labs/jsend

<table>
<tr><th>Type</td><th>Description</th><th>Required Keys</th><th>Optional Keys</td></tr>
<tr><td>success</td><td>All went well, and (usually) some data was returned.</td><td>status, data</td><td></td></tr>
<tr><td>fail</td><td>There was a problem with the data submitted, or some pre-condition of the API call wasn't satisfied</td><td>status, data</td><td></td></tr>
<tr><td>error</td><td>An error occurred in processing the request, i.e. an exception was thrown</td><td>status, message</td><td>code, data</td></tr>
</table>

### How to use this package ?

### step #1
Install the package with the following command
```
composer require pickmap/response
```
### step #3  
Go to this path in your Laravel project
app/Exceptions/Handler.php
and put this codes
```php
use Pickmap\Responder\Res;
```
```php
public  function  render($request, Throwable  $e)
{
	if ($e  instanceof  ModelNotFoundException)
	{
		return  Res::error('not found',null,404);
	}
	elseif ($e  instanceof  ValidationException)
	{
		return  Res::error($e->getMessage(),null,422);
	}
	
	return  parent::render($request, $e);
}
```

### step #3
now you can use like this
```php
Res::success($objectData);
Res::success($arrayData,201);
Res::error('create faild');
Res::error('new error',419);
Res::fail($data);
Res::response($status,$message,$data,$code);
```

