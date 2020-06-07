<?php 
$dailydist = file_get_contents('https://api.covid19india.org/districts_daily.json');
$dailydist = json_decode($dailydist, true)['districtsDaily'][$name];

//var_dump($dailydist['districtsDaily'][$name]);
?>
    <div class="row py-5">
    <div class="col-auto mx-auto">
    <div style="margin-top: 10px; margin-bottom: 0px;" class="form-group pull-right col-lg-4">
      <input type="text" class="bg-light text-dark search" style="border: 1px solid #aaa; height: 40px; width: 100%; border-radius: 10px;" placeholder="Search by typing here.." />
      </div>
    <span class="counter pull-right"></span>
      <div class="card rounded shadow border-0" style="max-height: 800px; overflow: scroll;">
          <div class="table-responsive results">
    <table id="example" style="width:100%" class="table table-striped table-bordered">
              <thead class="bill-header cs">
                <tr>
                <th></th>
                <th>Confirmed</th>
                <th>Active</th>
                <th>Recovered</th>
                <th>Deceased</th> 
                </tr>
              </thead>
              <tr class="warning no-result">
                  <td colspan="12"><i class="fa fa-warning"></i>  No Result !!!</td>
              </tr>
              <?php
              $count = count($dailydist[$Key]);
            foreach( $state[districtData] as $Key => $District){
              //var_dump($dailydist[$Key]);              
              $dc = ($District[$count-1]['confirmed'])-($District[($count-2)]['confirmed']);
              $da = $dailydist[$Key][$count-1]['active']-$dailydist[$Key][($count-2)]['active'];
              $dr = $dailydist[$Key][$count-1]['recovered']-$dailydist[$Key][($count-2)]['recovered'];
              $dd = $dailydist[$Key][$count-1]['deceased']-$dailydist[$Key][($count-2)]['deceased'];
            ?>
            <tr>
            <div class=row><td><?= $Key?></td>
                <td><div class="col-auto"><?php if($dc){ ?><span class="row" style="font-size: smaller; font-weight: 700; color: #ed3838;">↑ <?= $dc?></span><?php }?><span class="row"><?= $District[confirmed] ?></span></div></td>
                <td><div class="col-auto"><?php if($da>0){ ?>
                    <span class="row" style="font-size: smaller; font-weight: 700; color: #1579f6;">↑ <?=$da?> </span><?php }?>
                    <?php if($da<0){ ?><span class="row" style="font-size: smaller; font-weight: 700; color: #1579f6;">↓ <?=abs($da)?> </span><?php }?>
                    <span class="row"><?= $District[active] ?></span></div></td>
                <td><div class="col-auto"><?php if($dr){ ?><span class="row" style="font-size: smaller; font-weight: 700; color: #4ca746;">↑ <?=$dr?> </span><?php }?><span class="row"><?= $District[recovered] ?></span></div></td>
                <td><div class="col-auto"><?php if($dd){ ?><span class="row" style="font-size: smaller; font-weight: 700; color: #6c757c;">↑ <?=$dd?> </span><?php }?><span class="row"><?= $District[deceased] ?></span></div></td></div>                                
            </tr>
            <?php
                }
            ?>
            </table>
              
              </div>
              </div>
              </div>
              


