<?php

print('
<html>
<title>'.$title.'</title>
<body>
<table width="650px" align="center" valign="top">
<tr><td colspan="2">
');

displayTopBar();

print('
</td></tr>
<tr><td colspan="2">
<center><h1>'.$title.'</h1></center></td></tr>');

print('<tr><td height="100%">
<table width="150px" align="left" border="2px" height="100%"><tr><td valign="top">
<table width="150px">
  <tr>
    <td><b>My Web Logs</b></td>
  </tr>
  <tr>
    <td>');

listBlogs();

print('
    </td>
  </tr>
</table>
');

// add new side panel items here, using the above "My Web Logs"
// item as a template.

print('
</td></tr></table>
</td><td valign="top" width="100%">
');
?>