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

 Provides a personalised greeting and menu: Once logged-in, the solution should welcome the user by
name (via the homepage). The main menu should reflect a user’s status (e.g., should read ‘log-in’ for guests).
To obtain a grade of 60+ (Upper-second), in addition to the above, your work must evidence the following:

 Product information is retrieved from the database: Products should be retrieved from the database
(tbl_products). Your code should iterate through a query to build a suitable list of products, displaying
relevant information (title, image, price) and the options to 'Read more' and ‘Add to Basket’ for each product.
Guests should be directed to ‘log-in’ (redirected to 'login.php') when attempting to add items to their basket.

Functional user registration: The solution should allow users to register their details (refer to provided
schema) using a HTML form. Once validated, a PHP script should be actioned to insert a new record in the
appropriate table. Successful record creation should be verified. The user should then be prompted to log-in

Appropriate form validation: Clear examples should be provided of both client-side (e.g., password length)
and server-side (e.g., unique ‘usernames’) validation techniques for any ‘create’ (insert) database operation.
To obtain a grade of 70+ (Upper-second), in addition to the above, your work must evidence the following:

PHP powered item page: The solution should be modified from that completed in Assignment 1, removing
the 'sessionStorage' HTML5 API in favour of PHP 'GET/POST' variables to access and view information for a
selected product. This should be applied when a user selects to 'Read more' about a selected product. The
PHP should apply the appropriate variable to query the database for the selected product via 'item.php' page.

Product reviews and score calculation: The database (tbl_reviews) should be populated with appropriate
content (two reviews) for at least one product (linked via a product_id). Each review should include a score.
PHP should then be used to query and average review scores, providing users with an overall rating on the
‘item.php’ page. The visualisation of this rating may also be numerical and/or graphical for improved usability.

Allows verified users to post reviews: Once logged-in, users should be presented with additional
functionality to 'post a review' when viewing a product via 'item.php'. Each review should include a title,
description, and rating. Reviews should be inserted appropriately (tbl_reviews) and presented via 'item.php'.
To obtain a grade of 80+ (First), in addition to the above, your work must satisfy the following:

PHP powered cart page: PHP Cookies are used to store and display cart information. Current offers (from
the ‘offers’ table) may be applied to the cart and verified on the server-side. Verified users can checkout,
which adds the order to the database (tbl_orders). Successful record creation should be verified and a
message presented to the user thanking them for their custom. (Important! 'checkout' in this context means
'create an order'. No payment data or gateway is to be used here, and no marks are awarded for this feature).

Secure password storage and verification: Passwords should be stored using 'bcrypt' hashing and salting
(and so not in raw text format). It should not be possible for a hacker to retrieve a password from the database.

 Wider security considerations: Evidence of consideration for a variety of security techniques, which should
include strong password validation, htmlspecialchars(), and prepared statements, all applied as appropriate.

 Represents a professional looking website with no significant usability flaws: Submission must benefit
from evidence of wider reading to address usability and accessibility considerations. Pages are expected (as
a minimum) to address the usability topics covered during the module and should exhibit little to no usability
flaws. For the highest marks, pages must show consideration for contemporary practice, and may work to
add new features, which improve the overall ‘experience’ of using the website (e.g., using a custom 404 page).
