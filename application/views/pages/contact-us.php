<div class="container">


        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-md-8">
                <!-- Embedded Google Map -->
				<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:700px;'><div id='gmap_canvas' style='height:440px;width:700px;'></div><div><small><a href="http://www.googlemapsgenerator.com/en/">Embed a google map onto your website!									Use our map embed tool									Visit our website</a></small></div><div><small><a href="http://mrdiscountcode.hk/airasiago/">Check out our up-to-date discount code</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(14.614117,120.979062),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(14.614117,120.979062)});infowindow = new google.maps.InfoWindow({content:'<strong>Ex-Bataan Veterans Security Agency</strong><br>1730 Yakal St, Tondo, Manila, Metro Manila<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
            </div>
            <!-- Contact Details Column -->
			<img src="<?php echo site_url('assets/img/app/EBVSAILogoFull.png'); ?>" alt="Ex-Bataan Logo" style="width:200px;height:200px;" class="navbar-brand" href="index.html">
            <div class="col-md-4">
                <h3>Contact Details</h3>
                <p>
                    1730 Yakal St, Tondo,<br>Manila, Metro Manila<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">P</abbr>: 251-9329</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="WalaPaPoEh@BakaGmail.com">ebvsaisecdept@gmail.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">H</abbr>: Monday - Saturday: 7:00 AM <br>to 11:00 PM</p>
                <ul class="list-unstyled list-inline list-social-icons">
                    <li>
                        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
						<a href="#"><i class="fa fa-instagram fa-2x"></i></a>
						<a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>