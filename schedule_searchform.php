<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<div class="row">
	<div class="col-md-12">
		<div class="row card" style="padding-top: 1%;padding-bottom: 1%;">
			<div class="col-md-6 col-md-offset-3 connected">
            <form id="form" action="<?php echo url('/schedules/view');?>" method="post">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Departure</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Arrival</a></li>
                        <li><a href="#tab_3" data-toggle="tab">Aircraft</a></li>
                        <li><a href="#tab_4" data-toggle="tab">Distance</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <p>Select your departure airport:</p>
                            <div class="form-group">
                                <select id="depicao" name="depicao" class="form-control">
                                <option value="">Select All</option>
                                <?php
								if(!$depairports) $depairports = array();
								foreach($depairports as $airport)
								{
									echo '<option value="'.$airport->icao.'">'.$airport->icao
											.' ('.$airport->name.')</option>';
								}
                                ?>

                                </select>
                            </div>
                            <input type="submit" name="submit" value="Search" class="btn btn-flat btn-primary" />
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <p>Select your arrival airport:</p>
                            <div class="form-group">
                                <select id="arricao" name="arricao" class="form-control">
                                <option value="">Select All</option>
                                <?php
								if(!$depairports) $depairports = array();
								foreach($depairports as $airport)
								{
									echo '<option value="'.$airport->icao.'">'.$airport->icao
											.' ('.$airport->name.')</option>';
								}
                                ?>

                                </select>
                            </div>
                            <input type="submit" name="submit" value="Search" class="btn btn-flat btn-primary" />
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <p>Select aircraft:</p>
                            <div class="form-group">
                                <select id="equipment" name="equipment" class="form-control">
                                <option value="">Select equipment</option>
                                <?php
								if(!$equipment) $equipment = array();
								foreach($equipment as $equip)
								{
									echo '<option value="'.$equip->name.'">'.$equip->name.'</option>';
								}
                                ?>
                                </select>
                            </div>
                            <input type="submit" name="submit" value="Search" class="btn btn-flat btn-primary" />
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_4">
                            <p>Select Distance:</p>
                            <div class="form-group">
                                <select id="type" name="type" class="form-control">
                                    <option value="greater">Greater Than</option>
                                    <option value="less">Less Than</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="distance" value="" class="form-control" />
                            </div>
                            <input type="submit" name="submit" value="Search" class="btn btn-flat btn-primary" />
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            <p>
                <input type="hidden" name="action" value="findflight" />

        </div>
		</div>
	</div>
</div>