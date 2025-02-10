# MySQL Setup with XAMPP

This guide will help you set up MySQL using XAMPP and create a simple database table containing only `username` and `password` fields.

## Prerequisites
- Install [XAMPP](https://www.apachefriends.org/download.html) on your system.
- Ensure MySQL and Apache services are running in the XAMPP Control Panel.

## Steps to Set Up MySQL Database

### 1. Open phpMyAdmin
1. Start XAMPP Control Panel.
2. Click **Start** for both **Apache** and **MySQL**.
3. Click **Admin** next to MySQL to open phpMyAdmin in your browser.

### 2. Create a Database
1. In phpMyAdmin, go to the **Databases** tab.
2. Enter a database name (e.g., `user_db`) and click **Create**.

### 3. Create a Table
1. Select the `user_db` database from the left panel.
2. Click **New** to create a table.
3. Enter the table name as `users` and set the number of columns to `2`.
4. Define the columns:
   - `username` (VARCHAR, Length: 255, Primary Key, Unique, Not Null)
   - `password` (VARCHAR, Length: 255, Not Null)
5. Click **Save**.
