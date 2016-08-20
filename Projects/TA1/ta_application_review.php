<!DOCTYPE html>
<html>
    <head>
        <title>
            Application Review
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Review your application</h1>
        <div class="main">
                
            <table>
                <tr>
                    <th>Field</th>
                    <th>Your submission</th>
                </tr>
                <tr>
                    <td class="field">Name</td>
                    <td><?php echo $_POST["lastName"]; 
                    echo ", "; 
                    echo $_POST["firstName"]; ?>
                    </td>
                </tr>
                <tr>
                    <td class="field">Semester/Year</td>
                    <td><?php echo $_POST["semester"]; ?></td>
                </tr>
                <tr>
                    <td class="field">uID</td>
                    <td><?php echo $_POST["uid"]; ?></td>
                </tr>
                <tr>
                    <td class="field">Phone Number (Day)</td>
                    <td><?php echo $_POST["phoneNumber"]; ?></td>
                </tr>
                <tr>
                    <td class="field">Phone Number (Evening)</td>
                    <td><?php echo $_POST["phoneNumberEvening"]; ?></td>
                </tr>
                <tr>
                    <td class="field">Email address</td>
                    <td><?php echo $_POST["email"]; ?></td>
                </tr>
                <tr>
                    <td class="field">Address</td>
                    <td><?php echo $_POST["address"]; ?></td>
                </tr>
                <tr>
                    <td class="field">CS Degree</td>
                    <td><?php echo $_POST["degreebtn"]; ?></td>
                </tr>
            </table>
            
        </div>
    </body>
</html>