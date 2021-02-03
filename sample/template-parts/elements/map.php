<div id="map-block" class="map-block">
  <div class="map-title">
    <div data-aos="fade-up" class="line-title double">
      <h2 class="l-title"><?php print $template_data['fields']['map']['title']?></h2>
      <div data-aos="fade-left" class="l-subtitle"><?php print $template_data['fields']['map']['subtitle']?></div>
    </div>
  </div>
  <div id="map"></div>
  <div id="map-popup">
    <div class="p-logo"></div>
    <div class="p-address"><?php print $template_data['fields']['map']['address']?></div>
    <div class="p-phone"><?php print $template_data['fields']['map']['phone']?></div>
    <div class="triangle-wrapper"><div class="triangle"></div></div>
  </div>
  <script>    
    function petrosoftInitMap() {
      var map;
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: <?php print $template_data['fields']['map']['coordinates']['lat']?>, lng: <?php print $template_data['fields']['map']['coordinates']['lng']?>},
        zoom: 16,
        disableDefaultUI: true,
        zoomControl: true,
      });
      var Popup = petrosoftCreateMapPopupClass();
      var popup = new Popup(
          new google.maps.LatLng(<?php print $template_data['fields']['map']['coordinates']['lat']?>, <?php print $template_data['fields']['map']['coordinates']['lng']?>),
          document.getElementById('map-popup'));
      popup.setMap(map);
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWsc79iyGXBkxawdi3FYe9xpPBWAI2DlM&callback=petrosoftInitMap"
  async defer></script>
</div>
