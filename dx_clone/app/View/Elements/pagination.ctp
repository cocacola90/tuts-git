
<div class="main-pagination">
   
        <?php
        echo $this->Paginator->first('First', array('escape' => false, 'tag' => 'a'), null, array('escape' => false, 'tag' => 'a', 'class' => '', 'disabledTag' => 'span'));
        echo $this->Paginator->prev('«', array('escape' => false, 'tag' => 'a'), null, array('escape' => false, 'tag' => 'a', 'class' => '', 'disabledTag' => 'span'));
        echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'span', 'currentClass' => 'current', 'tag' => 'a', 'modulus' => 5));
        echo $this->Paginator->next('»', array('escape' => false, 'tag' => 'a', 'currentClass' => 'disabled'), null, array('escape' => false, 'tag' => 'a', 'class' => '', 'disabledTag' => 'span'));
        echo $this->Paginator->last('Last', array('escape' => false, 'tag' => 'a'), null, array('escape' => false, 'tag' => 'a', 'class' => '', 'disabledTag' => 'span'));
        ?>

</div>

<style type="text/css">
	*{
		padding: 0px;
		margin : 0px;
	}

	.main-pagination {
	    padding : 50px 0px 0px 210px;
		margin: 0 auto 15px;
		
		overflow: auto;
	}
	.main-pagination {
		overflow: hidden;
	}
	.main-pagination .page-numbers, .main-pagination a {
		background: none repeat scroll 0 0 #ebebeb;
		color: #676767;
		display: block;
		float: left;
		font-size: 13px;
		line-height: 25px;
		margin-right: 5px;
		padding: 0 10px;
	}
	.main-pagination .current, .main-pagination a:hover {
		background: none repeat scroll 0 0 #e54e53;
		color: #fff;
		text-decoration: none;
	}
	.visuallyhidden {
		border: 0 none;
		clip: rect(0px, 0px, 0px, 0px);
		height: 1px;
		margin: -1px;
		overflow: hidden;
		padding: 0;
		position: absolute;
		width: 1px;
	}
	.main-featured .cat, .main-featured .pages .flex-active, .rate-number .progress, .highlights .rate-number .progress, .main-pagination .current, .main-pagination a:hover, .cat-title, .sc-button-default:hover, .drop-caps, .review-box .bar, .review-box .overall, .listing-alt .content .read-more a, .button, .post-pagination > span {
		background: none repeat scroll 0 0 #00469d;
	}
	</style>