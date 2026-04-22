Student name/ID: Kyveli Christoforou G21305022
URL to the homepage:https://vesta.uclan.ac.uk/~kchristoforou/assignment2/index.php
dummy account/password: user1 darkMode
GitHub repo URL:https://github.com/Kyveli-C/WebStore-Server


This assignment includes the following:

Server-side operation: Updates all (included) pages to the correct .php containers and provides access to
these via a suitable folder structure on the Vesta server. All files are named correctly and suitably organised.

Connects to a database using PHP:The submission estalishes a ‘mysqli’ database connection using
my 'Vesta' account credentials.

SQL is applied to query information

Video demo: A short video is provided to  capture and explain the
functionality of each page  included, including commentary of any important code .

Suitable presentation of offers: All offers are retrieved from the database (tbl_offers) and are suitably
presented on the homepage. The PHP ‘echo’ statement is applied to display HTML, and link suitable
CSS, to correctly visualise each offer.

Basic login functionality: The solution presents a (new) 'login.php' page which allows a user to enter
an email and password pair to be validated using 'tbl_users'. 

PHP sessions applied appropriately: PHP sessions should be used across pages to control access to
specific content. Controlled content is dependent on whether the user is currently ‘logged-in’ (e.g., reviews).

Provides a personalised greeting and menu: Once logged-in, the solution welcomes the user by
name. 

 Product information is retrieved from the database: Products are retrieved from the database
(tbl_products). The code iterates through a query to build a suitable list of products, displaying
relevant information (title, image, price) and the options to 'Read more' and ‘Add to Basket’ for each product.
Guests are directed to ‘log-in’ (redirected to 'login.php') when attempting to add items to their basket.

Functional user registration: The solution allows users to register their details using a HTML form. 
Once validated, a PHP script is actioned to insert a new record in the
appropriate table.

Appropriate form validation: Clear examples should be provided of both client-side
and server-side validation techniques for any ‘create’ (insert) database operation.

PHP powered item page: PHP 'GET/POST' variables to access and view information for a
selected product. When a user selects to 'Read more' about a selected product, the
PHP applies the appropriate variable to query the database for the selected product via 'item.php' page.

Product reviews and score calculation: The database (tbl_reviews) is populated with appropriate
content (two reviews) for at least one product (linked via a product_id). Each review includes a score.
PHP is used to query and average review scores, providing users with an overall rating on the
‘item.php’ page. The visualisation of this rating is also graphical for improved usability.

Allows verified users to post reviews: Once logged-in, users are presented with additional
functionality to 'post a review' when viewing a product via 'item.php'. Each review includes a title,
description, and rating. Reviews are inserted appropriately (tbl_reviews) and presented via 'item.php'.

PHP powered cart page: PHP Cookies are used to store and display cart information.

Secure password storage and verification: Passwords are stored using 'bcrypt' hashing and salting.

 Wider security considerations: htmlspecialchars().
