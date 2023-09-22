# ToucanTechCodingTasks
Repository containing coding tasks and solutions for a technical assessment.

Task 1 Folder includes an executed SQL command and a database schema. Below is a detailed breakdown of the query:
-- Task 1: Retrieve duplicate email addresses for deceased users with default emails
-- This SQL query selects email addresses belonging to users who are deceased
-- and have default email addresses while identifying duplicates.
-- 'isDeceased': 1 means "deceased," 0 means "alive."
-- 'isDefault': 1 means "it is the default," 0 means it is not the default.

Task 2:
Task 2 consists of three basic files: HTML, CSS, JS, and PHP, along with folders for helpers, custom functions to handle JSON responses, log.php for error and information logging, and config.php for managing database connections. The config file references credentials.php to retrieve database credentials (username, password, host, and dynamo). To execute this, include the required credentials and create the database. The schema can be found in the task1 folder.

Task 3:
In Task 3, I implemented logic to check for divisors of 3, 5, and both 3 and 5 for numbers ranging from 1 to 100.

Task 4:
Task 4 involves completing missing comments and describing the function's purpose.

Task 5:
Task 5 is a Laravel project titled "Member Manager." It's a basic demo implementation for managing organization members. To run this project, Composer is required, and migration files must be executed to generate database tables for members, schools, and countries. Please note that the design is basic due to time constraints, as this project serves as a demonstration of the given task.