<!-- BEGIN: main -->
{FILE "header_only.tpl"}
{FILE "header_extended.tpl"}
<div class="row">
	[HEADER]
</div>
<div class="row">
	<div>
		
		[WELCOME]
		<marquee behavior ="scroll" direction = "left" width ="100%" scrolldelay ="1" scrollamount "20"><font color = "ff0000"><font-size = "50px">Chào mừng bạn đến với website cuộc thi OLP Tin học 2020</font></marquee>
	</div>
	
		
</div>

<div class="row">
    <div class="col-sm-12 col-md-13 col-sm-push-6 col-md-push-5">
        [NEWS]
        [INTRO]
        {MODULE_CONTENT}
        [BOTTOM_ADS]
        
    </div>
    <div class="col-sm-6 col-md-6 col-sm-push-6 col-md-push-5">
    	[TOPHITS]
    	[VOTING]
        [RIGHT]
    </div>
	<div class="col-sm-6 col-md-5 col-sm-pull-18 col-md-pull-19">
		[ABOUT]
		[LAWS]
		[STATISTICS]
		[LEFT]
	</div>
</div>
<div class="row">
	[BLOCK_CAU_2]
</div>
<div class="row">
	[FOOTER]
</div>
{FILE "footer_extended.tpl"}
{FILE "footer_only.tpl"}
<!-- END: main -->
