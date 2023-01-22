# Local Alcohol Laws API

An API to perform a query on the Local Alcohol Laws database and return a JSON object

## Install

Simply clone the repository into a PHP-enabled server
```
git clone https://github.com/rbrutherford3/Local-Alcohol-Laws-API.git
```
You will also need to have a `credentials.php` file in the same folder that contains all the connection information and the API token.  It will look like this:
```
<?php

function credentials() {
	$host = 'localalcohollaws.com';
	$database = 'lal';
	$table = 'lal_table';
	$username = 'username';
	$password = 'password';
    $port = '3306';
    $charset = 'utf8';
    $token = '######';
	return array('HOST' => $host, 'DATABASE' => $database, 'TABLE' => $table, 'USERNAME' => $username,
        'PASSWORD' => $password, 'PORT' => $port, 'CHARSET' => $charset, 'TOKEN' => $token);
}

?>
```

## Usage

The API takes the following items in the URL and returns a JSON object with the Local Alcohol Laws database entry, if it exists:

1. Token
2. State
3. Place

A sample URL call may look like:
```
http://localalcohollaws.com/api.php?token=123456&state=Alaska&place=Sitka
```
The result of such a query would be in JSON format, like so:
```
[{"id":2220,"state":"Alaska","county":"Sitka","place":"Sitka","placetype":4,"format":0,"multname":null,"multcounty":null,"population":8881,"offsunallstart":0,"offsunallend":0,"offsunbwstart":0,"offsunbwend":0,"offmonallstart":0,"offmonallend":0,"offmonbwstart":0,"offmonbwend":0,"offtueallstart":0,"offtueallend":0,"offtuebwstart":0,"offtuebwend":0,"offwedallstart":0,"offwedallend":0,"offwedbwstart":0,"offwedbwend":0,"offthuallstart":0,"offthuallend":0,"offthubwstart":0,"offthubwend":0,"offfriallstart":0,"offfriallend":0,"offfribwstart":0,"offfribwend":0,"offsatallstart":0,"offsatallend":0,"offsatbwstart":0,"offsatbwend":0,"onsunallstart":0,"onsunallend":0,"onsunbwstart":0,"onsunbwend":0,"onmonallstart":0,"onmonallend":0,"onmonbwstart":0,"onmonbwend":0,"ontueallstart":0,"ontueallend":0,"ontuebwstart":0,"ontuebwend":0,"onwedallstart":0,"onwedallend":0,"onwedbwstart":0,"onwedbwend":0,"onthuallstart":0,"onthuallend":0,"onthubwstart":0,"onthubwend":0,"onfriallstart":0,"onfriallend":0,"onfribwstart":0,"onfribwend":0,"onsatallstart":0,"onsatallend":0,"onsatbwstart":0,"onsatbwend":0,"offexceptions":"Election Day.<\/b> On the day of any federal, state, or local election, packaged alcoholic beverages may not be sold until after the polls have closed.","onexceptions":"Election Day.<\/b> On the day of any federal, state, or local election, alcoholic beverages may not be served until after the polls have closed.","source":"","sourcelink":"","timezone":"Alaska","notes":""}]
```

## Contributing

Due to the proprietary nature of the database information, contribution on this work is limited to this in close contact with the site administrator James Sinclair and myself.

## License

[MIT © Robert Rutherford](LICENSE)
