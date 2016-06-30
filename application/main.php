<?php
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link = connect ();
if (! is_login ( $link )) {
	skip ( 'login.php', '*_* 请先登录！' );
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>车辆违章查询管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../public/assets/css/dpl-min.css" rel="stylesheet"
	type="text/css" />
<link href="../public/assets/css/bui-min.css" rel="stylesheet"
	type="text/css" />
<link href="../public/assets/css/main-min.css" rel="stylesheet"
	type="text/css" />

</head>
<body>


<div style="margin-top: -20px"></div>
	<div class="header">

		<div class="dl-title" >
			<img width="140px" src="../public/assets/img/top.png">
		</div>

		<div class="dl-log">
			欢迎您，<span class="dl-log-user"><?php echo $_SESSION ['manage'] ['uname']; ?></span><a
				href="logout.php" title="退出系统" class="dl-log-quit">[退出]</a>
		</div>
	</div>
	<div class="content">
		<div class="dl-main-nav">
			<div class="dl-inform">
				<div class="dl-inform-title">
					<s class="dl-inform-icon dl-up"></s>
				</div>
			</div>
			<ul id="J_Nav" class="nav-list ks-clear">
				<li class="nav-item dl-selected"><div
						class="nav-item-inner nav-home">业务管理</div></li>
				<!-- <li class="nav-item dl-selected"><div
						class="nav-item-inner nav-order">业务管理</div></li> -->
						<?php
						if ($_SESSION ['manage'] ['uname']=='admin'){
						?>
				<li class="nav-item dl-selected"><div
						class="nav-item-inner nav-order">系统管理</div></li>
					<?php }?>
			</ul>
		</div>
		<ul id="J_NavContent" class="dl-tab-conten">

		</ul>
	</div>
	<script type="text/javascript"
		src="../public/assets/js/jquery-1.8.1.min.js"></script>
	<script type="text/javascript" src="../public/assets/js/bui-min.js"></script>
	<script type="text/javascript"
		src="../public/assets/js/common/main-min.js"></script>
	<script type="text/javascript" src="../public/assets/js/config-min.js"></script>
	<script>
    BUI.use('common/main',function(){
      var config = [{
          id:'1',
          menu:[
		  {
                    text:'查询',
                    items:[
                           {
      	                  id:'0',
      	                  text:'车辆信息查询',
      	                  href:'car/chaxun.php'
                           }
                           ]
                      },
		  {
              text:'车辆信息',
              items:[

              {
                      id:'1',
                      text:'车辆信息列表',
                      href:'Car/index.php'
                      },
                     {
                    id:'2',
                    text:'添加车辆信息',
                    href:'Car/add.php'
                     },

                      /* {
                       id:'4',
                       text:'用户管理',
                       href:'User/index.php'
                       },
                       {
                        id:'6',
                        text:'菜单管理',
                        href:'Menu/index.php'
                       } */
                     ]
                },
                 {
                    text:'违章信息',
                    items:[
                           {
      	                  id:'3',
      	                  text:'违章信息列表',
      	                  href:'weizhang/index.php'
                           },
                           {
                            id:'4',
                            text:'添加违章信息',
                            href:'weizhang/add.php'
                            }
                            /*{
                             id:'4',
                             text:'用户管理',
                             href:'User/index.php'
                             },
                             {
                              id:'6',
                              text:'菜单管理',
                              href:'Menu/index.php'
                             }*/
                           ]
                      },{
                          text:'驾照信息',
                          items:[
                                 {
            	                  id:'5',
            	                  text:'驾照信息列表',
            	                  href:'Jiazhao/index.php'
                                 },
                                 {
                                  id:'6',
                                  text:'添加驾照信息',
                                  href:'Jiazhao/add.php'
                                  }
                                  /*{
                                   id:'4',
                                   text:'用户管理',
                                   href:'User/index.php'
                                   },
                                   {
                                    id:'6',
                                    text:'菜单管理',
                                    href:'Menu/index.php'
                                   }*/
                                 ]
                            }
                ]
      },
      {
          id:'2',
          menu:[{
              text:'用户管理',
              items:[

                      {
                       id:'1',
                       text:'用户列表',
                       href:'User/index.php'
                       },
                       {
                        id:'2',
                        text:'添加用户',
                        href:'user/add.php'
                       }
                     ]
                },
                {
                    text:'管理员管理',
                    items:[
                           {
      	                  id:'3',
      	                  text:'管理员列表',
      	                  href:'admin/index.php'
                           }
                           ]
                      },
                      {
                          text:'服务器信息',
                          items:[
                                 {
            	                  id:'4',
            	                  text:'服务器详情',
            	                  href:'admin/server.php'
                                 }
                                 ]
                            }


                ]
      }
      ];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
</body>
</html>