<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
<?php
        include_once "class.php";
        $mycon = new Database();
        $mycon->connect();
        $mycon->getinfoOne($_GET['cusid']);
    ?>
    <center><h1>แก้ไขข้อมูลหนังสือ</h1></center>
    
    <form action="handle.php" method="post">
    <center><table border="1">
    <tr>
    <th><label >เลขไอดีหนังสือ</label></th>
    <td><input type="text" name="BookID"></td>
    </tr>
    <tr>
    <th><label >ชื่อหนังสือ</label></th>
    <td><input type="text" name="BookName"></td>
    </tr>
    <tr>
    <th><label >ประเภทหนังสือ</label></th>
    <td>
    <select name="TypeID" id="TypeID">
    <option value="001">การ์ตูน</option>
    <option value="002">นิยาย</option>
    <option value="003">นิตยสาร</option>
    </select>
    </td>
    </tr>

    <tr>
    <th><label >สถานะหนังสือ</label></th>
    <td>
    <select name="StatusID" id="StatusID">
    <option value="01">ปกติ</option>
    <option value="02">ชำรุด</option>
    <option value="03">ส่งซ่อม</option>
    </select>
    </td>
    </tr>
    
    <tr>
    <th><label >สำนักพิมพ์</label></th>
    <td><input type="text" name="Publish"></td>
    </tr>

    <tr>
    <th><label >ราคาต่อชิ้น</label></th>
    <td><input type="text" name="UnitPrice"></td>
    </tr>
    <tr>
    <th><label >จำนวนที่มีให้ยืม</label></th>
    <td><input type="text" name="UnitRent"></td>
    </tr>
    <tr>
    <th><label >จำนวนวัน</label></th>
    <td><input type="text" name="DayAmount"></td>
    </tr>
    <tr>
    <th><label >รูปภาพ</label></th>
    <input type="hidden" name="MAX_FILE_SIZE" value="500000">
    <td>เลือกไฟล์รูปที่ต้องการ <input type="file" name="image" id="filename" size="60"></td>
    </tr>
    <tr>
    <!-- <th><label >วันที่</label></th>
    <td><input type="date" name="BookDate"></td>
    </tr> -->
    <tr>
    <td><button type="submit">ส่งข้อมูล</button>
    <button type="reset">reset</button></td>
    </tr>
    </table></center>
    
    </form>

    
</body>
</html>