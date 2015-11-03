
  <div class="jumbotron">
    <h3><i class="fa fa-gear"></i> Instalador</h3>
    <h4>Proporcione los datos para configurar el sistema</h4>
    <div style="height:70px;"></div>
    <form method="post" action="instalador" class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label">Hostname:</label>
			<div class="col-sm-8 <?php if(form_error('hostname')!='') echo 'has-error';?>">
				<input type="text" name="hostname" class="form-control" placeholder="localhost" value="<?php echo set_value('hostname')?>">
				<?php echo form_error('hostname'); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Username:</label>	
			<div class="col-sm-8 <?php if(form_error('username')!='') echo 'has-error';?>">
				<input type="text" name="username" class="form-control" placeholder="root" value="<?php echo set_value('username');?>"></input>
				<?php echo form_error('username'); ?>
			</div>	
		</div> 
		<div class="form-group">
			<label class="col-sm-2 control-label">Password:</label>	
			<div class="col-sm-8 <?php if(form_error('password')!='') echo 'has-error';?>">
				<input type="password" name="password" class="form-control" placeholder="********"></input>
				<?php echo form_error('password'); ?>
			</div>	
		</div> 
		<div class="form-group">
			<label class="col-sm-2 control-label">Database Name:</label>	
			<div class="col-sm-8 <?php if(form_error('database_name')!='') echo 'has-error';?>">
				<input type="text" name="database_name" class="form-control" placeholder="my_database" value="<?php echo set_value('database_name');?>"></input>
				<?php echo form_error('database_name'); ?>
			</div>	
		</div> 
		<div class="form-group">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" class="btn btn-success btn-lg btn-block">Instalar</button>
			</div>
		</div>   
    </form>
  </div>