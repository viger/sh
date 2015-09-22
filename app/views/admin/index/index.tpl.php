<div>
    <div style="background-color: #3C8ED4;height:50px;padding:10px 20px 20px 10px;font-size:18px;color:#FFF;">
        <span style="padding:5px;display:block;float:left;">SmartHome Wifi</span>
        <div class="dropdown" style="float:right;" class="btn-group dropup">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-image:linear-gradient(to bottom,#3C8ED4 0,#3C8ED4 100%);border-color:#3C8ED4;background-image:-webkit-linear-gradient(top,#3C8ED4 0,#3C8ED4 100%);background-image:-webkit-gradient(linear,left top,left bottom,from(#3C8ED4),to(#3C8ED4));text-shadow:0 0px 0 rgba(0,0,0,0);">
                <span class=" glyphicon glyphicon-align-justify">
                </span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#">新增用户</a></li>
                <li><a href="#">个人中心</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">登出</a></li>
            </ul>
        </div>
        <span style="clear:both;"></span>
    </div>
    <div class=".col-xs-12 .col-md-8">
    <table class="table table-striped">
        <thead>
            <th>用户</th>
            <th>电话</th>
            <th>创建时间</th>
            <th>最后登录时间</th>
            <th>操作</th>
        </thead>
        <tbody>
            <?php foreach($this -> user_data_lists as $user_name => $list){?>
            <tr>
                <td><?php echo $list -> name;?></td>
                <td><?php echo $list -> phone;?></td>
                <td><?php echo $list -> create_time;?></td>
                <td><?php echo $list -> last_login_time;?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="...">
                        <button type="button" class="btn btn-warnning">启动</button>
                        <button type="button" class="btn btn-info">编辑</button>
                        <button type="button" class="btn btn-danger">删除</button>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</div>