## Advanced SQL

1.	Write a SQL query to find the names and salaries of the employees that take the minimal salary in the company.
SELECT FirstName, Salary FROM `employees` WHERE Salary = (SELECT MIN(Salary) FROM employees) ORDER BY Salary ASC

2.	Write a SQL query to find the names and salaries of the employees that have a salary that is up to 10% higher than the minimal salary for the company.
SELECT FirstName, Salary FROM employees WHERE Salary <= ((SELECT MIN(Salary) FROM employees LIMIT 1)) * 1.1 ORDER BY Salary

3.	Write a SQL query to find the full name, salary and department of the employees that take the minimal salary in their department.
SELECT * from employees e join departments d on e.DepartmentID = d.DepartmentID WHERE e.Salary 
in (SELECT min(Salary) from employees e join departments d on e.DepartmentID = d.DepartmentID GROUP by d.DepartmentID) 

4.	Write a SQL query to find the average salary in the department #1.
SELECT avg(Salary)
FROM `employees` 
WHERE DepartmentID = 1

5.	Write a SQL query to find the average salary  in the "Sales" department.
SELECT AVG(Salary)
FROM employees
WHERE DepartmentID = (SELECT DepartmentID from Departments WHERE name = 'Sales')

6.	Write a SQL query to find the number of employees in the "Sales" department.
SELECT COUNT(*)
FROM employees
WHERE DepartmentID = (SELECT DepartmentID from Departments WHERE name = 'Sales')

7.	Write a SQL query to find the number of all employees that have manager.
SELECT COUNT(*) FROM employees WHERE ManagerID is not null 

8.	Write a SQL query to find the number of all employees that have no manager.
SELECT COUNT(*) FROM employees WHERE ManagerID is null

9.	Write a SQL query to find all departments and the average salary for each of them.
SELECT AVG(e.Salary) as AverageSalary, d.Name as DepartmentName 
FROM `employees` e JOIN departments d on e.DepartmentID = d.DepartmentID GROUP by d.DepartmentID 

10.	Write a SQL query to find the count of all employees in each department and for each town.
SELECT COUNT(*) as EmployeesInDepartment, e.DepartmentID FROM employees as e GROUP BY e.DepartmentID -- count of all employees in each department
 
SELECT COUNT(*) as CountEmployeesFromTown, t.Name FROM employees as e 
JOIN addresses a on e.AddressID = a.AddressID JOIN towns t on a.TownID = t.TownID Group by t.Name -- addresses and towns tables

11.	Write a SQL query to find all managers that have exactly 5 employees. Display their first name and last name.
SELECT count(*) as CountEmployees, m.FirstName, m.LastName
FROM employees as e JOIN employees as m on e.ManagerID = m.EmployeeID where e.ManagerID = m.EmployeeID group by m.EmployeeID HAVING CountEmployees = 5

12.	Write a SQL query to find all employees along with their managers. For employees that do not have manager display the value "(no manager)".
SELECT e.EmployeeID, e.FirstName, e.MiddleName, e.LastName, e.JobTitle, e.DepartmentID, IFNULL(e.ManagerID, "(no manager)") as EmployeeManagerID, '|', m.EmployeeID, IFNULL(m.ManagerID, "(no manager)") as ManagerID , m.FirstName, m.MiddleName, m.LastName, m.JobTitle, m.DepartmentID FROM employees as e 
LEFT JOIN employees as m on e.ManagerID = m.EmployeeID 

13.	Write a SQL query to find the names of all employees whose last name is exactly 5 characters long.
SELECT FirstName, MiddleName, LastName FROM `employees` WHERE `LastName` like '_____' 

14.	Write a SQL query to display the current date and time in the following format "`day.month.year hour:minutes:seconds:milliseconds`".
SELECT DATE_FORMAT(NOW(), "%e.%m.%Y %H:%i:%s.%f") as TimeNow 

15.	Write a SQL query to display the average employee salary by department and job title.
-- by department
SELECT avg(Salary), d.DepartmentID, d.Name from employees e
JOIN departments d on e.DepartmentID = d.DepartmentID
GROUP by DepartmentID 

-- by job title
SELECT avg(Salary), JobTitle, FirstName, MiddleName, LastName from employees
GROUP by JobTitle

16.	Write a SQL query to display the town where maximal number of employees work.
SELECT count(*) as EmployeesFromThisTown, t.TownID as TownID, t.Name as TownName FROM employees as e JOIN addresses a on e.AddressID = a.AddressID JOIN towns t on a.TownID = t.TownID GROUP BY TownID
order by EmployeesFromThisTown DESC LIMIT 1

17.	Write a SQL query to display the number of managers from each town.
SELECT count(*) as ManagersFromThisTown, t.TownID as TownID, t.Name as TownName FROM employees as e 
JOIN employees as m on e.ManagerID = m.EmployeeID
JOIN addresses a on m.AddressID = a.AddressID 
JOIN towns t on a.TownID = t.TownID
GROUP BY TownID

18.	Create a table `Users`. Users should have username, password, full name and last login time.
	*	Choose appropriate data types for the table fields. Define a primary key column with a primary key constraint.
	*	Define the primary key column as auto-increment to facilitate inserting records.
	*	Define unique constraint to avoid repeating usernames.
	*	Define a check constraint to ensure the password is at least 5 characters long.

CREATE TABLE Users (
    Id int not null AUTO_INCREMENT,
    `username` varchar(255) UNIQUE,
    `full_name` varchar(255),
    `password` varchar(255) CHECK (LENGTH(`password`) >= 5),
    `last_login_time` datetime,
    PRIMARY KEY (Id)
);
	
19.	Write SQL statements to insert in the `Users` table the names of all employees from the `Employees` table.
	*	Combine the first and last names as a full name.
	*	For username use the first 3 letters of the first name + the last name (in lowercase).
	*	Use the same for the password.
	*	Use HireDate for last login time.

INSERT INTO Users (username, full_name, password, last_login_time)
VALUES (
    CONCAT(
        SELECT LOWER(SUBSTRING(FirstName, 1, 3)) FROM employees, 
        SELECT LOWER(SUBSTRING(LastName, 1, 3)) FROM employees 
    ),
    CONCAT(
        SELECT FirstName FROM employees,
        ' ',
        SELECT LastName FROM employees 
    ),
    CONCAT(
        SELECT LOWER(SUBSTRING(FirstName, 1, 3)) FROM employees, 
        SELECT LOWER(SUBSTRING(LastName, 1, 3)) FROM employees 
    ),
    (SELECT HireDate FROM employees )
)
	
20.	Write a SQL statement that changes the password to `NULL` for all users that have not been in the system since year 1999.
UPDATE users SET `password` = null WHERE YEAR(last_login_time) <= 1999

21.	Write a SQL statement that deletes all users without passwords (`NULL` password).
DELETE FROM users WHERE `password` is null
