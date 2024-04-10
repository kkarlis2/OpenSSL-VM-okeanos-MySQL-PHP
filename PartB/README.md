In this task you will use and extend the infrastructure you implemented
in lab exercise 1 (on the same VM). More specifically, you must:
1. Expand the form you created to accept username and password.
2. Implement a backend system in Java, Python. PHP (we recommend using
framework java spring boot, python django, php symfony) which it supports
login features.
3. Upload your implementation to the server
4. Build activity monitoring mechanisms in the login endpoint that
you created.



Create a relational database named GDPR in a database management system
MySQL or MariaDB or PostgreSQL data and users table in the database that stores them
necessary data for the basic operation of the Login Mechanism with fields (columns) name
user (username), user code (password), user description (description) defining them
appropriate commands in SQL query language required not only to create
of the base but also of the table in terms of both defining the data type of the
fields of the table as well as the definition of an appropriate field that will play the role of primary
primary key of records in the table. In case
use a framework there is no need to provide us with the SQL code as
it is generated automatically through the code and through the code we can check
its correctness. You will enter two (2) users in the users table with the appropriate SQL commands,
the first one will have username your registration number and the second one will have username
admin. (15 points)
What are the appropriate solutions for storing the user's password in the database so that
to ensure his privacy in case of illegal extraction of data from the database?
List the SQL or high-level programming language commands
(including the use of framework) required for its correct transformation
password field with a higher level of security. (25 points)
In the programming language of your choice Java, Python, PHP and if you wish with
using some framework (recommended) you will create a simple web application
through which the users you have registered will be able to Login using
appropriate endpoint. Your code must be properly structured so that it does not
an SQL injection attack can be performed. (25 points)
Using the appropriate SQL queries either through a high-level language or through
framework, to design a table named logging in the GDPR database that will record them
successful login attempts with appropriate timestamp field. You should add either
sql procedures or to set up through your application checks for how many times it will
a user is allowed to make a login attempt until you "lock" and show them
appropriate message via alert on the front end. Also, implement checks that will check
when the user's password was last changed and set a time interval which
if it expires you should ask the user to change their password (the password change
as a function you don't need to implement it). Give detailed examples with
screenshots from your implementation for the above. (35 points)
