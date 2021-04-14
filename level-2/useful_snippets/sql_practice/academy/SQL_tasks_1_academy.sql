--  Structured Query Language (SQL)

--  Preparation
--  Start phpMyAdmin and create new database "Academy", using the provided script
--  Connect to the database "Academy". Examine the major tables in the "Academy" database.

-- ### Tasks

-- 1.	Write a SQL query to find all information about all departments (use "Academy" database).
SELECT * FROM `departments` 

-- 2.	Write a SQL query to find all department names.
SELECT Name FROM `departments`

-- 3.	Write a SQL query to find the salary of each employee.
SELECT Salary FROM `employees` -- or SELECT * FROM `employees`

-- 4.	Write a SQL to find the full name of each employee.
SELECT CONCAT(FirstName, ' ', IFNULL(CONCAT(MiddleName, ' '), ''), LastName) as FullName FROM `employees` 

-- 5.	Write a SQL query to find the email addresses of each employee (by his first and last name). Consider that the mail domain is telerik.com. Emails should look like “John.Doe@vsc.com". The produced column should be named "Full Email Addresses".
SELECT CONCAT(FirstName, '.', LastName, '@vsc.com') as `Full Email Addresses` FROM `employees` 

6.	Write a SQL query to find all different employee salaries.
SELECT DISTINCT Salary FROM `employees`

7.	Write a SQL query to find all information about the employees whose job title is “Sales Representative“.
SELECT * FROM `employees` WHERE JobTitle = 'Sales Representative' 

8.	Write a SQL query to find the names of all employees whose first name starts with "SA".
SELECT FirstName, MiddleName, LastName FROM `employees` WHERE LastName like 'SA%'

9.	Write a SQL query to find the names of all employees whose last name contains "ei".
SELECT FirstName, MiddleName, LastName FROM `employees` WHERE LastName like '%ei%'

10.	Write a SQL query to find the salary of all employees whose salary is in the range [20000…30000].
SELECT Salary FROM `employees` WHERE Salary BETWEEN 20000 and 30000

11.	Write a SQL query to find the names of all employees whose salary is 25000, 14000, 12500 or 23600.
SELECT FirstName, MiddleName, LastName FROM `employees` WHERE Salary in (25000, 14000, 12500, 23600)

12.	Write a SQL query to find all employees that do not have manager.
SELECT * FROM `employees` WHERE ManagerID is null 

13.	Write a SQL query to find all employees that have salary more than 50000. Order them in decreasing order by salary.
SELECT * FROM `employees` WHERE Salary > 50000 ORDER BY Salary DESC

14.	Write a SQL query to find the top 5 best paid employees.
SELECT *  FROM `employees` ORDER BY Salary DESC LIMIT 5

15.	Write a SQL query to find all employees and their address.
SELECT * FROM `employees` as e JOIN addresses as a on a.AddressID = e.AddressID

16.	Write a SQL query to find all employees that have manager, along with their manager.
SELECT * FROM employees as e JOIN employees as m on e.ManagerID = m.EmployeeID 

17.	Write a SQL query to find all employees that have manager, along with their manager and their address.
SELECT * FROM employees as e JOIN employees as m on e.ManagerID = m.EmployeeID JOIN addresses as a on a.AddressID = e.AddressID 

18.	Write a SQL query to find all departments and all town names as a single list.
SELECT Name as DepartmentsAndTownsNames FROM towns UNION SELECT Name FROM departments

19.	Write a SQL query to find all the employees and the manager for each of them along with the employees that do not have manager.
SELECT * FROM employees as e LEFT JOIN employees as m on e.ManagerID = m.EmployeeID

20.	Write a SQL query to find the names of all employees from the departments "Sales" and "Finance" whose hire year is between 1995 and 2005.
SELECT CONCAT(e.FirstName, ' ', IFNULL(CONCAT(e.MiddleName, ' '), ''), e.LastName) as FullName, e.EmployeeID, e.DepartmentID, e.HireDate, d.Name 
FROM employees e join departments d on e.DepartmentID = d.DepartmentID 
WHERE (d.Name in ('Sales', 'Finance')) and (year(e.HireDate) BETWEEN 1995 and 2005) 
