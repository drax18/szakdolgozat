<html lang="en">
<head>    
    <meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
    <title>Ital Közért</title>
    <link rel="stylesheet" href="<?php echo base_url("css/style.css");?>"  />
    <link rel="stylesheet" href="<?php echo base_url("css/jquery.toastmessage.css");?>"  />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.0.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.0/jquery-ui.js" /></script>
    <script type="text/javascript" src="<?php echo base_url("js/jquery.cycle.all.js");?>"></script>
    <script type="text/javascript" src="<?php echo base_url("js/jquery.toastmessage.js");?>"></script>  
    <script type="text/javascript" src="<?php echo base_url("js/sitescripts.js");?>"></script>
    <script type="text/javascript">
         $(document).ready(function() {
             var site = "http://localhost/szakdoga_igniter/";
            <!-- Slide hírdetés -->
            $('.slider').cycle({ 
		fx: 'fade',
                delay: 1000,
                pause:1,
                pager:  '#pager',
		slideExpr: 'img',
                pagerAnchorBuilder: function(idx, el) {
                return '<a href="#" ></a>';
                 }
                });
          
             <!-- Kedvenchez adás -->   
            $('.favoradd').live('click',function(e){

               e.preventDefault();
               var href =  $(this).data('linkname');
               var link = site + "actions/favadd/" + href;
               $.ajax({
                   type: "POST",
                   url: link,
                   success: function(){
                   $('.favrerf').load(location.href + ' .alreadyfav');
                    
                   }
               });
            });
            <!-- feladás -->
            $('.send').click(function(){
            
                $().delay(2000).toastmessage('showToast', {
                            position : 'middle-center',
                            text     : 'Sikeresen feladtad a megrendelést!',
                            sticky   : false,
                            type     : 'notice',
                            stayTime : 3000

                        });
            
            });
            <!-- kereső -->
            $('.searchsend').click(function(){
            var href2 =  $('.searchvalue').val();
            var link2 = site + "mainsite/searchresult/" + href2;
            
            $.ajax({
                type: "POST",
                url: link2,

                success: function(){

                }
            });
            
            });
            
            <!-- favor elvétel -->
            $('.favorremove').live('click',function(e){
            e.preventDefault();
            var href3 = $(this).data('favid');
            var link3 = site + "actions/removefav/" + href3;
            $.ajax({
                type: "POST",
                url: link3,
                success: function(){
                    $('.favorites').load(location.href + ' .allremovefav');
                }
            });
            
            
            });
            <!-- Rendezés -->
               $('.sort').click(function(e){
                    e.preventDefault();       
                    var href4 = $('#catid').val();
                    var link4 = site + "alcohol/catdrinksrefresh/" + href4;
                    $.ajax({
                        type: "POST",
                        url: link4,
                        data: $('.sorttypes').serialize(),
                        success:function(data){
                            $('#returnedsort').empty();
                            $('#returnedsort').html(data);
                            $('.listimg1').css("opacity","0.40");
                            $('.listimg2').css("opacity","1");
                        }
                    });
               });
               <!-- score frissítés -->
               $('.scoresend').live('click',function(e){
                   e.preventDefault();
                   var href5 = $('.commentsend').data('drinkid');
                   var href51 = $('.scorevalue').val();
                   var link5 = site + "actions/scoreupdate/" + href5 + "/" + href51;            
                   $.ajax({
                       type: "POST",
                       url: link5,
                       success:function(){
                          $().toastmessage('showToast', {
                            position : 'middle-center',
                            text     : 'Sikeresen frissítetted !',
                            sticky   : false,
                            type     : 'notice',
                            stayTime : 3000

                        });
                        $('#refreshscore').load(location.href + ' .fulldscore');
                         
                       }
                       
                   });
                   
                   
               });    
              
               
               <!-- Lista ikonok -->
               $('.listimg1').css("opacity","0.40");
               
               $('.listimg1').click(function(e){
                  e.preventDefault();
                  $(this).css("opacity","1");
                  $('.listimg2').css("opacity","0.40");
                  $('.listed2').css("display","none");
                  $('.listed1').css("display","block");
                  
               });
                $('.listimg2').click(function(e){
                  e.preventDefault();
                  $(this).css("opacity","1");
                  $('.listimg1').css("opacity","0.40");
                  $('.listed1').css("display","none");
                  $('.listed2').css("display","block");
                  
               });
              
              
               <!-- cartnál az ikonok kattra mit csináljanak -->
               
               $('.firststep').click(function(e){
                  e.preventDefault();
                  $(this).css("opacity","1");
                  $('.secondstep').css("opacity","0.40");
                  $('.thirdstep').css("opacity","0.40");
                  $('.owndata').css("display","none");
                  $('.shippingdata').css("display","none");
                  $('.owncartdata').css("display","block");
                  
               });
               
               $('.secondstep').click(function(e){
                  e.preventDefault();
                  $(this).css("opacity","1");
                  $('.firststep').css("opacity","0.40");
                  $('.thirdstep').css("opacity","0.40");
                  $('.owncartdata').css("display","none");
                  $('.shippingdata').css("display","none");
                  $('.owndata').css("display","block");
                  
               });
               
               $('.thirdstep').click(function(e){
                  e.preventDefault();
                  $(this).css("opacity","1");
                  $('.secondstep').css("opacity","0.40");
                  $('.firststep').css("opacity","0.40");
                  $('.owndata').css("display","none");
                  $('.owncartdata').css("display","none");
                  $('.shippingdata').css("display","block");
                  
               });

               <!-- Komment küldés -->
               $('.commentsend').click(function(e){
                   e.preventDefault();
                   var href6 = $(this).data('drinkid');
                   var link6 = site + "actions/writeComm/" + href6;
                   var comment = $('.commentarea').val();
                   if(comment != "" ){
                       $.ajax({
                        type: "POST",
                        data: $('.commentarea').serialize(),
                        url: link6,
                        success: function(){
                            $('.comments').load(location.href + ' .membercomments');
                            $('.commentarea').val("");
                        }
                       });
                   }
                   else{
                   $().toastmessage('showToast', {
                    position : 'middle-center',
                    text     : 'Nem hagyhatod üresen a mezőt !',
                    sticky   : false,
                    type     : 'notice',
                    stayTime : 3000
                   
                });
                   }
                     
                <!-- adminnak -->  
               });
               $('.sendtoadminbutton').click(function(e){
               e.preventDefault();
               var contactarea = $('.sendtoadmin').val();
               link7 = site + "masteradmin/writetoadmin";
               if(contactarea != ""){
                   $.ajax({
                       type: "POST",
                       data: $('.sendtoadmin').serialize(),
                       url: link7,
                       success: function(){
                           $('.sendtoadmin').val("");
                           $().toastmessage('showToast', {
                    position : 'middle-center',
                    text     : 'Elküldve !',
                    sticky   : false,
                    type     : 'notice',
                    stayTime : 3000
                   
                });
                       }
                   })
               }
               else
                    $().toastmessage('showToast', {
                    position : 'middle-center',
                    text     : 'Nem hagyhatod üresen a mezőt !',
                    sticky   : false,
                    type     : 'notice',
                    stayTime : 3000
                   
                });
               });
            <!-- Kosárba tétel és elvétel -->
            $('.add_to_cart').live('click',function(e) {
                   e.preventDefault();
                    var href8 = $(this).attr('href');
                    var drinkscount = $(this).parent().parent().find('.drinkscount').val();
                    var link8 = site + "owncart/addtocart/" + href8 + "/" + drinkscount;
                    $.ajax({
                        type: "POST",
                        url: link8,
                        success: function(){
                            $('#head2').load(location.href + ' .cartfull');
                            $('#refrowncartdata').load(location.href + ' .owncartdata');
                            $('.refreshshipdata').load(location.href + ' .shippingdata');
                            
                        }
                 });
            });
            $('.delete_to_cart').live('click',function(e) {
                    e.preventDefault();
                    var href9 = $(this).attr('href');
                    var drinkscount2 = $(this).parent().find('.drinkscount').val();
                    link9 = site + "owncart/deletetocart/" + href9 + "/" + drinkscount2;
                    $.ajax({
                        type: "POST",
                        url: link9,                    
                        success: function(){
                            $('.cartlist').load(location.href + ' .content_011');
                            $('.cart').load(location.href + ' .cart_title');
                            $('#refrowncartdata').load(location.href + ' .owncartdata');
                            $('.refreshshipdata').load(location.href + ' .shippingdata');
                            
                        }
                 });
            });
            $('.delete_all_cart_item').live('click',function(e){
                e.preventDefault();
                href10 = $(this).attr('href');
                link10 = "http://localhost/szakdoga_igniter/owncart/alldeleteitem/"+ href10;
                $.ajax({
                    type:"POST",
                    url:link10,
                    success:function(){
                        $('.cartlist').load(location.href + ' .content_011');
                        $('.cart').load(location.href + ' .cart_title');
                        $('#refrowncartdata').load(location.href + ' .owncartdata');
                        $('.refreshshipdata').load(location.href + ' .shippingdata');
                    }
                });

            });
            <!-- MENÜ div -->
             $("ul#menu div").live('click',
                function(){
                $(this).parent().find("div").css("background-image","url('<?php echo base_url("img/cat_selector_down.png"); ?>')");
                 
                    $(this).parent().find("ul").slideDown(700);

                    $(this).parent().hover(
                        function(){},
                        function(){
                            $(this).parent().find("ul").slideUp(700);
                            $(this).parent().find("div").css("background-image","url('<?php echo base_url("img/cat_selector.png"); ?>')");
                        }
                    );

                }
            );
            <!-- kosár slide -->
             $(".cartfull").live('click',function () {
                $(".cartlist").slideDown(700);
                
               $(this).parent().hover(
                        function(){},
                        function(){
                            $(this).parent().find(".cartlist").slideUp(700);
                           
                        }
               );
            });
            
     });
    </script>
    <!-- SITE -->
</head>
<body>
    <div id="cont">
        <div id="head">
            <div id="loginregister">
                <?php
                    $this->load->view('indexelements/headmenu');
                ?>
            </div>
            <div id="logpanel">
                <?php
                    $this->load->view('indexelements/loginpanel');
                ?>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div id="head2">
            <div class="cartfull">
                <div class="cart">
                    <?php
                        $this->load->view('indexelements/cart');
                    ?>
                </div>
                <div class="cartlist">
                    <?php
                        $this->load->view('indexelements/cartlist');
                    ?>
                </div>
            </div>
            <div id="clear"></div>
        </div>
        <div id="menusearch">
            <div id="menu">
                <?php
                   $this->load->view('indexelements/menu');                           
                 ?>
            </div>
            <div id="search">
                <?php
                  $this->load->view('indexelements/search');
                ?>
            </div>
           
            
        </div>
        <div id="action" style="display: block;">
            <div id="advertisement">
                
            </div>
            <div class="slider">
                <div id="pager"></div>
                <?php
                $this->load->view("indexelements/jquery_slider");
                ?>
            </div>
            <div id="clear"></div>
            
         </div>
        <div id="middle">
            
            <div id="inform">
                <?php $this->load->view($middle); ?>
            </div>
            <div id="categories">
                <div id="list">
                    <?php
                        $this->load->view('indexelements/categories');
                    ?>
                </div>
            </div>
            <div id="clear"></div>
        </div>
        <div id="advertisement2">
            <div id="advimg">
                <?php
                    $this->load->view('indexelements/footadver');
                ?>
            </div>
        </div>
        <div id="foot">
            <?php
                 $this->load->view('indexelements/foot');
             ?>
        </div>
        
    </div>

</body>
</html>