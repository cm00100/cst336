
<?php


include '../../dbConnection.php';

$conn = getDatabaseConnection();

function getDeviceTypes() {
    global $conn;
    $sql = "SELECT DISTINCT(deviceType)
            FROM `tc_device` 
            ORDER BY deviceType";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['deviceType'] . "</option>";
        
    }
    
    if(isset($_GET['addUserForm']))
    {
        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        $email = $_GET[''];
        $gender = $_GET[''];
        $role = $_GET[''];
        $deptId = $_GET[''];
        
        $sql = "INSERT INTO tc_user
        (firstName, lastName, email, universityId, gender, phone, role, deptId)
        VALUES
        (:fNAme, :lName, :email, :universityId, :gender, :phone, :role, :deptId)";
        $namedParameters = array();
        $namedParameters[':fName'] = firstName;
        $namedParameters[':lName'] = lastName;
        $namedParameters[':email'] = email;
        $namedParameters[':universityId'] = universityId;
        $namedParameters[':gender'] = gender;
        $namedParameters[':phone'] = phone;
        $namedParameters[':role'] = role;
        $namedParameters[':deptId'] = deptId;
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        
        echo "User has been added successfully!";

    
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Admin Page </title>
    </head>
    <body>
    
        <legend> Add New User </legend>
        
        <form>
            First Name: <input type ="text" name="firstName"/> <br>
            Last Name: <input type ="text" name="lastName"/> <br>
            Email: <input type ="text" name="emailName"/> <br>
            University Id: <input type ="text" name="universityId"/> <br>
            Phone: <input type ="text" name="phone"/> <br>
            Gender: <input type ="radio" name="gender" value ="M" id="genderM"/> <br>
            Role: <input type ="text" name="role"/> <br>
            <select>
                <option></option>
                <option></option>
                <option></option>
                <option></option>
                <option></option>
            </select>
            
            Department: <select name = "deptId">
                <option value=""> Select One </option>
                <?php
                    $departments = getDepartmentsInfo();
                    
                    
                    function getDepartmentsInfo()
                    {
                        
                    }
                ?>
                
            </select>
        </form>
        
       
    </body>
</html>