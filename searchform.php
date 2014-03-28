<div class="search-form">
	<form action="<?php echo home_url( '/' ); ?>" method="get">
	    <fieldset>
			<div class="clearfix">
					<input type="text" name="s" id="search" placeholder="<?php _e("Search"); ?>" value="<?php the_search_query(); ?>" />
					<button type="submit" title="Search" class="button">
					<span class="icon-search">
				
					</span>
					</button>
	<!-- 				<button type="submit" class="btn btn-primary"><?php _e("Search..."); ?></button>
	 -->        </div>
	    </fieldset>
	</form>
</div>