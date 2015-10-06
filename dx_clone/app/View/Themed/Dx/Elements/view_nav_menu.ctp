<nav class="navbar navbar-default">
  <div class="container">    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Home</a>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<div class="row">
      <ul id="menu_horizontal" class="nav navbar-nav navbar-right">
        <li><a href="#">MVP 24hrs</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Top Sellers</a></li>
        <li><a href="#">$0.99</a></li>
        <li><a href="#">New Arrivals</a></li>
	 
      </ul>
	  </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container" id="page_product">
    <div id="page_menu">
        <div class="title_menu">ALL DEPARTMENTS</div>
        <ul id="show_page_menu">
		<?php $categories = $this->requestAction('/categories/load_all_categories');?>
		<?php if(isset($categories)):?>
		    <?php foreach($categories as $c):?>
            <li>
				<?php
					echo $this->Html->link(
                         $c['Category']['name'],
                         array(
                         'controller' => 'categories',
                         'action' => 'index',
                         'category' => $c['Category']['slug'],
                         'ext' => 'html'
                        )
					);
                ?>
			</li>
            <?php endforeach;?>
		<?php endif;?>
        </ul>
    </div>
</div>