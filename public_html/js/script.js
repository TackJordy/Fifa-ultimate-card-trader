
$(document).ready(function(){
    if('serviceWorker' in navigator){
      navigator.serviceWorker.register('./service-worker.js', {scope:'./'})
      .then(function(registration){
        console.log("service worker registered");

      })
      .catch(function(err){
        console.log("Service worker failed to register", err);
      })
    }
  
   $( '.orderform' ).change(function () {

   		$path =  window.location.href.split('/');	
   	 	console.log($path.slice(0,4).join('/'));
   	 	$sel=$('select[name=orderby]').val();
   	 	$sel2=$('select[name=order]').val();
      $sel3=$('select[name=show]').val();
   	 	sessionStorage.sel = $sel;
   	 	sessionStorage.sel2 = $sel2;
      sessionStorage.sel3 = $sel3;
   	 	sessionStorage.reloadAfterPageLoad = true;
   		window.location.href = $path.slice(0,4).join('/')+'/'+$('select[name=orderby]').val()+'/'+$('select[name=order]').val()+'/'+$('select[name=show]').val();
   		

   });
   $('window').on('load',function(){
   		if(sessionStorage.reloadAfterPageLoad==false){
  		sessionStorage.state = true;
  		}
    });
   $('window').on('load',function(){
   		if(sessionStorage.state){
  		$('select[name=orderby]').val('Overall');
        $('select[name=order]').val('Descending');
        $('select[name=show]').val('100');
    }
    });
   if ( sessionStorage.reloadAfterPageLoad ) {
        $('select[name=orderby]').val(sessionStorage.sel);
        $('select[name=order]').val(sessionStorage.sel2);
        $('select[name=show]').val(sessionStorage.sel3);
        sessionStorage.reloadAfterPageLoad = false;
    }
    (function() {

    var $menu = $('nav'),
      optionsList = '<option value="" selected>Go to..</option>';

    $menu.find('li').each(function() {
        var $this = $(this),
          $anchor = $this.children('a'),
          depth = $this.parents('ul').length - 1,
          indent = '';

        if (depth) {
          while (depth > 0) {
            indent += ' - ';
            depth--;
          }

        }
        $(".nav li").parent().addClass("bold");
        if($anchor.text().trim()!=="Logout"){
        optionsList += '<option value="' + $anchor.attr('href') + '">' + indent + ' ' + $anchor.text() + '</option>';
       } else {
          //optionsList+= '<option value"" onclick="'+document.getElementById('logout-form').submit();+'">'+indent+' ' + $anchor.text() + '</option>';
                                                                        
                                       
        }
      }).end()
      .after('<select class="selectmenu">' + optionsList + '</select>');

    $('select.selectmenu').on('change', function() {
      window.location = $(this).val();
    });

  })();
});