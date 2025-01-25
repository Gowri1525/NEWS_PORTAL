# PHP News Portal

This is a **PHP News Portal** project where users can view, add, edit, and delete news articles. It also features an admin dashboard for managing content and users.

## Features
- **User Registration & Login**: Users can register, log in, and view news articles.
- **News Management**: Admin can add, edit, delete, and view news articles.
- **Category Management**: News articles are categorized for better organization.
- **Commenting System**: Users can comment on articles.
- **Responsive Design**: The portal is responsive and adapts to various screen sizes.

## Technologies Used
- **PHP** for server-side scripting.
- **MySQL** for database management.
- **HTML, CSS, JavaScript** for front-end design.
- **XAMPP** as the local development environment.

## Project Setup

### Prerequisites
To run this project locally, you need:
- **XAMPP** (download from [XAMPP website]
- **Git** (if you want to clone the repository).
- A **web browser** to view the project.

### Steps to Run the Project Locally

1. **Clone the Repository**:
   Clone this repository to your local machine using the following command:
   ```bash
   git clone https://github.com/Gowri1525/NEWS_PORTAL.git
Move the Project to XAMPP's htdocs Folder: Move the cloned project folder to the htdocs directory inside your XAMPP installation directory. For example:

makefile
Copy
Edit
C:\xampp\htdocs\NEWS_PORTAL
Start XAMPP: Open XAMPP Control Panel and start the Apache and MySQL services.

Setup the Database:

Open phpMyAdmin by navigating to http://localhost/phpmyadmin in your browser.
Create a new database called news_portal.
Import the news.sql file found in the project directory:
Click on the news_portal database.
Go to the Import tab.
Select the news.sql file from the project folder and click Go.
Configure Database Connection:

Open the db/connection.php file in a code editor (e.g., VS Code).
Update the database credentials in the following lines:
php
Copy
Edit
$servername = "localhost";
$username = "root";  // Default XAMPP MySQL username
$password = "";  // Default XAMPP MySQL password
$dbname = "news_portal"; // Database name
Access the Project:

Open your browser and navigate to:
arduino
Copy
Edit
http://localhost/NEWS_PORTAL/
Folder Structure
arduino
Copy
Edit
NEWS_PORTAL/
├── AddNews.php
├── addcategory.php
├── admin_login.php
├── category.php
├── category_page.php
├── db/
│   └── connection.php
├── include/
│   ├── footer.php
│   └── header.php
├── images/
│   └── (Various image files)
├── index.php
├── login.php
├── news.php
├── news_delete.php
├── news_edit.php
├── register.php
└── style/
    ├── admin.css
    ├── blog.css
    └── (Various CSS files)
Contributing
Feel free to fork the repository and submit pull requests to contribute to the project. You can improve features, fix bugs, or suggest enhancements.
