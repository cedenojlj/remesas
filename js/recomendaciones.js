// comienzo del jquery

$(document).ready(function () {
  
  $("input[type='text']").on("keypress", function () {
    $input=$(this);
    setTimeout(function () {
     $input.val($input.val().toUpperCase());
    },50);
   })

    $("input[type='email']").on("keypress", function () {
    $input=$(this);
    setTimeout(function () {
     $input.val($input.val().toUpperCase());
    },50);
   })

   
   $(document).on('change','input[type="file"]',function(){
    // this.files[0].size recupera el tamaño del archivo
    // alert(this.files[0].size);    
    
    var fileName = this.files[0].name;
    var fileSize = this.files[0].size;

    console.log(fileSize);

    if(fileSize > 500000){
      
      Swal.fire("Proceso Fallido", "El archivo no debe superar los 500kb", "info");
      this.value = '';   

    }else{

      // recuperamos la extensión del archivo
		var ext = fileName.split('.').pop();
		
		// Convertimos en minúscula porque 
		// la extensión del archivo puede estar en mayúscula
		ext = ext.toLowerCase();
    
		// console.log(ext);
		switch (ext) {
			case 'jpg':
			case 'jpeg':
			case 'png':
			case 'pdf': break;
			default:
				alert('El archivo no tiene la extensión adecuada');
				this.value = ''; // reset del valor			
		}
	}
});


$('#btnCamara').click(function (e) { 
  e.preventDefault();
  $('#camara').toggleClass('d-none');
  
});


  //Termina jquery
});
