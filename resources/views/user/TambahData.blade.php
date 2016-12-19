<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script >
	// $.each({ name: "John", lang: "JS" }, function( k, v ) {
 // 	alert( "Key: " + k + ", Value: " + v );
	// });

	<?php foreach ($member as $members): ?>
		alert('{{$members->StationData->StationName}}');
	<?php endforeach ?>

	
	
</script>