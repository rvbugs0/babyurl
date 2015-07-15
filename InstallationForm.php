<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
   <script type="text/javascript" src="assets/js/InstallationForm.js"></script>
   
</head>
<body>
<h3>Installation Form</h3>
<form id="installationForm">
    <table>
        <tr>
            <td>Server Name</td>
            <td><span id="serverNameError" class="validationError"><img src="images/errorIcon.png"
                                                                      title="ServerName required."/></span><input type="text" id="serverName" name="serverName"
                                                                                                                maxlength="50"></td>
        </tr>
        <tr>
            <td>Database Name</td>
            <td><span id="databaseNameError" class="validationError"><img src="images/errorIcon.png"
                                                                      title="Database Name required."/></span><input type="text" id="databaseName" name="databaseName"
                                                                                                                maxlength="50"></td>
        </tr>
        <tr>
            <td>Database Username</td>
            <td><span id="usernameError" class="validationError"><img src="images/errorIcon.png" title="Username required."/></span><input type="text" id="username" name="username" maxlength="50"></td>
</tr>
<tr>
            <td>Database Password</td>
            <td><span id="passwordError" class="validationError"><img src="images/errorIcon.png"
                                                                          title="Database Password required."/>
</span><input type="text" id="password" name="password" maxlength="50"></td>        </tr>

</tr>
    
    
        <tr>
            <td colspan="2"><input type="button" id="installButton" value="Install"
                                   onclick="submitInstallationForm()"></td>
        </tr>
    </table>
</form>
<form action="index.php" id="homeForm"></form>
</body>
</html>
