<div style="margin-top:100px;"></div>
<div class="row">
	<div class="col-xs-6 col-xs-offset-6 col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-8">
		<div class="panel panel-info">
			<div class="panel-heading">
				<i class="fa fa-sign-in"></i>  Login
			</div>
			<div class="panel-body">
			<form method='post' action='<?php echo base_url();?>ctrl_access'>
			  <div class="form-group <?php if(form_error('username') != '') echo 'has-error';?>">
			    <label for="username">Nombre de Usuario</label>
			    <input name="username" type="text" class="form-control" id="username" placeholder="Nombre de Usuario" value="<?php echo set_value('username');?>">
			    <?php echo form_error('username');?>
			  </div>
			  <div class="form-group <?php if(form_error('username') != '') echo 'has-error';?>">
			    <label for="password">Password</label>
			    <input name="password" type="password" class="form-control" id="password" placeholder="**********">
			    <?php echo form_error('password');?>
			  </div>
			  <button type="submit" class="btn btn-success">Login</button>
			</form>
			</div>
		</div>
	</div>
</div>