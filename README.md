
welcome to laravel livewire crud application

Getting Started
To get started with this Laravel application starter, follow these steps:

Prerequisites
Before you begin, make sure you have the following prerequisites installed on your system:

PHP (8 or higher)
Composer
Node.js (14 or higher)
npm (Node Package Manager)
Git
Clone the Repository
First, clone this repository to your local machine using the following command:


git clone https://github.com/lokrajthapa/Laravel-livewire.git


Install Dependencies
Navigate to the project directory:


cd Laravel-livewire
Install PHP dependencies using Composer:


composer install
Install JavaScript dependencies using npm:


npm install
Configure Environment
Copy the .env.example file to .env:


cp .env.example .env
Generate a new application key:


php artisan key:generate
Edit the .env file and configure your database connection and other environment-specific settings.

Run Migrations
Migrate the database to create the necessary tables:



php artisan migrate
Start the Development Server
You can start the Laravel development server using the following command:

also run php artisan db:seed



php artisan serve

To compile Tailwind css  you should run 
npm run dev in another termainal 


Your Laravel application should now be accessible at http://localhost:8000.

login with these credentials
for admin
 email:-admin@admin.com
 password:-adminpassword


 for editor
 email:-editor@editor.com
 password:-editorpassword

 for normal user
 email:-user@user.com
 password:-userpassword





