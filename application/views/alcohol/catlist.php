<script>
    document.getElementById("action").style.display="none";
</script>
<?php
foreach ($catname as $categories){
    ?>
<div class="drinks_title" >
    <?php
    echo $categories->categories;
    ?>
</div>
<div class="drinkcount" ><?php foreach ($countdrinks as $row){echo $row->numrows;}?> darab alkohol található itt.</div>
<div style="clear:both;"></div>
<?php
}
?>
<div class="drinkliststyles">
    <div class="liststyle">
        <table>
            <tr>
                <td> <h4>Rendezés:</h4></td>
                <td>
        <select style="font-family:century gothic;" class="sorttypes" name="sortdata">
            <option value="id">---</option>
            <option value="name">Név szerint</option>
            <option value="price ASC">Ár szerint növekvő</option>
            <option value="price DESC">Ár szerint csökkenő</option>
            <option value="score DESC">Pontszám szerint</option>
        </select>
                </td>
                <td>
        <input type="image" height="21px" src="<?php echo base_url()."img/okbutton.png" ;?>" value="OK" class="sort" />
                </td>
        </tr>
        </table>
    </div>
    <div class="listimgstyle">
        <p>Nézet:</p>
        <div class="listimg1"></div>
        <div class="listimg2"></div>        
    </div>
</div>
<div style="clear:both;"></div>
 <li class="sortdrinksline"></li>
 
 <input type="hidden" id="catid" value="<?php echo $drinklist[0]->categories_id; ?>" />
  <div id="returnedsort">

<?php
$this->load->view('alcohol/drinklist');

?>
  </div>