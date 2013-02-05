<div class="cart_title">  
<?php
?>
    <a href="<?php echo site_url("mainsite/owncart"); ?>">    
<?php
 echo "Kosár:".br(1);
 ?>
    </a>   
 <?php
 echo '<p>';
 if($this->session->userdata('username')){
     foreach ($cartcount as $count){
     $count->piece;
} 
    if($cart == FALSE){
        echo "üres";

    }else{

        echo  "<p class='list_count'>".$count->piece." Alkohol ".$cartprice." Ft</p>";
    }
  
 }else{
    echo "Lépj be a kosár<br />használatához";
 }
 echo '<p>';
?>
</div>
