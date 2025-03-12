## MySQLi (object-oriented):

- Uses object-oriented programming style with methods and properties
- Works only with MySQL databases
- Cleaner syntax with -> operator
- Better code organization through OOP principles

```php
$mysqli = new mysqli("localhost", "username", "password", "database");
$result = $mysqli->query("SELECT * FROM users");
$row = $result->fetch_assoc();
```

## MySQLi (procedural):

- Uses traditional function calls
- Works only with MySQL databases
- Similar to old mysql\_\* functions
- Simpler to understand for beginners

```php
$conn = mysqli_connect("localhost", "username", "password", "database");
$result = mysqli_query($conn, "SELECT * FROM users");
$row = mysqli_fetch_assoc($result);
```

## PDO (PHP Data Objects):

- Works with 12+ different database types
- Consistently object-oriented
- Better security with prepared statements
- Database driver abstraction layer
- Easier to switch between different databases

```php
$pdo = new PDO("mysql:host=localhost;dbname=database", "username", "password");
$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
```



- Constraints: NOT NULL, UNIQUE, PRIMERY KEY, FOREIGN KEY, CHECK, DEFAULT, CREATE INDEX

- CREATE DATABASE IF NOT EXISTS db_name
- CREATE TABLE table_name (col1, col2,..) VALUES (val1, val2, ...)
- INSERT INTO table_name (col1, col2, ..) VALUES (val1, val2,..)
- DROP TABLE table_name
- ALTER TABLE table_name ADD columan_name datatype
- ALTER TABLE table_name  DROP COLUMN column_name
- ALTER TABLE table_name MODIFY COLUMN col_name datatype
- SELECT * FROM table_name
- SELECT column_name FROM table_name
- SELECT column_name FROM table_name WHERE conditions
- SELECT col_name FROM table_name WHERE conditin ORDER BY col_name ASC|DESC ";
- DELETE FROM table_name WHERE some_column = some_value 
- UPDATE table_name SET col=val WHERE conditions
- SELECT * FROM table_name LIMIT 10 OFFSET 11


- prepare(): $prep = $isConnect->prepare("INSERT INTO table_name (col1, col2) VALUES (?, ?)");
- bind_param(): $prep->bind_param("si", $col1, $col2); : si = srting, integer-> tell the datatype.
- insert_id(): $last_id = $isConnect->insert_id: Get the last entered data id
- multi_query(): $conn->multi_query($sql) === TRUE : multiple rows(data) entered in the table.
- num_rows(): $res->num_rows : To find the number of rows in the $res( $res = $isConnect->query($selectData);)
- fetch_assoc(): ($row = $res->fetch_assoc()): fetch_assoc => fetch a single row from the result, set and return as an associative array where the key is associative array in the table. The function returns each row as an associative array, meaning that each element in the array has a key-value pair, where the key is the column name (e.g., "id", "name") and the value is the data in that column for the current row


    - Make a form using this properties and store the data in the database.  