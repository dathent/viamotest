Viamo Test Extension
=====================

Facts
-----
- version: 1.0.0
- extension key: Viamo_Test
- author: Dmitriy Datsenko
- [extension on GitHub](https://github.com/dathent/viamotest)

Description
-----------
This Extension needed:

 - For adding new or edit manager, you can do it in the admin part of section "Viamo Test"->"Manager" and use standard grid/edit form;
 - For adding new or edit post zone, you can do it in the admin part of section "Viamo Test"->"Postcode" and use standard grid/edit form;
 - For manage relations with postcode and account managers, you can manage relations with post zones and account managers it in the admin part of section "Viamo Test"->"Postcode";
 - can change default manager please go to admin part into "System"->"Configuration"->"Viamo Test"->"Configuration"->"Manager";
 - For change the threshold at which orders get allocated please go into section "System"->"Configuration"->"Viamo Test"->"Configuration"->"Amount".
 
Requirements
------------
- PHP >= 5.2.0
- Mage_Sales

Compatibility
-------------
- Magento >= 1.9

Installation Instructions
-------------------------
1. Install the extension via modman:
- go to magento base path;
- run command "modman init";
- run command "modman clone https://github.com/dathent/viamotest";
2. Clear the cache, logout from the admin panel and then login again.
3. Configure and activate the extension under System->Configuration->Viamo Test->Configuration.


Uninstallation
--------------
1. run command "modman remove viamotest"
2. Clear the cache, logout from the admin panel and then login again.

Support
-------
If you have any issues with this extension, open an issue on [GitHub](https://github.com/dathent/viamotest/issues).

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------

Dmitriy Datsenko
[https://www.linkedin.com/in/dathent/](https://www.linkedin.com/in/dathent/)

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2018 Dmitriy Datsenko
