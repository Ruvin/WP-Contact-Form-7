// Contact form 7
function ContactForm7_popup() {
	$return = <<<EOT
	<script>
		jQuery(".wpcf7-form input[type='submit'], .wpcf7-form button").click(function(event) {
			jQuery( document ).one( "ajaxComplete", function(event, xhr, settings) {
				var data = xhr.responseText;
				var jsonResponse = JSON.parse(data);
				// console.log(jsonResponse);
				if(! jsonResponse.hasOwnProperty('into') || $('.wpcf7' + jsonResponse.into).length === 0) return;
				// alert(jsonResponse.message);
				$.fancybox.open(
					'<div class="message">' + jsonResponse.message + '</div>',
					{
						smallBtn : true,
						toolbar : false
					}
				);


//document.getElementById("myForm").reset();
$( '.wpcf7-form' ).each(function(){
    this.reset();
});
			});
		});
	</script>
	<style>
		div.wpcf7-response-output, div.wpcf7-validation-errors { display: none !important; }
		span.wpcf7-not-valid-tip { display: none; }
		input[aria-invalid="true"], select[aria-invalid="true"] {
			border-color: #ff2c00;
			// background-color: rgba(153,0,0,0.3);
		 }
	</style>

EOT;
	echo $return;
}
add_action('wp_footer', 'ContactForm7_popup', 20);
