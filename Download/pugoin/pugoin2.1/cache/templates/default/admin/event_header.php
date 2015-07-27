<?php /* 2011-12-29 in pugo.in invalid request template */ if(!defined("IN_PUGOIN")) exit("invalid request"); ?><!-- 
<?php if($this->Code == '') $main_class='current' ?>
 -->
<!-- 
<?php if($this->Code == 'info') $info_class='current' ?>
 -->
<!-- 
<?php if($this->Code == 'manage') $manage_class='current' ?>
 -->
<!-- 
<?php if($this->Code == 'setting') $setting_class='current' ?>
 -->
<div class="nav3">
  <ul class="cc">
    <li class="<?php echo $main_class; ?>">
      <a href="admin.php?mod=event">活动主题</a>
    </li>
    <li class="<?php echo $info_class; ?>">
      <a href="admin.php?mod=event&code=info">可选必填项</a>
    </li>
	<li class="<?php echo $setting_class; ?>">
	  <a href="admin.php?mod=event&code=setting">基本设置</a>
	</li>
	<li class="<?php echo $manage_class; ?>">
	  <a href="admin.php?mod=event&code=manage">活动管理</a>
	</li>
  </ul>
</div>