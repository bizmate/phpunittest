# PhpUnitTest  demo

Demo repo to show that phpunit is not respecting configuration and it is not showing deprecations

## Requirements
- docker
- docker-compose
- make (if you dont have make you do not have linux, use linux or Mac)

### Start the application

Run `make up` to start the composer and php commands.

### Run a test to show that deprecations are not shown

Make sure up is indeed up. The next step is going to access the php container to run the phpunit commands

Run 

```
make tests
```

or to run tests manually

```shell
make bash

# now run a test and see the output

I have no name!@6b5c206128f9:/var/www/html$ vendor/bin/phpunit --display-deprecations tests/Transformer/YelpBusinessToBusinessEntityTest.php 
PHPUnit 10.1.3 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.6 with Xdebug 3.2.1
Configuration: /var/www/html/phpunit.xml

D                                                                   1 / 1 (100%)Yelp Business To Business Entity (PhpunitTest\Tests\Transformer\YelpBusinessToBusinessEntity)
 [x] Reviews transform



Time: 00:00.030, Memory: 12.00 MB

Yelp Business To Business Entity (PhpunitTest\Tests\Transformer\YelpBusinessToBusinessEntity)
 ✔ Reviews transform

OK, but there are issues!
Tests: 1, Assertions: 1, Deprecations: 1.

Generating code coverage report in Clover XML format ... done [00:00.003]

Generating code coverage report in HTML format ... done [00:00.015]


Code Coverage Report:     
  2023-05-29 09:23:22     
                          
 Summary:                 
  Classes: 16.67% (1/6)   
  Methods:  3.57% (1/28)  
  Lines:   16.96% (19/112)

Bizmate\PhpunitTest\Transformer\YelpBusinessToBusinessEntity
  Methods: 100.00% ( 1/ 1)   Lines: 100.00% ( 19/ 19)


```

* A deprecation is mentioned above but the actual deprecation message is not shown.!!!!*

Any suggestions what might be causing this as deprecation etc messages should all be visible based on configuration or
command line option.
