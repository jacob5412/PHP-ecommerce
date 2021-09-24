# An ecommerce website using PHP
An e-commerce php and mysql website built from scratch to get started with as a starter template.

## Homepage
![GUI](https://github.com/jacobjohn2016/PHP-ecommerce/raw/master/home.png)

## Documentation
* [Report](./Report.pdf)
* [Presentation](./project_presentation.pptx)

## Site functions
* Search for products (using autocomplete)
* Displays an array of popular selling products on the front page
* Contact us form that directly e-mails messages to site admin

### Admin
* Functionality to add and delete products
* Display product statistics and stock.
* Query, display and delete all users that signed up on the website.
* Admin can edit his/her own profile's email address and password.
* Logout of the current session.

### User
* Signing up for a user account
* Change e-mail id and password
* Add items to a cart/basket prior to purchasing
* Generating invoice of all items and printing them in pdf form
* Purchasing items and delivering them to a specific address

## Database Configuration

Host: localhost<br>
User: root<br>
Password: MyNewPass<br>
Name: ecommerce

## Directories
```
.
├── LICENSE.txt
├── README.md
├── admin
│   ├── addp.php
│   ├── addproduct.php
│   ├── allusers.php
│   ├── deletecmd.php
│   ├── deleteproduct.php
│   ├── deleteuser.php
│   ├── editproduct.php
│   ├── editprofile.php
│   ├── includes
│   │   ├── footer.php
│   │   ├── header.php
│   │   ├── loginconfirmation.php
│   │   ├── navconnected.php
│   │   ├── pictures.php
│   │   └── signupconfirmation.php
│   ├── index.php
│   ├── infoproduct.php
│   ├── logout.php
│   ├── products.php
│   ├── productstock.php
│   ├── src
│   │   ├── css
│   │   ├── fonts
│   │   ├── img
│   │   └── js
│   ├── stats.php
│   ├── success.php
│   └── users
├── cart.php
├── category.php
├── checkout.php
├── db.php
├── deletecommand.php
├── deleteorder.php
├── details.php
├── downloadorder.php
├── ecommerce.sql
├── editprofile.php
├── final.php
├── includes
│   ├── footer.php
│   ├── fpdf
│   ├── header.php
│   ├── loginconfirmation.php
│   ├── logout.php
│   ├── nav.php
│   ├── navconnected.php
│   ├── secondfooter.php
│   └── signupconfirmation.php
├── index.php
├── orders.php
├── product.php
├── products
├── productsimg
├── request.php
├── search.php
├── sign.php
├── src
│   ├── css
│   ├── fonts
│   ├── img
│   └── js
└── users

Total: 65 directories, 521 files
```

## Credits
The original project can be found on [SmartShop](https://github.com/smakosh/Smartshop).
