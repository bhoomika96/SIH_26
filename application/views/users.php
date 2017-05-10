        <section id="page" class="body">            
            <?php echo $this->session->flashdata('message'); ?>
            <section id="datadisks" class="body">
                <div class="tabs">
                    <ul>
                        <li class="active"><a href="#tabs-1">All users <span class="lightertext">(<?php echo $user_count;?>)</span></a></li>
                        <li><a data-follow="true" href="<?php echo $this->config->item("base_url");?>index.php/users/add_user/">Add New</a></li>
                    </ul>
                    <div class="tab_container">
                        <div class="addontab" id="tabs-1">
                            <div class="inner transition hidescale showscale">
                                <!-- items needing attention -->
								<?php echo $all_users; ?>
                            </div>
                        </div>
                    </div>
                </div>
            
            </section>
             
            

            
            <div class="hr"></div>
        </section>
