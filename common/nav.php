<?php
$script_name = $_SERVER['SCRIPT_NAME'];
$current_page = explode("/", $script_name);
$current_page = end($current_page);
$menuArray = array('menu.php','menu-hierarchy.php','menu-save.php');
$sliderArray = array('slider.php','slider-save.php');
$iconArray = array('icon.php','icon-save.php');
$galleryArray = array('gallery.php','gallery-save.php','gallery-cat.php','gallery-cat-save.php');
$carrouselArray = array('carrousel.php','carrousel-save.php');
$elementArray = array('element.php','element-save.php');
$testimonialArray = array('testimonial.php','testimonial-save.php');
$pageArray = array('page.php','page-save.php');
$element2Array = array('element2.php','element2-save.php');
$permissionArray = array('permission.php','permission-save.php');
$priceArray = array('price.php','price-save.php','price-cat.php','price-cat-save.php','price-element.php','price-element-save.php');
$newsArray = array('news.php','news-save.php','news-cat.php','news-cat-save.php');
?>
<!-- START LEFT SIDEBAR NAV-->
<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="<?php echo(WWW_IMAGE_PATH); ?>avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="mdi-hardware-keyboard-tab"></i> <?php echo $ln_logout;?></a></li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php //echo isset($_SESSION['user_data']['first_name']) ? $_SESSION['user_data']['first_name']: ''?>Admin<i class="mdi-navigation-arrow-drop-down right"></i></a>
                     
                </div>
            </div>
        </li>
        <li class="bold <?php echo ($current_page =='index.php') ? 'active' :'';?>">
            <a href="index.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Tableau de Bord</a>
        </li>
		<?php if(isset($_SESSION['user_data']) && $_SESSION['user_data']['role_id']==1) { ?>
		<li class="bold <?php echo (in_array($current_page,$permissionArray)) ? 'active' :''; ?>">
            <a href="permission.php" class="waves-effect waves-cyan"><i class="mdi-action-view-module"></i> <?php echo $ln_permission;?></a>
        </li>
		<?php } ?>
        <?php if($_SESSION['user_data']['client_id']>0) { ?>
			<?php if(in_array('menu-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
					<li class="bold <?php echo (in_array($current_page,$menuArray)) ? 'active' :''; ?>"><a class="collapsible-header waves-effect waves-cyan <?php echo (in_array($current_page,$menuArray)) ? 'active' :''; ?>"><i class="mdi-action-view-carousel"></i> Menu</a>
						<div class="collapsible-body">
							<ul>
								<?php if(in_array('menu-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
								<li class="<?php echo ($current_page =='menu.php' || $current_page =='menu-save.php') ? 'active' :'';?>"><a href="menu.php" class="waves-effect waves-cyan"><i class="mdi-av-queue"></i> Menu</a></li>
								<?php } ?>
								<?php if(in_array('order-menu',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
								<li class="<?php echo ($current_page =='menu-hierarchy.php') ? 'active' :'';?>"><a href="menu-hierarchy.php" class="waves-effect waves-cyan"><i class="mdi-av-queue"></i> Ordre menu</a></li>
								<?php } ?>
							</ul>
						</div>
					</li>
				</ul>
			</li>
		<?php } ?>
		<?php if(in_array('page-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
			<li class="bold <?php echo (in_array($current_page,$pageArray)) ? 'active' :''; ?>">
				<a href="page.php" class="waves-effect waves-cyan"><i class="mdi-content-content-copy"></i> Pages</a>
			</li>
        <?php } ?>
		<?php if(in_array('slider-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
			<li class="bold <?php echo (in_array($current_page,$sliderArray)) ? 'active' :''; ?>">
				<a href="slider.php" class="waves-effect waves-cyan"><i class="mdi-communication-clear-all"></i> Bannière</a>
			</li>
        <?php } ?>
		<?php if(in_array('icon-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
			<li class="bold <?php echo (in_array($current_page,$iconArray)) ? 'active' :''; ?>">
				<a href="icon.php" class="waves-effect waves-cyan"><i class="mdi-image-hdr-weak"></i> Icônes</a>
			</li>
		<?php } ?>
        <?php if(in_array('gallery-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
					<li class="bold <?php echo (in_array($current_page,$galleryArray)) ? 'active' :''; ?>"><a class="collapsible-header waves-effect waves-cyan <?php echo (in_array($current_page,$galleryArray)) ? 'active' :''; ?>"><i class="mdi-av-playlist-add"></i> Galerie photos</a>
						<div class="collapsible-body">
							<ul>
								<li class="<?php echo ($current_page =='gallery-save.php' || $current_page =='gallery.php') ? 'active' :''; ?>"><a href="gallery.php" class="waves-effect waves-cyan"><i class="mdi-av-queue"></i> Galerie photos</a></li>
								<?php if(in_array('gallery-category-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
									<li class="<?php echo ($current_page =='gallery-cat-save.php' || $current_page =='gallery-cat.php') ? 'active' :''; ?>"><a href="gallery-cat.php" class="waves-effect waves-cyan"><i class="mdi-av-queue"></i> <?php echo $ln_galleryCategory;?></a></li>
								<?php } ?>
							</ul>
						</div>
					</li>
				</ul>
			</li>
        <?php } ?>
                
		<?php if(in_array('carrousel-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
			<li class="bold <?php echo (in_array($current_page,$carrouselArray)) ? 'active' :''; ?>">
				<a href="carrousel.php" class="waves-effect waves-cyan"><i class="mdi-navigation-more-horiz"></i> <?php echo $ln_carrousel;?></a>
			</li>
        <?php } ?>
		<?php if(in_array('elements-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
			<li class="bold <?php echo (in_array($current_page,$elementArray)) ? 'active' :''; ?>">
				<a href="element.php" class="waves-effect waves-cyan"><i class="mdi-action-label-outline"></i> Elements</a>
			</li>
		<?php } ?>
		<?php if(in_array('elements2-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
			<li class="bold <?php echo (in_array($current_page,$element2Array)) ? 'active' :''; ?>">
				<a href="element2.php" class="waves-effect waves-cyan"><i class="mdi-action-label-outline"></i> Elements2</a>
			</li>
        <?php } ?>
		<?php if(in_array('testimonial-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
			<li class="bold <?php echo (in_array($current_page,$testimonialArray)) ? 'active' :''; ?>">
				<a href="testimonial.php" class="waves-effect waves-cyan"><i class="mdi-editor-insert-comment"></i> Témoignages</a>
			</li>
        <?php } ?>
                        
                  
        <?php if(in_array('price-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
            <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                            <li class="bold <?php echo (in_array($current_page,$priceArray)) ? 'active' :''; ?>"><a class="collapsible-header waves-effect waves-cyan <?php echo (in_array($current_page,$priceArray)) ? 'active' :''; ?>"><i class="mdi-av-playlist-add"></i> Prix</a>
                                    <div class="collapsible-body">
                                            <ul>
                                                    <li class="<?php echo ($current_page =='price-save.php' || $current_page =='price.php') ? 'active' :''; ?>"><a href="price.php" class="waves-effect waves-cyan"><i class="mdi-av-queue"></i> Prix ​​principal</a></li>
                                                    <?php if(in_array('price-category-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
                                                            <li class="<?php echo ($current_page =='price-cat-save.php' || $current_page =='price-cat.php') ? 'active' :''; ?>"><a href="price-cat.php" class="waves-effect waves-cyan"><i class="mdi-av-queue"></i> <?php echo $ln_priceCategory;?></a></li>
                                                    <?php } ?>
                                                    <?php if(in_array('price-element-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
                                                            <li class="<?php echo ($current_page =='price-element-save.php' || $current_page =='price-element.php') ? 'active' :''; ?>"><a href="price-element.php" class="waves-effect waves-cyan"><i class="mdi-av-queue"></i> Éléments</a></li>
                                                    <?php } ?>
                                            </ul>
                                    </div>
                            </li>
                    </ul>
            </li>
        <?php } ?>

			<?php if(in_array('news-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
            <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                            <li class="bold <?php echo (in_array($current_page,$newsArray)) ? 'active' :''; ?>"><a class="collapsible-header waves-effect waves-cyan <?php echo (in_array($current_page,$newsArray)) ? 'active' :''; ?>"><i class="mdi-av-playlist-add"></i> <?php echo $ln_news;?></a>
                                    <div class="collapsible-body">
                                            <ul>
                                                    <li class="<?php echo ($current_page =='news-save.php' || $current_page =='news.php') ? 'active' :''; ?>"><a href="news.php" class="waves-effect waves-cyan"><i class="mdi-av-queue"></i> <?php echo $ln_news;?></a></li>
                                                    <?php if(in_array('news-category-module',$_SESSION['user_data']['permission']) || $_SESSION['user_data']['role_id']==1)  { ?>
                                                            <li class="<?php echo ($current_page =='news-cat-save.php' || $current_page =='news-cat.php') ? 'active' :''; ?>"><a href="news-cat.php" class="waves-effect waves-cyan"><i class="mdi-av-queue"></i> <?php echo $ln_newsCategory;?></a></li>
                                                    <?php } ?>
												
                                                    
                                            </ul>
                                    </div>
                            </li>
                    </ul>
            </li>
        <?php } ?> 
            
            <li class="bold">
                <a href="#">&nbsp;</a>
            </li>
            <li class="bold">
                <a href="#">&nbsp;</a>
            </li>
            
            
        <?php } ?>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
</aside>
<!-- END LEFT SIDEBAR NAV-->
