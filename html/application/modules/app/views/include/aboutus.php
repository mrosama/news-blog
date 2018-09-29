


<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/breadcrumb/css/global.css');?>" />
 

    <div id="breadcrumb2">
            <ul class="crumbs2">
                
               
                <li class="first"><a  class="mytext" href="<?php echo base_url('app/aboutus');?>"><?php echo $this->lang->line('app_whoim');?></a></li>
                  
                <li class="last"><a class="mytext" href="<?php echo base_url();?>"><?php echo $this->lang->line('app_home');?></a></li>            
            </ul>
        </div>
            <div class="space"></div>


<?php
  echo modules::run('post/page',15);

?>

<script type="text/javascript">
    $(document).ready(function() {
        $(this).attr("title", "<?php echo $this->lang->line('app_whoim');?>");
    });
</script>