<?php

if(isset($success)){
                echo $success;
            }
            else{
                echo "<h2>Regisztráció</h2>";
                br(1);
                echo '<table>';
                        echo form_open('actions/register_validation');
                        echo '<tr>';
                        echo '<td>';
                        echo '<i>'.validation_errors().'</i>';
                        echo '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>';
                        echo br(1)."<b>".'BELÉPÉSI INFORMÁCIÓK'."</b>";
                        echo '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>"."Felhasználónév:* "."</td>"."<td>".form_input('username',$this->input->post('username'),"class='inputs'")."</td>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>"."Jelszó:* "."</td>"."<td>".form_password('password','',"class='inputs'")."</td>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>"."Jelszó újra:* "."</td>"."<td>".form_password('cpassword','',"class='inputs'")."</td>";
                        echo '</tr>';
                        echo '<tr>';
                        echo '<tr>';
                        echo '<td>';
                        echo "<b>".'SZEMÉLYES ADATOK'."</b>";
                        echo '</td>';
                        echo '</tr>';
                        echo "<td>"."Vezetéknév:* "."</td>"."<td>".form_input('surname','',"class='inputs'")."</td>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>"."Keresztnév:* "."</td>"."<td>".form_input('firstname','',"class='inputs'")."</td>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>"."Telefonszám:* "."</td>"."<td>".form_input('phonenumber','',"class='inputs'")."</td>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>"."Email:* "."</td>"."<td>".form_input('email','',"class='inputs'")."</td>";
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>';
                        echo "<b>".'SZÁLLÍTÁSI CÍM'."</b>";
                        echo '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>"."Utca/házszám:* "."</td>"."<td>".form_input('streetaddress','',"class='inputs'")."</td>";
                        echo '</tr>';
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>"."Város:* "."</td>"."<td>".form_input('city','',"class='inputs'")."</td>";
                        echo '</tr>';
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>"."Irányítószám:* "."</td>"."<td>".form_input('zipcode','',"class='inputs'")."</td>";
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>"."Ország:* "."</td>"."<td>".form_input('country','',"class='inputs'")."</td>";
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td>';
                        echo form_checkbox('orderterms',TRUE)." *Elfogadom a szolgáltatási feltételeket. ";?><br /><a style="color:grey;" href="<?php echo base_url()."mainsite/orderterms" ;?>">(Rendelési feltételek)</a>
                        <?php
                        echo '</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>';
                        ?>
                        <input type="image" src="<?php echo base_url()."/img/register_button.png" ;?>" name="send"/>
                        <?php
                        echo '</td>';
                        echo '</tr>';
                        echo form_close();
                        echo '</table>';           
            }
?>