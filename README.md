# laravel-netcup
Netcup API for Laravel
Based on: https://ccp.netcup.net/run/webservice/servers/endpoint.php

Requirements
•  PHP >= 8.1

•  Composer

•  Laravel >= 8.0

Installation
```bash
composer require tda/laravel-netcup
```

## Usage
Inside Laravel:

```php
use Tda\LaravelNetcup\Netcup;
$clientRequestId = 'your_id'; //optional
$client = new Netcup($clientRequestId);
```
originally the keys are read from config in 'services.netcup' as:
```php
('services.netcup.api_key'),
('services.netcup.api_password'),
('services.netcup.customer_number')
```
It is possible to set different location, e.g.:
```php
$netcup->setConfig('apis.netcup'); 
```
            
by standard it uses REST, but it can be changed to use SOAP
```php
$netcup->useSoap();
```

## Features

### Domain
List all domains
```php
$domains = $netcup->listAllDomains(); //it return as Collection
```

Get info from a domain from Netcup
```php
$domain = $netcup->infoDomain('mydomain.com');
```
Search for domain
```php
$domain = $netcup->searchDomain('somedomain.com');
```
Get the Top level domain price
```php
$price = $netcup->priceTopLevelDomain('de');
```

Get Auth code from domain name
```php
$authcode = $netcup->getAuthCodeDomain('somedomain.com');
//or from a domain object
$domain = $netcup->infoDomain('mydomain.com');
$authcode = $netcup->getAuthCodeDomain($domain);
```
Create a domain

(under construction)
```php
$contact = new Tda\LaravelNetcup\Contactentries;
$contact->ownerc = {Id of contact handle}; // obligatory
$contact->adminc = {Id of contact handle}; 
$contact->techc = {Id of contact handle};
$contact->zonec = {Id of contact handle};
$contact->billingc = {Id of contact handle};
$contact->onsitec = {Id of contact handle};
$contact->generalrequest = {Id of contact handle};
$contact->abusecontact = {Id of contact handle};

$domain = $netcup->createDomain('mydomain.com', $contact);
```

Update a domain

(under construction)

Cancel a domain

(under construction)

Transfer a domain

(under construction)

Change owner of a domain

(under construction)


### Handle
List all handles from Netcup
```php
$handles = $netcup->listAllHandle(); //it return as Collection
```

Get Handle info
```php
$handle = $netcup->infoHandle($handle_id);
```

Create Handle
```php
$newHandle = new \Tda\LaravelNetcup\NetcupHandle();
$newHandle->type = 'organisation';
$newHandle->name = 'Your Lame';
$newHandle->organisation = 'Your organisation name';
$newHandle->street = 'Street';
$newHandle->type = 'organisation'; //(person|organisation|role|request)
$newHandle->postalcode = "0000";
$newHandle->city = "City";
$newHandle->countrycode = "DE";
$newHandle->telephone = "telefone number";
$newHandle->email = "your@email.com";
$newHandle->assignedtodomain = true;

$response = $netcup->createHandle($newHandle);
```
  
Update Handle
```php
$handle = $netcup->infoHandle($handle_id);
$hande->email = "new@email.com";
$response = $netcup->updateHandle($handle);
```

Delete Handle
```php
$handle = $netcup->infoHandle($handle_id);
$response = $netcup->deleteHandle($handle);
```

### DNS
#### Zones ####
*accepts only domain registered on Netcup*

Get Zone DNS from a domain
```php
$response = $netcup->infoDnsZone('somedomain.com');
//or from the Domain object
$domain = $netcup->infoDomain('mydomain.com');
$response = $netcup->infoDnsZone($domain);
```
updateDnsZone 

(Under construction)

#### Records ####
*accepts only domain registered on Netcup*

Get DNS Records from a domain
```php
$response = $netcup->infoDnsRecords('yourdomain.com');
//or from the Domain object
$domain = $netcup->infoDomain('mydomain.com'); 
$response = $netcup->infoDnsRecords($domain);  
```
updateDnsRecords 

(Under construction)

### Poll
List all poll
```php
$messageCount = 10; // optional; standard = 50
$response = $netcup->poll($messageCount); 
```
Acknowledge a message
```php
$response = $netcup->ackPoll($poll_id); 
```


        
License
This project is licensed under the MIT License - see the LICENSE file for details.
