<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "shabudbtest";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $image = $conn->real_escape_string($_POST['image']);

    // เพิ่มข้อมูลลงในตาราง foodlist
    $sql = "INSERT INTO foodlist (Name, Image) VALUES ('$name', '$image')";
    $columncountQuery = "SHOW COLUMNS FROM admintable";
    $columncountResult = $conn->query($columncountQuery);
    $columncount = $columncountResult->num_rows;
    $newColumnName = ($columncount - 2);

    if ($conn->query($sql) === TRUE) {
        // ถ้าเพิ่มข้อมูลสำเร็จ ให้เพิ่มคอลัมน์ใหม่ในตาราง admintable
        $alterTableSQL = "ALTER TABLE admintable ADD COLUMN `$newColumnName` INT(6) NULL";

        if ($conn->query($alterTableSQL) === TRUE) {
            $message = "เพิ่มเมนูอาหารสำเร็จและเพิ่มคอลัมน์ใหม่ในตาราง admintable สำเร็จ";
        } else {
            $message = "เพิ่มเมนูอาหารสำเร็จ แต่เกิดข้อผิดพลาดในการเพิ่มคอลัมน์ใหม่: " . $conn->error;
        }
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มเมนูอาหาร</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">เพิ่มเมนูอาหาร</h1>

        <?php if ($message): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo $message; ?></span>
            </div>
        <?php endif; ?>

        <form action="addfood.php" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    ชื่อเมนูอาหาร
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" type="text" placeholder="ชื่อเมนูอาหาร" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    URL รูปภาพ
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="image" name="image" type="url" placeholder="https://example.com/image.jpg" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    เพิ่มเมนู
                </button>
                <a href="adminPage.php" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    กลับไปหน้าแอดมิน
                </a>
            </div>
        </form>
    </div>
</body>

</html>

<?php
$conn->close();
?>