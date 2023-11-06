import Panzoom from '@panzoom/panzoom'
//import Panzoom from './panzoom.js'

// https://github.com/timmywil/panzoom

var pZoomsH = {
	timer: null,
	els: document.querySelectorAll('.map-points-container '),
	init: function() {
		if (pZoomsH.els.length) {
			pZoomsH.els.forEach(el => {
				
				el.mapWrapper = el.querySelector('.map-points-wrapper');
				el.map = el.querySelector('.map-points');
				if (el.mapWrapper) {
					
					let centerX = (el.mapWrapper.clientWidth - el.getBoundingClientRect().width)/2;
					
					el.mapPanZoom = Panzoom(el.mapWrapper, {
						disableYAxis: true,
							contain: 'outside',
							startScale: 1,
							maxScale: 1,
							
							startX:	-centerX,
							
							animate: false,
							duration: 150
							//transition: false
					});				
				
				} // endif: map-wrapper
				
			}); // endforeach
			
			// resize
			window.addEventListener('resize', function() {
        pZoomsH.updateAll();
			});
			
			// esc
			document.addEventListener('keydown', function(e) {
				if(e.keyCode == 27){
					//add your code here
					pZoomsH.fullScreenCloseAll();
				}
			});
		
		}
	},
	update: function(el) {
		el.mapPanZoom.zoom(el.mapPanZoom.getScale(), { animate: false });
	},
	updateAll: function() {
		clearTimeout(pZoomsH.timer);
		pZoomsH.timer = setTimeout(function() {
			
			if (pZoomsH.els.length) {
				pZoomsH.els.forEach(el => {
					pZoomsH.update(el);
				})
			}
			
		}, 60);
	}
}
export default pZoomsH;