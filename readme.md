Viamo Test Extension
=====================

Facts
-----
- version: 1.0.0
- extension key: Viamo_Test
- author Dmitriy Datsenko
- [extension on GitHub](https://github.com/dathent/viamotest)

Description
-----------
This Extension will add into order the field 'manager' and configure managers and post code zones for prepare manager.
- For adding new or edit manager please go to admin part section "Viamo Test"->"Manager" and use standard grid and edit form.
- For adding new or edit post zone please go to admin part section "Viamo Test"->"Postcode" and use standard grid and edit form.
- you can manage relations with postcode and manager in Postcode Edit Form
- For change default manager please go to admin part into "System"->"Configuration"->"Viamo Test"->"Configuration"->"Manager".
- For change the threshold at which orders get allocated to an account manager please go into section "System"->"Configuration"->"Viamo Test"->"Configuration"->"Amount".

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
- run command 'modman init';
- run command 'modman clone https://github.com/dathent/viamotest';
2. Clear the cache, logout from the admin panel and then login again.
3. Configure and activate the extension under System->Configuration->Viamo Test->Configuration.


Uninstallation
--------------
1. Remove all extension files from your Magento installation
2. Clear the cache, logout from the admin panel and then login again.

Support
-------
If you have any issues with this extension, open an issue on [GitHub](https://github.com/viamo/Viamo_Test/issues).

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------

[https://www.linkedin.com/in/dathent/](https://www.linkedin.com/in/dathent/)

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2018 Dmitry Datsenko
