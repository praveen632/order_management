<div class="row">
  <div class="col s12 m12 l12">
    <h5 class="breadcrumbs-title">Tableau de Bord</h5>
    <!--<ol class="breadcrumbs">
        <li><a href="index.html">Dashboard</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Basic Tables</li>
    </ol>-->
  </div>
</div>
<div class="row">
  <div class="col s12 m12 l12">
    <div class="card-panel">
        Welcome...
    </div>
  </div>
</div>
<?php if(isset($_SESSION['user_data']) && $_SESSION['user_data']['role_id']==1) { ?>

<div class="row">
  <div class="col s12 m12 l12">
    <div class="card-panel">
      <h4 class="header2"><?php echo $ln_client_list;?></h4>
        <table id="data-table-menu" class="responsive-table display" cellspacing="0">
          <thead>
              <tr>
                  <th><?php echo $ln_client_id;?></th>
                  <th><?php echo $ln_client_name;?></th>
                  <th><?php echo $ln_status;?></th>
                  <th><?php echo $ln_action;?></th>
              </tr>
          </thead>
       
          <tfoot>
              <tr>
                  <th><?php echo $ln_client_id;?></th>
                  <th><?php echo $ln_client_name;?></th>
                  <th><?php echo $ln_status;?></th>
                  <th><?php echo $ln_action;?></th>
              </tr>
          </tfoot>
       
          <tbody>
            <?php 
			
            if($clientList){
              foreach($clientList as $val){
            ?>
              <tr>
                  <td><?php echo($val['client_id']); ?></td>
                  <td><?php echo($val['client_name']); ?></td>
                  <td><?php echo($val['status'] == 1 ? $ln_active : $ln_inactive); ?></td>
                  <td>
                    <a href="client-login.php?client_id=<?php echo($val['client_id']); ?>" class="btn waves-effect waves-light  cyan darken-2"><?php echo $ln_customer_area;?></a>
					<a href="client-login.php?client_permission=1&client_id=<?php echo($val['client_id']); ?>" title="Paramétrage du module client" alt="Paramétrage du module client" class="btn-floating"><i class="mdi-action-settings-display"></i></a>
                  </td>
              </tr>
            <?php 
              }
            } 
            ?>  
          </tbody>
        </table>
    </div>
  </div>
</div>
<?php } ?>