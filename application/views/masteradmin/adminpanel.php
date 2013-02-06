<?php
if($this->session->userdata('username')){
    if($adminuser == $checkadmin[0]->username){
    ?>
    <html lang="en">
    <head>    
        <meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
        <title></title>
           <link rel="stylesheet" href="<?php echo base_url();?>css/adminstyle.css"  />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.0/jquery-ui.js" /></script>
    <script>
         $(document).ready(function() {
             $("#adminmenu ul li").click(function(e){
                e.preventDefault();
                $("#adminmenu ul li").removeClass('active_menu_class');
                $(this).addClass('active_menu_class');
                
                var url = $(this).data('url');
                
               
                
              });
         });
    </script>
    </head>
    <body>

        <div id="admincontainer">
            <div id="adminhead">
                <?php
                    $this->load->view('masteradmin/adminhead');
                ?>
            </div>
            <div id="adminhead2">
                
            </div>
            <div id="admincenter">
                <div id="admininform">
                        <?php
                          
                          $this->load->view($middle);
                         ?>
                    </div>
                    <div id="adminmenu">
                        <?php
                            $this->load->view('masteradmin/adminmenu');
                        ?>
                    </div>
                <div style="clear:both"></div>
            </div>
        </div>
    

    </body>
    </html>

    <?php
    }
    else{
        redirect('mainsite/index');
    }
}else
redirect('mainsite/index');
?>