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