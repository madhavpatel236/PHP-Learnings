- SHOW database: for show the all database which is present in the server.

- CREATE DATABASE database_name: for creating the database.

- USE databse_name: For select/use the database.

- CREATE TABLE table_name(col1, col2, col3): To create the table.
    - Ex: CREATE TABLE employee-details( id INTEGER NOT NULL AUTO INCREAMENT PRIMERY KEY, name VARCHER(30), NOT NULL , age INTEGER NOT NULL );
    
- DESCRIBE table_name: This describes the columns of the table_name with respect to Field, Type, Null, Key, Default, Extra.

- INSERT INTO table_name(col1, col2, col3) VALUES ( col1_val, col2_val, col2_val): Insert the values in the Table.
    - EX: INSERT_INTO employee-details( name, id, age ) VALUES ('Madhav', 1 ,20); // Here we enter the one value.
    - INSERT_INTO employee-details( name, id, age ) VALUES ('Madhav', 1 ,20), ('Parth', 2, 25);
    
- SELECT * FROM database_name: here we get the full table with content.
    - EX: SELECT * FROM employee_details; // '*' means all column
    
- SELECT column_name FROM tabale_name: here we get perticular column from the table
    - EX: SELECT name FROM employee_details: Here we only get the name column of the employee_details table. so for select the perticular column we use this Query.
    - EX: SELECT name,id FROM employee_details: Here we get the name column and id column of the employee_details table.
    
- SELECT * FROM table_name WHERE condition: Here based on the condion we select any perticular row.
    - EX: SELECT * FROM employee_name WHERE id=10; // Here we get the perticular row which has a id=10
    
- UPDATE table_name SET col_name='updated value' WHERE condition // here we update the any perticular value from the table based on the conditions.
    - EX: UPDATE employee_details SET age=30 WHERE name='madhav'; // here we will update the value of the madhav age, so we have a name=’madhav’ as a condition and we chage the age.
    
- ALTER TABLE table_name ADD ( col1, col2, ..) : add the new column to the existing table.
    - ALTER TABLE employee_details ADD salary INTEGER; // Here we add the salary column as a new column in the employee_details table.
    - // With the help of the ALTER command we can change the structure of the table like change the datatype, add the values, add the columns ext.
    - ALTER TABLE table_name DROP COLUMN column_name: Here we can remove the column also.

- DELETE FROM table_name WHERE condition: here we will delete the values based on the condition.
    - DELETE FROM employee_name WHERE name=’Madhav’; // Here the data of the madhav was removed
    - from the DELETE we will delete any particular data ROW based on the some conditions.

- DROP TABLE table_name: This statement deletes the mentioned table.
- RENAME TABLE old_table_name TO new_table_name
- LIMIT: It is used to set the limit of number of records in result set.
    - SELECT * FROM empoyee_details LIMIT 4, 10;
- BETWEEN: It is used to get records from the specified lower limit to upper limit. This verifies if a value lies within that given range.
    - SELECT * FROM employee WHERE age BETWEEN 25 AND 45.

- TODO: JOINS, Left Join , Right Joins