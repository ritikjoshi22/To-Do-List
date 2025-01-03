# To-Do List Application

A simple **To-Do List Application** built using **HTML**, **CSS**, and **PHP**. This project demonstrates basic CRUD operations and session management while providing a user-friendly interface to manage daily tasks.

---

## Features

- Add, edit, and delete tasks.
- Mark tasks as completed.
- Save tasks in a **MySQL database** or a text file.
- Clean and responsive UI design.

---

## Skills Learned

- Working with **HTML forms**.
- **CRUD operations** (Create, Read, Update, Delete) with PHP and MySQL.
- Managing sessions in PHP.
- Frontend and backend integration.

---

## Technologies Used

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL (via XAMPP)

---

## Getting Started

Follow these steps to set up and run the project locally:

### 1. Prerequisites

- Install a local server (e.g., [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](https://www.wampserver.com/en/)).
- A text editor or IDE like [Visual Studio Code](https://code.visualstudio.com/).

### 2. Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/todo-list-php.git

2. Move the project folder to your local server directory (e.g., C:/xampp/htdocs/).

3. Database Setup
    1. Start the Apache and MySQL services in XAMPP.
    2. Open phpMyAdmin by visiting http://localhost/phpmyadmin.
    3. Create a database named todo_list.
    4. Import the SQL file:
    5. Navigate to the "Import" tab in phpMyAdmin.
    6. Select the provided todo_list.sql file and click Go.

4. Running the Application
    1. Open a browser and navigate to:
        ```bash
        http://localhost/todo-list-php
    2. Start managing your tasks!

---


### Project Structure

1. index.php: Main file displaying the to-do list and task management features.
2. add_task.php: Handles adding new tasks to the database or text file.
3. edit_task.php: Allows users to edit existing tasks.
4. delete_task.php: Deletes tasks from the database or text file.
5. style.css: Contains all the styles for the UI.
6. todo_list.sql: Database schema for MySQL setup.


### Contributing
Contributions are welcome! Feel free to fork the repository and submit pull requests.