# **Laravel Blog API**

This is a RESTful API built with **Laravel** for managing blog posts and
comments.\
It includes **user authentication**, **email notifications**, **API
documentation with Swagger**, and **basic testing**.

------------------------------------------------------------------------

##  **Features**

-   **User Authentication** using Laravel Sanctum.
-   **CRUD Operations** for:
    -   Blog Posts
    -   Comments (related to posts)
-   **Email Notifications** when a post is created.
-   **Swagger API Documentation**.
-   **Feature & Unit Tests** for main functionalities.

------------------------------------------------------------------------

##  **Requirements**

-   **PHP** \>= 8.1
-   **Composer** \>= 2.x
-   **MySQL** or any supported database
-   **Node.js & NPM** (optional, if using Laravel Mix)
-   **SendGrid** or SMTP credentials for email notifications

------------------------------------------------------------------------

##  **Installation Steps**

1.  **Clone the repository**

    ``` bash
    git clone https://github.com/your-username/laravel-blog-api.git
    cd laravel-blog-api
    ```

2.  **Install dependencies**

    ``` bash
    composer install
    ```

3.  **Environment setup**

    ``` bash
    cp .env.example .env
    php artisan key:generate
    ```

    Update the `.env` file with:

        DB_DATABASE=your_database
        DB_USERNAME=your_username
        DB_PASSWORD=your_password

        # Email Configuration
        MAIL_MAILER=smtp
        MAIL_HOST=smtp.sendgrid.net
        MAIL_PORT=587
        MAIL_USERNAME=apikey
        MAIL_PASSWORD=your_sendgrid_api_key
        MAIL_ENCRYPTION=tls
        MAIL_FROM_ADDRESS=no-reply@example.com
        MAIL_FROM_NAME="Blog API"

4.  **Run migrations**

    ``` bash
    php artisan migrate --seed
    ```

5.  **Install Laravel Sanctum**

    ``` bash
    php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
    php artisan migrate
    ```

6.  **Run the application**

    ``` bash
    php artisan serve
    ```

------------------------------------------------------------------------

##  **Authentication**

-   Register a new user:

        POST /api/register

-   Login:

        POST /api/login

-   Add `Authorization: Bearer {token}` to all protected routes.

------------------------------------------------------------------------

##  **API Endpoints**

  Method   Endpoint                     Description
  -------- ---------------------------- -------------------------
  POST     `/api/register`              Register a new user
  POST     `/api/login`                 Login and get token
  GET      `/api/posts`                 List all posts
  POST     `/api/posts`                 Create a new post
  GET      `/api/posts/{id}`            Get a single post
  PUT      `/api/posts/{id}`            Update a post
  DELETE   `/api/posts/{id}`            Delete a post
  GET      `/api/posts/{id}/comments`   Get comments for a post
  POST     `/api/posts/{id}/comments`   Add comment to a post

------------------------------------------------------------------------

##  **Swagger Documentation**

Generate and access API docs:

``` bash
php artisan l5-swagger:generate
```

Access Swagger UI:

    http://127.0.0.1:8000/api/documentation

------------------------------------------------------------------------

##  **Email Notifications**

-   When a new post is created, an email is sent to the author using
    Laravel's **Mail** system.
-   Configured with SendGrid in `.env`.

------------------------------------------------------------------------

##  **Testing**

Run feature and unit tests:

``` bash
php artisan test
```

------------------------------------------------------------------------
