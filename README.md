# task-manager
Php based Online Task Management Tool by Dhaka Polytechnic Institute Student Ilias Sami

First of all install Xampp or You can host in your Private hsoting. Paste protected.php and project.php in the htdocs. 
After that, create a Database called: Project, User name: Project and Password: Project and Add that a Local or Web Server as your system config.
Go to Protected.php and sign up.
Then login
You will be redirected to the main tool.

Technical Report
Online Task Management System with Sign up and Login Functionality

1. Introduction:
The Online Task Management System is a web-based application that allows users to manage their tasks effectively. It provides features for creating, updating, and deleting tasks, as well as marking tasks as completed. The system also includes a user registration and login system to ensure secure access to the application.

2. Functionality:
The task management system offers the following key functionalities:

2.1 User Registration:
Users can create an account by providing their username, email address, and password. The registration form ensures that the required fields are filled in, and the user's password is securely hashed before storing it in the database.

2.2 User Login:
Registered users can securely log in to the system using their username or email and password. The login process verifies the entered credentials against the stored hashed password in the database. Upon successful login, users are redirected to the task management dashboard.

2.3 Task Creation:
Once logged in, users can create new tasks by entering the task description in the input field and clicking the "Add Task" button. The new task is then stored in the database, associated with the user's account.

2.4 Task Update:
Users can update the status of their tasks by checking the corresponding checkbox next to each task. When a checkbox is checked, an AJAX request is sent to the server to update the task's completion status in the database.

2.5 Task Deletion:
Users can delete tasks by clicking the "Delete" button associated with each task. When the button is clicked, the task is removed from the database, and the task list is refreshed to reflect the updated state.

2.6 Completed Tasks:
The system provides a separate section to display completed tasks. Tasks that are marked as completed are visually differentiated by striking through their description. The completed tasks section also includes a preview of the most recently completed tasks.

3. PHP Functions:
The task management system utilizes various PHP functions to implement its functionalities:

3.1 Session Handling:
The system utilizes PHP session management functions (session_start(), session_destroy()) to create and destroy user sessions. Sessions are used to store user-specific data, such as the user's ID and username, to maintain authentication state across pages.

3.2 Database Connection:
The system establishes a database connection using the mysqli_connect() function. It connects to a MySQL database server using the provided credentials (host, username, password, database name).

3.3 User Registration:
The user registration functionality is implemented using PHP and MySQL. The password entered by the user is securely hashed using the password_hash() function before storing it in the database. The mysqli_query() function is used to execute the SQL INSERT statement for inserting user data into the database.

3.4 User Login:
The user login functionality checks the entered credentials against the stored hashed password in the database. It utilizes the password_verify() function to compare the entered password with the hashed password. Upon successful verification, the user's ID and username are stored in the session for authentication purposes.

3.5 Task Management:
The system manages tasks by storing them in the database associated with the user's account. The task creation, update, and deletion functionalities utilize SQL statements executed with the mysqli_query() function to interact with the database.

4. Database Storing:
The system uses a MySQL database to store user and task data. The database includes the following tables:

4.1 Users Table:
- Columns: id (Primary Key), username, email, password
- Stores user account information, including the unique ID, username, email, and hashed password.

4.2 Tasks Table:
- Columns: id (Primary Key), user_id (Foreign Key), task, completed
- Stores task information associated with each user, including the unique ID,

 user ID (foreign key referencing the Users table), task description, and completion status.

5. User Guide:
The task management system includes a user-friendly interface that provides guidance to users. The user guide section highlights important features and functionality using fancy CSS and animations. It aims to help users navigate and understand the system's capabilities effectively.

In conclusion, the Online Task Management System with Sign up and Login functionality provides users with a comprehensive solution for managing their tasks. The system incorporates secure user registration and login mechanisms, task creation, update, and deletion functionalities, and efficient database storage. The user-friendly design and user guide enhance the overall user experience, making the system intuitive and easy to use.

