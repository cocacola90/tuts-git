<?php echo $this->Html->script('mootools-more');?>
<?php echo $this->Html->css('faq');?>   
<script>
jQuery(document).ready(function () {
	
	if(window.ie6) var heightValue='100%';
	else var heightValue='';
	
	var togglerName='div.accordion_toggler_';
	var contentName='div.accordion_content_';
	
	var acc_elem = null;
	var acc_toggle = null;
	
	var counter=1;	
	var toggler=$$(togglerName+counter);
	var content=$$(contentName+counter);
	
	while(toggler.length>0)
	{
		// Accordion anwenden
		new Accordion(toggler, content, {
		opacity: false,
		alwaysHide: true,
		display: -1,
		onActive: function(toggler, content) {
				acc_elem = content;
				acc_toggle = toggler;
			},
			onBackground: function(toggler, content) {
			},
			onComplete: function(){
				var element=jQuery(this.elements[this.previous]);
				if(element && element.offsetHeight>0) element.setStyle('height', heightValue);			

				if (!acc_elem)
					return;

				var  scroll =  new Fx.Scroll(window,  { 
					wait: false, 
					duration: 250, 
					transition: Fx.Transitions.Quad.easeInOut
				}); 
			
				var window_top = window.pageYOffset;
				var window_bottom = window_top + window.innerHeight;
				var elem_top = acc_toggle.getPosition().y;
				var elem_bottom = elem_top + acc_elem.offsetHeight + acc_toggle.offsetHeight;

				// is element off the top of the displayed windows??
				if (elem_top < window_top)
				{
					scroll.start(window.pageXOffset,acc_toggle.getPosition().y);
				} else if (elem_bottom > window_bottom)
				{
					var howmuch = elem_bottom - window_bottom;
					if (elem_top - howmuch > 0)
					{
						scroll.start(window.pageXOffset,window_top + howmuch + 22);				
					} else {
						scroll.start(window.pageXOffset,acc_toggle.getPosition().y);
					}
				}
			}
		});
		
		counter++;
		toggler=$$(togglerName+counter);
		content=$$(contentName+counter);
	}
});
</script>
<div class="banner-breadcrumb">		
	<div class="container">
		<div class="inner-wrap">						
			<div class="pathway row-fluid">
			<ul class="breadcrumb span12">
			<li><a href="/en/" class="pathway">Home</a></li>
				<img src="/theme/Volga/templates/vp_supermart/images/arrow_item.gif" class="breadcrumbs-separator" alt="separator">
		
			<li class="active">All FAQs</li>	
			</ul>
			</div>	
		</div>		
	</div>	
</div>
<div class="main-wrap">
<div id="main-site" class="container">
<div class="inner-wrap">
					
									
<div class="row-fluid">
						
<div class="span9 main-column">
				
<div id="system-message-container">
</div>
<style>
.fsf_main tr, td 
{
	border: none;
	padding: 1px;
}
</style>
<div class='fsf_main'>
<h1>Frequently Asked Questions - All FAQs</h1>
	<tr>
		<td width="100%" class="fsf_faq_cat_col_first" valign="top">   
			<div class="faq_category">
	    		<div class="faq_category_image">
	    			<?php echo $this->Html->image('search.png',array('width'=>'64','height' => '64'));?>
	    		</div>
				<div class="faq_category_head" style="padding-top:6px;padding-bottom:6px;">
										Search FAQs									</div>
				<form method="POST" onsubmit="doFaqSearch(); return false;">
					<input name="searchword" id="txtfaqsearch" value="">
					<input type="submit" class="button" value="Search" onclick="doFaqSearch(); return false;">
				</form>
				 <script type="text/javascript">
                                function doFaqSearch() {
                                    var keyword = document.getElementById('txtfaqsearch');

                                    var sURL = '';

                                    if (keyword.value.length < 2) {
                                        alert('Từ khóa phải nhiều hơn 1 ký tự.', 'Thông báo');
                                        return;
                                    }
                                    else if (keyword.value != 'Từ khóa tìm kiếm...') sURL += ((sURL == '') ? '' : '&') + 'keyword=' + keyword.value;
                                    //if (cate.value > 0) sURL += ((sURL == '') ? '' : '&') + 'cate=' + cate.value;

                                    window.location.href = '/faq_search/p?' + sURL;
                                }
                            </script>
			</div>
			<div class="faq_category_faqlist"></div>
			</td>
	</tr>
<div class="fsf_spacer"></div>
	<div class='faq_category'>
		<div class='faq_category_image'>
			<?php echo $this->Html->image('allfaqs.png',array('width'=>'64','height'=>'64'));?>
		</div>
	    <div class='fsf_spacer contentheading' style="padding-top:6px;padding-bottom:6px;">
			FAQs - All FAQs
		</div>
		<div class='faq_category_desc'></div>
	</div>
	<div class='fsf_clear'></div>
	

		
	
	<div class='fsf_faqs' id='fsf_faqs'>
		<?php if($faqs):?>
			<?php foreach($faqs as $faq):?>
			<div class='fsf_faq'>
				<div class="fsf_faq_question  accordion_toggler_1" style='cursor: pointer;'>
					<a class='fsf_highlight' href="#" onclick='return false;'><?php echo $faq['Post']['title'];?></a>
				</div>
				<div class='fsf_faq_answer accordion_content_1'>
				<?php echo $faq['Post']['content'];?>
				</div>
			</div>
			<?php endforeach;?>
		<?php endif;?>
	</div>

</div>


<!--  -->
</div>	
				<div class="span3 right-mod">
					<div class="moduletable cont">
					<div class="mods">
					<div class="bghelper">
								<h3>Contact Us</h3>
							<div class="modulcontent">
					<div class="customcont"  >
					<p><a href="/contacts">Send us a Message</a></p>
					<p><a href="/submit-testimonial">Submit Testimonial</a></p></div>
					</div>
					</div>
					</div>
					</div>				
				</div>					
			</div>			
		</div>							
	</div>
</div>
			