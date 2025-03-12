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
- $last_id = $isConnect->insert_id: Get the last entered data id
- $conn->multi_query($sql) === TRUE : multiple rows(data) entered in the table.

