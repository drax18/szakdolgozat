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
    <script type="text/javascript">        
        
        $(document).ready(function() {            
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
             //   $('.cat_alcohols').fadeIn(1000);
             <!-- Kedvenchez adás -->   
            $('.favoradd').live('click',function(e){
              
               $(this).parent().find('.alreadyfav').fadeIn(1000);
               $(this).parent().find('.alreadyfav').delay(1000).fadeOut(1000);
               e.preventDefault();
               var href2 =  $(this).data('linkname');
               var link2 = "http://localhost/szakdoga_igniter/actions/favadd/" + href2;
               $.ajax({
                   type: "POST",
                   url: link2,
                   success: function(){
                     
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
            var search=  $('.searchvalue').val();
            var searchlink = "http://localhost/szakdoga_igniter/mainsite/searchresult/" + search;
            
            $.ajax({
                type: "POST",
                url: searchlink,

                success: function(){

                }
            });
            
            });
            
            <!-- favor elvétel -->
            $('.favorremove').live('click',function(e){
            e.preventDefault();
            var removefav = $(this).data('favid');
            var removelink = "http://localhost/szakdoga_igniter/actions/removefav/" + removefav;
            $.ajax({
                type: "POST",
                url: removelink,
                success: function(){
                    $('.favorites').load(location.href + ' .allremovefav');
                }
            });
            
            
            });
            <!-- Rendezés -->
               $('.sort').click(function(e){
                    e.preventDefault();
                    
                    var drinkid = $('#catid').val();
                    var link3 = "http://localhost/szakdoga_igniter/alcohol/catdrinksrefresh/" + drinkid;
                    $.ajax({
                        type: "POST",
                        url: link3,
                        data: $('.sorttypes').serialize(),
                        success:function(data){
                            $('#returnedsort').empty();
                            $('#returnedsort').html(data);
                        }
                    });
               });
               <!-- score frissítés -->
               $('.scoresend').live('click',function(e){
                   e.preventDefault();
                   var drink_id = $('.commentsend').data('drinkid');
                   var userscore = $('.scorevalue').val();
                   var scorelink = "http://localhost/szakdoga_igniter/actions/scoreupdate/" + drink_id + "/" + userscore;            
                   $.ajax({
                       type: "POST",
                       url: scorelink,
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
                   var alcoholid = $(this).data('drinkid');
                   var commentlink = "http://localhost/szakdoga_igniter/actions/writeComm/" + alcoholid;
                   var comment = $('.commentarea').val();
                   if(comment != "" ){
                       $.ajax({
                        type: "POST",
                        data: $('.commentarea').serialize(),
                        url: commentlink,
                        success: function(){
                            $('.comments').load(location.href + ' .membercomments');
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
                     
                     //  alert("Nem hagyhatod üresen a mezőt az elküldéshez!");
               });
            <!-- Kosárba tétel és elvétel -->
            $('.add_to_cart').live('click',function(e) {
                   e.preventDefault();
                    var href = $(this).attr('href');
                    var drinkscount = $(this).parent().parent().find('.drinkscount').val();
                    link = "http://localhost/szakdoga_igniter/owncart/addtocart/" + href + "/" + drinkscount;
                    $.ajax({
                        type: "POST",
                        url: link,
                        success: function(){
                            $('#head2').load(location.href + ' .cartfull');
                            $('#refrowncartdata').load(location.href + ' .owncartdata');
                            
                        }
                 });
            });
            $('.delete_to_cart').live('click',function(e) {
                    e.preventDefault();
                    var href = $(this).attr('href');
                    $.ajax({
                        type: "POST",
                        url: href,                    
                        success: function(){
                            $('.cartlist').load(location.href + ' .content_011');
                            $('.cart').load(location.href + ' .cart_title');

                            
                        }
                 });
            });
            <!-- MENÜ div -->
             $("ul#menu div").live('click',
                function(){
                    $(this).parent().find("div").css("background-image","url(<?php echo base_url()."img/cat_selector_down.png" ;?>)");
                 
                    $(this).parent().find("ul").slideDown(700);

                    $(this).parent().hover(
                        function(){},
                        function(){
                            $(this).parent().find("ul").slideUp(700);
                            $(this).parent().find("div").css("background-image","url(<?php echo base_url()."img/cat_selector.png" ;?>)");
                        }
                    );

                }
            );
            <!-- kosár slide -->
             $(".cartfull").live('hover',function () {
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
            <div id="clear"></div>
        </div>
        <div id="head2">
            <div class="cartfull">
                <div class="cart">
                    <?php
                        $this->load->view('indexelements/cart');
                    ?>
                </div>
                <div class="cartlist" >
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