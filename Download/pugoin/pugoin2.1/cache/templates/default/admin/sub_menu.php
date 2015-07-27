<?php /* 2011-12-29 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?>
<?php $_sub_menu_list = $_sub_menu_list?$_sub_menu_list:get_sub_menu($this->Module); ?>
<div class="nav3">
	<ul class="cc">
<?php if(is_array($_sub_menu_list)) { foreach($_sub_menu_list as $value) { ?>
<?php if($value['type'] == '1' && PLUGINDEVELOPER < 1)continue; ?>
<li 
<?php if($value['code'] == $this->Code) { ?>
class="current"
<?php } ?>
>
<?php if($this->pluginid) { ?>
<a href="<?php echo $value['link']; ?>&id=<?php echo $this->pluginid; ?>">
<?php } else { ?><a href="<?php echo $value['link']; ?>">
<?php } ?>
<?php echo $value['name']; ?></a></li>
		
<?php } } ?>
</ul>
</div>