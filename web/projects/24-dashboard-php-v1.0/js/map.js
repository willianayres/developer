$(()=>{
	//Variables.
	var map;
	var map_page = 'contato';
	// Function to initialize the map:
	// Set the map proprieties: center(lat,long); zoom; scroll to change the zoom; saturation >
	// Then set the map type, the put all the information inside the map var to show on page.
	function init(){
		var mapProp = {
			center:new google.maps.LatLng(-25.42289848,-49.20279622),
			zoom:14,
			scrollwheel:false,
			styles:[{
				stylers:[{
					saturation:-100
				}]
			}],
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(document.getElementById("map"),mapProp);
	}
	// Function to add a marker on the map:
	function addMarker(lat,long,icon,content,showInfoWindow,openInfoWindow){
		// Set the cordinates.
		var myLatLng = {lat:lat,lng:long};
		// Check if there's no marker.
		if(icon === ''){
			var marker = new google.maps.Marker({
				position:myLatLng,
				map:map,
				icon:icon
			});
		// If there is one, update it.
		}else{
			var marker = new google.maps.Marker({
				position:myLatLng,
				map:map,
				icon:icon
			});
		}
		// Set the info of the marker.
		var infoWindow = new google.maps.InfoWindow({
			content:content,
			maxWidth:200
		});
		// Set the css proprieties of the marker.
		google.maps.event.addListener(infoWindow,'domready',function(){
			// Reference to the DIV which receives the contents of the infowindow using JQuery.
			var iwOuter = $('.gm-style-iw');
			// The DIV we want to change is above the .gm-style-iw DIV >
			// So, we use jQuery and create a iwBackground variable >
			// and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
			var iwBackground = iwOuter.prev();
			// Remove the background shadow DIV.
			iwBackground.children(':nth-child(2)').css({'background':'rgb(255,255,255)'}).css({'border-radius':'0px'});
			// Remove the white background DIV.
			iwBackground.children(':nth-child(4)').css({'background':'rgb(255,255,255)'}).css({'border-radius':'0px'});
			// Moves the shadow of the arrow 76px to the left margin.
			iwBackground.children(':nth-child(1)').attr('style',function(i,s){return s+'display:none;'});
			// Moves the arrow 76px to the left margin.
			iwBackground.children(':nth-child(3)').attr('style',function(i,s){return s+'display:none;'});
		});
		// If the marker is still undefined, set a event to click and open it.
		if(showInfoWindow == undefined){
			google.maps.event.addListener(marker,'click',()=>{
				infoWindow.open(map,marker);
			});
		}else if(openInfoWindow == true)
			infoWindow.open(map,marker);
	}
	// Function to load a page in without redirecting the page:
	// First, get the button clicked on menu that has the atributte 'realtime' >
	// Then, load the page respective to that button.
	function loadRealtime(){	
		$('[realtime]').click(function(){
			var page = $(this).attr('realtime');
			load(page);
			return false;
		});
	}
	// Function to load a page:
	// Get the main container > Hide it > Load the correct page > Check if it's the contact page >
	// If it's, then init the map and set a marker > Show the main container updated and set the url.
	function load(page){
		let div = $('.container');
		div.hide();
		div.load(include_path+'pages/'+page+'.php');
		if(page == map_page){
			setTimeout(()=>{
				init();
				addMarker(-25.42289848,-49.20279622,'',"Minha casa",undefined,false);
			},1000);
		}
		div.fadeIn(1000);
		window.history.pushState('','',page);
	}
	// Run the function to load in realtime.
	loadRealtime();
	// Check if it's the map page to show it if's acessed directly.
	if(document.URL == include_path + map_page)
		load(map_page);
});