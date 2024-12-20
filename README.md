# How to Run the Application in XAMPP

## 1. Install XAMPP
- Download and install XAMPP from [https://www.apachefriends.org/](https://www.apachefriends.org/).

## 2. Start Apache and MySQL
- Open the XAMPP Control Panel.
- Start the **Apache** server.
- If the application uses a database, also start **MySQL**.

## 3. Place Application Files in the XAMPP Directory
- Copy the project folder (containing your HTML, CSS, JavaScript, and PHP files) to the `htdocs` directory located in the XAMPP installation folder (e.g., `C:\xampp\htdocs\`).

## 4. Create a Database (if required)
- Open **phpMyAdmin** in your browser by navigating to `http://localhost/phpmyadmin`.
- Create a new database and add any required tables.
- If the project includes a `.sql` file, import it into the database.

## 5. Run the Application
- Open your browser and navigate to `http://localhost/[project_folder_name]/`.
- Replace `[project_folder_name]` with the name of your project folder.
  - Example: `http://localhost/registration_form/`.

## 6. Test the Application
- Fill in the registration form and click the **Submit** button.
- The data will be processed using PHP and displayed in the browser with the required formatting.

## 7. Debugging (if needed)
- Check the **XAMPP Control Panel** for errors.
- View the log files in the `xampp\logs` directory if necessary.
