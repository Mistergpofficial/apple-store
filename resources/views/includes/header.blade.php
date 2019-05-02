<?php
function canogenre($g){
	$g = str_replace(" ", "-", $g);
	$g = strtolower($g);
	return $g;
}
?>
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
                <a href="{!! url('/') !!}"><img src="{!! asset('images/logo.png') !!}" alt="<?php echo config('siteconfig.site_title') ?>" border="0"></a>
            </div>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo config('siteconfig.site_url') ?>"><?php echo config('siteconfig.home_title') ?></a></li>
                <li class="dropdown">
                    <a href="<?php echo config('siteconfig.site_url') ?>/new-apps" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo config('siteconfig.newapps_title') ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu" style="min-width: 160px;">
                        <div class="drop-row">
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/new-apps"><?php echo config('siteconfig.newapps_title') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/new-free-apps"><?php echo config('siteconfig.newfreeapps_title') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/new-paid-apps"><?php echo config('siteconfig.newpaidapps_title') ?></a></li>
                        </div>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="<?php echo config('siteconfig.site_url') ?>/top-free-apps" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo config('siteconfig.topapps_title')?> <b class="caret"></b></a>
                    <ul class="dropdown-menu" style="min-width: 160px;">
                        <div class="drop-row">
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/top-free-apps"><?php echo config('siteconfig.topfreeapps_title') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/top-grossing-apps"><?php echo config('siteconfig.topgrosapps_title') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/top-paid-apps"><?php echo config('siteconfig.toppaidapps_title') ?></a></li>
                        </div>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="<?php echo config('siteconfig.site_url') ?>/category" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo config('siteconfig.categories_title')?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <div class="drop-row">
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6018/<?php echo canogenre(config('siteconfig.gtitle_1'));?>"><?php echo config('siteconfig.gtitle_1') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6000/<?php echo canogenre(config('siteconfig.gtitle_2'));?>"><?php echo config('siteconfig.gtitle_2') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6022/<?php echo canogenre(config('siteconfig.gtitle_3'));?>"><?php echo config('siteconfig.gtitle_3') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6017/<?php echo canogenre(config('siteconfig.gtitle_4'));?>"><?php echo config('siteconfig.gtitle_4') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6016/<?php echo canogenre(config('siteconfig.gtitle_5'));?>"><?php echo config('siteconfig.gtitle_5') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6015/<?php echo canogenre(config('siteconfig.gtitle_6'));?>"><?php echo config('siteconfig.gtitle_6') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6023/<?php echo canogenre(config('siteconfig.gtitle_7'));?>"><?php echo config('siteconfig.gtitle_7') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6014/<?php echo canogenre(config('siteconfig.gtitle_8'));?>"><?php echo config('siteconfig.gtitle_8') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6013/<?php echo canogenre(config('siteconfig.gtitle_9'));?>"><?php echo config('siteconfig.gtitle_9') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6012/<?php echo canogenre(config('siteconfig.gtitle_10'));?>"><?php echo config('siteconfig.gtitle_10') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6020/<?php echo canogenre(config('siteconfig.gtitle_11'));?>"><?php echo config('siteconfig.gtitle_11') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6011/<?php echo canogenre(config('siteconfig.gtitle_12'));?>"><?php echo config('siteconfig.gtitle_12') ?></a></li>
                        </div><div class="drop-row">
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6010/<?php echo canogenre(config('siteconfig.gtitle_13'));?>"><?php echo config('siteconfig.gtitle_13') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6009/<?php echo canogenre(config('siteconfig.gtitle_14'));?>"><?php echo config('siteconfig.gtitle_14') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6021/<?php echo canogenre(config('siteconfig.gtitle_15'));?>"><?php echo config('siteconfig.gtitle_15') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6008/<?php echo canogenre(config('siteconfig.gtitle_16'));?>"><?php echo config('siteconfig.gtitle_16') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6007/<?php echo canogenre(config('siteconfig.gtitle_17'));?>"><?php echo config('siteconfig.gtitle_17') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6006/<?php echo canogenre(config('siteconfig.gtitle_18'));?>"><?php echo config('siteconfig.gtitle_18') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6024/<?php echo canogenre(config('siteconfig.gtitle_19'));?>"><?php echo config('siteconfig.gtitle_19') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6005/<?php echo canogenre(config('siteconfig.gtitle_20'));?>"><?php echo config('siteconfig.gtitle_20') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6004/<?php echo canogenre(config('siteconfig.gtitle_21'));?>"><?php echo config('siteconfig.gtitle_21') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6003/<?php echo canogenre(config('siteconfig.gtitle_22'));?>"><?php echo config('siteconfig.gtitle_22') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6002/<?php echo canogenre(config('siteconfig.gtitle_23'));?>"><?php echo config('siteconfig.gtitle_23') ?></a></li>
                            <li><a href="<?php echo config('siteconfig.site_url') ?>/category/6001/<?php echo canogenre(config('siteconfig.gtitle_24'));?>"><?php echo config('siteconfig.gtitle_24') ?></a></li>
                        </div>
                    </ul>
                </li>


            </ul>
            <form action="{{ url('search') .'/' }}" class="navbar-form navbar-right" onsubmit="return false;">
                {{ csrf_field() }}
                <input type="text" placeholder="<?php echo config('siteconfig.searchf_text') ?>" name="q" class="form-control input-sm" value="{{ old('q') }}"  />
                {{--<input type="hidden" name="change" value="1">--}}
                <button type="submit" class="searchbut" onclick="window.location.href=this.form.action + this.form.q.value;"><i class="material-icons">search</i></button>

            </form>


        </div>
        <!--/.nav-collapse -->
    </div>
</div>