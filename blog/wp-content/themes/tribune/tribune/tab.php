<div class="clear"></div>
        <div id="tabzine" class="widgets">

            <ul class="tabnav">
                <li class="pop"><a href="#popular">  </a></li>
                <li class="fea"><a href="#archive">  </a></li>
				<li class="rec"><a href=" #recent">  </a></li>
            </ul>

            <div id="popular" class="tabdiv">

              <ul>
  
		 <?php if(function_exists('akpc_most_popular')) { akpc_most_popular(); } ?>
         </ul>

            </div><!--/popular-->
            
           
            
            <div id="archive" class="tabdiv">
         	<ul>
				<?php wp_get_archives('type=monthly&limit=12'); ?>
			</ul>
            </div><!--featured-->
			
			 <div id="recent" class="tabdiv">
              
			    	<ul>  
		<?php get_archives('postbypost', 8); ?>
			  		</ul>
            </div><!--/recent-->

        </div><!--/widget-->