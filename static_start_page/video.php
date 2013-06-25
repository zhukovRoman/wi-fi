<?php include ('header.php'); ?>

<script type="text/javascript">  
    function resize ()
    {
        $m = 0.85;
        $pane = $(".tab-pane.active");
        $ID_player = $pane.children('.video-js').attr('id');
        var Pl = _V_($ID_player);
        $('#te').text($ID_player);
        $tmp = $pane.width();
        $width = $pane.width()*$m;
        $height = $pane.height()*$m;
        
        //alert ('sdf');
        Pl.width($tmp*$m);
        Pl.height($tmp*$m*(2/3));    
    }
    jQuery(document).ready(function ($) {
        resize();
    });
  $(function($)
    {
        $('a[data-toggle="tab"]').on('shown', function (e) {
            resize();
        })
    });  
    
</script>

<script language="JavaScript">
window.onresize = function ()
{
    resize();
}
</script>
<div id="te">123</div>
<div class="row-fluid show-grid">
    <div class="span12">
        <div class="tabbable tabs-left">
            <ul class="nav nav-tabs span3">
                <li class="active"><a href="#lA" data-toggle="tab">Смешные</a></li>
                <li class=""><a href="#lB" data-toggle="tab">Авто</a></li>
                <li class=""><a href="#lC" data-toggle="tab">Спорт</a></li>
                <li class=""><a href="#lC" data-toggle="tab">Красота</a></li>
                <li class=""><a href="#lC" data-toggle="tab">Животные</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="lA" >
                    <video id="my_video_1" class="video-js vjs-default-skin" controls style="margin: 0px;"
                           preload="" poster="my_video_poster.png " 
                           data-setup="{}" style="">
                        <source src="video/1.mp4" type='video/mp4'>

                    </video>
                    <div class="clearfix"></div>
                    <ul class="pager">
                        <li class="previous">
                            <a href="#">&larr; </a>
                        </li>
                        <li class="next">
                            <a href="#">&rarr;</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="lB">
                    <video id="my_video_2" class="video-js vjs-default-skin full" controls
                           preload="auto" poster="my_video_poster.png" width="640" height="364"
                           data-setup="{}">
                        <source src="video/2.mp4" type='video/mp4'>

                    </video>
                </div>
                <div class="tab-pane" id="lC">
                    <video id="my_video_3" class="video-js vjs-default-skin" controls
                           preload="auto" width="640" height="364" poster="my_video_poster.png"
                           data-setup="{}">
                        <source src="video/3.mp4" type='video/mp4'>

                    </video>
                </div>
            </div>
        </div>
        <!--
        <div class="span9"> <p>The fluid grid system uses percents instead of pixels for column widths. It has the same responsive capabilities as our fixed grid system, ensuring proper proportions for key screen resolutions and devices.</p>
        <p>The fluid grid system uses percents instead of pixels for column widths. It has the same responsive capabilities as our fixed grid system, ensuring proper proportions for key screen resolutions and devices.</p>
        </div>
        -->



        <?php include ('footer.php'); ?>
