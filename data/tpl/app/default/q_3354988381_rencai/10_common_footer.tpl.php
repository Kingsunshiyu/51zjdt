<?php defined('IN_IA') or exit('Access Denied');?><?php  if($curr_action == 'MyPersonIndex' || $curr_action == 'MyCompanyIndex') { ?> 
	<link rel="stylesheet" href="../addons/q_3354988381_rencai/amaze/assets/css/amazeui.min.css">
<?php  } ?>   
    <div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default " id="">    
        <ul class="am-navbar-nav am-cf am-avg-sm-4" style="background-color: <?php  echo $this->module['config']['footer_nav_bgcolors']?>">
            <li style="width:20%">
                <a href="<?php  echo $this->createMobileUrl('index_home');?>" class="" target="_top">
                    <span class="am-icon-home"></span>
                    <span class="am-navbar-label" style="font-size:14px"><?php  echo $this->getFieldsArr('sys', 'sys_nav_index');?></span>
                </a>
            </li>
            <li style="width:20%">
                <a href="<?php  echo $this->createMobileUrl('JobList');?>" class="" target="_top">
                    <span class="am-icon-car"></span>
                    <span class="am-navbar-label" style="font-size:14px"><?php  echo $this->getFieldsArr('sys', 'sys_nav_zhao');?></span>
                </a>
            </li>
            
            <li style="width:20%">
                <a href="<?php echo $_SESSION['session_public_url'] ? $_SESSION['session_public_url'] : $this->createMobileUrl('PublicIndex');?>" class="" target="_top">
                    <span class="am-icon-send-o"></span>
                    <span class="am-navbar-label" style="font-size:14px"><?php  echo $this->getFieldsArr('sys', 'sys_nav_fabu');?></span>
                </a>
            </li>
                        
            <li style="width:20%">
                <a href="<?php  echo $this->createMobileUrl('Resume');?>" class="" target="_top">
                    <span class="am-icon-download"></span>
                    <span class="am-navbar-label" style="font-size:14px"><?php  echo $this->getFieldsArr('sys', 'sys_nav_person');?></span>
                </a>
            </li>
            <li style="width:20%">
                <a href="<?php  echo $this->createMobileUrl('My');?>" class="" target="_top">
                    <span class="am-icon-user"></span>
                    <span class="am-navbar-label" style="font-size:14px"><?php  echo $this->getFieldsArr('sys', 'sys_nav_my');?></span>
                </a>
            </li>
        </ul>
    </div>
</body>
</html>