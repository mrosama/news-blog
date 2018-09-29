<meta charset="utf-8" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/breadcrumb/css/global.css');?>" />
 

    <div id="breadcrumb2">
            <ul class="crumbs2">
                
               
                <li class="first"><a  class="mytext" href="<?php echo base_url('app/contactus');?>"><?php echo $this->lang->line('app_contactus');?></a></li>
                  
                <li class="last"><a class="mytext" href="<?php echo base_url();?>"><?php echo $this->lang->line('app_home');?></a></li>            
            </ul>
        </div>
            <div class="space"></div>


<?php
echo modules::run('api/Contactus','ds5&f46#d5s@f4@#0od$0w3fdgdf');

?>

<script type="text/javascript">
    $(document).ready(function() {
        $(this).attr("title", "<?php echo $this->lang->line('app_contactus');?>");
    });
</script>