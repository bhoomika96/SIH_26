        <section id="page" class="body">
            
            <section id="datadisks" class="body">
                <div class="tabs">
                    <ul>
                        <li class="active"><a href="#tabs-1">All Computers <span class="lightertext">(<?php echo $all_count;?>)</span></a></li>
                        <li><a data-follow="true" href="<?php echo $this->config->item("base_url");?>index.php/servers/add_server/">Add New</a></li>
                    </ul>
                    <div class="tab_container">
                        <div class="addontab" id="tabs-1">
                            <div class="inner transition hidescale showscale">
                                <!-- all disks -->
                                <?php echo $all_list; ?>
                                
                            </div>
                        </div>
                        <div class="addontab" id="tabs-2">
                            <div class="inner transition hidescale">
                                <!-- options -->
                                <?php //echo $narray_list; ?>
                            </div>
                        </div>
                    </div>
                </div>
            
            </section>
            
            

            
            <div class="hr"></div>
        </section>
 