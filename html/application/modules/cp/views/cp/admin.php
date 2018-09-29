<meta charset="utf-8" />
<?php
$api = $this -> load -> library('apiservices');
$api->CP_Auth(1,true,'No direct script access allowed');
?>

    <link href="<?php echo base_url('assets/lib/chart/src/nv.d3.css');?>" rel="stylesheet">
 <script src="<?php echo base_url('assets/lib/chart/d3.v3.js');?>"></script> 
 <script src="<?php echo base_url('assets/lib/chart/nv.d3.js');?>"></script> 
  
 
 <script src="<?php echo base_url('assets/lib/chart/src/tooltip.js');?>"></script>
 
    <script src="<?php echo base_url('assets/lib/chart/src/models/axis.js');?>"></script>
     <script src="<?php echo base_url('assets/lib/chart/src/models/discreteBar.js');?>"></script>
      <script src="<?php echo base_url('assets/lib/chart/src/models/discreteBarChart.js');?>"></script>
     <script src="<?php echo base_url('assets/lib/chart/src/models/legend.js');?>"></script>
     <script src="<?php echo base_url('assets/lib/chart/src/models/pie.js');?>"></script>
     <script src="<?php echo base_url('assets/lib/chart/src/models/pieChart.js');?>"></script>
   <script src="<?php echo base_url('assets/lib/chart/src/utils.js');?>"></script>

   <style>

#chart1 svg {
    height: 320px;
     position:relative;
     display: block
 
}
#chart2 svg {
    height: 320px;
    position:relative;
    display: block;
     
 
}
svg text {
font-family:'Droid Arabic Kufi', serif;
font-size:11px;
}

</style> 
 
<div id="_page_chart" class="container_chart uk-animation-fade"> 
 <!-- section one -->
<div class="uk-grid" data-uk-grid-margin>   
<div class="uk-width-1-1">
<div class="uk-panel   dirTemplate">   
   <div class="uk-grid">
    <div class="uk-width-1-2">
        
            <div class="uk-panel uk-panel-box font_deafult backcolors_inner  dirTemplate"> 
             <div class="uk-article-divider">
                <a href="javascript:void(0);" id="chart2_vsize" > <?php echo $this->lang->line('chart_size');?></a>
                 <hr class="uk-article-divider">
            </div>
      <div id="ch1">   
      <script>

  var testdata = [
    {
      key: "<?php echo $this->lang->line('chart_allsize');?>",
      y: <?php echo $chart_size['TOTAL'];?>
    },
    {
      key: "<?php echo $this->lang->line('chart_usedsize');?>",
      y: <?php echo $chart_size['CURRENT'];?>
    }
  
 
  ];


nv.addGraph(function() {
    var width = 400,
        height = 340;

    var chart = nv.models.pieChart()
        .x(function(d) { return d.key })
        .y(function(d) { return d.y })
        .color(d3.scale.category10().range())
        .width(width)
        .height(height)
         .showLabels(true)
         .showLegend(true);
         
      
      d3.select("#chart2 svg")
          .datum(testdata)
        .transition().duration(3000)
          .attr('width', width)
          .attr('height', height)
          .call(chart);
 
    chart.dispatch.on('stateChange', function(e) { nv.log('New State:', JSON.stringify(e)); });

    return chart;
}); 
</script>
     
<div id="chart2"  class="font_deafult">
 <svg></svg>
</div>

</div>

          </div>  
     </div>
    
 
    
     <div class="uk-width-1-2">
         <div class="uk-panel uk-panel-box font_deafult backcolors_inner  dirTemplate"> 
             <div class="uk-article-divider">
        <a href="javascript:void(0);" id="chart1_vvistor" ><?php echo $this->lang->line('chart_vistors');?></a>
                 <hr class="uk-article-divider">
            </div> <?php
     
      ?>
            
 <script>
 historicalBarChart = [ 
  {
    key: "Cumulative Return",
    
    values: [
    <?php
    if(is_array($visitors_info)){
    for($i=0;$i<count($visitors_info['DAYS']); $i++){
       // echo $visitors_info['DAYS'][$i].$visitors_info['RANKS'][$i].'<br/>';
    ?>
     { 
        "label" :"<?php echo $visitors_info['DAYS'][$i]; ?>" ,
        "value" : <?php echo $visitors_info['RANKS'][$i]; ?>
      } ,
    <?php
    }}
    ?>
    
    /*
      { 
        "label" : "A" ,
        "value" : 10
      } , 
      { 
        "label" : "B" , 
        "value" : 0
      } , 
      { 
        "label" : "C" , 
        "value" : 20
      } , 
      { 
        "label" : "D" , 
        "value" : 4
      } , 
      { 
        "label" : "E" ,
        "value" : 5
      } , 
      { 
        "label" : "F" , 
        "value" : 4
      } , 
      { 
        "label" : "G" , 
        "value" : 9
      } , 
      { 
        "label" : "H" , 
        "value" : 15
      }*/
     
     
    ]
  }
];




nv.addGraph(function() {  
  var chart = nv.models.discreteBarChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
     // .staggerLabels(true)
      //.staggerLabels(historicalBarChart[0].values.length > 8)
      .tooltips(false)
      .showValues(true)
      //.showControls(true);
      .transitionDuration(4000)
      ;
      
  /* chart.xAxis
      .axisLabel('Time (ms)')
      .tickFormat(d3.format('n')  );
       */
      // chart.yAxis.axisLabel("Students (in %)");
     chart.yAxis
      .tickFormat(d3.format('d'));
     
  d3.select('#chart1 svg')
      .datum(historicalBarChart)
      .call(chart);

  nv.utils.windowResize(chart.update);

  return chart;
});
 
</script>           
<div id="chart1">
  <svg></svg>
</div>



          </div>   
             
     </div>
     
     
   </div>
   
     <div class="uk-grid">
         <div class="uk-width-1-2">
         <div class="uk-panel uk-panel-box font_deafult backcolors_inner  dirTemplate"> 
             <div class="uk-article-divider">
                <a href="javascript:void(0);" id="chart_vvmember" > <?php echo $this->lang->line('chart_members');?></a>
                 <hr class="uk-article-divider">
            </div>
            <div id="chart_cmember">
         <table  width="100%" align='center' cellpadding="5" cellspacing="5">
 <tr><td align="center"  width="40%" class="uk-text-danger"> <?php echo $this->lang->line('chart_vistornow');?></td><td  class="uk-text-success" align="center"><?php echo @$member_info['CVisitor'];?></td></tr>
  <tr><td align="center" width="40%" class="uk-text-danger"> <?php echo $this->lang->line('chart_membernow');?></td><td class="uk-text-success" align="center"><?php echo @$member_info['CMembers'];?></td></tr>
  <tr><td align="center" width="40%" class="uk-text-danger"> <?php echo $this->lang->line('chart_membernum');?></td><td class="uk-text-success" align="center"><?php echo @$member_info['CAmembers'];?></td></tr>
  <tr><td align="center" width="40%" class="uk-text-danger"> <?php echo $this->lang->line('chart_memberactive');?></td><td class="uk-text-success" align="center"><?php echo @$member_info['CActivemembers'];?></td></tr>
  <tr><td align="center" width="40%" class="uk-text-danger"> <?php echo $this->lang->line('chart_membermanagernum');?></td><td class="uk-text-success" align="center"><?php echo @$member_info['CManager'];?></td></tr>


                </table>
                </div>            

         </div>
          </div>
         
         <div class="uk-width-1-2">
         <div class="uk-panel uk-panel-box font_deafult backcolors_inner  dirTemplate"> 
             <div class="uk-article-divider">
                <a href="javascript:void(0);" id="chart_vvinfo" >    <?php echo $this->lang->line('chart_info');?></a>
                 <hr class="uk-article-divider">
            </div>
            <div id="chart_cinfo">
  <table  width="100%" align='center' cellpadding="5" cellspacing="5">
 <tr><td align="center" width="40%" class="uk-text-danger"> <?php echo $this->lang->line('chart_ossystem');?></td><td  class="uk-text-info" align="center"><?php echo @$website_info['server'];?></td></tr>
  <tr><td align="center" width="40%" class="uk-text-danger"> <?php echo $this->lang->line('chart_phpversion');?></td><td class="uk-text-info" align="center"><?php echo @$website_info['php'];?></td></tr>
  <tr><td align="center" width="40%" class="uk-text-danger"> <?php echo $this->lang->line('chart_mysqlversion');?></td><td class="uk-text-info" align="center"><?php echo @$website_info['mysqlversion'];?></td></tr>
  <tr><td align="center" width="40%" class="uk-text-danger"> <?php echo $this->lang->line('chart_serverversion');?></td><td class="uk-text-info" align="center"><?php echo @$website_info['apache'];?></td></tr>
  <tr><td align="center" width="40%" class="uk-text-danger"> <?php echo $this->lang->line('chart_sizedb');?></td><td class="uk-text-info" align="center"><?php echo @$website_info['dbsize'];?></td></tr>
  </table>
  </div>
  
         </div>
          </div>
         
         
         
         
      </div>    
   
   
</div></div></div>
<!-- end section one-->


</div>
<?php
echo br('7');
?>