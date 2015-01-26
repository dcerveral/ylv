
window.onerror = new Function("return true") ;

window.addEvent('domready', function() {
    Sexy = new SexyAlertBox();
});

				function compartir(id) { 
					Sexy.confirm('&iquest;Desea compartir esta noticia?', {
						onComplete:
						function(returnvalue) {
						if (returnvalue) {
						Sexy.info ('<h1>Noticia Compartida</h1><p>La noticia ha sido compartida en otros perfiles gratuitos y directorios de noticias.');
						llamarasincrono('/newspromociona.php?destacado=1&id=' + id, 'ventana');
						document.getElementById('borra' + id).style.background = '#F5F6CE';
						document.getElementById('compartir' + id).style.display = 'none';
						} else {
						Sexy.error('<h1>NO compartida</h1><p>La noticia no ha sido compartida.');
						}
						}
						});
					}
				function eliminar(id) { 
					Sexy.confirm('&iquest;Desea eliminar permanentemente esta noticia?', {
						onComplete:
						function(returnvalue) {
						if (returnvalue) {
						Sexy.info ('<h1>Noticia Eliminada</h1><p>La noticia ha sido eliminada.');
						
						llamarasincrono('/newseliminar.php?id=' + id, 'ventana');
						document.getElementById('borra' + id).style.display = 'none';
						
						
						} else {
						Sexy.error('<h1>NO eliminada</h1><p>La noticia no ha sido eliminada.');
						}
						}
						});
					}


