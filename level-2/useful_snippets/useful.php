$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn = mysqli_connect('localhost', 'root', '', ‘recipes');

*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

if (!$conn) {
	die("Connection failed: " mysqli_connect_error());
} else {
	echo "Connected successfully !";
}

*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

mysql_... - is deprecated
mysqli_.... - to be used
mysqli_query()- изпълнява заявка
mysqli_fetch_assoc() - итерира резултат (минава през редовете на таблицата един по един)

*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

CREATE 

*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

1/Чрез форма получаваме данни от потребителя и правим запис в БД –с INSERT
добавяме получената информация в БД.

/2/При въвеждане на запис само в едно от много полета на таблицата
за другите трябва да има стойност по подразбиране!  
/например date_deleted/.В противен случай няма да направите запис в БД.

/3/Когато записвате стрингове в БД –променливата, 
в която е записана стойността им трябва да бъдат в кавички –например ‘$unit_name’

*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

$insert_query= “INSERT INTO units (unit_name) VALUES ‘” . $unit_name. “’”;

*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

$result = mysqli_query($conn, $insert_query); // изпращаме заявката към базата данни
//var_dump($result) – каквовръща БД като отговор
if ($result) {
	echo 'You inserted row in DB successfully!';
	//LINK TO READ HERE
} else {
	echo "Try again!";
	//die(“Query failed: " mysqli_connect_error());
}

*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

READ 

*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

/1/ Избираме записи от БД и ги отпечатваме в браузъра – Използваме SELECT query 

Полезна техника -
/a/ Селектираме само  тези записи, които отговарят на условието 
date_deleted IS NULL

/b/ Добавяме бутон/линк
Промяна / Edit
Изтриване / Delete
С тях ще реализираме Update и Delete

$select_query = ‘SELECT * FROM units’;

или със soft delete

$select_query = ‘SELECT * FROM units WHERE date_deleted IS NULL’

************************

$result = mysqli_query($conn, $select_query);

if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){
	var_dump($row);
	//TO BE CONTINUED -print results in a table
	}
}

// $row – съвпада с ред от таблицата и е асоциативен масив.
// Цялата таблицав БД е двумеренмасив–съвкупностотn-брой$row-масиви

Избираме запис от БД и го променяме – с UPDATE query
Избираме го с id –в случая -$row['unit_id']

скриваме в бутона за редакция на записа
'<a href="update.php?id='.$row['unit_id'].'">Edit</a>'

параметър за GET заявка към линка на Edit бутона 
?id=$row['unit_id']
така всеки бутон-линк ще ‘знае’ кой запис да промени
Взимаме id на записа за промяна от $_GET[‘id’]

Промяната извършваме като извикваме със SELECT данните във форма за промяна /форма с попълнени данни, които идват от БД/.
Формата е идентичнас тази в create.php 
//echo "<input type='hidden' name = 'id_city' value=".$row['id_city'].">";
//echo "<input type='text' name='city_name' value='".$row['city_name']."'>";
Проверяваме в браузъра формата и данните–дали са отпечатани коректно name и value навсяко поле!

Извикваме със SELECTданните, които ще променяме. Формата е идентична с тази в create.php
$read_query = ‘SELECT * FROM units WHERE unit_id = ‘ . $_GET[‘unit_id’];
//to fetch rows see read slide

When applying soft delete ...
$read_query = ‘SELECT * FROM units WHERE unit_id = ‘ . $_GET[‘unit_id’] AND date_deleted IS NULL;
//to fetch rows see read slide

$update_query= “UPDATE units SET unit_name= ‘” . $_POST[‘unit_name’] . ‘” WHERE  unit_id= “ . $_POST[‘unit_id’];

Внимавайте с кавичките, които се поставят 
–-Query стринга е винаги в кавички
--Данните тип стринг, текст, дата /във всичките й варианти/ -също се поставят в кавички

$result = mysqli_query($conn, $update_query);
if ($result) {
	echo 'You updated row in DB successfully!';
	//redirect TO READ HERE
	header("Location: read.php");
} else {
	echo "Try again!";
	//use mysqli_error... functions to retrieve the error
	}
}

-----------------------
DELETE
-----------------------

$delete_query = ‘DELETE FROM units WHERE  unit_id = ‘ . $_GET[‘unit_id’]