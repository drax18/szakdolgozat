<h3>Elfelejtett Jelszó</h3><br />

<div class="forgotpw">
    Az Email-edre fogunk küldeni egy vissza igazoló levelet<br />
    <form action="../actions/sendforgotmail" method="post">
        <table>
            <tr>
                
       
        <td>Felhasználónév: </td>
        <td> <input type="text" name="forgotuser" /></td>
        <td> <input type="image" height="25" src="<?php echo base_url("img/sendbutton.png") ?>" /></td></tr>
        </table>
    </form>
    
</div>
