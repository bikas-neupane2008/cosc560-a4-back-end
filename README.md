# myblog

# Assignment 3: Laravel Backend API

# GitHub Repository
The Laravel project repository here: <https://github.com/bikas-neupane2008/blog_assignment1/tree/feature/sanctum-api>

# Laravel Blog API

This project is a backend API built with Laravel 11 using Sanctum for authentication. It connects to a MongoDB database and provides API endpoints to retrieve blog posts.

## Requirements

- PHP 8.1 or higher
- Composer
- MongoDB
- XAMPP (macOS) or Laragon (Windows) for local server
- Postman (for API testing)

## Installation

### 1. Clone the repository:
```bash
git clone https://github.com/bikas-neupane2008/blog_assignment1/tree/feature/sanctum-api
```
### 2. Change to project directory:
```bash
cd blog_assignment1
```
### 3. Install Dependencies:
```bash
composer install
```
### 4. Setup Environment Variables:
- Duplicate the `.env.example` file and rename it to `.env`.
- Configure the `.env` file with the database connection details, including MongoDB settings.
```
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=your_db_name
```
### 5. Run the migrations:
```bash
php artisan migrate
```
### 6. Run the Laravel Server:
```bash
php artisan serve
```
## API Endpoints
### Get all Posts:
```bash
GET /api/posts
```
Retrieves a list of all blog posts.
### Get a specific post:
```bash
GET /api/posts/{id}
```
Retrieves details of a specific blog post by its ID.
## Postman Collection
The Postman collection for testing API endpoints can be found in the exported JSON file.

## Challenges and Approach
1. **MongoDB Setup**: Setting up MongoDB for Laravel was a bit challenging but was resolved by using the `mongodb/laravel-mongodb` package, which allows Laravel to interface with MongoDB easily.
2. **API Development**: Implementing the API to fetch posts and users’ email was straightforward, using the `PostController` to handle API requests.

<hr style="width: 5px">

# Assignment 2: Enhanced Blog Application with Authentication for Admin, Author and User Panel
# GitHub Repository URL
<a href="https://github.com/bikas-neupane2008/blog_assignment1/tree/feature/auth-admin-panel" target="_blank">Click here to view the repository</a>

# Overview
This project builds upon the basic blog application created in Assignment 1 by adding several new features, including user authentication, an admin panel, an author panel and an user panel, role-based access control, and MongoDB integration. The goal was to enhance the application’s functionality, security, and user experience.

Project Setup and Environment
I started by ensuring that my development environment was properly set up from Assignment 1. The following tools and frameworks were used in this assignment:
<ul type="circle">
<li>Laravel 11 UI</li>
<li>MongoDB</li>
<li>Bootstrap UI and Dashboard Example</li>
<li>jQuery</li>
<li>npm package @docsearch</li>
</ul>
I created a new branch in GitHub to implement the new features:
<li>
git checkout -b feature/auth-admin-panel
</li>
And then completed the mongoDB Integration. I integrated MongoDB as the database for this project, replacing the previously default MySQL. The configuration involved:
<li>
Installing the mongodb/laravel-mongodb package.</li>
<li>
Configuring the .env file to set MongoDB as the default database connection.</li>
<li>
Updating the config/database.php file to include the MongoDB driver.</li>
<br>

# Laravel UI and Authentication
To implement user authentication, I installed the Laravel UI package and used it to generate authentication scaffolding with Bootstrap:
<li>composer require laravel/ui</li>
<li>php artisan ui bootstrap --auth</li>
<li>npm install && npm run dev</li><br>
This provided the basic authentication features such as login, registration, and password reset, which were styled using Bootstrap and later on changed as per bootstrap dashboard to maintain consistency.<br><br>

# Admin Panel and Role-based Access Control
<b>Middleware Implementation</b><br>
I created two middlewares for role-based access control: <li>AdminMiddleware</li>
<li>AuthorMiddleware</li>
<br>

<b>AdminMiddleware:</b> This middleware restricts access to the admin panel to users with the admin role. Non-admin users attempting to access the admin routes are redirected to the homepage.

<b>AuthorMiddleware:</b> This middleware restricts access to specific author-related routes. Authors can only manage their own posts and have limited access to admin functionalities.

These middlewares were applied to the respective routes in web.php to enforce role-based restrictions:

# Admin, Author and User Panel Design
I used the Bootstrap Dashboard Example as the foundation for the admin, author and user panel layout. This layout includes:

A sidebar navigation menu for quick access to user and post management as per the roles.
A responsive, clean dashboard interface for all types of users.
Additionally, I enhanced the design with custom components and used jQuery for interactive elements within the admin panel to manage the users and posts.

# User Roles and Permissions
I added roles to the users table via a migration and configured the registration process to allow role assignment. The roles (admin, author, user) determine what parts of the application the user can access:

<li><b>Admins:</b> Full access to manage all users and posts.</li>
<li><b>Authors:</b> Access to manage only their own posts.</li>
<li><b>Users:</b> Access to only view all the posts from all users.</li><br>
Role-based access control was enforced throughout the application to ensure that users only have access to the functionalities they are permitted to use.<br>
<br>

# Author Roles and Permissions
Author can register via author registration link. They are allowed to manage their own posts only. They can create, view, edit and delete their own posts only.

# Admin Roles and Permission
Admin can
<ul><li>Manage all the users
<ul><li>Create Users and assign them the role</li>
<li>Edit current existed users details.</li>
<b>Admin can in no any way view the password of the users. They can just update new password as per need.</b>
<li>View the individual users details</li>
<li>Delete the user</li>
<b>But the admin cannot delete themselves. Meaning, there is atleast one admin always present in the database.
Also, if admin deletes any user then the posts related to those users are also deleted.</b>
</li></ul>
<li>Manage posts from the users
<ul><li>Create posts and assign it to either to own, or other admin or author.</li>
<li>Edit current existed posts contents and assign it to either own, or other admin or author as per the need.</li>
<li>View the individual post details</li>
<li>Delete the post</li>
</li></ul></ul><br>


# jQuery and npm @docsearch
To enhance the interactivity of the admin panel, I used jQuery to manage dynamic UI elements, to manage users and assign posts to users.

# Testing
I performed thorough testing to ensure that:

The authentication system works correctly, allowing users to log in and register without issues.
Role-based access control is enforced properly, ensuring that admins, authors, and users have appropriate access.
All CRUD operations for users and posts in the admin panel function as expected.
Non-admin and non-author users cannot access restricted admin and author routes.

# Challenges and Solutions
MongoDB Integration
One of the main challenges was configuring Laravel to work seamlessly with MongoDB. Initially, I faced issues with setting up the MongoDB connection in Laravel. After researching and consulting various resources, I was able to resolve these issues and successfully integrate MongoDB into the project.

# Role-based Access Control
Implementing role-based access control was another challenge, particularly in ensuring that all routes and functionalities were properly restricted based on the user’s role. I carefully tested the application to ensure that access controls were functioning correctly.

# Admin Panel Design
Designing a user-friendly admin panel required integrating various Bootstrap components and ensuring that the layout was responsive. I spent time customizing the Bootstrap Dashboard Example to fit the needs of the application, ensuring that the admin panel was intuitive and visually appealing.

# Author Registration
I implemented the registration for author via the link "/author/register" so that the user can register as the author.

# GitHub Version Control
Throughout the project, I maintained version control by making frequent commits and pushing my code to the GitHub repository. I created multiple meaningful commits, documenting each major change or feature implementation.

# Conclusion
This enhanced blog application includes user authentication, role-based access control, an admin, author and user panel, and MongoDB integration. Through this project, I strengthened my understanding of Laravel, Bootstrap, and MongoDB while learning how to implement more advanced features like middlewares, role management, and also pagination in previous assignment.

By integrating jQuery and npm packages like @docsearch, I added more dynamic and interactive elements to the application, resulting in a better user experience.

The project is successfully completed and pushed to GitHub.
