<script>
	// Positioncode in Koordinate umwandeln
	<?php
	if ($room['positioncode'] == 'A') {
		echo "var latitude = 51.03688154991906;";
		echo "var longitude = 13.723013778378588;";
	} else if ($room['positioncode'] == 'B') {
		echo "var latitude = 51.03701617567476;";
		echo "var longitude = 13.723154413142103;";
	} else if ($room['positioncode'] == 'C') {
		echo "var latitude = 51.0371095091609;";
		echo "var longitude = 13.723304783357687;";
	} else if ($room['positioncode'] == 'D') {
		echo "var latitude = 51.03701615372429;";
		echo "var longitude = 13.723553031189006;";
	} else if ($room['positioncode'] == 'E') {
		echo "var latitude = 51.036651394639314;";
		echo "var longitude = 13.723549126635298;";
	} else if ($room['positioncode'] == 'F') {
		echo "var latitude = 51.03677284550316;";
		echo "var longitude = 13.723643594827854;";
	} else if ($room['positioncode'] == 'G') {
		echo "var latitude = 51.0368472023843;";
		echo "var longitude = 13.723341282846256;";
	} else if ($room['positioncode'] == 'H') {
		echo "var latitude = 51.037026693292674;";
		echo "var longitude = 13.724009269346098;";
	} else if ($room['positioncode'] == 'I') {
		echo "var latitude = 51.03719866784094;";
		echo "var longitude = 13.724225797554954;";
	} else if ($room['positioncode'] == 'J') {
		echo "var latitude = 51.03745908207181;";
		echo "var longitude = 13.724546231891958;";
	} else if ($room['positioncode'] == 'K') {
		echo "var latitude = 51.037568607349435;";
		echo "var longitude = 13.724289591617953;";
	} else if ($room['positioncode'] == 'L') {
		echo "var latitude = 51.03771163109751;";
		echo "var longitude = 13.724431780056292;";
	} else if ($room['positioncode'] == 'M') {
		echo "var latitude = 51.03734170381413;";
		echo "var longitude = 13.72437172251767;";
	} else if ($room['positioncode'] == 'N') {
		echo "var latitude = 51.036954100199715;";
		echo "var longitude = 13.723791892185952;";
	}
	?>


	//Raum Icon
	var locatorIcon = L.icon({
		iconUrl: './assets/icons/roommarker.svg', 
		iconSize: [32, 32], 
		iconAnchor: [16, 32]
	});

	//Standort Icon
	var positionIcon = L.icon({
		iconUrl: './assets/icons/positionmarker.svg', 
		iconSize: [24, 24], 
		iconAnchor: [12, 24] 
	});

	//Ausgang Icon
	var exitIcon = L.icon({
		iconUrl: './assets/icons/exit.svg',
		iconSize: [16, 16],
		iconAnchor: [8, 8],
		forceZIndex: [6]
	});

	//Treppen Icon
	var stairIcon = L.icon({
		iconUrl: './assets/icons/stairs.svg',
		iconSize: [16, 16],
		iconAnchor: [8, 8]
	});

	//Aufzug Icon
	var liftIcon = L.icon({
		iconUrl: './assets/icons/lift.svg',
		iconSize: [16, 16],
		iconAnchor: [8, 8]
	});

	// Initialisiere  Leaflet-map
	var map = L.map('map').setView([latitude, longitude], 13); // Standard Zoomstufe

	// Hintergrundmap von OpenStreetMap (normale map)
	L.tileLayer('https://{s}.tile.jawg.io/jawg-light/{z}/{x}/{y}{r}.png?access-token=6dHOmrgT6Mi7xVO8IDwZgLRH6VYBrhJySefeo0MCVRMErH6M9g5GMSktDgPUVn1t', {
		//minZoom: 19,
		//maxZoom: 19,
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
		accessToken: '6dHOmrgT6Mi7xVO8IDwZgLRH6VYBrhJySefeo0MCVRMErH6M9g5GMSktDgPUVn1t'
	}).addTo(map);

	// Raum icon auf Map platzieren
	L.marker([latitude, longitude], { icon: locatorIcon }).addTo(map);
		
	let userLongitude, userLatitude;

	if ("geolocation" in navigator) {
		navigator.geolocation.getCurrentPosition(function(position) {
			userLatitude = position.coords.latitude;
			userLongitude = position.coords.longitude;
			console.log("Latitude:", userLatitude);
			console.log("Longitude:", userLongitude);

		// Standort icon auf Map platzieren
		L.marker([userLatitude, userLongitude], { icon: positionIcon }).addTo(map);
		});
	
	} else {
		console.log("Geolocation is not supported by this browser.");
	}
 
	//Ausgänge
	L.marker([51.0368792897469, 13.723904277554208], { icon: exitIcon }).addTo(map);
	L.marker([51.03721805266916, 13.723400715518707], { icon: exitIcon }).addTo(map);
	L.marker([51.03725425180718, 13.724084012639667], { icon: exitIcon }).addTo(map);
	L.marker([51.03748855378092, 13.72431739014748], { icon: exitIcon }).addTo(map);
	L.marker([51.037511489848406, 13.724563478200968], { icon: exitIcon }).addTo(map);
		  
	//Treppen
	L.marker([51.03664521437874, 13.723504435111602], { icon: stairIcon }).addTo(map);
	L.marker([51.03686087857882, 13.722972809050844], { icon: stairIcon }).addTo(map);
	L.marker([51.03702392329424, 13.723544882282566], { icon: stairIcon }).addTo(map);
	L.marker([51.03721901877077, 13.724176552963364], { icon: stairIcon }).addTo(map);
	L.marker([51.03745320174651, 13.724408781874438], { icon: stairIcon }).addTo(map);
	L.marker([51.0378047347625, 13.724433361901914], { icon: stairIcon }).addTo(map);
		  
	//Aufzug
	L.marker([51.036881109284884, 13.723564432410768], { icon: liftIcon }).addTo(map);
		  
	var polygonPoints = [
		[51.03690022850592, 13.722879082428786],
		[51.037274966672264, 13.723295040156962],
		[51.0370087510801, 13.723869916926486],
		[51.03718534370697, 13.724112250961035],
		[51.037220493500385, 13.724053383611322],
		[51.03728487730843, 13.724137379360863],
		[51.037270559163964, 13.724193714869868],
		[51.0374470389671, 13.72439133709657],
		[51.03756063910606, 13.724166147160544],
		[51.037851463881104, 13.724492494002035],
		[51.03778740696582, 13.724627713604743],
		[51.03758719323866, 13.724424739143556],
		[51.037478212385246, 13.724633201668398],
		[51.03739273355803, 13.724547263794625],
		[51.037394507992204, 13.724527810374807],
		[51.03688179617699, 13.723927391861503],
		[51.036823454966026, 13.7239009809713],
		[51.03656627656712, 13.723614514529187],
		[51.036655828333565, 13.723414476360448],
		[51.03684389629368, 13.723644497209762],
		<?php
			if ($room['level'] == '0') {
				echo "[51.036883973267706, 13.723545082377894],";
				echo "[51.03684389629368, 13.723644497209762],";
				echo "[51.036655828333565, 13.723414476360448],";
				echo "[51.036820428235046, 13.723060865739116],";
			}
		?>
		[51.03700405683465, 13.723282332116243],
		<?php
			if ($room['level'] == '0') {
				echo "[51.0369568964402, 13.723359933172052],";
			}
		?>
		[51.03700405683465, 13.723282332116243],
		[51.036820428235046, 13.723060865739116]
	];
			
	var polygon = L.polygon(polygonPoints, {color: '#3c5445'}).addTo(map);
			
	map.fitBounds(polygon.getBounds());
</script>